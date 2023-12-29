import{d as x,T as c,c as k,a as o,u as e,e as n,F as V,o as v,Z as y,b as s,t as f,f as i,h as d,S as u,w as _,_ as w,O as P}from"./app-5dad54dc.js";import{_ as S}from"./AuthLayout.vue_vue_type_script_setup_true_lang-00a08044.js";import{_ as B}from"./HeaderBlue.vue_vue_type_script_setup_true_lang-5afd3067.js";import{L as C,S as I,C as $,a as j}from"./Logout-1536ea1b.js";import{I as U}from"./Index-3ed812de.js";import{_ as p}from"./Password.vue_vue_type_script_setup_true_lang-d24fe31e.js";import{T as K}from"./Textarea-f871b04c.js";import{M as L}from"./MerchantFill-fddb6668.js";import{B as F}from"./OutlineBlue-91fe7882.js";const T={class:"flex-center flex-col gap-3 mb-4"},A=["src"],M={class:"flex-center gap-1"},N={class:"text-sm font-medium"},O=s("i",{class:"isax icon-arrow-right-3 text-xl"},null,-1),J={class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver"},D=["onSubmit"],E={class:"flex items-center gap-2 mb-6"},Z=s("p",{class:"text-sm font-semibold"},"Saran / keluhan",-1),q={"x-data":"{popup: false}"},z=s("a",{"x-on:click":"popup=!popup",id:"click-change"},null,-1),G=["onSubmit"],H=s("h2",{class:"text-center mb-8 font-semibold text-base"}," Ubah Password ",-1),Q={"x-data":"{popup: false}"},R=s("a",{"x-on:click":"popup=!popup",id:"confirm-logout"},null,-1),W=s("h2",{class:"text-center mb-2 font-semibold text-base"}," Apakah anda yakin ingin keluar? ",-1),X={class:"flex-center w-full gap-4"},me=x({__name:"Index",setup(Y){const r=c({title:"",message:"",user_role:"merchants"}),t=c({password:"",new_password:"",new_password_confirmation:""}),b=()=>{t.processing||t.post(route("merchant.profile.change-password"),{onSuccess:()=>{d("click-change"),t.password="",t.new_password="",t.new_password_confirmation=""}})},g=()=>{r.processing||r.post(route("merchant.feedback.complaint"),{onSuccess:()=>{r.title="",r.message=""}})},h=()=>{P.post(route("merchant.logout"))};return(m,a)=>(v(),k(V,null,[o(e(y),{title:"Profile"}),o(S,null,{default:n(()=>[o(B,{title:"Profile"}),s("div",T,[s("img",{src:m.$page.props.auth.merchant.profile,alt:"",class:"w-auto h-36 object-cover rounded-xl mb-1 aspect-video"},null,8,A),s("div",M,[o(L,{class:"grayscale"}),s("p",N,f(m.$page.props.auth.merchant.name),1)])]),s("a",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:a[0]||(a[0]=l=>e(d)("click-change"))},[i(" Ubah Password "),O]),s("p",J,[i(" Kontak Admin "),s("span",null,f(m.$page.props.bank.whatsapp),1)]),s("a",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:a[1]||(a[1]=l=>e(d)("confirm-logout"))},[i(" Keluar "),o(C)]),s("form",{class:"mt-10",onSubmit:_(g,["prevent"])},[s("div",E,[o(I),Z]),o(U,{label:"Judul",type:"text",placeholder:"Input Judul",id:"title",name:"title",modelValue:e(r).title,"onUpdate:modelValue":a[2]||(a[2]=l=>e(r).title=l),value:e(r).title},null,8,["modelValue","value"]),o(K,{label:"Pesan",placeholder:"Input Pesan",id:"message",name:"message",modelValue:e(r).message,"onUpdate:modelValue":a[3]||(a[3]=l=>e(r).message=l),value:e(r).message,rows:"5",maxlength:"1000"},null,8,["modelValue","value"]),o(u,{type:"submit",disabled:!e(r).title||!e(r).message||e(r).processing,class:"mt-6 min-w-[100px] justify-center"},{default:n(()=>[i(" Kirim ")]),_:1},8,["disabled"])],40,D),s("section",q,[z,o(w,{close:!0},{default:n(()=>[s("form",{class:"",onSubmit:_(b,["prevent"])},[o($,{class:"mx-auto mb-3"}),H,o(p,{label:"Password Lama",placeholder:"Input Password Lama",id:"forgot_name",name:"forgot_name",modelValue:e(t).password,"onUpdate:modelValue":a[4]||(a[4]=l=>e(t).password=l),error:e(t).errors.password},null,8,["modelValue","error"]),o(p,{label:"Password Baru (minimal 6 digit)",placeholder:"Input Password Baru",id:"forgot_name",name:"forgot_name",modelValue:e(t).new_password,"onUpdate:modelValue":a[5]||(a[5]=l=>e(t).new_password=l),error:e(t).errors.new_password},null,8,["modelValue","error"]),o(p,{label:"Konfirmasi Password Baru",placeholder:"Input Konfirmasi Password Baru",id:"forgot_name",name:"forgot_name",modelValue:e(t).new_password_confirmation,"onUpdate:modelValue":a[6]||(a[6]=l=>e(t).new_password_confirmation=l),error:e(t).errors.new_password_confirmation},null,8,["modelValue","error"]),o(u,{type:"submit",disabled:!e(t).password||!e(t).new_password||!e(t).new_password_confirmation||e(t).processing,class:"mx-auto mt-6 min-w-[200px] justify-center"},{default:n(()=>[i(" Simpan ")]),_:1},8,["disabled"])],40,G)]),_:1})]),s("section",Q,[R,o(w,{close:!0},{default:n(()=>[o(j,{class:"mx-auto mb-3"}),W,s("div",X,[o(F,{class:"justify-center mt-2 w-full","x-on:click":"popup=false"},{default:n(()=>[i(" Batal ")]),_:1}),o(u,{class:"justify-center mt-2 font-semibold w-full",onClick:h},{default:n(()=>[i(" Keluar ")]),_:1})])]),_:1})])]),_:1})],64))}});export{me as default};
