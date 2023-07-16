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
    const contentHeader = header ? `<thead><tr><td>${header.map(e => e.name).join('</td><td>')}</td><tr></thead>` : '';
    const contentBody = data.map(e => Utilities.concat.excel(e));
    const content = `<table>${contentHeader}<tbody>${contentBody.join('')}</tbody></table>`;
    return {
        content,
        type: 'application/vnd.ms-excel',
        name: `${fileName || document.title}.xls`
    };
};

const print = (data, header) => {
    const { content } = excel(data, header);
    const style = `
      body, table {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
        font-size: 12px;
      }
      table {
        width: 100%;
      }
      thead {
        font-weight: bold;
      }
    `;
    return `<style>${style}</style>${content}`;
};

const ExportMethod = {
    csv,
    excel,
    print
};

export default ExportMethod;
