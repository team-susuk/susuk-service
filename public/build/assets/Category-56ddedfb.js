import{d as _,k as d,e as p,o as r,a as e,u as t,Z as f,c as n,l as m,b as k,m as h,F as y}from"./app-025743f6.js";import{_ as v}from"./AuthLayout.vue_vue_type_script_setup_true_lang-22b04d81.js";import{_ as b}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-2e40e843.js";import{_ as B}from"./CardMerchant.vue_vue_type_script_setup_true_lang-1fd2d87f.js";import{_ as i}from"./CardMerchantLoading.vue_vue_type_script_setup_true_lang-0cd4323c.js";import{u as C}from"./pagination-dc23278e.js";import"./MerchantFill-bbe84f5e.js";const $={key:0,class:"grid grid-cols-2 md:grid-cols-3 gap-4"},N={class:"grid grid-cols-2 md:grid-cols-3 gap-4"},Z=_({__name:"Category",props:["title","id","type"],setup(o){const s=o,a=C({route:route("guide.merchants.category-data",{type:s.type,category:s.id})});return(u,V)=>(r(),d(v,{"hide-nav":!0},{default:p(()=>{var l,c;return[e(t(f),{title:o.title},null,8,["title"]),e(b,{backUrl:u.route("guide.home"),title:o.title},null,8,["backUrl","title"]),(l=t(a))!=null&&l.loading.value?(r(),n("div",$,[e(i),e(i),e(i)])):m("",!0),k("div",N,[t(a)&&!((c=t(a))!=null&&c.loading.value)?(r(!0),n(y,{key:0},h(t(a).data.value,g=>(r(),d(B,{data:g,back_url:"guide.home"},null,8,["data"]))),256)):m("",!0)])]}),_:1}))}});export{Z as default};
