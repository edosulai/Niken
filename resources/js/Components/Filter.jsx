import React from "react";
import PropTypes from "prop-types";

const Filter = ({ onChange, placeholder }) => {
  return (
    <div className="data-table-extensions-filter">
      <label htmlFor="filterDataTable" className="icon"></label>
      <input
        type="text"
        name="filterDataTable"
        className="filter-text"
        placeholder={placeholder}
        onChange={(e) => onChange(e)}
      />
    </div>
  );
};

Filter.propTypes = {
  onChange: PropTypes.func,
  placeholder: PropTypes.string.isRequired,
};

Filter.defaultProps = {
  onChange: null,
};

export default Filter;
