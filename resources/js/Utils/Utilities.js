import { createRoot } from 'react-dom/client';

const download = (props) => {
    const { content, type, name } = props;
    const file = new Blob(["\uFEFF", content], { type });
    const link = document.createElement('a');
    link.id = `_export_datatable_${name}`;
    link.download = name;
    link.href = window.URL.createObjectURL(file);
    document.body.appendChild(link);
    link.click();
    document.getElementById(link.id).remove();
};

const print = (table) => {
    const printWindow = window.open();
    printWindow.document.write(table);
    printWindow.print();
};

const lower = (value) => {
    return value.toString().toLowerCase();
};

const objectValues = (item) => {
    return Object.values(item).map((obj) => {
        return typeof obj === 'object' && obj !== null ? objectValues(obj) : obj;
    });
};

const filter = (search, constant, data, filterHidden) => {
    return constant.filter((item, index) => {
        const value = (filterHidden ? objectValues(item) : Object.values(data[index])).join();
        const searchSplit = search.split(' ').filter((filterItem) => {
            return filterItem !== '';
        });
        return searchSplit.filter((filterItem) => {
            return lower(value).indexOf(filterItem.trim()) !== -1;
        }).length === searchSplit.length;
    });
};

const getProperty = (row, selector, format) => {
    if (typeof selector !== 'string') {
        throw new Error('selector must be a . delimited string eg (my.property)');
    }

    if (format && typeof format === 'function') {
        return format(row);
    }

    return selector.split('.').reduce((acc, part) => {
        if (!acc) {
            return null;
        }

        const arr = part.match(/[^\]\\[.]+/g);

        if (arr.length > 1) {
            for (let i = 0; i < arr.length; i++) {
                return acc[arr[i]][arr[i + 1]];
            }
        }

        return acc[part];
    }, row);
};

const dataRender = (data, header) => {
    const rawData = [];
    data.forEach((element) => {
        const row = [];
        header.forEach((head) => {
            if (head.cellExport) {
                row.push(head.cellExport(element));
            }
        });
        rawData.push(row);
    });
    return rawData;
};

const concat = {
    csv: (row) => {
        const items = [];
        row.forEach((item) => {
            if (typeof item === 'object' && item !== null) {
                items.push(Object.keys(item).map((key) => {
                    return `${key}: ${item[key]}`;
                }).join(';'));
            } else {
                items.push(item);
            }
        });
        return items.join(';');
    },
    excel: (row) => {
        const items = [];
        row.forEach((item) => {
            if (typeof item === 'object' && item !== null) {
                items.push(`<table><tbody>${Object.keys(item).map((key) => {
                    return `<tr><td>${key}</td><td>${item[key]}</td></tr>`;
                }).join('')}</tbody></table>`);
            } else {
                items.push(item);
            }
        });
        return `<tr style="border-bottom:1px solid #000;"><td style="border-right:1px solid #000;">${items.join('</td><td style="border-right:1px solid #000;">')}</td></tr>`;
    }
};

const Utilities = {
    download,
    print,
    filter,
    getProperty,
    lower,
    dataRender,
    concat
};

export default Utilities;
