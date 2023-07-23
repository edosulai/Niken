import _ from "lodash";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import { useEffect, useState } from "react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import RangeInput from "@/Components/RangeInput";
import SwitchInput from "@/Components/SwitchInput";
import DataTable from "react-data-table-component";
import DataTableExtensions from "@/Components/DataTableExtensions";
// import { MathJax, MathJaxContext } from "better-react-mathjax";

export default function Form({ auth, status, title, employers, asset_url }) {
    const [showResult, setShowResult] = useState(false);

    const leftChild = ({ isChecked }) => (
        <span
            className={`flex rounded py-1 px-4 text-sm font-medium ${isChecked ? `bg-gray-500 text-gray-100` : ``
                }`}
        >
            Cost
        </span>
    );

    const rightChild = ({ isChecked }) => (
        <span
            className={`flex rounded py-1 px-4 text-sm font-medium ${isChecked ? `` : `bg-gray-500 text-gray-100`
                }`}
        >
            Benefit
        </span>
    );

    const useFormInertia = useForm({
        kinerja: 0.2,
        kinerja_tipe: 1,
        ketepatan_waktu: 0.7,
        ketepatan_waktu_tipe: 0,
        komunikasi: 0.6,
        komunikasi_tipe: 0,
        kreatifitas: 0.9,
        kreatifitas_tipe: 0,
        kehadiran: 0.7,
        kehadiran_tipe: 0,
    });

    const { data, setData, processing, errors, reset } = useFormInertia;

    const submit = (e) => {
        e.preventDefault();
        setShowResult(true);
    };

    useEffect(() => {
        return () => {
            reset(
                "kinerja",
                "kinerja_tipe",
                "ketepatan_waktu",
                "ketepatan_waktu_tipe",
                "komunikasi",
                "komunikasi_tipe",
                "kreatifitas",
                "kreatifitas_tipe",
                "kehadiran",
                "kehadiran_tipe"
            );
        };
    }, []);

    const onHandleChange = (event) => {
        setData(
            event.target.name,
            event.target.type === "checkbox"
                ? event.target.checked
                : event.target.value
        );
    };

    const newData = _.map(employers, (item, index) => {
        return {
            no: index + 1,
            ...item,
        };
    });

    const total =
        data.kinerja +
        data.ketepatan_waktu +
        data.komunikasi +
        data.kreatifitas +
        data.kehadiran;

    const BobotKepentingan = ({ data, total }) => (
        // <MathJaxContext>
        //     <MathJax>
        <math>
            <mrow>
                <mn>{(data.kinerja / total).toFixed(6)}</mn>
                <mo>+</mo>
                <mn>{(data.ketepatan_waktu / total).toFixed(6)}</mn>
                <mo>+</mo>
                <mn>{(data.komunikasi / total).toFixed(6)}</mn>
                <mo>+</mo>
                <mn>{(data.kreatifitas / total).toFixed(6)}</mn>
                <mo>+</mo>
                <mn>{(data.kehadiran / total).toFixed(6)}</mn>
                <mo>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</mo>
            </mrow>
        </math>
        //     </MathJax>
        // </MathJaxContext>
    );

    const BobotKriteria = ({
        iterasi = 0,
        targetBobot = 0,
        dataBobot = [],
    }) => {
        return (
            // <MathJaxContext>
            //     <MathJax>
            <math>
                <mrow>
                    <msub>
                        <mi>W</mi>
                        <mn>{iterasi}</mn>
                    </msub>
                    <mo>=</mo>
                    <mn>{targetBobot}</mn>
                    <mo lspace="0em" rspace="0em">
                        /
                    </mo>
                    <mo form="prefix" stretchy="false">
                        (
                    </mo>
                    {dataBobot.map((data, key) =>
                        key < dataBobot.length - 1 ? (
                            <>
                                <mn>{data}</mn>
                                <mo>+</mo>
                            </>
                        ) : (
                            <mn>{data}</mn>
                        )
                    )}
                    <mo form="postfix" stretchy="false">
                        )
                    </mo>
                    {/* <mo>=</mo>
                            <mn>
                                {(targetBobot / _.sum(dataBobot)).toFixed(6)}
                            </mn> */}
                    <mo>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </mo>
                </mrow>
            </math>
            //     </MathJax>
            // </MathJaxContext>
        );
    };

    const VectorS = ({ iterasi = 0, dataVector = [] }) => {
        return (
            // <MathJaxContext>
            //     <MathJax>
            <math>
                <mrow>
                    <msub>
                        <mi>S</mi>
                        <mn>{iterasi}</mn>
                    </msub>
                    <mo>=</mo>
                    {dataVector.map((x, key) =>
                        key < dataVector.length - 1 ? (
                            <>
                                <msup>
                                    <mo>{x.k_value}</mo>
                                    <mn>{x.pangkat.toFixed(6)}</mn>
                                </msup>
                                <mo>*</mo>
                            </>
                        ) : (
                            <msup>
                                <mo>{x.k_value}</mo>
                                <mn>{x.pangkat.toFixed(6)}</mn>
                            </msup>
                        )
                    )}
                    {/* <mo>=</mo>
                <mn>
                    {dataVector
                        .map((x) => Math.pow(x.k_value, x.pangkat))
                        .reduce(
                            (product, value) => product * value,
                            1
                        )
                        .toFixed(6)}
                </mn> */}
                </mrow>
            </math>
            //     </MathJax>
            // </MathJaxContext>
        );
    };

    const VectorKriteria = ({
        iterasi = 0,
        targetVector = 0,
        dataVector = [],
    }) => {
        return (
            // <MathJaxContext>
            //     <MathJax>
            <math>
                <mrow>
                    <msub>
                        <mi>V</mi>
                        <mn>{iterasi}</mn>
                    </msub>
                    <mo>=</mo>
                    <mn>{targetVector.toFixed(6)}</mn>
                    <mo lspace="0em" rspace="0em">
                        /
                    </mo>
                    <mo form="prefix" stretchy="false">
                        (
                    </mo>

                    {dataVector.map((x, key) =>
                        key < dataVector.length - 1 ? (
                            <>
                                <mn>{x.toFixed(6)}</mn>
                                <mo>+</mo>
                            </>
                        ) : (
                            <mn>{x.toFixed(6)}</mn>
                        )
                    )}

                    <mo form="postfix" stretchy="false">
                        )
                    </mo>
                    <mo>=</mo>
                    <mn>{(targetVector / _.sum(dataVector)).toFixed(6)}</mn>
                </mrow>
            </math>
            //     </MathJax>
            // </MathJaxContext>
        );
    };

    const dataVectors = newData.map((employer, index) => {
        return [
            {
                k_value: employer.kinerja,
                pangkat: (data.kinerja / total) * (data.kinerja_tipe ? -1 : 1),
            },
            {
                k_value: employer.ketepatan_waktu,
                pangkat:
                    (data.ketepatan_waktu / total) *
                    (data.ketepatan_waktu_tipe ? -1 : 1),
            },
            {
                k_value: employer.komunikasi,
                pangkat:
                    (data.komunikasi / total) * (data.komunikasi_tipe ? -1 : 1),
            },
            {
                k_value: employer.kreatifitas,
                pangkat:
                    (data.kreatifitas / total) *
                    (data.kreatifitas_tipe ? -1 : 1),
            },
            {
                k_value: employer.kehadiran,
                pangkat:
                    (data.kehadiran / total) * (data.kehadiran_tipe ? -1 : 1),
            },
        ]
            .map((x) => Math.pow(x.k_value, x.pangkat))
            .reduce((product, value) => product * value, 1);
    });

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800 leading-tight">
                    {title}
                </h2>
            }
        >
            <Head title={title} />

            <div className="flex justify-center">
                <div className="py-6 w-1/2">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900 ">
                                {status && (
                                    <div className="mb-4 font-medium text-sm text-green-600">
                                        {status}
                                    </div>
                                )}
                                <form onSubmit={submit}>
                                    <div className="mt-4 flex gap-2">
                                        <div className="basis-8/12 relative">
                                            <InputLabel
                                                forInput="kinerja"
                                                className="flex justify-between"
                                            >
                                                <span>Bobot Kinerja (0 - 1)</span>
                                                <span>{data.kinerja}</span>
                                            </InputLabel>

                                            <RangeInput
                                                id="kinerja"
                                                name="kinerja"
                                                value={data.kinerja}
                                                min={0}
                                                max={1}
                                                step={0.1}
                                                className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                                handleChange={onHandleChange}
                                                disabled={showResult}
                                            />

                                            <InputError
                                                message={errors.kinerja}
                                                className="mt-2"
                                            />
                                        </div>
                                        <div className="basis-4/12 flex justify-center">
                                            <div>
                                                <InputLabel
                                                    forInput="kinerja_tipe"
                                                    value="Tipe Kinerja"
                                                />

                                                <SwitchInput
                                                    name="kinerja_tipe"
                                                    id="kinerja_tipe"
                                                    isChecked={data.kinerja_tipe}
                                                    handleChange={onHandleChange}
                                                    LeftChild={leftChild}
                                                    RightChild={rightChild}
                                                    disabled={showResult}
                                                />

                                                <InputError
                                                    message={errors.kinerja_tipe}
                                                    className="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-12 flex gap-2">
                                        <div className="basis-8/12 relative">
                                            <InputLabel
                                                forInput="ketepatan_waktu"
                                                className="flex justify-between"
                                            >
                                                <span>
                                                    Bobot Ketepatan Waktu (0 - 1)
                                                </span>
                                                <span>{data.ketepatan_waktu}</span>
                                            </InputLabel>

                                            <RangeInput
                                                id="ketepatan_waktu"
                                                name="ketepatan_waktu"
                                                value={data.ketepatan_waktu}
                                                min={0}
                                                max={1}
                                                step={0.1}
                                                className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                                handleChange={onHandleChange}
                                                disabled={showResult}
                                            />

                                            <InputError
                                                message={errors.ketepatan_waktu}
                                                className="mt-2"
                                            />
                                        </div>
                                        <div className="basis-4/12 flex justify-center">
                                            <div>
                                                <InputLabel
                                                    forInput="ketepatan_waktu_tipe"
                                                    value="Tipe Ketepatan Waktu"
                                                />

                                                <SwitchInput
                                                    name="ketepatan_waktu_tipe"
                                                    id="ketepatan_waktu_tipe"
                                                    isChecked={
                                                        data.ketepatan_waktu_tipe
                                                    }
                                                    handleChange={onHandleChange}
                                                    LeftChild={leftChild}
                                                    RightChild={rightChild}
                                                    disabled={showResult}
                                                />

                                                <InputError
                                                    message={
                                                        errors.ketepatan_waktu_tipe
                                                    }
                                                    className="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-12 flex gap-2">
                                        <div className="basis-8/12 relative">
                                            <InputLabel
                                                forInput="komunikasi"
                                                className="flex justify-between"
                                            >
                                                <span>
                                                    Bobot Komunikasi (0 - 1)
                                                </span>
                                                <span>{data.komunikasi}</span>
                                            </InputLabel>

                                            <RangeInput
                                                id="komunikasi"
                                                name="komunikasi"
                                                value={data.komunikasi}
                                                min={0}
                                                max={1}
                                                step={0.1}
                                                className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                                handleChange={onHandleChange}
                                                disabled={showResult}
                                            />

                                            <InputError
                                                message={errors.komunikasi}
                                                className="mt-2"
                                            />
                                        </div>
                                        <div className="basis-4/12 flex justify-center">
                                            <div>
                                                <InputLabel
                                                    forInput="komunikasi_tipe"
                                                    value="Tipe Komunikasi"
                                                />

                                                <SwitchInput
                                                    name="komunikasi_tipe"
                                                    id="komunikasi_tipe"
                                                    isChecked={data.komunikasi_tipe}
                                                    handleChange={onHandleChange}
                                                    LeftChild={leftChild}
                                                    RightChild={rightChild}
                                                    disabled={showResult}
                                                />

                                                <InputError
                                                    message={errors.komunikasi_tipe}
                                                    className="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-12 flex gap-2">
                                        <div className="basis-8/12 relative">
                                            <InputLabel
                                                forInput="kreatifitas"
                                                className="flex justify-between"
                                            >
                                                <span>
                                                    Bobot Kreatifitas (0 - 1)
                                                </span>
                                                <span>{data.kreatifitas}</span>
                                            </InputLabel>

                                            <RangeInput
                                                id="kreatifitas"
                                                name="kreatifitas"
                                                value={data.kreatifitas}
                                                min={0}
                                                max={1}
                                                step={0.1}
                                                className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                                handleChange={onHandleChange}
                                                disabled={showResult}
                                            />

                                            <InputError
                                                message={errors.kreatifitas}
                                                className="mt-2"
                                            />
                                        </div>
                                        <div className="basis-4/12 flex justify-center">
                                            <div>
                                                <InputLabel
                                                    forInput="kreatifitas_tipe"
                                                    value="Tipe Kreatifitas"
                                                />

                                                <SwitchInput
                                                    name="kreatifitas_tipe"
                                                    id="kreatifitas_tipe"
                                                    isChecked={
                                                        data.kreatifitas_tipe
                                                    }
                                                    handleChange={onHandleChange}
                                                    LeftChild={leftChild}
                                                    RightChild={rightChild}
                                                    disabled={showResult}
                                                />

                                                <InputError
                                                    message={
                                                        errors.kreatifitas_tipe
                                                    }
                                                    className="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-12 flex gap-2">
                                        <div className="basis-8/12 relative">
                                            <InputLabel
                                                forInput="kehadiran"
                                                className="flex justify-between"
                                            >
                                                <span>Bobot Kehadiran (0 - 1)</span>
                                                <span>{data.kehadiran}</span>
                                            </InputLabel>

                                            <RangeInput
                                                id="kehadiran"
                                                name="kehadiran"
                                                value={data.kehadiran}
                                                min={0}
                                                max={1}
                                                step={0.1}
                                                className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                                handleChange={onHandleChange}
                                                disabled={showResult}
                                            />

                                            <InputError
                                                message={errors.kehadiran}
                                                className="mt-2"
                                            />
                                        </div>
                                        <div className="basis-4/12 flex justify-center">
                                            <div>
                                                <InputLabel
                                                    forInput="kehadiran_tipe"
                                                    value="Tipe Kehadiran"
                                                />

                                                <SwitchInput
                                                    name="kehadiran_tipe"
                                                    id="kehadiran_tipe"
                                                    isChecked={data.kehadiran_tipe}
                                                    handleChange={onHandleChange}
                                                    LeftChild={leftChild}
                                                    RightChild={rightChild}
                                                    disabled={showResult}
                                                />

                                                <InputError
                                                    message={errors.kehadiran_tipe}
                                                    className="mt-2"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div className="mt-12 flex items-center justify-end">
                                        <PrimaryButton
                                            className="ml-4"
                                            processing={processing}
                                        >
                                            Proses Pilihan
                                        </PrimaryButton>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {showResult && (
                <div className="py-6">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900">
                                <DataTable
                                    title="Tabel Matrix Alternatif - Kriteria"
                                    columns={[
                                        {
                                            name: "Alternatif / Kriteria",
                                            selector: (row) =>
                                                `A${row.no} ${row.nama}`,
                                            cell: (row) => (
                                                <span>
                                                    A{row.no} <b>{row.nama}</b>
                                                </span>
                                            ),
                                            sortable: true,
                                        },

                                        {
                                            name: "K1 Kinerja",
                                            selector: (row) => row.kinerja,
                                            sortable: true,
                                        },
                                        {
                                            name: "K2 Ketepatan Waktu",
                                            selector: (row) =>
                                                row.ketepatan_waktu,
                                            sortable: true,
                                        },
                                        {
                                            name: "K3 Komunikasi",
                                            selector: (row) => row.komunikasi,
                                            sortable: true,
                                        },
                                        {
                                            name: "K4 Kreatifitas",
                                            selector: (row) => row.kreatifitas,
                                            sortable: true,
                                        },
                                        {
                                            name: "K5 Kehadiran",
                                            selector: (row) => row.kehadiran,
                                            sortable: true,
                                        },
                                    ]}
                                    data={newData}
                                    pagination={true}
                                    dense={true}
                                    highlightOnHover={true}
                                    striped={true}
                                    responsive={true}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            )}

            {showResult && (
                <div className="py-6">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900">
                                <DataTable
                                    title="Perhitungan Bobot Kepentingan"
                                    columns={[
                                        {
                                            name: "",
                                            selector: (row) => row.header,
                                            sortable: true,
                                        },
                                        {
                                            name: "K1 Kinerja",
                                            selector: (row) => row.kinerja,
                                            sortable: true,
                                        },
                                        {
                                            name: "K2 Ketepatan Waktu",
                                            selector: (row) =>
                                                row.ketepatan_waktu,
                                            sortable: true,
                                        },
                                        {
                                            name: "K3 Komunikasi",
                                            selector: (row) => row.komunikasi,
                                            sortable: true,
                                        },
                                        {
                                            name: "K4 Kreatifitas",
                                            selector: (row) => row.kreatifitas,
                                            sortable: true,
                                        },
                                        {
                                            name: "K5 Kehadiran",
                                            selector: (row) => row.kehadiran,
                                            sortable: true,
                                        },
                                        {
                                            name: "Total",
                                            selector: (row) => row.total,
                                            sortable: true,
                                        },
                                    ]}
                                    data={[
                                        {
                                            header: "Kepentingan",
                                            kinerja: data.kinerja,
                                            ketepatan_waktu:
                                                data.ketepatan_waktu,
                                            komunikasi: data.komunikasi,
                                            kreatifitas: data.kreatifitas,
                                            kehadiran: data.kehadiran,
                                            total: total,
                                        },
                                        {
                                            header: "Rumus",
                                            kinerja: (
                                                <BobotKriteria
                                                    iterasi={1}
                                                    targetBobot={data.kinerja}
                                                    dataBobot={[
                                                        data.kinerja,
                                                        data.ketepatan_waktu,
                                                        data.komunikasi,
                                                        data.kreatifitas,
                                                        data.kehadiran,
                                                    ]}
                                                />
                                            ),
                                            ketepatan_waktu: (
                                                <BobotKriteria
                                                    iterasi={2}
                                                    targetBobot={
                                                        data.ketepatan_waktu
                                                    }
                                                    dataBobot={[
                                                        data.kinerja,
                                                        data.ketepatan_waktu,
                                                        data.komunikasi,
                                                        data.kreatifitas,
                                                        data.kehadiran,
                                                    ]}
                                                />
                                            ),
                                            komunikasi: (
                                                <BobotKriteria
                                                    iterasi={3}
                                                    targetBobot={
                                                        data.komunikasi
                                                    }
                                                    dataBobot={[
                                                        data.kinerja,
                                                        data.ketepatan_waktu,
                                                        data.komunikasi,
                                                        data.kreatifitas,
                                                        data.kehadiran,
                                                    ]}
                                                />
                                            ),
                                            kreatifitas: (
                                                <BobotKriteria
                                                    iterasi={4}
                                                    targetBobot={
                                                        data.kreatifitas
                                                    }
                                                    dataBobot={[
                                                        data.kinerja,
                                                        data.ketepatan_waktu,
                                                        data.komunikasi,
                                                        data.kreatifitas,
                                                        data.kehadiran,
                                                    ]}
                                                />
                                            ),
                                            kehadiran: (
                                                <BobotKriteria
                                                    iterasi={5}
                                                    targetBobot={data.kehadiran}
                                                    dataBobot={[
                                                        data.kinerja,
                                                        data.ketepatan_waktu,
                                                        data.komunikasi,
                                                        data.kreatifitas,
                                                        data.kehadiran,
                                                    ]}
                                                />
                                            ),
                                            total: (
                                                <BobotKepentingan
                                                    data={data}
                                                    total={total}
                                                />
                                            ),
                                        },
                                        {
                                            header: "W/Bobot Kepentingan",
                                            kinerja: (
                                                data.kinerja / total
                                            ).toFixed(6),
                                            ketepatan_waktu: (
                                                data.ketepatan_waktu / total
                                            ).toFixed(6),
                                            komunikasi: (
                                                data.komunikasi / total
                                            ).toFixed(6),
                                            kreatifitas: (
                                                data.kreatifitas / total
                                            ).toFixed(6),
                                            kehadiran: (
                                                data.kehadiran / total
                                            ).toFixed(6),
                                            total: (
                                                data.kinerja / total +
                                                data.ketepatan_waktu / total +
                                                data.komunikasi / total +
                                                data.kreatifitas / total +
                                                data.kehadiran / total
                                            ).toFixed(6),
                                        },
                                    ]}
                                    pagination={true}
                                    dense={true}
                                    highlightOnHover={true}
                                    striped={true}
                                    responsive={true}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            )}

            {showResult && (
                <div className="py-6">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900">
                                <DataTable
                                    title="Perhitungan Pangkat"
                                    columns={[
                                        {
                                            name: "",
                                            selector: (row) => row.header,
                                            sortable: true,
                                        },
                                        {
                                            name: "K1 Kinerja",
                                            selector: (row) => row.kinerja,
                                            sortable: true,
                                        },
                                        {
                                            name: "K2 Ketepatan Waktu",
                                            selector: (row) =>
                                                row.ketepatan_waktu,
                                            sortable: true,
                                        },
                                        {
                                            name: "K3 Komunikasi",
                                            selector: (row) => row.komunikasi,
                                            sortable: true,
                                        },
                                        {
                                            name: "K4 Kreatifitas",
                                            selector: (row) => row.kreatifitas,
                                            sortable: true,
                                        },
                                        {
                                            name: "K5 Kehadiran",
                                            selector: (row) => row.kehadiran,
                                            sortable: true,
                                        },
                                    ]}
                                    data={[
                                        {
                                            header: "Cost/Benefit",
                                            kinerja: data.kinerja_tipe
                                                ? "Cost"
                                                : "Benefit",
                                            ketepatan_waktu:
                                                data.ketepatan_waktu_tipe
                                                    ? "Cost"
                                                    : "Benefit",
                                            komunikasi: data.komunikasi_tipe
                                                ? "Cost"
                                                : "Benefit",
                                            kreatifitas: data.kreatifitas_tipe
                                                ? "Cost"
                                                : "Benefit",
                                            kehadiran: data.kehadiran_tipe
                                                ? "Cost"
                                                : "Benefit",
                                        },
                                        {
                                            header: "W/Bobot",
                                            kinerja: (
                                                (data.kinerja / total) *
                                                (data.kinerja_tipe ? -1 : 1)
                                            ).toFixed(6),
                                            ketepatan_waktu: (
                                                (data.ketepatan_waktu / total) *
                                                (data.ketepatan_waktu_tipe
                                                    ? -1
                                                    : 1)
                                            ).toFixed(6),
                                            komunikasi: (
                                                (data.komunikasi / total) *
                                                (data.komunikasi_tipe ? -1 : 1)
                                            ).toFixed(6),
                                            kreatifitas: (
                                                (data.kreatifitas / total) *
                                                (data.kreatifitas_tipe ? -1 : 1)
                                            ).toFixed(6),
                                            kehadiran: (
                                                (data.kehadiran / total) *
                                                (data.kehadiran_tipe ? -1 : 1)
                                            ).toFixed(6),
                                        },
                                    ]}
                                    pagination={true}
                                    dense={true}
                                    highlightOnHover={true}
                                    striped={true}
                                    responsive={true}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            )}

            {showResult && (
                <div className="py-6">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900">
                                <DataTable
                                    title="Perhitungan Nilai S"
                                    columns={[
                                        {
                                            name: "Alternatif",
                                            selector: (row) =>
                                                `A${row.no} ${row.nama}`,
                                            cell: (row) => (
                                                <span>
                                                    A{row.no} <b>{row.nama}</b>
                                                </span>
                                            ),
                                            sortable: true,
                                        },
                                        {
                                            name: "Rumus",
                                            selector: (row) => row.rumus.index,
                                            cell: (row) => (
                                                <VectorS
                                                    iterasi={
                                                        row.rumus.index + 1
                                                    }
                                                    dataVector={
                                                        row.rumus.dataVector
                                                    }
                                                />
                                            ),
                                            sortable: true,
                                        },
                                        {
                                            name: "S",
                                            selector: (row) =>
                                                row.result.toFixed(6),
                                            sortable: true,
                                            cell: (row) => (
                                                <b>{row.result.toFixed(6)}</b>
                                            ),
                                        },
                                    ]}
                                    data={newData.map((employ, index) => {
                                        const dataVector = [
                                            {
                                                k_value: employ.kinerja,
                                                pangkat:
                                                    (data.kinerja / total) *
                                                    (data.kinerja_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.ketepatan_waktu,
                                                pangkat:
                                                    (data.ketepatan_waktu /
                                                        total) *
                                                    (data.ketepatan_waktu_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.komunikasi,
                                                pangkat:
                                                    (data.komunikasi / total) *
                                                    (data.komunikasi_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.kreatifitas,
                                                pangkat:
                                                    (data.kreatifitas / total) *
                                                    (data.kreatifitas_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.kehadiran,
                                                pangkat:
                                                    (data.kehadiran / total) *
                                                    (data.kehadiran_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                        ];

                                        return {
                                            no: employ.no,
                                            nama: employ.nama,
                                            rumus: {
                                                index: index,
                                                dataVector: dataVector,
                                            },
                                            result: dataVector
                                                .map((x) =>
                                                    Math.pow(
                                                        x.k_value,
                                                        x.pangkat
                                                    )
                                                )
                                                .reduce(
                                                    (product, value) =>
                                                        product * value,
                                                    1
                                                ),
                                        };
                                    })}
                                    pagination={true}
                                    dense={true}
                                    highlightOnHover={true}
                                    striped={true}
                                    responsive={true}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            )}

            {showResult && (
                <div className="py-6">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900">
                                <DataTableExtensions
                                    exportHeaders
                                    columns={[
                                        {
                                            name: "Alternatif",
                                            selector: (row) =>
                                                `A${row.alternatif.no} ${row.alternatif.nama}`,
                                            cell: (row) => (
                                                <span className="w-52">
                                                    A{row.alternatif.no} <b>{row.alternatif.nama}</b>
                                                </span>
                                            ),
                                            cellExport: (row) => `A${row.alternatif.no} ${row.alternatif.nama}`,
                                            sortable: true,
                                            width: "208px",
                                        },
                                        {
                                            name: "V",
                                            selector: (row) =>
                                                row.result.toFixed(6),
                                            sortable: true,
                                            cell: (row) => (
                                                <b className="w-40">
                                                    {row.result.toFixed(6)}
                                                </b>
                                            ),
                                            cellExport: (row) => row.result.toFixed(6),
                                            width: "160px",
                                        },
                                        {
                                            name: "Rumus",
                                            selector: (row) => row.rumus.index,
                                            cell: (row) => (
                                                <VectorKriteria
                                                    iterasi={
                                                        row.rumus.index + 1
                                                    }
                                                    targetVector={
                                                        row.rumus.targetVector
                                                    }
                                                    dataVector={
                                                        row.rumus.dataVector
                                                    }
                                                />
                                            ),
                                            sortable: true,
                                        },
                                    ]}
                                    data={newData.map((employ, index) => {
                                        const targetVector = [
                                            {
                                                k_value: employ.kinerja,
                                                pangkat:
                                                    (data.kinerja / total) *
                                                    (data.kinerja_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.ketepatan_waktu,
                                                pangkat:
                                                    (data.ketepatan_waktu /
                                                        total) *
                                                    (data.ketepatan_waktu_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.komunikasi,
                                                pangkat:
                                                    (data.komunikasi / total) *
                                                    (data.komunikasi_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.kreatifitas,
                                                pangkat:
                                                    (data.kreatifitas / total) *
                                                    (data.kreatifitas_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                            {
                                                k_value: employ.kehadiran,
                                                pangkat:
                                                    (data.kehadiran / total) *
                                                    (data.kehadiran_tipe
                                                        ? -1
                                                        : 1),
                                            },
                                        ].map((x) =>
                                            Math.pow(x.k_value, x.pangkat)
                                        ).reduce(
                                            (product, value) =>
                                                product * value,
                                            1
                                        );

                                        return {
                                            alternatif: {
                                                no: employ.no,
                                                nama: employ.nama,
                                            },
                                            result:
                                                targetVector /
                                                _.sum(dataVectors),
                                            rumus: {
                                                index: index,
                                                targetVector: targetVector,
                                                dataVector: dataVectors,
                                            },

                                        };
                                    }).sort((a, b) => b.result - a.result)}
                                    letterhead={{
                                        html: `
                                        <h1>LAPORAN HASIL PENCARIAN KARYAWAN TERBAIK BAGIAN PABRIK TAHUN 2023</h1>
                                        <h2>PT PERKEBUNAN NUSANTARA VI</h2>
                                        <p>Kantor Pusat: Jl. Lingkar Barat Paal X Kota Baru, Jambi Kode Pos 36128</p>
                                        <p>Tlp. +62 741 445603 Fax. +62 741 445500</p>
                                        <a href="mailto:sekretariat.pn6@gmail.com">sekretariat.pn6@gmail.com</a>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        `,
                                        css: {
                                            textAlign: 'center',
                                        }
                                    }}
                                    letterfooter={{
                                        html: `
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div>
                                            <p>Tanggal: ${new Date().toLocaleDateString()}</p>
                                            <p>Pimpinan</p>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <p>(Waluyo)</p>
                                        </div>
                                        `,
                                        css: {
                                            textAlign: 'right',
                                        }
                                    }}
                                >
                                    <DataTable
                                        title="Hasil Akhir"
                                        pagination={true}
                                        dense={true}
                                        highlightOnHover={true}
                                        striped={true}
                                        responsive={true}
                                    />
                                </DataTableExtensions>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </AuthenticatedLayout>
    );
}
