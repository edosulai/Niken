import PropTypes from "prop-types";

const Print = ({ onClick }) => {
  return (
    <button type="button" className="print" onClick={() => onClick()}></button>
  );
};

Print.propTypes = {
  onClick: PropTypes.func,
};

Print.defaultProps = {
  onClick: null,
};

export default Print;
