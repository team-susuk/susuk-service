import{d as s,c as r,F as n,m as l,o as a,a as i,e as c,f as u,t as d,s as m,u as b,i as f}from"./app-9e983d03.js";const h={class:"flex w-full"},y=s({__name:"TabMenu",props:{active:{}},setup(p){const o=[{name:"QR Code",key:"qrcode",route:route("merchant.qrcode.index")},{name:"Histori",key:"history",route:route("merchant.qrcode.histories")}];return(t,_)=>(a(),r("div",h,[(a(),r(n,null,l(o,e=>i(b(f),{href:e.route,class:m(["w-full text-center border-b pb-2 hover:border-blue hover:text-blue transition-all text-sm font-semibold",{"border-blue text-blue":e.key===t.active,"border-neutral-gray-5 text-neutral-gray-5":e.key!==t.active}])},{default:c(()=>[u(d(e.name),1)]),_:2},1032,["href","class"])),64))]))}});export{y as _};
