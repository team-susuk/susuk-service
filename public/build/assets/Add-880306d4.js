import{d as t,T as n,k as d,e as i,o as u,a as l,u as o,Z as p,b as c,f,S as g,w as b}from"./app-9e983d03.js";import{_ as V}from"./AuthLayout.vue_vue_type_script_setup_true_lang-398ea088.js";import{_ as k}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-ea30725a.js";import{I as x}from"./InputNumber-ed87748c.js";import{I as _}from"./InputPrice-bd7499f8.js";import{_ as I}from"./DropZoneImage.vue_vue_type_script_setup_true_lang-4ae2693b.js";import{T as v}from"./Textarea-85a03188.js";import{I as P}from"./Index-231c496e.js";const U=["onSubmit"],D=t({__name:"Add",setup(w){const e=n({name:"",image:null,description:"",commission:"",price:""}),m=()=>{e.processing||e.post(route("merchant.products.store"))};return(s,r)=>(u(),d(V,{"hide-nav":!0},{default:i(()=>[l(o(p),{title:"Tambah Produk"}),l(k,{backUrl:s.route("merchant.home"),title:"Tambah Produk"},null,8,["backUrl"]),c("form",{class:"w-full flex flex-col",enctype:"multipart/form-data",onSubmit:b(m,["prevent"])},[l(P,{label:"Nama Produk",type:"text",placeholder:"Input Nama Produk",id:"name",name:"name",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=a=>o(e).name=a),error:o(e).errors.name},null,8,["modelValue","error"]),l(I,{label:"Upload Foto Produk",id:"dropzone_image",name:"image",modelValue:o(e).image,"onUpdate:modelValue":r[1]||(r[1]=a=>o(e).image=a),error:o(e).errors.image},null,8,["modelValue","error"]),l(v,{label:"Deskripsi Produk",placeholder:"Input Deskripsi Produk",id:"message",name:"message",modelValue:o(e).description,"onUpdate:modelValue":r[2]||(r[2]=a=>o(e).description=a),value:o(e).description,rows:"5",maxlength:"500",error:o(e).errors.description},null,8,["modelValue","value","error"]),l(x,{label:"Komisi (%)",type:"text",placeholder:"Input Komisi",id:"commission",name:"commission",modelValue:o(e).commission,"onUpdate:modelValue":r[3]||(r[3]=a=>o(e).commission=a),value:o(e).commission,icon:"isax icon-percentage-circle",error:o(e).errors.commission},null,8,["modelValue","value","error"]),l(_,{label:"Harga",type:"text",placeholder:"Input Harga",id:"price",name:"price",modelValue:o(e).price,"onUpdate:modelValue":r[4]||(r[4]=a=>o(e).price=a),value:o(e).price,error:o(e).errors.price},null,8,["modelValue","value","error"]),l(g,{type:"submit","bg-color":"blue","text-color":"white",class:"w-full flex-center mt-8",disabled:!o(e).name||!o(e).image||!o(e).description||!o(e).commission||!o(e).price||o(e).processing,loading:o(e).processing},{default:i(()=>[f(" Registrasi ")]),_:1},8,["disabled","loading"])],40,U)]),_:1}))}});export{D as default};
