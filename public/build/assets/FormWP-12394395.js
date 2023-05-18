import{r as b,a as e,j as i,_ as T,e as R,n as L,F as A}from"./app-96f4821b.js";import{A as O}from"./AuthenticatedLayout-2c73ae53.js";import{I as m}from"./InputError-8f562f9d.js";import{I as c}from"./InputLabel-9eada553.js";import{P as E}from"./PrimaryButton-239ec26f.js";import{Q as j}from"./index.es-e89b692f.js";import"./ApplicationLogo-72531f47.js";import"./transition-c5548f4c.js";const K=b.forwardRef(function({name:f,id:_,value:u,className:F,min:l,max:w,step:h,handleChange:p,disabled:x=!1},t){const v=t||b.useRef();return b.useEffect(()=>{v.current.value=u},[u]),e("div",{className:"flex flex-col items-start",children:e("input",{type:"range",disabled:x,name:f,id:_,className:"appearance-none bg-gray-300 focus:ring-indigo-500  rounded-md shadow-sm "+F,ref:v,min:l,max:w,step:h,value:u,onChange:y=>p({target:{name:y.target.name,type:"range",value:parseFloat(y.target.value)}})})})}),C=b.forwardRef(function({name:f,id:_,isChecked:u,required:F,handleChange:l,LeftChild:w,RightChild:h,disabled:p=!1},x){const t=x||b.useRef();return e("div",{className:"flex items-center",children:i("label",{htmlFor:f,className:"shadow-card relative inline-flex cursor-pointer select-none items-center justify-center rounded-md bg-gray-300 p-1",children:[e("input",{type:"checkbox",disabled:p,name:f,ref:t,id:_,className:"sr-only",checked:u,required:F,onChange:v=>l(v)}),e(w,{isChecked:u}),e(h,{isChecked:u})]})})});function X({auth:I,status:f,title:_,employers:u,asset_url:F}){const[l,w]=b.useState(!1),h=({isChecked:a})=>e("span",{className:`flex rounded py-1 px-4 text-sm font-medium ${a?"bg-gray-500 text-gray-100":""}`,children:"Cost"}),p=({isChecked:a})=>e("span",{className:`flex rounded py-1 px-4 text-sm font-medium ${a?"":"bg-gray-500 text-gray-100"}`,children:"Benefit"}),x=T({kinerja:.5,kinerja_tipe:1,ketepatan_waktu:.5,ketepatan_waktu_tipe:0,komunikasi:.5,komunikasi_tipe:0,kreatifitas:.5,kreatifitas_tipe:0,kehadiran:.5,kehadiran_tipe:0}),{data:t,setData:v,processing:y,errors:o,reset:S}=x,$=a=>{a.preventDefault(),w(!0)};b.useEffect(()=>()=>{S("kinerja","kinerja_tipe","ketepatan_waktu","ketepatan_waktu_tipe","komunikasi","komunikasi_tipe","kreatifitas","kreatifitas_tipe","kehadiran","kehadiran_tipe")},[]);const k=a=>{v(a.target.name,a.target.type==="checkbox"?a.target.checked:a.target.value)},B=R.map(u,(a,s)=>({no:s+1,...a})),n=t.kinerja+t.ketepatan_waktu+t.komunikasi+t.kreatifitas+t.kehadiran,P=({data:a,total:s})=>e("math",{children:i("mrow",{children:[e("mn",{children:(a.kinerja/s).toFixed(6)}),e("mo",{children:"+"}),e("mn",{children:(a.ketepatan_waktu/s).toFixed(6)}),e("mo",{children:"+"}),e("mn",{children:(a.komunikasi/s).toFixed(6)}),e("mo",{children:"+"}),e("mn",{children:(a.kreatifitas/s).toFixed(6)}),e("mo",{children:"+"}),e("mn",{children:(a.kehadiran/s).toFixed(6)}),e("mo",{children:"         "})]})}),N=({iterasi:a=0,targetBobot:s=0,dataBobot:r=[]})=>e("math",{children:i("mrow",{children:[i("msub",{children:[e("mi",{children:"W"}),e("mn",{children:a})]}),e("mo",{children:"="}),e("mn",{children:s}),e("mo",{lspace:"0em",rspace:"0em",children:"/"}),e("mo",{form:"prefix",stretchy:"false",children:"("}),r.map((d,g)=>g<r.length-1?i(A,{children:[e("mn",{children:d}),e("mo",{children:"+"})]}):e("mn",{children:d})),e("mo",{form:"postfix",stretchy:"false",children:")"}),e("mo",{children:"         "})]})}),W=({iterasi:a=0,dataVector:s=[]})=>e("math",{children:i("mrow",{children:[i("msub",{children:[e("mi",{children:"S"}),e("mn",{children:a})]}),e("mo",{children:"="}),s.map((r,d)=>d<s.length-1?i(A,{children:[i("msup",{children:[e("mo",{children:r.k_value}),e("mn",{children:r.pangkat.toFixed(6)})]}),e("mo",{children:"*"})]}):i("msup",{children:[e("mo",{children:r.k_value}),e("mn",{children:r.pangkat.toFixed(6)})]}))]})}),H=({iterasi:a=0,targetVector:s=0,dataVector:r=[]})=>e("math",{children:i("mrow",{children:[i("msub",{children:[e("mi",{children:"V"}),e("mn",{children:a})]}),e("mo",{children:"="}),e("mn",{children:s.toFixed(6)}),e("mo",{lspace:"0em",rspace:"0em",children:"/"}),e("mo",{form:"prefix",stretchy:"false",children:"("}),r.map((d,g)=>g<r.length-1?i(A,{children:[e("mn",{children:d.toFixed(6)}),e("mo",{children:"+"})]}):e("mn",{children:d.toFixed(6)})),e("mo",{form:"postfix",stretchy:"false",children:")"}),e("mo",{children:"="}),e("mn",{children:(s/R.sum(r)).toFixed(6)})]})}),V=B.map((a,s)=>[{k_value:a.kinerja,pangkat:t.kinerja/n*(t.kinerja_tipe?-1:1)},{k_value:a.ketepatan_waktu,pangkat:t.ketepatan_waktu/n*(t.ketepatan_waktu_tipe?-1:1)},{k_value:a.komunikasi,pangkat:t.komunikasi/n*(t.komunikasi_tipe?-1:1)},{k_value:a.kreatifitas,pangkat:t.kreatifitas/n*(t.kreatifitas_tipe?-1:1)},{k_value:a.kehadiran,pangkat:t.kehadiran/n*(t.kehadiran_tipe?-1:1)}].map(r=>Math.pow(r.k_value,r.pangkat)).reduce((r,d)=>r*d,1));return i(O,{auth:I,header:e("h2",{className:"font-semibold text-xl text-gray-800  leading-tight",children:_}),children:[e(L,{title:_}),e("div",{className:"py-6",children:e("div",{className:"mx-auto sm:px-6 lg:px-8",children:e("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:i("div",{className:"p-6 text-gray-900 ",children:[f&&e("div",{className:"mb-4 font-medium text-sm text-green-600",children:f}),i("form",{onSubmit:$,children:[i("div",{className:"mt-4 flex gap-2",children:[i("div",{className:"basis-8/12 relative",children:[i(c,{forInput:"kinerja",className:"flex justify-between",children:[e("span",{children:"Bobot Kinerja (0 - 1)"}),e("span",{children:t.kinerja})]}),e(K,{id:"kinerja",name:"kinerja",value:t.kinerja,min:0,max:1,step:.1,className:`
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        `,handleChange:k,disabled:l}),e(m,{message:o.kinerja,className:"mt-2"})]}),e("div",{className:"basis-4/12 flex justify-center",children:i("div",{children:[e(c,{forInput:"kinerja_tipe",value:"Tipe Kinerja"}),e(C,{name:"kinerja_tipe",id:"kinerja_tipe",isChecked:t.kinerja_tipe,handleChange:k,LeftChild:h,RightChild:p,disabled:l}),e(m,{message:o.kinerja_tipe,className:"mt-2"})]})})]}),i("div",{className:"mt-12 flex gap-2",children:[i("div",{className:"basis-8/12 relative",children:[i(c,{forInput:"ketepatan_waktu",className:"flex justify-between",children:[e("span",{children:"Bobot Ketepatan Waktu (0 - 1)"}),e("span",{children:t.ketepatan_waktu})]}),e(K,{id:"ketepatan_waktu",name:"ketepatan_waktu",value:t.ketepatan_waktu,min:0,max:1,step:.1,className:`
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        `,handleChange:k,disabled:l}),e(m,{message:o.ketepatan_waktu,className:"mt-2"})]}),e("div",{className:"basis-4/12 flex justify-center",children:i("div",{children:[e(c,{forInput:"ketepatan_waktu_tipe",value:"Tipe Ketepatan Waktu"}),e(C,{name:"ketepatan_waktu_tipe",id:"ketepatan_waktu_tipe",isChecked:t.ketepatan_waktu_tipe,handleChange:k,LeftChild:h,RightChild:p,disabled:l}),e(m,{message:o.ketepatan_waktu_tipe,className:"mt-2"})]})})]}),i("div",{className:"mt-12 flex gap-2",children:[i("div",{className:"basis-8/12 relative",children:[i(c,{forInput:"komunikasi",className:"flex justify-between",children:[e("span",{children:"Bobot Komunikasi (0 - 1)"}),e("span",{children:t.komunikasi})]}),e(K,{id:"komunikasi",name:"komunikasi",value:t.komunikasi,min:0,max:1,step:.1,className:`
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        `,handleChange:k,disabled:l}),e(m,{message:o.komunikasi,className:"mt-2"})]}),e("div",{className:"basis-4/12 flex justify-center",children:i("div",{children:[e(c,{forInput:"komunikasi_tipe",value:"Tipe Komunikasi"}),e(C,{name:"komunikasi_tipe",id:"komunikasi_tipe",isChecked:t.komunikasi_tipe,handleChange:k,LeftChild:h,RightChild:p,disabled:l}),e(m,{message:o.komunikasi_tipe,className:"mt-2"})]})})]}),i("div",{className:"mt-12 flex gap-2",children:[i("div",{className:"basis-8/12 relative",children:[i(c,{forInput:"kreatifitas",className:"flex justify-between",children:[e("span",{children:"Bobot Kreatifitas (0 - 1)"}),e("span",{children:t.kreatifitas})]}),e(K,{id:"kreatifitas",name:"kreatifitas",value:t.kreatifitas,min:0,max:1,step:.1,className:`
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        `,handleChange:k,disabled:l}),e(m,{message:o.kreatifitas,className:"mt-2"})]}),e("div",{className:"basis-4/12 flex justify-center",children:i("div",{children:[e(c,{forInput:"kreatifitas_tipe",value:"Tipe Kreatifitas"}),e(C,{name:"kreatifitas_tipe",id:"kreatifitas_tipe",isChecked:t.kreatifitas_tipe,handleChange:k,LeftChild:h,RightChild:p,disabled:l}),e(m,{message:o.kreatifitas_tipe,className:"mt-2"})]})})]}),i("div",{className:"mt-12 flex gap-2",children:[i("div",{className:"basis-8/12 relative",children:[i(c,{forInput:"kehadiran",className:"flex justify-between",children:[e("span",{children:"Bobot Kehadiran (0 - 1)"}),e("span",{children:t.kehadiran})]}),e(K,{id:"kehadiran",name:"kehadiran",value:t.kehadiran,min:0,max:1,step:.1,className:`
                                            mt-1 block w-full
                                            before:content-['min'] before:absolute before:left-0 before:top-11
                                            after:content-['max'] after:absolute after:right-0 after:top-11
                                        `,handleChange:k,disabled:l}),e(m,{message:o.kehadiran,className:"mt-2"})]}),e("div",{className:"basis-4/12 flex justify-center",children:i("div",{children:[e(c,{forInput:"kehadiran_tipe",value:"Tipe Kehadiran"}),e(C,{name:"kehadiran_tipe",id:"kehadiran_tipe",isChecked:t.kehadiran_tipe,handleChange:k,LeftChild:h,RightChild:p,disabled:l}),e(m,{message:o.kehadiran_tipe,className:"mt-2"})]})})]}),e("div",{className:"mt-12 flex items-center justify-end",children:e(E,{className:"ml-4",processing:y,children:"Proses Pilihan"})})]})]})})})}),l&&e("div",{className:"py-6",children:e("div",{className:"mx-auto sm:px-6 lg:px-8",children:e("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:e("div",{className:"p-6 text-gray-900",children:e(j,{title:"Tabel Matrix Alternatif - Kriteria",columns:[{name:"Alternatif / Kriteria",selector:a=>`A${a.no} ${a.nama}`,cell:a=>i("span",{children:["A",a.no," ",e("b",{children:a.nama})]}),sortable:!0},{name:"K1 Kinerja",selector:a=>a.kinerja,sortable:!0},{name:"K2 Ketepatan Waktu",selector:a=>a.ketepatan_waktu,sortable:!0},{name:"K3 Komunikasi",selector:a=>a.komunikasi,sortable:!0},{name:"K4 Kreatifitas",selector:a=>a.kreatifitas,sortable:!0},{name:"K5 Kehadiran",selector:a=>a.kehadiran,sortable:!0}],data:B,pagination:!0,dense:!0,highlightOnHover:!0,striped:!0,responsive:!0})})})})}),l&&e("div",{className:"py-6",children:e("div",{className:"mx-auto sm:px-6 lg:px-8",children:e("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:e("div",{className:"p-6 text-gray-900",children:e(j,{title:"Perhitungan Bobot Kepentingan",columns:[{name:"",selector:a=>a.header,sortable:!0},{name:"K1 Kinerja",selector:a=>a.kinerja,sortable:!0},{name:"K2 Ketepatan Waktu",selector:a=>a.ketepatan_waktu,sortable:!0},{name:"K3 Komunikasi",selector:a=>a.komunikasi,sortable:!0},{name:"K4 Kreatifitas",selector:a=>a.kreatifitas,sortable:!0},{name:"K5 Kehadiran",selector:a=>a.kehadiran,sortable:!0},{name:"Total",selector:a=>a.total,sortable:!0}],data:[{header:"Kepentingan",kinerja:t.kinerja,ketepatan_waktu:t.ketepatan_waktu,komunikasi:t.komunikasi,kreatifitas:t.kreatifitas,kehadiran:t.kehadiran,total:n},{header:"Rumus",kinerja:e(N,{iterasi:1,targetBobot:t.kinerja,dataBobot:[t.kinerja,t.ketepatan_waktu,t.komunikasi,t.kreatifitas,t.kehadiran]}),ketepatan_waktu:e(N,{iterasi:2,targetBobot:t.ketepatan_waktu,dataBobot:[t.kinerja,t.ketepatan_waktu,t.komunikasi,t.kreatifitas,t.kehadiran]}),komunikasi:e(N,{iterasi:3,targetBobot:t.komunikasi,dataBobot:[t.kinerja,t.ketepatan_waktu,t.komunikasi,t.kreatifitas,t.kehadiran]}),kreatifitas:e(N,{iterasi:4,targetBobot:t.kreatifitas,dataBobot:[t.kinerja,t.ketepatan_waktu,t.komunikasi,t.kreatifitas,t.kehadiran]}),kehadiran:e(N,{iterasi:5,targetBobot:t.kehadiran,dataBobot:[t.kinerja,t.ketepatan_waktu,t.komunikasi,t.kreatifitas,t.kehadiran]}),total:e(P,{data:t,total:n})},{header:"W/Bobot Kepentingan",kinerja:(t.kinerja/n).toFixed(6),ketepatan_waktu:(t.ketepatan_waktu/n).toFixed(6),komunikasi:(t.komunikasi/n).toFixed(6),kreatifitas:(t.kreatifitas/n).toFixed(6),kehadiran:(t.kehadiran/n).toFixed(6),total:(t.kinerja/n+t.ketepatan_waktu/n+t.komunikasi/n+t.kreatifitas/n+t.kehadiran/n).toFixed(6)}],pagination:!0,dense:!0,highlightOnHover:!0,striped:!0,responsive:!0})})})})}),l&&e("div",{className:"py-6",children:e("div",{className:"mx-auto sm:px-6 lg:px-8",children:e("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:e("div",{className:"p-6 text-gray-900",children:e(j,{title:"Perhitungan Pangkat",columns:[{name:"",selector:a=>a.header,sortable:!0},{name:"K1 Kinerja",selector:a=>a.kinerja,sortable:!0},{name:"K2 Ketepatan Waktu",selector:a=>a.ketepatan_waktu,sortable:!0},{name:"K3 Komunikasi",selector:a=>a.komunikasi,sortable:!0},{name:"K4 Kreatifitas",selector:a=>a.kreatifitas,sortable:!0},{name:"K5 Kehadiran",selector:a=>a.kehadiran,sortable:!0}],data:[{header:"Cost/Benefit",kinerja:t.kinerja_tipe?"Cost":"Benefit",ketepatan_waktu:t.ketepatan_waktu_tipe?"Cost":"Benefit",komunikasi:t.komunikasi_tipe?"Cost":"Benefit",kreatifitas:t.kreatifitas_tipe?"Cost":"Benefit",kehadiran:t.kehadiran_tipe?"Cost":"Benefit"},{header:"W/Bobot",kinerja:(t.kinerja/n*(t.kinerja_tipe?-1:1)).toFixed(6),ketepatan_waktu:(t.ketepatan_waktu/n*(t.ketepatan_waktu_tipe?-1:1)).toFixed(6),komunikasi:(t.komunikasi/n*(t.komunikasi_tipe?-1:1)).toFixed(6),kreatifitas:(t.kreatifitas/n*(t.kreatifitas_tipe?-1:1)).toFixed(6),kehadiran:(t.kehadiran/n*(t.kehadiran_tipe?-1:1)).toFixed(6)}],pagination:!0,dense:!0,highlightOnHover:!0,striped:!0,responsive:!0})})})})}),l&&e("div",{className:"py-6",children:e("div",{className:"mx-auto sm:px-6 lg:px-8",children:e("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:e("div",{className:"p-6 text-gray-900",children:e(j,{title:"Perhitungan Nilai S",columns:[{name:"Alternatif",selector:a=>`A${a.no} ${a.nama}`,cell:a=>i("span",{children:["A",a.no," ",e("b",{children:a.nama})]}),sortable:!0},{name:"Rumus",selector:a=>a.rumus.index,cell:a=>e(W,{iterasi:a.rumus.index+1,dataVector:a.rumus.dataVector}),sortable:!0},{name:"S",selector:a=>a.result.toFixed(6),sortable:!0,cell:a=>e("b",{children:a.result.toFixed(6)})}],data:B.map((a,s)=>{const r=[{k_value:a.kinerja,pangkat:t.kinerja/n*(t.kinerja_tipe?-1:1)},{k_value:a.ketepatan_waktu,pangkat:t.ketepatan_waktu/n*(t.ketepatan_waktu_tipe?-1:1)},{k_value:a.komunikasi,pangkat:t.komunikasi/n*(t.komunikasi_tipe?-1:1)},{k_value:a.kreatifitas,pangkat:t.kreatifitas/n*(t.kreatifitas_tipe?-1:1)},{k_value:a.kehadiran,pangkat:t.kehadiran/n*(t.kehadiran_tipe?-1:1)}];return{no:a.no,nama:a.nama,rumus:{index:s,dataVector:r},result:r.map(d=>Math.pow(d.k_value,d.pangkat)).reduce((d,g)=>d*g,1)}}),pagination:!0,dense:!0,highlightOnHover:!0,striped:!0,responsive:!0})})})})}),l&&e("div",{className:"py-6",children:e("div",{className:"mx-auto sm:px-6 lg:px-8",children:e("div",{className:"bg-white overflow-hidden shadow-sm sm:rounded-lg",children:e("div",{className:"p-6 text-gray-900",children:e(j,{title:"Hasil Akhir",columns:[{name:"Alternatif",selector:a=>`A${a.no} ${a.nama}`,cell:a=>i("span",{className:"w-52",children:["A",a.no," ",e("b",{children:a.nama})]}),sortable:!0,width:"208px"},{name:"V",selector:a=>a.result.toFixed(6),sortable:!0,cell:a=>e("b",{className:"w-40",children:a.result.toFixed(6)}),width:"160px"},{name:"Rumus",selector:a=>a.rumus.index,cell:a=>e(H,{iterasi:a.rumus.index+1,targetVector:a.rumus.targetVector,dataVector:a.rumus.dataVector}),sortable:!0}],data:B.map((a,s)=>{const r=[{k_value:a.kinerja,pangkat:t.kinerja/n*(t.kinerja_tipe?-1:1)},{k_value:a.ketepatan_waktu,pangkat:t.ketepatan_waktu/n*(t.ketepatan_waktu_tipe?-1:1)},{k_value:a.komunikasi,pangkat:t.komunikasi/n*(t.komunikasi_tipe?-1:1)},{k_value:a.kreatifitas,pangkat:t.kreatifitas/n*(t.kreatifitas_tipe?-1:1)},{k_value:a.kehadiran,pangkat:t.kehadiran/n*(t.kehadiran_tipe?-1:1)}].map(d=>Math.pow(d.k_value,d.pangkat)).reduce((d,g)=>d*g,1);return{no:a.no,nama:a.nama,rumus:{index:s,targetVector:r,dataVector:V},result:r/R.sum(V)}}),pagination:!0,dense:!0,highlightOnHover:!0,striped:!0,responsive:!0})})})})})]})}export{X as default};