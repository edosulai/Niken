import { forwardRef, useEffect, useRef } from "react";

export default forwardRef(function SwitchInput(
    { name, id, isChecked, required, handleChange, LeftChild, RightChild, disabled = false },
    ref
) {
    const input = ref ? ref : useRef();

    return (
        <div className="flex items-center">
            <label
                htmlFor={name}
                className="shadow-card relative inline-flex cursor-pointer select-none items-center justify-center rounded-md bg-gray-300 p-1"
            >
                <input
                    type="checkbox"
                    disabled={disabled}
                    name={name}
                    ref={input}
                    id={id}
                    className="sr-only"
                    checked={isChecked}
                    required={required}
                    onChange={(e) => handleChange(e)}
                />
                <LeftChild isChecked={isChecked} />
                <RightChild isChecked={isChecked} />
            </label>
        </div>
    );
});
