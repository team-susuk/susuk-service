import{_ as b}from"./MultipleLanguage.vue_vue_type_script_setup_true_lang-884fa5df.js";import{S as x}from"./Index-f7f96220.js";import{_ as m}from"./Single.vue_vue_type_script_setup_true_lang-b48e5073.js";import{d as B,T as P,r as g,j as C,R as U,U as S,c as A,a as s,e as r,_ as N,b as i,o as d,k as v,u as l,l as y,f as _,S as T,V as $,W as j,h as w}from"./app-d72d628d.js";import{B as F}from"./OutlineBlue-3d6fd903.js";const K={"x-data":"{popup: false}"},M=i("a",{"x-on:click":"popup=true",id:"popup-filter"},null,-1),D={class:"grid grid-cols-2 gap-x-3"},E={class:"col-span-2"},I=i("option",{value:"guide"},"Guide",-1),W=i("option",{value:"driver"},"Driver",-1),q=i("option",{value:"freelance"},"Freelance",-1),G={class:"col-span-2 mb-3"},J=B({__name:"FilterMember",props:["languages","regions"],setup(n){const V=n,a=P({province:"",city:"",profession:"guide",languages:[]}),c=g(!0),u=g([]),h=()=>{const t=a;var e={};t.languages.forEach((o,f)=>{e[`filter[languages][${f}]`]=o}),e["filter[province]"]=t.province,e["filter[city]"]=t.city,e["filter[profession]"]=t.profession,$(),j(e,!1),w("close-filter")};C(()=>a.province,(t,e)=>{c.value=!1,p()});const p=()=>{V.regions.filter(t=>{if(t.id==a.province){let e=a.city;u.value=t.cities,a.city="",u.value.map(o=>{o.id==e&&(a.city=e)}),setTimeout(()=>{c.value=!0},100)}})};return U(()=>{let t=S();a.city=t["filter[city]"]||"",a.profession=t["filter[profession]"]||"",a.province=t["filter[province]"]||"";const e=[];for(const o in t)if(o.startsWith("filter[languages][")&&o.match(/\[(\d+)\]/)){const k=parseInt(t[o],10);e.push(k)}a.languages=Array.from(new Set(e)),p()}),(t,e)=>(d(),A("section",K,[M,s(N,{title:"Filter Merchant"},{default:r(()=>[i("div",D,[i("div",null,[n.regions?(d(),v(m,{key:0,placeholder:"Pilih Provinsi",label:"Provinsi",data:n.regions,id:"province",modelValue:l(a).province,"onUpdate:modelValue":e[0]||(e[0]=o=>l(a).province=o),selected:l(a).province,popup:!0},null,8,["data","modelValue","selected"])):y("",!0)]),i("div",null,[c.value?(d(),v(m,{key:0,placeholder:"Pilih Kabupaten",label:"Kabupaten/kotamadya",data:u.value,id:"city",modelValue:l(a).city,"onUpdate:modelValue":e[1]||(e[1]=o=>l(a).city=o),selected:l(a).city,popup:!0},null,8,["data","modelValue","selected"])):y("",!0)]),i("div",E,[s(x,{label:"Profesi",id:"profession",name:"profession",modelValue:l(a).profession,"onUpdate:modelValue":e[2]||(e[2]=o=>l(a).profession=o)},{default:r(()=>[I,W,q]),_:1},8,["modelValue"])]),i("div",G,[s(b,{label:"Bahasa ",category:n.languages,id:"languages",popup:!0,modelValue:l(a).languages,"onUpdate:modelValue":e[3]||(e[3]=o=>l(a).languages=o)},null,8,["category","modelValue"])]),s(F,{class:"justify-center","x-on:click":"popup=false",id:"close-filter"},{default:r(()=>[_(" Kembali ")]),_:1}),s(T,{class:"justify-center font-semibold","x-on:click":"popup=false",onClick:h},{default:r(()=>[_(" Terapkan ")]),_:1})])]),_:1})]))}});export{J as _};
