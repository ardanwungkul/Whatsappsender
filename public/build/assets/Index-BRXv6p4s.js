import{_ as y}from"./SuccessMessage-BEDepiUA.js";import{_ as k}from"./AdminLayout-UuArHr9B.js";import{k as n,h as f,l as w,m as x,p as c,c as P,o as N,w as l,a as d,b as o,e as V,t as C}from"./app-DaEaz9g1.js";const D={class:"bg-light-primary-1 dark:bg-dark-primary-2 p-5 rounded-lg space-y-3 shadow-lg"},B=["onClick"],S={__name:"Index",setup(M){const g=n([]),i=n(0),p=n(!1),u=n([]),v=f(()=>u.value),e=n({page:1,itemsPerPage:10}),h=[{title:"No",value:"index"},{title:"Nama Pelanggan",value:"nama_pelanggan"},{title:"Nomor HP",value:"no_hp"},{title:"Aksi",value:"action"}];w(async()=>{m()});const m=async()=>{p.value=!0;try{const{page:s,itemsPerPage:a}=e.value,r=await axios.get("https://client.webz.biz/api/pelanggan",{params:{select:"id,no_hp,nama_pelanggan",page:s,per_page:a}});g.value=r.data.data,i.value=r.data.total}catch(s){console.error("Terjadi kesalahan:",s)}finally{p.value=!1}};x(e,m,{deep:!0});const b=async s=>{try{const a=await axios.get(route("pelanggan.pesan",s));a.status===200&&(u.value=[a.data.message],window.open(a.data.link,"_blank"))}catch(a){console.error("Gagal Mengirim Pesan:",a)}};return(s,a)=>{const r=c("v-data-table"),_=c("v-pagination");return N(),P(k,{title:"Data Pelanggan"},{default:l(()=>[d(y,{class:"w-full",messages:v.value},null,8,["messages"]),o("div",D,[d(r,{headers:h,items:g.value,loading:p.value,options:e.value,"onUpdate:options":a[0]||(a[0]=t=>e.value=t),"items-per-page-options":[10,20,50,100],"server-items-length":i.value,"header-props":{class:"dark:bg-dark-primary-1 bg-light-primary-2 dark:!text-white border-b dark:!border-white/30"},"hide-default-footer":"",class:"border dark:!border-typography-2/20 shadow-lg dark:!bg-dark-primary-1 !bg-light-primary-2 dark:!text-typography-1"},{"item.index":l(({index:t})=>[V(C((e.value.page-1)*e.value.itemsPerPage+t+1),1)]),"no-data":l(()=>a[2]||(a[2]=[o("p",null,"Tidak ada data ditemukan",-1)])),"item.action":l(({item:t})=>[o("button",{type:"button",onClick:T=>b(t.no_hp)},a[3]||(a[3]=[o("div",{class:"flex gap-2 items-center text-white bg-green-500 hover:bg-opacity-90 rounded-lg px-3 py-1 text-sm"},[o("i",{class:"fa-brands fa-whatsapp"}),o("p",null,"Whatsapp")],-1)]),8,B)]),_:1},8,["items","loading","options","server-items-length"]),d(_,{modelValue:e.value.page,"onUpdate:modelValue":a[1]||(a[1]=t=>e.value.page=t),length:Math.ceil(i.value/e.value.itemsPerPage),"total-visible":5,class:"bg-light-primary-2 border !border-typography-2/20 shadow-lg rounded-lg dark:bg-dark-primary-1 dark:text-white"},null,8,["modelValue","length"])])]),_:1})}}};export{S as default};
