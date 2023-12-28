import{p as h,o as i,c as n,f as p,t as d,l as m,b as u,s as g,y as x,F as k,d as _,T as V,k as v,e as b,a as s,u as t,Z as y,S as w,w as P}from"./app-b8fc0357.js";import{_ as I}from"./AuthLayout.vue_vue_type_script_setup_true_lang-57d244cf.js";import{_ as N}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-30002b85.js";import{I as U}from"./InputNumber-4b3f758f.js";import{_ as C}from"./DropZoneImage.vue_vue_type_script_setup_true_lang-3a2b3884.js";import{T as S}from"./Textarea-f411ba28.js";import{I as T}from"./Index-86d04fae.js";const B={props:["label","icon","help","error","id","class","modelValue"],emits:["update:modelValue"],computed:{value:{get(){return this.modelValue},set(r){this.$emit("update:modelValue",r)}}},methods:{formatPrice(){if(this.value){const r=this.value.replace(/\./g,""),e=Number(r).toLocaleString("id-ID");this.value=e}},isNumber(r){var e=r.which?r.which:r.keyCode;return(e<48||e>57)&&r.preventDefault(),!0}},watch:{value(r,e){r!==e&&this.formatPrice()}}},D=["for"],$={key:0,class:"text-red"},F=["data-value"],K={key:1,class:"mb-4"},z={class:"text-[11px] text-dark float-right"},A=u("span",{"x-text":"input.length"},null,-1),H={key:2,class:"mt-[-7px] error-text mb-4 block text-[11px]"},q={key:3,class:"block mt-[-7px] text-[10px] mb-4"};function E(r,e,a,f,o,l){return i(),n(k,null,[a.label?(i(),n("label",{key:0,for:a.id,class:"text-[12px] text-dark mb-1 block"},[p(d(a.label)+" ",1),r.$attrs.required?(i(),n("span",$,"*")):m("",!0)],8,D)):m("",!0),u("div",{class:g(["relative mb-2",{"has-error":a.error}]),"x-data":"{input: $el.getAttribute('data-value')}","data-value":r.$attrs.value||""},[a.icon?(i(),n("i",{key:0,class:g([a.icon,"absolute top-[11px] right-4 text-[18px] text-dark"])},null,2)):m("",!0),u("input",x(r.$attrs,{class:[a.icon?"pe-10":"","bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray disabled:bg-light-gray",a.class],"x-model":"input",onInput:e[0]||(e[0]=c=>r.$emit("update:modelValue",c.target.value)),onKeypress:e[1]||(e[1]=c=>l.isNumber(c))}),null,16),r.$attrs.maxlength?(i(),n("div",K,[u("p",z,[A,p("/"+d(r.$attrs.maxlength),1)])])):m("",!0),a.error?(i(),n("small",H,d(a.error),1)):m("",!0),a.help?(i(),n("small",q,d(a.help),1)):m("",!0)],10,F)],64)}const L=h(B,[["render",E]]),M=["onSubmit"],W=_({__name:"Add",setup(r){const e=V({name:"",image:null,description:"",commission:"",price:""}),a=()=>{e.processing||e.post(route("merchant.products.store"))};return(f,o)=>(i(),v(I,{"hide-nav":!0},{default:b(()=>[s(t(y),{title:"Tambah Produk"}),s(N,{backUrl:f.route("merchant.home"),title:"Tambah Produk"},null,8,["backUrl"]),u("form",{class:"w-full flex flex-col",enctype:"multipart/form-data",onSubmit:P(a,["prevent"])},[s(T,{label:"Nama Produk",type:"text",placeholder:"Input Nama Produk",id:"name",name:"name",modelValue:t(e).name,"onUpdate:modelValue":o[0]||(o[0]=l=>t(e).name=l),error:t(e).errors.name},null,8,["modelValue","error"]),s(C,{label:"Upload Foto Produk",id:"dropzone_image",name:"image",modelValue:t(e).image,"onUpdate:modelValue":o[1]||(o[1]=l=>t(e).image=l),error:t(e).errors.image},null,8,["modelValue","error"]),s(S,{label:"Deskripsi Produk",placeholder:"Input Deskripsi Produk",id:"message",name:"message",modelValue:t(e).description,"onUpdate:modelValue":o[2]||(o[2]=l=>t(e).description=l),value:t(e).description,rows:"5",maxlength:"500",error:t(e).errors.description},null,8,["modelValue","value","error"]),s(U,{label:"Komisi (%)",type:"text",placeholder:"Input Komisi",id:"commission",name:"commission",modelValue:t(e).commission,"onUpdate:modelValue":o[3]||(o[3]=l=>t(e).commission=l),value:t(e).commission,icon:"isax icon-percentage-circle",error:t(e).errors.commission},null,8,["modelValue","value","error"]),s(L,{label:"Harga",type:"text",placeholder:"Input Harga",id:"price",name:"price",modelValue:t(e).price,"onUpdate:modelValue":o[4]||(o[4]=l=>t(e).price=l),value:t(e).price,error:t(e).errors.price},null,8,["modelValue","value","error"]),s(w,{type:"submit","bg-color":"blue","text-color":"white",class:"w-full flex-center mt-8",disabled:!t(e).name||!t(e).image||!t(e).description||!t(e).commission||!t(e).price||t(e).processing,loading:t(e).processing},{default:b(()=>[p(" Registrasi ")]),_:1},8,["disabled","loading"])],40,M)]),_:1}))}});export{W as default};