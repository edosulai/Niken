import moment from "moment";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import { useEffect, useState } from "react";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import TextInput from "@/Components/TextInput";
import PrimaryButton from "@/Components/PrimaryButton";
import SelectInput from "@/Components/SelectInput";
import Modal from "@/Components/Modal";
import SecondaryButton from "@/Components/SecondaryButton";
import DangerButton from "@/Components/DangerButton";
import DateInput from "@/Components/DateInput";
import SearchInput from "@/Components/SearchInput";

export default function Form({
    auth,
    status,
    title,
    terpilih = null,
    employers,
    asset_url,
}) {
    const [confirmingDeletion, setConfirmingDeletion] = useState(false);

    const useFormInertia = useForm({
        nik: terpilih ? terpilih.nik : "",
        nama: terpilih ? terpilih.nama : "",
        p_area: terpilih ? terpilih.p_area : "",
        personnel_subarea: terpilih ? terpilih.personnel_subarea : "",
        bagian: terpilih ? terpilih.bagian : "",
        job_group: terpilih ? terpilih.job_group : "",
        posisi_kerja: terpilih ? terpilih.posisi_kerja : "",
        status: terpilih ? terpilih.status : "",
        jenis_kelamin: terpilih ? terpilih.jenis_kelamin : "Male",
        edu_establishment: terpilih ? terpilih.edu_establishment : "",
        tgl_lahir: terpilih
            ? moment.utc(terpilih.tgl_lahir).toDate()
            : new Date(),
        tgl_masuk: terpilih
            ? moment.utc(terpilih.tgl_masuk).toDate()
            : new Date(),
        jarak_alamat: terpilih ? terpilih.jarak_alamat : "",
        kinerja: terpilih ? terpilih.kinerja : "",
        ketepatan_waktu: terpilih ? terpilih.ketepatan_waktu : "",
        komunikasi: terpilih ? terpilih.komunikasi : "",
        kreatifitas: terpilih ? terpilih.kreatifitas : "",
        kehadiran: terpilih ? terpilih.kehadiran : "",
    });

    const { data, setData, processing, errors, reset } = useFormInertia;

    const submit = (e) => {
        e.preventDefault();

        if (terpilih) {
            useFormInertia.post(route("dashboard.edit", terpilih.id));
        } else {
            useFormInertia.post(route("dashboard.new"));
        }
    };

    useEffect(() => {
        return () => {
            reset(
                "nik",
                "nama",
                "p_area",
                "personnel_subarea",
                "bagian",
                "job_group",
                "posisi_kerja",
                "status",
                "jenis_kelamin",
                "edu_establishment",
                "tgl_lahir",
                "tgl_masuk",
                "jarak_alamat",
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
                            <form
                                onSubmit={submit}
                                encType="multipart/form-data"
                            >
                                <div className="flex gap-2">
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="nik"
                                            value="NIK"
                                        />

                                        <SearchInput
                                            type="number"
                                            id="nik"
                                            name="nik"
                                            className="mt-1 block w-full"
                                            value={data.nik}
                                            searchValues={employers.map(
                                                (employer) => employer.nik
                                            )}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.nik}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="nama"
                                            value="Nama Karyawan"
                                        />

                                        <SearchInput
                                            type="text"
                                            id="nama"
                                            name="nama"
                                            className="mt-1 block w-full"
                                            value={data.nama}
                                            searchValues={employers.map(
                                                (employer) => employer.nama
                                            )}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.nama}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="p_area"
                                            value="P Area"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="p_area"
                                            name="p_area"
                                            className="mt-1 block w-full"
                                            value={data.p_area}
                                            searchValues={employers.map(
                                                (employer) => employer.p_area
                                            )}
                                        />

                                        <InputError
                                            message={errors.p_area}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="personnel_subarea"
                                            value="Personel Subarea"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="personnel_subarea"
                                            name="personnel_subarea"
                                            className="mt-1 block w-full"
                                            value={data.personnel_subarea}
                                            searchValues={employers.map(
                                                (employer) =>
                                                    employer.personnel_subarea
                                            )}
                                        />

                                        <InputError
                                            message={errors.personnel_subarea}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="bagian"
                                            value="Bagian"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="bagian"
                                            name="bagian"
                                            className="mt-1 block w-full"
                                            value={data.bagian}
                                            searchValues={employers.map(
                                                (employer) => employer.bagian
                                            )}
                                        />

                                        <InputError
                                            message={errors.bagian}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="job_group"
                                            value="Job Group"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="job_group"
                                            name="job_group"
                                            className="mt-1 block w-full"
                                            value={data.job_group}
                                            searchValues={employers.map(
                                                (employer) => employer.job_group
                                            )}
                                        />

                                        <InputError
                                            message={errors.job_group}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="posisi_kerja"
                                            value="Posisi Kerja"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="posisi_kerja"
                                            name="posisi_kerja"
                                            className="mt-1 block w-full"
                                            value={data.posisi_kerja}
                                            searchValues={employers.map(
                                                (employer) =>
                                                    employer.posisi_kerja
                                            )}
                                        />

                                        <InputError
                                            message={errors.posisi_kerja}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="status"
                                            value="Status"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="status"
                                            name="status"
                                            className="mt-1 block w-full"
                                            value={data.status}
                                            searchValues={employers.map(
                                                (employer) => employer.status
                                            )}
                                        />

                                        <InputError
                                            message={errors.status}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="jenis_kelamin"
                                            value="Nama Penyidik"
                                        />

                                        <SelectInput
                                            id="jenis_kelamin"
                                            name="jenis_kelamin"
                                            value={data.jenis_kelamin}
                                            className="mt-1 block w-full"
                                            handleChange={onHandleChange}
                                            options={[
                                                {
                                                    label: "Male",
                                                    value: "Male",
                                                },
                                                {
                                                    label: "Female",
                                                    value: "Female",
                                                },
                                            ]}
                                        />

                                        <InputError
                                            message={errors.jenis_kelamin}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="edu_establishment"
                                            value="Education Establishment"
                                        />

                                        <SearchInput
                                            handleChange={onHandleChange}
                                            type="text"
                                            id="edu_establishment"
                                            name="edu_establishment"
                                            className="mt-1 block w-full"
                                            value={data.edu_establishment}
                                            searchValues={employers.map(
                                                (employer) =>
                                                    employer.edu_establishment
                                            )}
                                        />

                                        <InputError
                                            message={errors.edu_establishment}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-4/12">
                                        <InputLabel
                                            forInput="tgl_lahir"
                                            value="Tanggal Lahir"
                                        />

                                        <DateInput
                                            id="tgl_lahir"
                                            type="tgl_lahir"
                                            name="tgl_lahir"
                                            value={data.tgl_lahir}
                                            className="mt-1 block w-full"
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.tgl_lahir}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-4/12">
                                        <InputLabel
                                            forInput="tgl_masuk"
                                            value="Tanggal Masuk"
                                        />

                                        <DateInput
                                            id="tgl_masuk"
                                            type="tgl_masuk"
                                            name="tgl_masuk"
                                            value={data.tgl_masuk}
                                            className="mt-1 block w-full"
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.tgl_masuk}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-4/12">
                                        <InputLabel
                                            forInput="jarak_alamat"
                                            value="Jarak Alamat Dalam (KM)"
                                        />

                                        <TextInput
                                            id="jarak_alamat"
                                            type="number"
                                            name="jarak_alamat"
                                            value={data.jarak_alamat}
                                            className="mt-1 block w-full"
                                            autoComplete="jarak_alamat"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.jarak_alamat}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-4/12">
                                        <InputLabel
                                            forInput="kinerja"
                                            value="Kinerja"
                                        />

                                        <TextInput
                                            id="kinerja"
                                            type="number"
                                            name="kinerja"
                                            value={data.kinerja}
                                            className="mt-1 block w-full"
                                            autoComplete="kinerja"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.kinerja}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-4/12">
                                        <InputLabel
                                            forInput="ketepatan_waktu"
                                            value="Ketepatan Masuk"
                                        />

                                        <TextInput
                                            id="ketepatan_waktu"
                                            type="number"
                                            name="ketepatan_waktu"
                                            value={data.ketepatan_waktu}
                                            className="mt-1 block w-full"
                                            autoComplete="ketepatan_waktu"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.ketepatan_waktu}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-4/12">
                                        <InputLabel
                                            forInput="komunikasi"
                                            value="Komunikasi"
                                        />

                                        <TextInput
                                            id="komunikasi"
                                            type="number"
                                            name="komunikasi"
                                            value={data.komunikasi}
                                            className="mt-1 block w-full"
                                            autoComplete="komunikasi"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.komunikasi}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div className="mt-4 flex gap-2">
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="kreatifitas"
                                            value="Kreatifitas"
                                        />

                                        <TextInput
                                            id="kreatifitas"
                                            type="number"
                                            name="kreatifitas"
                                            value={data.kreatifitas}
                                            className="mt-1 block w-full"
                                            autoComplete="kreatifitas"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.kreatifitas}
                                            className="mt-2"
                                        />
                                    </div>
                                    <div className="basis-6/12">
                                        <InputLabel
                                            forInput="kehadiran"
                                            value="Kehadiran"
                                        />

                                        <TextInput
                                            id="kehadiran"
                                            type="number"
                                            name="kehadiran"
                                            value={data.kehadiran}
                                            className="mt-1 block w-full"
                                            autoComplete="kehadiran"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />

                                        <InputError
                                            message={errors.kehadiran}
                                            className="mt-2"
                                        />
                                    </div>
                                </div>

                                <div
                                    className={
                                        terpilih
                                            ? "flex items-center justify-between mt-4"
                                            : "flex items-center justify-end mt-4"
                                    }
                                >
                                    {terpilih && (
                                        <DangerButton
                                            type="button"
                                            className="mr-4"
                                            processing={processing}
                                            onClick={() =>
                                                setConfirmingDeletion(true)
                                            }
                                        >
                                            Hapus Data
                                        </DangerButton>
                                    )}
                                    <PrimaryButton
                                        className="ml-4"
                                        processing={processing}
                                    >
                                        {terpilih ? "Ubah Data" : "Simpan Data"}
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {terpilih && (
                <Modal
                    show={confirmingDeletion}
                    onClose={() => setConfirmingDeletion(false)}
                >
                    <div className="p-6">
                        <h2 className="text-lg font-medium text-gray-900 ">
                            Apakah kamu yakin ingin menghapus data{" "}
                            <b>{data.nama_pelapor}</b> ?
                        </h2>

                        <p className="mt-1 text-sm text-gray-600 ">
                            Setelah data dihapus, semua sumber daya dan datanya
                            akan dihapus secara permanen.
                        </p>

                        <div className="mt-6 flex justify-end">
                            <SecondaryButton
                                onClick={() => setConfirmingDeletion(false)}
                            >
                                Batalkan
                            </SecondaryButton>

                            <DangerButton
                                className="ml-3"
                                processing={processing}
                                onClick={() => {
                                    useFormInertia.delete(
                                        route("dashboard.delete", terpilih.id),
                                        {
                                            preserveScroll: true,
                                            onSuccess: () =>
                                                setConfirmingDeletion(false),
                                        }
                                    );
                                }}
                            >
                                Hapus Data
                            </DangerButton>
                        </div>
                    </div>
                </Modal>
            )}
        </AuthenticatedLayout>
    );
}
