import{d as f,k as d,e as g,o as r,a as e,u as t,Z as p,c as m,l as u,b as h,m as k,F as v}from"./app-b3d3fade.js";import{_ as y}from"./AuthLayout.vue_vue_type_script_setup_true_lang-5adae234.js";import{_ as B}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-ae7c7ded.js";import{_ as C}from"./CardProduct.vue_vue_type_script_setup_true_lang-3b85e1f6.js";import{_ as i}from"./CardMerchantLoading.vue_vue_type_script_setup_true_lang-82562850.js";import{u as $}from"./pagination-10755c42.js";import"./OutlineOrange-2b3b7dd0.js";const b={key:0,class:"grid grid-cols-2 gap-4"},N={class:"grid grid-cols-2 gap-4"},Z=f({__name:"Category",props:["title","id"],setup(o){const _=o,a=$({route:route("guide.products.category-data",{category:_.id})});return(s,V)=>(r(),d(y,{"hide-nav":!0},{default:g(()=>{var n,l;return[e(t(p),{title:o.title},null,8,["title"]),e(B,{backUrl:s.route("guide.home"),title:o.title},null,8,["backUrl","title"]),(n=t(a))!=null&&n.loading.value?(r(),m("div",b,[e(i),e(i),e(i)])):u("",!0),h("div",N,[t(a)&&!((l=t(a))!=null&&l.loading.value)?(r(!0),m(v,{key:0},k(t(a).data.value,c=>(r(),d(C,{data:c,href:s.route("guide.merchants.detail",c.merchant_id)},null,8,["data","href"]))),256)):u("",!0)])]}),_:1}))}});export{Z as default};