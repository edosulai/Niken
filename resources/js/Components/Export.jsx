import PropTypes from "prop-types";

const Export = ({ className, onDropdown, onClick }) => {
  return (
    <>
      <button
        type="button"
        className={`download ${className}`}
        onClick={() => onDropdown()}
      ></button>
      <div className={`dropdown ${className}`}>
        <button type="button" onClick={(e) => onClick(e, "csv")}>
          Csv File
        </button>
        <button type="button" onClick={(e) => onClick(e, "excel")}>
          Excel File
        </button>
      </div>
    </>
  );
};

Export.propTypes = {
  className: PropTypes.string,
  onDropdown: PropTypes.func,
  onClick: PropTypes.func,
};

Export.defaultProps = {
  className: "",
  onDropdown: null,
  onClick: null,
};

export default Export;
