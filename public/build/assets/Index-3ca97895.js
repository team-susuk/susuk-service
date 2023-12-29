import{p as k,o as b,c as h,b as s,d as y,Q as P,T as _,a as t,u as e,e as r,F as S,Z as B,t as u,i as L,f as i,h as m,S as c,w,_ as g,O as $}from"./app-5dad54dc.js";import{_ as j}from"./AuthLayout.vue_vue_type_script_setup_true_lang-4dfbd89a.js";import{_ as I}from"./HeaderBlue.vue_vue_type_script_setup_true_lang-5afd3067.js";import{L as H,S as U,C as K,a as M}from"./Logout-1536ea1b.js";import{I as Z}from"./Index-3ed812de.js";import{_ as p}from"./Password.vue_vue_type_script_setup_true_lang-d24fe31e.js";import{T}from"./Textarea-f871b04c.js";import{B as A}from"./OutlineBlue-91fe7882.js";const F={},J={width:"20",height:"20",viewBox:"0 0 20 20",fill:"none",xmlns:"http://www.w3.org/2000/svg"},N=s("path",{d:"M17.575 5.81676C16.8667 5.03343 15.6833 4.64176 13.9667 4.64176H13.7667V4.60843C13.7667 3.20843 13.7667 1.4751 10.6333 1.4751H9.36666C6.23332 1.4751 6.23332 3.21676 6.23332 4.60843V4.6501H6.03332C4.30832 4.6501 3.13332 5.04176 2.42499 5.8251C1.59999 6.74176 1.62499 7.9751 1.70832 8.81676L1.71666 8.8751L1.79999 9.7501C1.80832 9.75843 1.82499 9.7751 1.84166 9.78343C2.11666 9.96676 2.39999 10.1501 2.69999 10.3168C2.81666 10.3918 2.94166 10.4584 3.06666 10.5251C4.49166 11.3084 6.05832 11.8334 7.64999 12.0918C7.72499 12.8751 8.06666 13.7918 9.89166 13.7918C11.7167 13.7918 12.075 12.8834 12.1333 12.0751C13.8333 11.8001 15.475 11.2084 16.9583 10.3418C17.0083 10.3168 17.0417 10.2918 17.0833 10.2668C17.4667 10.0501 17.825 9.81676 18.175 9.55843C18.1917 9.5501 18.2083 9.53343 18.2167 9.51676L18.25 9.21676L18.2917 8.8251C18.3 8.7751 18.3 8.73343 18.3083 8.6751C18.375 7.83343 18.3583 6.68343 17.575 5.81676ZM10.9083 11.5251C10.9083 12.4084 10.9083 12.5418 9.88332 12.5418C8.85832 12.5418 8.85832 12.3834 8.85832 11.5334V10.4834H10.9083V11.5251ZM7.42499 4.64176V4.60843C7.42499 3.19176 7.42499 2.66676 9.36666 2.66676H10.6333C12.575 2.66676 12.575 3.2001 12.575 4.60843V4.6501H7.42499V4.64176Z",fill:"#667687"},null,-1),O=s("path",{opacity:"0.4",d:"M17.0834 10.25C17.0417 10.275 17.0001 10.3 16.9584 10.325C15.4751 11.1917 13.8334 11.775 12.1334 12.0583C12.0667 12.8583 11.7167 13.775 9.89172 13.775C8.06672 13.775 7.71672 12.8667 7.65005 12.075C6.05838 11.825 4.49172 11.3 3.06672 10.5083C2.94172 10.4417 2.81672 10.375 2.70005 10.3C2.40005 10.1333 2.11672 9.95 1.84172 9.76667C1.82505 9.75833 1.80838 9.74167 1.80005 9.73333L2.30838 15.1583C2.48338 16.8167 3.16672 18.525 6.83338 18.525H13.1834C16.8501 18.525 17.5334 16.8167 17.7084 15.15L18.2334 9.5C18.2251 9.51667 18.2084 9.53333 18.1917 9.54167C17.8334 9.8 17.4667 10.0417 17.0834 10.25Z",fill:"#667687"},null,-1),D=[N,O];function E(x,d){return b(),h("svg",J,D)}const Q=k(F,[["render",E]]),q={class:"flex-center flex-col gap-3 mb-4"},z=["src"],G={class:"text-sm font-medium"},R={class:"flex-center gap-1"},W={class:"text-xs font-medium"},X=s("i",{class:"isax icon-arrow-right-3 text-xl"},null,-1),Y=s("i",{class:"isax icon-arrow-right-3 text-xl"},null,-1),ee={class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver"},se=["onSubmit"],oe={class:"flex items-center gap-2 mb-6"},te=s("p",{class:"text-sm font-semibold"},"Saran / keluhan",-1),ae={"x-data":"{popup: false}"},le=s("a",{"x-on:click":"popup=!popup",id:"click-change"},null,-1),ne=["onSubmit"],re=s("h2",{class:"text-center mb-8 font-semibold text-base"}," Ubah Password ",-1),ie={"x-data":"{popup: false}"},de=s("a",{"x-on:click":"popup=!popup",id:"confirm-logout"},null,-1),ue=s("h2",{class:"text-center mb-2 font-semibold text-base"}," Apakah anda yakin ingin keluar? ",-1),me={class:"flex-center w-full gap-4"},xe=y({__name:"Index",setup(x){const d=P().props.auth.guide,a=_({title:"",message:"",user_role:"users"}),o=_({password:"",new_password:"",new_password_confirmation:""}),C=()=>{o.processing||o.post(route("guide.profile.change-password"),{onSuccess:()=>{m("click-change"),o.password="",o.new_password="",o.new_password_confirmation=""}})},v=()=>{a.processing||a.post(route("guide.feedback.complaint"),{onSuccess:()=>{a.title="",a.message=""}})},V=()=>{$.post(route("guide.logout"))};return(f,l)=>(b(),h(S,null,[t(e(B),{title:"Profile"}),t(j,null,{default:r(()=>[t(I,{title:"Profile"}),s("div",q,[s("img",{src:e(d).profile,alt:"",class:"w-32 h-32 object-cover rounded-full mb-1"},null,8,z),s("p",G,u(e(d).nick_name),1),s("div",R,[t(Q),s("p",W,u(e(d).profession),1)])]),t(e(L),{href:f.route("guide.profile.detail"),class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver"},{default:r(()=>[i(" Lihat Profil "),X]),_:1},8,["href"]),s("a",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:l[0]||(l[0]=n=>e(m)("click-change"))},[i(" Ubah Password "),Y]),s("p",ee,[i(" Kontak Admin "),s("span",null,u(f.$page.props.bank.whatsapp),1)]),s("a",{class:"flex items-center justify-between text-sm font-medium py-3 border-b border-silver cursor-pointer",onClick:l[1]||(l[1]=n=>e(m)("confirm-logout"))},[i(" Keluar "),t(H)]),s("form",{class:"mt-10",onSubmit:w(v,["prevent"])},[s("div",oe,[t(U),te]),t(Z,{label:"Judul",type:"text",placeholder:"Input Judul",id:"title",name:"title",modelValue:e(a).title,"onUpdate:modelValue":l[2]||(l[2]=n=>e(a).title=n),value:e(a).title},null,8,["modelValue","value"]),t(T,{label:"Pesan",placeholder:"Input Pesan",id:"message",name:"message",modelValue:e(a).message,"onUpdate:modelValue":l[3]||(l[3]=n=>e(a).message=n),value:e(a).message,rows:"5",maxlength:"1000"},null,8,["modelValue","value"]),t(c,{type:"submit",disabled:!e(a).title||!e(a).message||e(a).processing,loading:e(a).processing,class:"mt-6 min-w-[100px] justify-center"},{default:r(()=>[i(" Kirim ")]),_:1},8,["disabled","loading"])],40,se),s("section",ae,[le,t(g,{close:!0},{default:r(()=>[s("form",{class:"",onSubmit:w(C,["prevent"])},[t(K,{class:"mx-auto mb-3"}),re,t(p,{label:"Password Lama",placeholder:"Input Password Lama",id:"forgot_name",name:"forgot_name",modelValue:e(o).password,"onUpdate:modelValue":l[4]||(l[4]=n=>e(o).password=n),value:e(o).password,error:e(o).errors.password},null,8,["modelValue","value","error"]),t(p,{label:"Password Baru (minimal 6 digit)",placeholder:"Input Password Baru",id:"forgot_name",name:"forgot_name",modelValue:e(o).new_password,"onUpdate:modelValue":l[5]||(l[5]=n=>e(o).new_password=n),value:e(o).new_password,error:e(o).errors.new_password},null,8,["modelValue","value","error"]),t(p,{label:"Konfirmasi Password Baru",placeholder:"Input Konfirmasi Password Baru",id:"forgot_name",name:"forgot_name",modelValue:e(o).new_password_confirmation,"onUpdate:modelValue":l[6]||(l[6]=n=>e(o).new_password_confirmation=n),value:e(o).new_password_confirmation,error:e(o).errors.new_password_confirmation},null,8,["modelValue","value","error"]),t(c,{type:"submit",disabled:!e(o).password||!e(o).new_password||!e(o).new_password_confirmation||e(o).processing,loading:e(o).processing,class:"mx-auto mt-6 min-w-[200px] justify-center"},{default:r(()=>[i(" Simpan ")]),_:1},8,["disabled","loading"])],40,ne)]),_:1})]),s("section",ie,[de,t(g,{close:!0},{default:r(()=>[t(M,{class:"mx-auto mb-3"}),ue,s("div",me,[t(A,{class:"justify-center mt-2 w-full","x-on:click":"popup=false"},{default:r(()=>[i(" Batal ")]),_:1}),t(c,{onClick:V,class:"justify-center mt-2 font-semibold w-full"},{default:r(()=>[i(" Keluar ")]),_:1})])]),_:1})])]),_:1})],64))}});export{xe as default};