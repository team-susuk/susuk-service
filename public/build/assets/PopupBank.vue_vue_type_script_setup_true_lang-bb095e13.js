import{d as p,o as i,c as l,a as o,e as n,b as e,t as s,f as t,S as d,_ as r}from"./app-c0e37fe6.js";const c={"x-data":"{popup: false}"},m=e("a",{hidden:"","x-on:click":"popup=true",id:"popup-payment-bank"},null,-1),_={class:"p-4 rounded-lg bg-gray-stroke flex items-center gap-5 mb-5"},u=["src"],k={class:"flex flex-col flex-wrap break-all"},b={class:"text-xs md:text-sm font-medium"},f={class:"text-sm md:text-base font-semibold"},x={class:"text-sm text-center mb-8"},h={class:"font-semibold"},B=p({__name:"PopupBank",setup(g){return(a,w)=>(i(),l("div",c,[m,o(r,{title:"Informasi Pembayaran"},{default:n(()=>[e("div",_,[e("img",{src:a.$page.props.logo_bca,alt:"",class:"w-[56px] md:w-[104px]"},null,8,u),e("div",k,[e("p",b,s(a.$page.props.bank.rekening_number),1),e("p",f,s(a.$page.props.bank.rekening_name),1)])]),e("p",x,[t(" Jika kamu sudah melakukan pembayaran, mohon bukti transfer dapat dikirim ke WA Admin "),e("span",h,s(a.$page.props.bank.whatsapp),1),t(" agar pesanan anda dapat diproses lebih lanjut oleh Admin ")]),o(d,{class:"!px-10 mx-auto","x-on:click":"popup=false"},{default:n(()=>[t(" Close ")]),_:1})]),_:1})]))}});export{B as _};
