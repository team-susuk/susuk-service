import{d as p,o as i,c as l,a as o,e as n,b as e,t as a,f as t,S as r,_ as c}from"./app-9e983d03.js";const d={"x-data":"{popup: false}"},_=e("a",{hidden:"","x-on:click":"popup=true",id:"popup-payment-bank"},null,-1),m={class:"p-4 rounded-lg bg-gray-stroke flex items-center gap-5 mb-5"},u=["src"],f={class:"flex flex-col flex-wrap break-all"},k={class:"text-xs md:text-sm font-medium"},b={class:"text-sm md:text-base font-semibold"},x={class:"text-sm text-center mb-8"},g={class:"font-semibold"},B=p({__name:"PopupBank",setup(h){return(s,w)=>(i(),l("div",d,[_,o(c,{title:"Informasi Pembayaran"},{default:n(()=>[e("div",m,[e("img",{src:s.$page.props.logo_bca,alt:"",class:"w-[56px] md:w-[104px]"},null,8,u),e("div",f,[e("p",k,a(s.$page.props.bank.rekening_number),1),e("p",b,a(s.$page.props.bank.rekening_name),1)])]),e("p",x,[t(" Untuk bukti transfer bisa kirim ke WA Admin SUSUK "),e("span",g,a(s.$page.props.bank.whatsapp),1),t(" untuk verifikasi pembayaran atas pesanan anda. ")]),o(r,{class:"!px-10 mx-auto","x-on:click":"popup=false"},{default:n(()=>[t(" Close ")]),_:1})]),_:1})]))}});export{B as _};
