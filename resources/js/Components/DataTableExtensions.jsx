import React, { Component, Fragment } from "react";
import PropTypes from "prop-types";
import ExportData from "@/Utils/Export";
import Utilities from "@/Utils/Utilities";
import Filter from "@/Components/Filter";
import Export from "@/Components/ExportComponent";
import Print from "@/Components/Print";

class DataTableExtensions extends Component {
    constructor(props) {
        super(props);
        const { columns, data, filterDigit } = props;
        this.state = {
            dropdown: false,
            columns: columns,
            data: data,
            constData: data,
            filter: "",
            filterDigit: filterDigit
        };
        this.raw = {
            header: [],
            data: []
        };
    }

    componentDidMount() {
        const { columns } = this.state;
        columns.forEach(element => {
            if (element.export !== false) {
                this.raw.header.push(element);
            }
        });
    }

    componentDidUpdate(prevProps) {
        const { columns, data, filterDigit } = this.props;
        const { filter } = this.state;

        if (prevProps.columns !== columns || prevProps.data !== data) {
            this.setState(
                {
                    columns: columns,
                    data: data,
                    filterDigit: filterDigit,
                    constData: data
                },
                () => {
                    this.checkHeader();

                    if (filter.length > filterDigit) {
                        this.onFilter(filter);
                    }
                }
            );
        }
    }

    onDataRender() {
        const { constData } = this.state;
        this.raw.data = Utilities.dataRender(constData, this.raw.header);
    }

    onExport(e, type) {
        this.onDataRender();
        const { exportHeaders, fileName } = this.props;
        const { data, header } = this.raw;

        const exportData = ExportData[type](data, exportHeaders ? header : null, fileName);

        Utilities.download(exportData);

        this.setState({
            dropdown: false
        });

        e.preventDefault();
    }

    onFilter(text) {
        const value = Utilities.lower(text);
        const { constData, filterDigit } = this.state;
        const { filterHidden } = this.props;
        let filtered = constData;

        if (value.length > filterDigit) {
            if (!filterHidden) {
                this.onDataRender();
            }

            filtered = Utilities.filter(value, constData, this.raw.data, filterHidden);
        }

        this.setState({
            data: filtered,
            filter: value
        });
    }

    onPrint() {
        this.onDataRender();
        const { data, header } = this.raw;

        const table = ExportData.print(data, header);

        Utilities.print(table);
    }

    checkHeader() {
        const { columns } = this.state;

        if (columns.length !== this.raw.header.length) {
            this.raw.header = [];
            columns.forEach(element => {
                if (element.export !== false) {
                    this.raw.header.push(element);
                }
            });
        }
    }

    render() {
        const { dropdown, columns, data } = this.state;
        const {
            filter,
            print,
            children,
            filterPlaceholder
        } = this.props;

        return (
            <Fragment>
                <div className="data-table-extensions">
                    {filter && (
                        <Filter
                            onChange={e => this.onFilter(e.target.value)}
                            placeholder={filterPlaceholder}
                        />
                    )}
                    <div className="data-table-extensions-action">
                        {this.props.export && (
                            <Export
                                className={dropdown ? "drop" : ""}
                                onDropdown={() =>
                                    this.setState(prevState => ({
                                        dropdown: !prevState.dropdown
                                    }))
                                }
                                onClick={(e, type) => this.onExport(e, type)}
                            />
                        )}
                        {print && <Print onClick={() => this.onPrint()} />}
                    </div>
                </div>
                {React.cloneElement(children, {
                    columns: columns,
                    data: data
                })}
            </Fragment>
        );
    }
}

DataTableExtensions.propTypes = {
    columns: PropTypes.array,
    data: PropTypes.array,
    filter: PropTypes.bool,
    filterPlaceholder: PropTypes.string,
    export: PropTypes.bool,
    print: PropTypes.bool,
    exportHeaders: PropTypes.bool,
    children: PropTypes.node,
    filterHidden: PropTypes.bool,
    filterDigit: PropTypes.number,
    fileName: PropTypes.string
};

DataTableExtensions.defaultProps = {
    columns: [],
    data: [],
    filter: true,
    export: true,
    print: true,
    exportHeaders: false,
    children: null,
    filterHidden: true,
    filterPlaceholder: "Filter Table",
    filterDigit: 2,
    fileName: document.title
};

export default DataTableExtensions;
