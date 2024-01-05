import{d as A,r as y,C as S,o as i,c,f as _,t as v,l as m,b as l,F as w,m as P,s as V,R as M,n as K,K as N,T as U,j as E,U as T,V as j,a as C,e as $,_ as z,k as B,u as p,S as D,W as F,X as L,h as R}from"./app-afe0b9df.js";import{_ as O}from"./Single.vue_vue_type_script_setup_true_lang-477043e5.js";import{B as W}from"./OutlineBlue-15cb0609.js";const q=["for"],J={key:0,class:"text-red"},H=["data-value"],Q=["id"],X={class:"px-3 items-center flex bg-neutral-light-gray text-xs h-[32px] rounded-full font-medium","x-on:click":"dropdownOpen=false"},G=["onClick"],Y=l("i",{class:"isax icon-arrow-down-1 float-right mt-[-37px] me-4 text-[#B4B6B8] text-[13px]"},null,-1),Z={key:0,class:"mb-4"},ee={class:"text-[11px] text-dark float-right"},te=l("span",{"x-text":"input.length"},null,-1),ae={class:"flex-1 overflow-auto"},le=["onClick"],oe=l("br",null,null,-1),se=l("br",null,null,-1),re={key:1,class:"mt-[-7px] error-text mb-4 block text-[11px]"},ie={key:2,class:"block mt-[-7px] text-[10px] mb-4 text-[#A3A3A3]"},ne=A({__name:"MultipleCategory",props:{label:{},help:{},error:{},id:{},category:{},selected:{},popup:{type:Boolean}},emits:["update:modelValue"],setup(f,{emit:b}){const t=b,u=f,h=y(""),n=y([]),g=y("auto"),o=y(!0),a=e=>{n.value.map(s=>s.id).includes(e.id)||(n.value.push({id:e.id,name:e.name}),t("update:modelValue",n.value.map(s=>s.id)))},r=e=>{n.value=n.value.filter(d=>d.id!==e),t("update:modelValue",n.value.map(d=>d.id))},x=()=>{const e=document.getElementById(`wrapper_category_${u.id}`);u.popup&&(e?(g.value=`${e.getBoundingClientRect().width}px`,window.innerHeight-e.getBoundingClientRect().bottom<250?o.value=!1:o.value=!0):g.value="auto")};S(()=>{if(u.selected){const e=[],d=JSON.parse(JSON.stringify(u.selected));u.category.forEach(s=>{d.includes(s.id)&&e.push({id:s.id,name:s.name})}),n.value=e}x(),window.addEventListener("resize",x)});const k=()=>{let e=h.value.toLowerCase();return u.category.filter(function(d){return d.name.toLowerCase().includes(e)})};return(e,d)=>(i(),c(w,null,[e.label?(i(),c("label",{key:0,for:e.id,class:"text-[12px] text-dark mb-1 block"},[_(v(e.label)+" ",1),e.$attrs.required?(i(),c("span",J,"*")):m("",!0)],8,q)):m("",!0),l("div",{class:V(["relative mb-2",{"has-error":e.error}]),"x-data":"{input: $el.getAttribute('data-value'),dropdownOpen : false}","data-value":e.$attrs.value||""},[l("div",{class:"border border-light-gray rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] flex gap-2 flex-wrap outline-none py-2 w-full mb-2 items-center",id:"wrapper_category_"+e.id},[(i(!0),c(w,null,P(n.value,s=>(i(),c("span",X,[_(v(s.name)+" ",1),l("i",{class:"isax-b icon-close-circle ms-3 cursor-pointer text-neutral-gray-3 text-lg",onClick:I=>r(s.id)},null,8,G)]))),256)),l("div",{class:V(["mt-[3px] flex-1 h-full min-w-[100px] cursor-pointer whitespace-nowrap overflow-hidden font-medium",{"text-[#ddd]":n.value.length}]),"x-on:click":"dropdownOpen=true",onClick:x}," Pilih Kategori ",2)],8,Q),Y,e.$attrs.maxlength?(i(),c("div",Z,[l("p",ee,[te,_("/"+v(e.$attrs.maxlength),1)])])):m("",!0),l("div",{class:V(["fixed w-full z-10",{"bottom-0":!o.value,fixed:e.popup,absolute:!e.popup}]),"x-transition:enter":"transition ease-out duration-50","x-transition:enter-start":"opacity-0 -translate-y-1","x-transition:enter-end":"opacity-100","x-show":"dropdownOpen","x-on:click.away":"dropdownOpen = false"},[l("div",{class:"bg-white border rounded-lg w-full max-h-60 p-2 flex flex-col",style:M({width:g.value})},[l("div",null,[K(l("input",{type:"text","onUpdate:modelValue":d[0]||(d[0]=s=>h.value=s),class:"bg-white rounded-lg placeholder:text-neutral-gray px-4 text-xs outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray",placeholder:"Cari Kategori"},null,512),[[N,h.value]])]),l("ul",ae,[(i(!0),c(w,null,P(k(),s=>(i(),c("li",{key:s.id},[l("a",{href:"javascript:;",class:"flex gap-3 p-[5px] px-2 rounded-md hover:bg-neutral-light-gray text-sm text-dark transition-all","x-on:click":"dropdownOpen=false",onClick:I=>a(s)},v(s.name),9,le)]))),128))])],4),oe,se],2),e.error?(i(),c("small",re,v(e.error),1)):m("",!0),e.help?(i(),c("small",ie,v(e.help),1)):m("",!0)],10,H)],64))}}),de={"x-data":"{popup: false}"},ce=l("a",{"x-on:click":"popup=true",id:"popup-filter"},null,-1),ue={class:"grid grid-cols-2 gap-x-3"},pe={class:"col-span-2 md:col-span-1"},me={class:"col-span-2 md:col-span-1"},fe={class:"col-span-2 mb-3"},he=l("a",{id:"close-filter","x-on:click":"popup=false",hidden:""},null,-1),ye=A({__name:"FilterMerchant",props:["categories","regions"],setup(f){const b=f,t=U({province:"",city:"",categories:[],sort:""}),u=y(!0),h=y([]),n=()=>{const o=t;var a={};o.categories.forEach((r,x)=>{a[`filter[categories][${x}]`]=r}),a["filter[province]"]=o.province,a["filter[city]"]=o.city,a["filter[sort]"]=o.sort,F(),L(a,!1),R("close-filter")};E(()=>t.province,(o,a)=>{u.value=!1,g()});const g=()=>{b.regions.filter(o=>{if(o.id==t.province){let a=t.city;h.value=o.cities,t.city="",h.value.map(r=>{r.id==a&&(t.city=a)}),setTimeout(()=>{u.value=!0},100)}})};return T(()=>{let o=j();t.city=o["filter[city]"]||"",t.sort=o["filter[sort]"]||"",t.province=o["filter[province]"]||"";const a=[];for(const r in o)if(r.startsWith("filter[categories][")&&r.match(/\[(\d+)\]/)){const k=parseInt(o[r],10);a.push(k)}t.categories=Array.from(new Set(a)),g()}),(o,a)=>(i(),c("section",de,[ce,C(z,{title:"Filter Merchant"},{default:$(()=>[l("div",ue,[l("div",pe,[f.regions?(i(),B(O,{key:0,placeholder:"Pilih Provinsi",label:"Provinsi",data:f.regions,id:"province",modelValue:p(t).province,"onUpdate:modelValue":a[0]||(a[0]=r=>p(t).province=r),selected:p(t).province,popup:!0},null,8,["data","modelValue","selected"])):m("",!0)]),l("div",me,[u.value?(i(),B(O,{key:0,placeholder:"Pilih Kabupaten",label:"Kabupaten/kotamadya",data:h.value,id:"city",modelValue:p(t).city,"onUpdate:modelValue":a[1]||(a[1]=r=>p(t).city=r),selected:p(t).city,popup:!0},null,8,["data","modelValue","selected"])):m("",!0)]),l("div",fe,[f.categories?(i(),B(ne,{key:0,label:"Kategori Merchant",category:f.categories,id:"categories",modelValue:p(t).categories,"onUpdate:modelValue":a[2]||(a[2]=r=>p(t).categories=r),selected:p(t).categories,popup:!0},null,8,["category","modelValue","selected"])):m("",!0)]),C(W,{class:"justify-center",href:o.route("guide.merchants.index")},{default:$(()=>[_(" Reset ")]),_:1},8,["href"]),C(D,{class:"justify-center font-semibold","x-on:click":"popup=false",onClick:n},{default:$(()=>[_(" Terapkan ")]),_:1}),he])]),_:1})]))}});export{ye as _};
