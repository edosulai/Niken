import TextInput from "@/Components/TextInput";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import { useState } from "react";
import DataTable from "react-data-table-component";
import DataTableExtensions from '../../Components/DataTableExtensions';

import '../../../css/index.css';
import "react-responsive-carousel/lib/styles/carousel.min.css"; // requires a loader

export default function Index({ data, auth, status, assetUrl }) {
    const columnsSelector = (cellValue, href) => {
        return (
            auth.user.roles.includes("admin") ? <Link
                className="flex items-center cursor-pointer w-full"
                href={route("dashboard.edit", href)}
            >
                {cellValue}
            </Link> : cellValue
        )
    };

    const dateTimeFormat = (value) =>
        new Date(value).toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric",
            // hour: "2-digit",
            // minute: "2-digit",
            // second: "2-digit",
        });

    const newData = _.map(data, (item, index) => {
        return {
            no: index + 1,
            ...item,
        };
    });

    const columns = [
        {
            name: "No",
            cell: (row) =>
                ((cellValue, href) => (
                    <Link
                        className="flex items-center cursor-pointer w-4"
                        href={route("dashboard.edit", href)}
                    >
                        {cellValue}
                    </Link>
                ))(row.no, row.id),
            cellExport: (row) => row.no,
            selector: (row) => row.no,
            width: "fit-content",
            sortable: true,
        },
        {
            name: "NIK",
            cell: (row) => columnsSelector(row.nik, row.id),
            cellExport: (row) => row.nik,
            selector: (row) => row.nik,
            sortable: true,
        },
        {
            name: "Nama Karyawan",
            cell: (row) => columnsSelector(row.nama, row.id),
            cellExport: (row) => row.nama,
            selector: (row) => row.nama,
            sortable: true,
        },
        {
            name: "P Area",
            cell: (row) => columnsSelector(row.p_area, row.id),
            cellExport: (row) => row.p_area,
            selector: (row) => row.p_area,
            sortable: true,
        },
        {
            name: "Personnel Subarea",
            cell: (row) => columnsSelector(row.personnel_subarea, row.id),
            cellExport: (row) => row.personnel_subarea,
            selector: (row) => row.personnel_subarea,
            sortable: true,
        },
        {
            name: "Bagian",
            cell: (row) => columnsSelector(row.bagian, row.id),
            cellExport: (row) => row.bagian,
            selector: (row) => row.bagian,
            sortable: true,
        },
        {
            name: "Job Group",
            cell: (row) => columnsSelector(row.job_group, row.id),
            cellExport: (row) => row.job_group,
            selector: (row) => row.job_group,
            sortable: true,
        },
        {
            name: "Posisi Kerja",
            cell: (row) => columnsSelector(row.posisi_kerja, row.id),
            cellExport: (row) => row.posisi_kerja,
            selector: (row) => row.posisi_kerja,
            sortable: true,
        },
        {
            name: "Jenis Kelamin",
            cell: (row) => columnsSelector(row.jenis_kelamin, row.id),
            cellExport: (row) => row.jenis_kelamin,
            selector: (row) => row.jenis_kelamin,
            sortable: true,
        },
        {
            name: "Edu Establishment",
            cell: (row) => columnsSelector(row.edu_establishment, row.id),
            cellExport: (row) => row.edu_establishment,
            selector: (row) => row.edu_establishment,
            sortable: true,
        },
        {
            name: "Tanggal Lahir",
            cell: (row) => columnsSelector(dateTimeFormat(row.tgl_lahir), row.id),
            cellExport: (row) => row.tgl_lahir,
            selector: (row) => dateTimeFormat(row.tgl_lahir),
            sortable: true,
        },
        {
            name: "Tanggal Masuk",
            cell: (row) => columnsSelector(dateTimeFormat(row.tgl_masuk), row.id),
            cellExport: (row) => row.tgl_masuk,
            selector: (row) => dateTimeFormat(row.tgl_masuk),
            sortable: true,
        },
        {
            name: "Kinerja",
            cell: (row) => columnsSelector(`${row.kinerja}`, row.id),
            cellExport: (row) => row.kinerja,
            selector: (row) => `${row.kinerja}`,
            sortable: true,
        },
        {
            name: "Ketepatan Waktu",
            cell: (row) => columnsSelector(`${row.ketepatan_waktu}`, row.id),
            cellExport: (row) => row.ketepatan_waktu,
            selector: (row) => `${row.ketepatan_waktu}`,
            sortable: true,
        },
        {
            name: "Komunikasi",
            cell: (row) => columnsSelector(`${row.komunikasi}`, row.id),
            cellExport: (row) => row.komunikasi,
            selector: (row) => `${row.komunikasi}`,
            sortable: true,
        },
        {
            name: "Kreatifitas",
            cell: (row) => columnsSelector(`${row.kreatifitas}`, row.id),
            cellExport: (row) => row.kreatifitas,
            selector: (row) => `${row.kreatifitas}`,
            sortable: true,
        },
        {
            name: "Kehadiran",
            cell: (row) => columnsSelector(`${row.kehadiran}`, row.id),
            cellExport: (row) => row.kehadiran,
            selector: (row) => `${row.kehadiran}`,
            sortable: true,
        },
    ];

    const [searchText, setSearchText] = useState("");

    const handleSearch = (event) => {
        setSearchText(event.target.value);
    };

    const filteredData = newData.filter((item) =>
        Object.keys(item).some(
            (key) =>
                item[key] &&
                item[key]
                    .toString()
                    .toLowerCase()
                    .includes(searchText.toLowerCase())
        )
    );

    return (
        <AuthenticatedLayout
            auth={auth}
            header={
                <div className="flex">
                    <h2 className="font-semibold text-xl text-gray-800  leading-tight">
                        Tabel Karyawan
                    </h2>
                    {auth.user.roles.includes("admin") && <div className="space-x-4 -my-px ml-10 flex">
                        <Link
                            href={route("dashboard.new")}
                            className="rounded block px-4 py-2 text-sm leading-5 text-light-700 hover:bg-light-100 focus:outline-none focus:bg-light-10 transition duration-150 ease-in-out"
                        >
                            Tambah Data
                        </Link>
                    </div>}
                </div>
            }
            assetUrl={assetUrl}
        >
            <Head title="Karyawan" />

            <div className="py-12">
                <div className="mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900 ">
                            {status && (
                                <div className="mb-4 font-medium text-sm text-green-600">
                                    {status}
                                </div>
                            )}

                            <DataTableExtensions
                                columns={columns}
                                data={filteredData}
                            >
                                <DataTable
                                    // title="Tabel Karyawan"
                                    pagination={true}
                                    dense={true}
                                    highlightOnHover={true}
                                    pointerOnHover={true}
                                    striped={true}
                                    responsive={true}
                                    subHeader={false}
                                    subHeaderComponent={
                                        <TextInput
                                            id="search_input"
                                            type="text"
                                            name="search_input"
                                            className="block w-full"
                                            isFocused={true}
                                            handleChange={handleSearch}
                                            placeholder="Search"
                                        />
                                    }
                                />
                            </DataTableExtensions>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
