import{I as n}from"./Info-76cf8bae.js";import{F as d}from"./File-b0ca16de.js";import{d as m,o as a,c as s,b as e,a as l,t as o,F as x,l as r,O as f}from"./app-36767eb4.js";const u={class:"flex flex-col gap-1"},b={class:"flex items-center justify-between"},_=e("p",{class:"text-neutral-gray-3 text-xs font-light"},"Informasi",-1),p={class:"text-neutral-gray-3 text-xs font-light"},h={class:"text-base font-semibold"},g={class:"text-neutral-gray-2 text-sm line-clamp-2 whitespace-pre-wrap"},k=["src"],y={key:1,class:"rounded-xl flex-center border border-silver p-2 gap-2 w-fit mt-2"},v=e("p",{class:"font-semibold text-sm text-blue"},"File",-1),N=m({__name:"CardInboxAdmin",props:["data","back_url"],setup(t){const c=t,i=()=>{c.back_url&&f.visit(c.back_url)};return(w,F)=>(a(),s("div",{class:"border-b border-silver p-3 flex gap-3 cursor-pointer",onClick:i},[e("div",null,[l(n)]),e("div",u,[e("div",b,[_,e("p",p,o(t.data.time),1)]),e("p",h,o(t.data.title),1),e("p",g,o(t.data.description),1),t.data.broadcast?(a(),s(x,{key:0},[t.data.broadcast.type==="text_image"?(a(),s("img",{key:0,src:t.data.broadcast.file_url,alt:"",class:"w-40 rounded"},null,8,k)):r("",!0),t.data.broadcast.type==="text_file"?(a(),s("div",y,[l(d),v])):r("",!0)],64)):r("",!0)])]))}});export{N as _};