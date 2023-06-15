import{r as k,j as n,a as t,d as i,n as x}from"./app-ce85058c.js";import{A as f}from"./AuthenticatedLayout-b8ea5aa0.js";import{T as j}from"./TextInput-17a0c1ce.js";import{Q as N}from"./index.es-cc3494cd.js";import"./ApplicationLogo-81141116.js";import"./transition-86b0752a.js";function A({data:c,auth:l,status:o,asset_url:v}){const a=(e,r)=>l.user.roles.includes("admin")?t(i,{className:"flex items-center cursor-pointer w-full",href:route("dashboard.edit",r),children:e}):e,s=e=>new Date(e).toLocaleDateString("id-ID",{day:"2-digit",month:"2-digit",year:"numeric"}),d=_.map(c,(e,r)=>({no:r+1,...e})),m=[{name:"No",cell:e=>((r,g)=>t(i,{className:"flex items-center cursor-pointer w-4",href:route("dashboard.edit",g),children:r}))(e.no,e.id),selector:e=>e.no,width:"fit-content",sortable:!0},{name:"NIK",cell:e=>a(e.nik,e.id),selector:e=>e.nik,sortable:!0},{name:"Nama Karyawan",cell:e=>a(e.nama,e.id),selector:e=>e.nama,sortable:!0},{name:"P Area",cell:e=>a(e.p_area,e.id),selector:e=>e.p_area,sortable:!0},{name:"Personnel Subarea",cell:e=>a(e.personnel_subarea,e.id),selector:e=>e.personnel_subarea,sortable:!0},{name:"Bagian",cell:e=>a(e.bagian,e.id),selector:e=>e.bagian,sortable:!0},{name:"Job Group",cell:e=>a(e.job_group,e.id),selector:e=>e.job_group,sortable:!0},{name:"Posisi Kerja",cell:e=>a(e.posisi_kerja,e.id),selector:e=>e.posisi_kerja,sortable:!0},{name:"Status",cell:e=>a(e.status,e.id),selector:e=>e.status,sortable:!0},{name:"Jenis Kelamin",cell:e=>a(e.jenis_kelamin,e.id),selector:e=>e.jenis_kelamin,sortable:!0},{name:"Edu Establishment",cell:e=>a(e.edu_establishment,e.id),selector:e=>e.edu_establishment,sortable:!0},{name:"Tanggal Lahir",cell:e=>a(s(e.tgl_lahir),e.id),selector:e=>s(e.tgl_lahir),sortable:!0},{name:"Tanggal Masuk",cell:e=>a(s(e.tgl_masuk),e.id),selector:e=>s(e.tgl_masuk),sortable:!0},{name:"Jarak Alamat",cell:e=>a(`${e.jarak_alamat} km`,e.id),selector:e=>`${e.jarak_alamat} km`,sortable:!0},{name:"Kinerja",cell:e=>a(`${e.kinerja}`,e.id),selector:e=>`${e.kinerja}`,sortable:!0},{name:"Ketepatan Waktu",cell:e=>a(`${e.ketepatan_waktu}`,e.id),selector:e=>`${e.ketepatan_waktu}`,sortable:!0},{name:"Komunikasi",cell:e=>a(`${e.komunikasi}`,e.id),selector:e=>`${e.komunikasi}`,sortable:!0},{name:"Kreatifitas",cell:e=>a(`${e.kreatifitas}`,e.id),selector:e=>`${e.kreatifitas}`,sortable:!0},{name:"Kehadiran",cell:e=>a(`${e.kehadiran}`,e.id),selector:e=>`${e.kehadiran}`,sortable:!0}],[u,h]=k.useState(""),b=e=>{h(e.target.value)},p=d.filter(e=>Object.keys(e).some(r=>e[r]&&e[r].toString().toLowerCase().includes(u.toLowerCase())));return n(f,{auth:l,header:n("div",{className:"flex",children:[t("h2",{className:"font-semibold text-xl text-gray-800  leading-tight",children:"Tabel Karyawan"}),l.user.roles.includes("admin")&&t("div",{className:"space-x-4 -my-px ml-10 flex",children:t(i,{href:route("dashboard.new"),className:"rounded block px-4 py-2 text-sm leading-5 text-light-700 hover:bg-light-100 focus:outline-none focus:bg-light-10 transition duration-150 ease-in-out",children:"Tambah Data"})})]}),children:[t(x,{title:"Karyawan"}),t("div",{className:"py-12",children:t("div",{className:"mx-auto sm:px-6 lg:px-8",children:t("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:n("div",{className:"p-6 text-gray-900 ",children:[o&&t("div",{className:"mb-4 font-medium text-sm text-green-600",children:o}),t(N,{columns:m,data:p,pagination:!0,dense:!0,highlightOnHover:!0,pointerOnHover:!0,striped:!0,responsive:!0,subHeader:!0,subHeaderComponent:t(j,{id:"search_input",type:"text",name:"search_input",className:"block w-full",isFocused:!0,handleChange:b,placeholder:"Search"})})]})})})})]})}export{A as default};
