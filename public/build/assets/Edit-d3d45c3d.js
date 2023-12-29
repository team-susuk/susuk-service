import{d as g,T as b,k as V,e as p,o as k,a as t,u as o,Z as x,b as I,f as v,S as U,w as N}from"./app-5dad54dc.js";import{_ as P}from"./AuthLayout.vue_vue_type_script_setup_true_lang-00a08044.js";import{_ as w}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-04e7ae70.js";import{I as _}from"./InputNumber-ac87bd20.js";import{I as h}from"./InputPrice-a9e1a028.js";import{_ as y}from"./DropZoneImage.vue_vue_type_script_setup_true_lang-3045935d.js";import{T as S}from"./Textarea-f871b04c.js";import{I as B}from"./Index-3ed812de.js";const T=["onSubmit"],L=g({__name:"Edit",props:["product"],setup(l){var s,n,u,d;const i=l,e=b({name:(s=i.product)==null?void 0:s.name,image:null,description:(n=i.product)==null?void 0:n.description,commission:(u=i.product)==null?void 0:u.commission,price:(d=i.product)==null?void 0:d.price}),c=()=>{e.processing||e.post(route("merchant.products.edit.update",i.product.uuid))},f=m=>Number(m).toLocaleString("id-ID");return(m,r)=>(k(),V(P,{"hide-nav":!0},{default:p(()=>[t(o(x),{title:"Ubah Produk"}),t(w,{backUrl:m.route("merchant.products.detail",l.product.uuid),title:"Ubah Produk"},null,8,["backUrl"]),I("form",{class:"w-full flex flex-col",enctype:"multipart/form-data",onSubmit:N(c,["prevent"])},[t(B,{label:"Nama Produk",type:"text",placeholder:"Input Nama Produk",id:"name",name:"name",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=a=>o(e).name=a),value:o(e).name,error:o(e).errors.name},null,8,["modelValue","value","error"]),t(y,{label:"Upload Foto Produk",id:"dropzone_image",name:"image",modelValue:o(e).image,"onUpdate:modelValue":r[1]||(r[1]=a=>o(e).image=a),error:o(e).errors.image,defaultImage:l.product.image_url},null,8,["modelValue","error","defaultImage"]),t(S,{label:"Deskripsi Produk",placeholder:"Input Deskripsi Produk",id:"message",name:"message",modelValue:o(e).description,"onUpdate:modelValue":r[2]||(r[2]=a=>o(e).description=a),value:o(e).description,rows:"5",maxlength:"500",error:o(e).errors.description},null,8,["modelValue","value","error"]),t(_,{label:"Komisi (%)",type:"text",placeholder:"Input Komisi",id:"commission",name:"commission",modelValue:o(e).commission,"onUpdate:modelValue":r[3]||(r[3]=a=>o(e).commission=a),value:o(e).commission,icon:"isax icon-percentage-circle",error:o(e).errors.commission},null,8,["modelValue","value","error"]),t(h,{label:"Harga",type:"text",placeholder:"Input Harga",id:"price",name:"price",modelValue:o(e).price,"onUpdate:modelValue":r[4]||(r[4]=a=>o(e).price=a),value:f(o(e).price),error:o(e).errors.price},null,8,["modelValue","value","error"]),t(U,{type:"submit","bg-color":"blue","text-color":"white",class:"w-full flex-center mt-8",disabled:!o(e).name||!o(e).description||!o(e).commission||!o(e).price||o(e).processing,loading:o(e).processing},{default:p(()=>[v(" Registrasi ")]),_:1},8,["disabled","loading"])],40,T)]),_:1}))}});export{L as default};
