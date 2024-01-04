import{d as m,o,c as n,b as e,t as s,a as t,f as c,l as _,s as g,u as r,e as d,F as i,Z as h,M as x,m as v,k as b}from"./app-d72d628d.js";import{_ as y}from"./AuthLayout.vue_vue_type_script_setup_true_lang-6d556f18.js";import{_ as k}from"./HeaderBlue.vue_vue_type_script_setup_true_lang-a9e44cc2.js";import{_ as $}from"./TabMenu.vue_vue_type_script_setup_true_lang-b71c1d7a.js";import{B,S as C,G as S,a as w,_ as F}from"./CardQrCodeLoading.vue_vue_type_script_setup_true_lang-5b2f4aa6.js";import{u as N}from"./pagination-ee5cfd70.js";import{_ as V}from"./WithPaginate.vue_vue_type_script_setup_true_lang-7cdbac38.js";import"./EmptyState-d9b620ab.js";import"./CardMerchantLoading.vue_vue_type_script_setup_true_lang-7a3934c8.js";import"./Pagination.vue_vue_type_script_setup_true_lang-f2c82b24.js";const D={class:"flex gap-2 pb-3 border-b border-[#F2F6FE]"},G=["src"],Q={class:"flex flex-col gap-1 flex-auto"},R={class:"flex items-center justify-between w-full"},j={class:"text-xxs text-neutral-gray-2 font-medium"},q={class:"text-sm font-semibold"},E={class:"text-xxs"},M={class:"text-xxs text-neutral-gray-2 font-medium flex items-center gap-2 mt-2"},z={key:0,class:"text-xxs text-neutral-gray-2 font-medium flex items-center gap-2"},H={class:"flex gap-8 items-center"},L={class:"flex-center gap-2"},P={class:"font-medium text-sm"},T={class:"flex-center gap-2"},Z={class:"font-medium text-sm"},A=m({__name:"CardQrCodeMerchant",props:{class:{},data:{}},setup(u){return(a,p)=>(o(),n("div",{class:g(["rounded-[14px] border border-silver p-3 flex flex-col gap-3",a.class])},[e("div",D,[e("div",null,[e("img",{src:a.data.user.profile_url,class:"w-12 h-12 object-cover rounded-full aspect-square"},null,8,G)]),e("div",Q,[e("div",R,[e("p",j,s(a.data.user.code),1)]),e("p",q,s(a.data.user.name),1),e("p",E,s(a.data.city)+", "+s(a.data.province),1),e("p",M,[t(B),c(" Dibooking "+s(a.data.time_arrival),1)]),a.data.confirm_at?(o(),n("p",z,[t(C),c(" Discan "+s(a.data.confirm_at),1)])):_("",!0)])]),e("div",H,[e("div",L,[e("div",null,[t(S)]),e("span",P,s(a.data.guest_number),1)]),e("div",T,[e("div",null,[t(w)]),e("span",Z,s(a.data.guest_type),1)])])],2))}}),I={class:"grid grid-cols-1 gap-4 mt-8"},oe=m({__name:"History",setup(u){const a=N({route:route("merchant.qrcode.histories-data")});return(p,J)=>(o(),n(i,null,[t(r(h),{title:"Scan QR"}),t(y,null,{default:d(()=>[t(k,{title:"Scan QR"}),t($,{active:"history"}),t(V,{paginate:r(a),loading:x(F)},{default:d(()=>[e("div",I,[(o(!0),n(i,null,v(r(a).data.value,f=>{var l;return o(),n(i,null,[r(a)&&!((l=r(a))!=null&&l.loading.value)?(o(),b(A,{key:0,data:f},null,8,["data"])):_("",!0)],64)}),256))])]),_:1},8,["paginate","loading"])]),_:1})],64))}});export{oe as default};
