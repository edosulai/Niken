import React, { useState, useEffect } from "react";
import PropTypes from "prop-types";
import ExportUtil from "@/Utils/Export";
import Utilities from "@/Utils/Utilities";
import Export from "@/Components/Export";
import Filter from "@/Components/Filter";
import Print from "@/Components/Print";

const DataTableExtensions = ({
    columns,
    data,
    filterDigit,
    filterPlaceholder,
    exportHeaders,
    fileName,
    filterHidden,
    children,
    filter = true,
    export: exportOption = true,
    print = true,
    letterhead,
    letterfooter
}) => {
    const [dropdown, setDropdown] = useState(false);
    const [constData, setConstData] = useState(data);
    const [filterValue, setFilterValue] = useState("");
    const [filteredData, setFilteredData] = useState(data);

    const raw = {
        header: [],
        data: []
    };

    useEffect(() => {
        // column properties and select fields to export
        columns.forEach((element) => {
            if (element["export"] !== false) {
                raw.header.push(element);
            }
        });
    }, [columns]);

    useEffect(() => {
        setFilteredData(constData);
        setFilterValue("");
    }, [data]);

    const onDataRender = () => {
        raw.data = Utilities.dataRender(constData, raw.header);
    };

    const onExport = (e, type) => {
        onDataRender();
        const exportData = ExportUtil[type](
            raw.data,
            exportHeaders ? raw.header : null,
            fileName
        );

        Utilities.download(exportData);

        setDropdown(false);
        e.preventDefault();
    };

    const onFilter = (text) => {
        const value = Utilities.lower(text);
        setFilterValue(value);

        let filtered = constData;
        if (value.length > filterDigit) {
            if (!filterHidden) {
                onDataRender();
            }
            filtered = Utilities.filter(value, constData, raw.data, filterHidden);
        }

        setFilteredData(filtered);
    };

    const onPrint = () => {
        onDataRender();
        const table = ExportUtil.print(raw.data, raw.header, letterhead, letterfooter);
        Utilities.print(table);
    };

    const checkHeader = () => {
        if (columns.length !== raw.header.length) {
            raw.header = [];
            columns.forEach((element) => {
                if (element["export"] !== false) {
                    raw.header.push(element);
                }
            });
        }
    };

    checkHeader();

    return (
        <>
            <div className="data-table-extensions">
                {filter && (
                    <Filter
                        onChange={(e) => onFilter(e.target.value)}
                        placeholder={filterPlaceholder}
                    />
                )}
                <div className="data-table-extensions-action">
                    {exportOption && (
                        <Export
                            className={dropdown ? "drop" : ""}
                            onDropdown={() => setDropdown((prevState) => !prevState)}
                            onClick={(e, type) => onExport(e, type)}
                        />
                    )}
                    {print && <Print onClick={onPrint} />}
                </div>
            </div>
            {React.cloneElement(children, {
                columns,
                data: filteredData
            })}
        </>
    );
};

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
    fileName: PropTypes.string,
    letterhead: PropTypes.object,
    letterfooter: PropTypes.object,
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
    fileName: document.title,
    letterhead: null,
    letterfooter: null,
};

export default DataTableExtensions;
