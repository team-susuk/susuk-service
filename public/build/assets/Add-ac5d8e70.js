import{d as n,T as d,k as u,e as i,o as p,a as l,u as o,Z as c,b as f,f as g,S as b,w as V}from"./app-5edd660c.js";import{_ as k}from"./AuthLayout.vue_vue_type_script_setup_true_lang-cc1ae2ac.js";import{_ as x}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-aa096ad4.js";import{I as m}from"./InputNumber-072839b7.js";import{_}from"./DropZoneImage.vue_vue_type_script_setup_true_lang-ed3648c9.js";import{T as v}from"./Textarea-419ea5e8.js";import{I}from"./Index-692ab93f.js";const U=["onSubmit"],$=n({__name:"Add",setup(w){const e=d({name:"",image:null,description:"",commission:"",price:""}),s=()=>{e.processing||e.post(route("merchant.products.store"))};return(t,r)=>(p(),u(k,{"hide-nav":!0},{default:i(()=>[l(o(c),{title:"Tambah Produk"}),l(x,{backUrl:t.route("merchant.home"),title:"Tambah Produk"},null,8,["backUrl"]),f("form",{class:"w-full flex flex-col",enctype:"multipart/form-data",onSubmit:V(s,["prevent"])},[l(I,{label:"Nama Produk",type:"text",placeholder:"Input Nama Produk",id:"name",name:"name",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=a=>o(e).name=a),error:o(e).errors.name},null,8,["modelValue","error"]),l(_,{label:"Upload Foto Produk",id:"dropzone_image",name:"image",modelValue:o(e).image,"onUpdate:modelValue":r[1]||(r[1]=a=>o(e).image=a),error:o(e).errors.image},null,8,["modelValue","error"]),l(v,{label:"Deskripsi Produk",placeholder:"Input Deskripsi Produk",id:"message",name:"message",modelValue:o(e).description,"onUpdate:modelValue":r[2]||(r[2]=a=>o(e).description=a),value:o(e).description,rows:"5",maxlength:"500",error:o(e).errors.description},null,8,["modelValue","value","error"]),l(m,{label:"Komisi (%)",type:"text",placeholder:"Input Komisi",id:"commission",name:"commission",modelValue:o(e).commission,"onUpdate:modelValue":r[3]||(r[3]=a=>o(e).commission=a),value:o(e).commission,icon:"isax icon-percentage-circle",error:o(e).errors.commission},null,8,["modelValue","value","error"]),l(m,{label:"Harga",type:"text",placeholder:"Input Harga",id:"price",name:"price",modelValue:o(e).price,"onUpdate:modelValue":r[4]||(r[4]=a=>o(e).price=a),value:o(e).price,error:o(e).errors.price},null,8,["modelValue","value","error"]),l(b,{type:"submit","bg-color":"blue","text-color":"white",class:"w-full flex-center mt-8",disabled:!o(e).name||!o(e).image||!o(e).description||!o(e).commission||!o(e).price||o(e).processing,loading:o(e).processing},{default:i(()=>[g(" Registrasi ")]),_:1},8,["disabled","loading"])],40,U)]),_:1}))}});export{$ as default};