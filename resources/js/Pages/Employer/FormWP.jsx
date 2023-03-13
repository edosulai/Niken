import _ from "lodash";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import { useEffect, useState } from "react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import RangeInput from "@/Components/RangeInput";
import DataTable from "react-data-table-component";
import MathJax from "react-mathjax-preview";

export default function Form({ auth, status, title, employers, asset_url }) {
    const [showResult, setShowResult] = useState(false);

    const useFormInertia = useForm({
        kinerja: 0.5,
        ketepatan_waktu: 0.5,
        komunikasi: 0.5,
        kreatifitas: 0.5,
        kehadiran: 0.5,
    });

    const { data, setData, processing, errors, reset } = useFormInertia;

    const submit = (e) => {
        e.preventDefault();

        setShowResult(true);

        // const alternatif =
    };

    useEffect(() => {
        return () => {
            reset(
                "kinerja",
                "ketepatan_waktu",
                "komunikasi",
                "kreatifitas",
                "kehadiran"
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

    const BobotKriteria = ({
        iterasi = 0,
        targetBobot = 0,
        dataBobot = [],
    }) => {
        return (
            <MathJax
                math={String.raw`
        <math xmlns="http://www.w3.org/1998/Math/MathML" display="block">
        <mrow>
            <msub>
                <mi>W</mi>
                <mn>${iterasi}</mn>
            </msub>
            <mo>=</mo>
            <mn>${targetBobot}</mn>
            <mo lspace="0em" rspace="0em">
                /
            </mo>
            <mo form="prefix" stretchy="false">
                (
            </mo>
            ${dataBobot
                .map((data, key) =>
                    key < dataBobot.length - 1
                        ? String.raw`<mn>${data}</mn><mo>+</mo>`
                        : String.raw`<mn>${data}</mn>`
                )
                .join("")}
            <mo form="postfix" stretchy="false">
                )
            </mo>
            <mo>=</mo>
            <mn>${(targetBobot / _.sum(dataBobot)).toFixed(6)}</mn>
        </mrow>
        </math>`}
            />
        );
    };

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <h2 className="font-semibold text-xl text-gray-800  leading-tight">
                    {title}
                </h2>
            }
        >
            <Head title={title} />

            <div className="py-12">
                <div className="max-w-2xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 ">
                            {status && (
                                <div className="mb-4 font-medium text-sm text-green-600">
                                    {status}
                                </div>
                            )}
                            <form onSubmit={submit}>
                                <div className="mt-4 relative">
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
                                        step="0.1"
                                        className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                        handleChange={onHandleChange}
                                    />

                                    <InputError
                                        message={errors.kinerja}
                                        className="mt-2"
                                    />
                                </div>

                                <div className="mt-12 relative">
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
                                        step="0.1"
                                        className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                        handleChange={onHandleChange}
                                    />

                                    <InputError
                                        message={errors.ketepatan_waktu}
                                        className="mt-2"
                                    />
                                </div>

                                <div className="mt-12 relative">
                                    <InputLabel
                                        forInput="komunikasi"
                                        className="flex justify-between"
                                    >
                                        <span>Bobot Komunikasi (0 - 1)</span>
                                        <span>{data.komunikasi}</span>
                                    </InputLabel>

                                    <RangeInput
                                        id="komunikasi"
                                        name="komunikasi"
                                        value={data.komunikasi}
                                        min={0}
                                        max={1}
                                        step="0.1"
                                        className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                        handleChange={onHandleChange}
                                    />

                                    <InputError
                                        message={errors.komunikasi}
                                        className="mt-2"
                                    />
                                </div>

                                <div className="mt-12 relative">
                                    <InputLabel
                                        forInput="kreatifitas"
                                        className="flex justify-between"
                                    >
                                        <span>Bobot Kreatifitas (0 - 1)</span>
                                        <span>{data.kreatifitas}</span>
                                    </InputLabel>

                                    <RangeInput
                                        id="kreatifitas"
                                        name="kreatifitas"
                                        value={data.kreatifitas}
                                        min={0}
                                        max={1}
                                        step="0.1"
                                        className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                        handleChange={onHandleChange}
                                    />

                                    <InputError
                                        message={errors.kreatifitas}
                                        className="mt-2"
                                    />
                                </div>

                                <div className="mt-12 relative">
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
                                        step="0.1"
                                        className="
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        "
                                        handleChange={onHandleChange}
                                    />

                                    <InputError
                                        message={errors.kehadiran}
                                        className="mt-2"
                                    />
                                </div>

                                <div className="flex items-center justify-end mt-4">
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

            {showResult && (
                <div className="py-12">
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
                                    subHeader={true}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            )}

            {showResult && (
                <div className="py-12">
                    <div className="mx-auto sm:px-6 lg:px-8">
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div className="p-6 text-gray-900">
                                <DataTable
                                    title="Tabel Matrix Alternatif - Kriteria"
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
                                                    dataBobot={Object.entries(
                                                        data
                                                    ).map((value) => value[1])}
                                                />
                                            ),
                                            ketepatan_waktu: (
                                                <BobotKriteria
                                                    iterasi={2}
                                                    targetBobot={data.kinerja}
                                                    dataBobot={Object.entries(
                                                        data
                                                    ).map((value) => value[1])}
                                                />
                                            ),
                                            komunikasi: (
                                                <BobotKriteria
                                                    iterasi={3}
                                                    targetBobot={data.kinerja}
                                                    dataBobot={Object.entries(
                                                        data
                                                    ).map((value) => value[1])}
                                                />
                                            ),
                                            kreatifitas: (
                                                <BobotKriteria
                                                    iterasi={4}
                                                    targetBobot={data.kinerja}
                                                    dataBobot={Object.entries(
                                                        data
                                                    ).map((value) => value[1])}
                                                />
                                            ),
                                            kehadiran: (
                                                <BobotKriteria
                                                    iterasi={5}
                                                    targetBobot={data.kinerja}
                                                    dataBobot={Object.entries(
                                                        data
                                                    ).map((value) => value[1])}
                                                />
                                            ),
                                            total: "",
                                        },
                                        {
                                            header: "W/Bobot Kepentingan",
                                            kinerja: data.kinerja / total,
                                            ketepatan_waktu:
                                                data.ketepatan_waktu / total,
                                            komunikasi: data.komunikasi / total,
                                            kreatifitas:
                                                data.kreatifitas / total,
                                            kehadiran: data.kehadiran / total,
                                            total:
                                                data.kinerja / total +
                                                data.ketepatan_waktu / total +
                                                data.komunikasi / total +
                                                data.kreatifitas / total +
                                                data.kehadiran / total,
                                        },
                                    ]}
                                    pagination={true}
                                    dense={true}
                                    highlightOnHover={true}
                                    striped={true}
                                    responsive={true}
                                    subHeader={true}
                                />
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </AuthenticatedLayout>
    );
}
