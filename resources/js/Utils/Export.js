import Utilities from "@/Utils/Utilities";

const csv = (data, header, fileName) => {
    const contentHeader = header ? `${header.map(e => e.name).join(';')}\n` : '';
    const content = `${contentHeader}${data.map(e => Utilities.concat.csv(e)).join('\n')}`;
    return {
        content,
        type: 'text/csv',
        name: `${fileName || document.title}.csv`
    };
};

const excel = (data, header, fileName) => {
    const contentHeader = header ? `<thead><tr><td>${header.filter(e => e.cellExport).map(e => e.name).join('</td><td>')}</td><tr></thead>` : '';
    const contentBody = data.map(e => Utilities.concat.excel(e));
    const content = `<table>${contentHeader}<tbody>${contentBody.join('')}</tbody></table>`;
    return {
        content,
        type: 'application/vnd.ms-excel',
        name: `${fileName || document.title}.xls`
    };
};

const print = (data, header, letterhead, letterfooter) => {
    const { content } = excel(data, header);
    const style = {
        body: {
            fontFamily: `-apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif`,
            fontSize: '12px',
        },
        table: {
            width: '100%',
        },
        thead: {
            fontWeight: 'bold',
        },
        ".letterhead": {
            ...(letterhead ? letterhead.css : null),
        },
        ".letterfooter": {
            ...(letterfooter ? letterfooter.css : null),
        },
    };

    const styleString = Object.entries(style)
        .map(([selector, properties]) => `${selector} { ${Object.entries(properties)
            .map(([property, value]) => `${property.replace(/[A-Z]/g, (match) => `-${match.toLowerCase()}`)}: ${value};`)
            .join(' ')} }`
        )
        .join(' ');

    return `
        <style>${styleString}</style>
        ${letterhead ? `<div class="letterhead">${letterhead.html}</div>` : ''}
        ${content}
        ${letterfooter ? `<div class="letterfooter">${letterfooter.html}</div>` : ''}
    `;
};



const ExportMethod = {
    csv,
    excel,
    print
};

export default ExportMethod;
