import{B as r,S as l,G as c,a as i}from"./CardQrCodeLoading.vue_vue_type_script_setup_true_lang-d6d63ac2.js";import{d as m,o,c as n,b as e,t as a,a as t,f as d,l as p,s as _}from"./app-9e983d03.js";const f={class:"flex gap-2 pb-3 border-b border-[#F2F6FE]"},u=["src"],x={class:"flex flex-col gap-1"},h={class:"text-sm font-semibold"},g={class:"text-xxs font-medium"},v={class:"text-xxs text-neutral-gray-2 font-medium flex items-center gap-2 mt-2"},b={key:0,class:"text-xxs text-neutral-gray-2 font-medium flex items-center gap-2"},k={class:"flex gap-8"},y={class:"flex-center gap-2"},B={class:"font-medium text-sm"},C={class:"flex-center gap-2"},N={class:"font-medium text-sm"},G=m({__name:"CardQrCode",props:{class:{},data:{}},setup(S){return(s,V)=>(o(),n("div",{class:_(["rounded-[14px] border border-silver p-3 flex flex-col gap-3",s.class])},[e("div",f,[e("div",null,[e("img",{src:s.data.merchant.profile_url,class:"w-[85.33px] h-12 object-cover rounded-lg aspect-video"},null,8,u)]),e("div",x,[e("p",h,a(s.data.merchant.name),1),e("p",g,a(s.data.merchant.full_address),1),e("p",v,[t(r),d(" Dibooking "+a(s.data.time_arrival),1)]),s.data.confirm_at?(o(),n("p",b,[t(l),d(" Discan "+a(s.data.confirm_at),1)])):p("",!0)])]),e("div",k,[e("div",y,[e("div",null,[t(c)]),e("span",B,a(s.data.guest_number),1)]),e("div",C,[e("div",null,[t(i)]),e("span",N,a(s.data.guest_type),1)])])],2))}});export{G as _};
