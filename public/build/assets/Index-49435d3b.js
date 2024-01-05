import{d as k,T as c,c as V,a as o,u as e,e as l,F as v,o as y,Z as P,b as s,t as S,f as i,h as d,S as p,w as f,_,O as B,Y as C,Q as w}from"./app-9e983d03.js";import{_ as I}from"./AuthLayout.vue_vue_type_script_setup_true_lang-398ea088.js";import{_ as $}from"./HeaderBlue.vue_vue_type_script_setup_true_lang-cf1222a4.js";import{L as j,S as U,C as K,a as L}from"./Logout-fd095cda.js";import{I as T}from"./Index-231c496e.js";import{_ as u}from"./Password.vue_vue_type_script_setup_true_lang-c7612ade.js";import{T as F}from"./Textarea-85a03188.js";import{M as N}from"./MerchantFill-7ea0185c.js";import{B as A}from"./OutlineBlue-23e81c05.js";const M={class:"flex-center flex-col gap-3 mb-4"},O=["src"],J={class:"flex-center gap-1"},D={class:"text-sm font-medium"},E=s("i",{class:"isax icon-arrow-right-3 text-xl"},null,-1),Q=s("i",{class:"isax icon-arrow-right-3 text-xl"},null,-1),W=["onSubmit"],Y={class:"flex items-center gap-2 mb-6"},Z=s("p",{class:"text-sm font-semibold"},"Saran / keluhan",-1),q={"x-data":"{popup: false}"},z=s("a",{"x-on:click":"popup=!popup",id:"click-change"},null,-1),G=["onSubmit"],H=s("h2",{class:"text-center mb-8 font-semibold text-base"}," Ubah Password ",-1),R={"x-data":"{popup: false}"},X=s("a",{"x-on:click":"popup=!popup",id:"confirm-logout"},null,-1),ee=s("h2",{class:"text-center mb-2 font-semibold text-base"}," Apakah anda yakin ingin keluar? ",-1),se={class:"flex-center w-full gap-4"},ue=k({__name:"Index",setup(oe){const r=c({title:"",message:"",user_role:"merchants"}),t=c({password:"",new_password:"",new_password_confirmation:""}),b=()=>{t.processing||t.post(route("merchant.profile.change-password"),{onSuccess:()=>{d("click-change"),t.password="",t.new_password="",t.new_password_confirmation=""}})},g=()=>{r.processing||r.post(route("merchant.feedback.complaint"),{onSuccess:()=>{r.title="",r.message=""}})},h=()=>{B.post(route("merchant.logout"))},x=()=>{let m=C(w().props.bank.whatsapp);console.log(w().props.bank.whatsapp,m),window.open(`https://wa.me/${m}`,"_blank")};return(m,a)=>(y(),V(v,null,[o(e(P),{title:"Profile"}),o(I,null,{default:l(()=>[o($,{title:"Profile"}),s("div",M,[s("img",{src:m.$page.props.auth.merchant.profile,alt:"",class:"w-auto h-36 object-cover rounded-xl mb-1 aspect-video"},null,8,O),s("div",J,[o(N,{class:"grayscale"}),s("p",D,S(m.$page.props.auth.merchant.name),1)])]),s("a",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:a[0]||(a[0]=n=>e(d)("click-change"))},[i(" Ubah Password "),E]),s("p",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:x},[i(" Kontak Admin "),Q]),s("a",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:a[1]||(a[1]=n=>e(d)("confirm-logout"))},[i(" Keluar "),o(j)]),s("form",{class:"mt-10",onSubmit:f(g,["prevent"])},[s("div",Y,[o(U),Z]),o(T,{label:"Judul",type:"text",placeholder:"Input Judul",id:"title",name:"title",modelValue:e(r).title,"onUpdate:modelValue":a[2]||(a[2]=n=>e(r).title=n),value:e(r).title},null,8,["modelValue","value"]),o(F,{label:"Pesan",placeholder:"Input Pesan",id:"message",name:"message",modelValue:e(r).message,"onUpdate:modelValue":a[3]||(a[3]=n=>e(r).message=n),value:e(r).message,rows:"5",maxlength:"1000"},null,8,["modelValue","value"]),o(p,{type:"submit",disabled:!e(r).title||!e(r).message||e(r).processing,class:"mt-6 min-w-[100px] justify-center"},{default:l(()=>[i(" Kirim ")]),_:1},8,["disabled"])],40,W),s("section",q,[z,o(_,{close:!0},{default:l(()=>[s("form",{class:"",onSubmit:f(b,["prevent"])},[o(K,{class:"mx-auto mb-3"}),H,o(u,{label:"Password Lama",placeholder:"Input Password Lama",id:"forgot_name",name:"forgot_name",modelValue:e(t).password,"onUpdate:modelValue":a[4]||(a[4]=n=>e(t).password=n),error:e(t).errors.password},null,8,["modelValue","error"]),o(u,{label:"Password Baru (minimal 6 digit)",placeholder:"Input Password Baru",id:"forgot_name",name:"forgot_name",modelValue:e(t).new_password,"onUpdate:modelValue":a[5]||(a[5]=n=>e(t).new_password=n),error:e(t).errors.new_password},null,8,["modelValue","error"]),o(u,{label:"Konfirmasi Password Baru",placeholder:"Input Konfirmasi Password Baru",id:"forgot_name",name:"forgot_name",modelValue:e(t).new_password_confirmation,"onUpdate:modelValue":a[6]||(a[6]=n=>e(t).new_password_confirmation=n),error:e(t).errors.new_password_confirmation},null,8,["modelValue","error"]),o(p,{type:"submit",disabled:!e(t).password||!e(t).new_password||!e(t).new_password_confirmation||e(t).processing,class:"mx-auto mt-6 min-w-[200px] justify-center"},{default:l(()=>[i(" Simpan ")]),_:1},8,["disabled"])],40,G)]),_:1})]),s("section",R,[X,o(_,{close:!0},{default:l(()=>[o(L,{class:"mx-auto mb-3"}),ee,s("div",se,[o(A,{class:"justify-center mt-2 w-full","x-on:click":"popup=false"},{default:l(()=>[i(" Batal ")]),_:1}),o(p,{class:"justify-center mt-2 font-semibold w-full",onClick:h},{default:l(()=>[i(" Keluar ")]),_:1})])]),_:1})])]),_:1})],64))}});export{ue as default};
