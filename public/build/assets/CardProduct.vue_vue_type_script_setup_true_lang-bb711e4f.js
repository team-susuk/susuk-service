import{d as _,r as x,o as i,c as d,b as s,t,a,e as o,f as c,_ as h,l as g,s as b,O as k}from"./app-b8fc0357.js";import{O as n}from"./OutlineOrange-2f1db49e.js";const w=["src"],v={class:"mb-1 font-medium text-base whitespace-pre-wrap"},y={class:"mb-1 text-lg text-neutral-dark-gray whitespace-pre-wrap font-bold"},C={class:"mb-2 text-xxs text-neutral-gray-2 line-clamp-2 whitespace-pre-wrap"},O={key:0,"x-data":"{popup: false}",class:"cursor-default"},j={class:"flex flex-col lg:flex-row gap-5"},N={class:"flex-shrink-0"},V=["src"],B={class:"mb-3 font-semibold text-lg"},D={class:"mb-3 font-bold text-xl"},K=s("p",{class:"mb-2 text-xs text-neutral-dark-gray"},"Deskripsi Toko",-1),P={class:"text-sm font-medium"},z=_({__name:"CardProduct",props:{class:{},href:{},data:{}},emits:["action"],setup(p,{emit:m}){const u=m,r=x(null),l=p,f=()=>{var e;l.href?k.visit(l.href):(e=r.value)==null||e.click(),u("action",()=>{})};return(e,R)=>(i(),d("div",{class:b(["rounded-[14px] border border-silver p-[14px] flex flex-col gap-2 cursor-pointer",e.class])},[s("div",{onClick:f},[s("img",{src:e.data.image_url,class:"w-full h-48 object-cover rounded-lg mb-1"},null,8,w),s("p",v,t(e.data.name),1),s("p",y,"Rp"+t(e.data.price_formated),1),s("p",C,t(e.data.description),1),a(n,{class:"!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full !cursor-default"},{default:o(()=>[c(" Komisi: "+t(e.data.commission)+"% ",1)]),_:1})]),e.href?g("",!0):(i(),d("div",O,[s("a",{hidden:"",ref_key:"trigger_popup",ref:r,"x-on:click":"popup=true"},null,512),a(h,{title:"Detail Produk",class:"lg:max-w-lg xl:max-w-2xl"},{default:o(()=>[s("div",j,[s("div",N,[s("img",{src:e.data.image_url,class:"w-72 h-72 object-cover rounded-lg mb-1 aspect-square"},null,8,V)]),s("div",null,[s("p",B,t(e.data.name),1),s("p",D,"Rp"+t(e.data.price_formated),1),a(n,{class:"!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mb-4 !cursor-default"},{default:o(()=>[c(" Komisi: "+t(e.data.commission)+"% ",1)]),_:1}),K,s("p",P,t(e.data.description),1)])])]),_:1})]))],2))}});export{z as _};