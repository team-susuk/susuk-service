import{d,o as r,c as l,b as e,t,a,s as p,u as o,e as c,F as n,Z as f,M as g,m as h,k as x,l as v}from"./app-1a8e93b6.js";import{_ as b}from"./AuthLayout.vue_vue_type_script_setup_true_lang-49e9d031.js";import{_ as y}from"./HeaderBlue.vue_vue_type_script_setup_true_lang-65a74a81.js";import{_ as $}from"./TabMenu.vue_vue_type_script_setup_true_lang-e5102b90.js";import{G as C,a as k,_ as w}from"./CardQrCodeLoading.vue_vue_type_script_setup_true_lang-46be4aff.js";import{u as F}from"./pagination-b8f34750.js";import{_ as B}from"./WithPaginate.vue_vue_type_script_setup_true_lang-a24246b4.js";import"./EmptyState-037e5e42.js";import"./CardMerchantLoading.vue_vue_type_script_setup_true_lang-f09ca5dc.js";import"./Pagination.vue_vue_type_script_setup_true_lang-82f9ac4c.js";const S={class:"flex gap-2 pb-3 border-b border-[#F2F6FE]"},G=["src"],N={class:"flex flex-col gap-1 flex-auto"},Q={class:"flex items-center justify-between w-full"},R={class:"text-xxs text-neutral-gray-2 font-medium"},V={class:"text-xxs text-neutral-gray-2 font-medium"},j={class:"text-sm font-semibold"},q={class:"flex gap-8"},E={class:"flex-center gap-2"},M={class:"font-medium text-sm"},z={class:"flex-center gap-2"},D={class:"font-medium text-sm"},H=d({__name:"CardQrCodeMerchant",props:{class:{},data:{}},setup(_){return(s,m)=>(r(),l("div",{class:p(["rounded-[14px] border border-silver p-3 flex flex-col gap-3",s.class])},[e("div",S,[e("div",null,[e("img",{src:s.data.user.profile_url,class:"w-12 h-12 object-cover rounded-full aspect-square"},null,8,G)]),e("div",N,[e("div",Q,[e("p",R,t(s.data.user.code),1),e("p",V,t(s.data.time_arrival),1)]),e("p",j,t(s.data.user.name),1)])]),e("div",q,[e("div",E,[e("div",null,[a(C)]),e("span",M,t(s.data.guest_number),1)]),e("div",z,[e("div",null,[a(k)]),e("span",D,t(s.data.guest_type),1)])])],2))}}),L={class:"grid grid-cols-2 gap-4 mt-8"},Y=d({__name:"History",setup(_){const s=F({route:route("merchant.qrcode.histories-data")});return(m,P)=>(r(),l(n,null,[a(o(f),{title:"Scan QR"}),a(b,null,{default:c(()=>[a(y,{title:"Scan QR"}),a($,{active:"history"}),a(B,{paginate:o(s),loading:g(w)},{default:c(()=>[e("div",L,[(r(!0),l(n,null,h(o(s).data.value,u=>{var i;return r(),l(n,null,[o(s)&&!((i=o(s))!=null&&i.loading.value)?(r(),x(H,{key:0,data:u},null,8,["data"])):v("",!0)],64)}),256))])]),_:1},8,["paginate","loading"])]),_:1})],64))}});export{Y as default};
