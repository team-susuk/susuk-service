import{d as p,o as i,c as r,a as n,e as o,b as e,t as s,f as t,S as c,_ as l}from"./app-1a8e93b6.js";const d={"x-data":"{popup: false}"},_=e("a",{hidden:"","x-on:click":"popup=true",id:"popup-payment-bank"},null,-1),m={class:"p-4 rounded-lg bg-gray-stroke flex items-center gap-5 mb-5"},u=["src"],k={class:"text-sm font-medium"},b={class:"font-semibold"},f={class:"text-sm text-center mb-8"},g={class:"font-semibold"},B=p({__name:"PopupBank",setup(h){return(a,x)=>(i(),r("div",d,[_,n(l,{title:"Informasi Pembayaran"},{default:o(()=>[e("div",m,[e("img",{src:a.$page.props.logo_bca,alt:"",class:"w-[104px]"},null,8,u),e("div",null,[e("p",k,s(a.$page.props.bank.rekening_number),1),e("p",b,s(a.$page.props.bank.rekening_name),1)])]),e("p",f,[t(" Untuk bukti transfer bisa kirim ke WA Admin SUSUK "),e("span",g,s(a.$page.props.bank.whatsapp),1),t(" untuk verifikasi pembayaran atas pesanan anda. ")]),n(c,{class:"!px-10 mx-auto","x-on:click":"popup=false"},{default:o(()=>[t(" Close ")]),_:1})]),_:1})]))}});export{B as _};
