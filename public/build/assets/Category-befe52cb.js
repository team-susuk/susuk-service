import{d as _,k as c,e as f,o as r,a as e,u as t,Z as p,c as m,l as u,b as h,m as k,F as v}from"./app-ded19593.js";import{_ as y}from"./AuthLayout.vue_vue_type_script_setup_true_lang-b61fd9b2.js";import{_ as B}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-dac51649.js";import{_ as C}from"./CardProduct.vue_vue_type_script_setup_true_lang-5c0871f0.js";import{_ as i}from"./CardMerchantLoading.vue_vue_type_script_setup_true_lang-812d42e9.js";import{u as $}from"./pagination-82b0a1fb.js";import"./OutlineOrange-8b7a4eb4.js";const b={key:0,class:"grid grid-cols-2 md:grid-cols-3 gap-4"},N={class:"grid grid-cols-2 md:grid-cols-3 gap-4"},Z=_({__name:"Category",props:["title","id"],setup(o){const g=o,a=$({route:route("guide.products.category-data",{category:g.id})});return(s,V)=>(r(),c(y,{"hide-nav":!0},{default:f(()=>{var d,l;return[e(t(p),{title:o.title},null,8,["title"]),e(B,{backUrl:s.route("guide.home"),title:o.title},null,8,["backUrl","title"]),(d=t(a))!=null&&d.loading.value?(r(),m("div",b,[e(i),e(i),e(i)])):u("",!0),h("div",N,[t(a)&&!((l=t(a))!=null&&l.loading.value)?(r(!0),m(v,{key:0},k(t(a).data.value,n=>(r(),c(C,{data:n,href:s.route("guide.merchants.detail",n.merchant_id)},null,8,["data","href"]))),256)):u("",!0)])]}),_:1}))}});export{Z as default};
