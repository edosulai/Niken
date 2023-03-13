import { forwardRef, useEffect, useRef, useState } from "react";

export default forwardRef(function SearchInput(
    {
        type = "text",
        name,
        id,
        value,
        className,
        autoComplete,
        required,
        isFocused,
        handleChange,
        searchValues,
    },
    ref
) {
    const input = ref ? ref : useRef();
    const parent = useRef();

    const [options, setOptions] = useState();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (parent.current && !parent.current.contains(event.target))
                setOptions([]);
        };

        document.addEventListener("mousedown", handleClickOutside);
        return () => {
            document.removeEventListener("mousedown", handleClickOutside);
        };
    }, [parent]);

    return (
        <div className="flex flex-col items-start" ref={parent}>
            <input
                type={type}
                name={name}
                id={id}
                value={value}
                className={
                    `border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ` +
                    className
                }
                ref={input}
                autoComplete={autoComplete}
                required={required}
                onChange={(e) => {
                    handleChange(e);

                    setOptions([
                        ...new Set(
                            searchValues.filter((search) =>
                                search
                                    .toLowerCase()
                                    .includes(e.target.value.toLowerCase())
                            )
                        ),
                    ]);
                }}
            />
            {options && (
                <div className="relative w-full z-10">
                    <ul className="absolute w-full mt-1 bg-white rounded-md shadow-lg max-h-56 overflow-y-auto">
                        {options.map((option, index) => (
                            <li key={index}>
                                <button
                                    type="button"
                                    className="w-full block px-4 py-2 text-sm leading-5 text-left text-gray-700 hover:bg-indigo-500 hover:text-white"
                                    onClick={(e) => {
                                        input.current.value = option;
                                        e.target.name = name;
                                        e.target.value = option;

                                        handleChange(e);

                                        setOptions([]);
                                    }}
                                >
                                    {option}
                                </button>
                            </li>
                        ))}
                    </ul>
                </div>
            )}
        </div>
    );
});
