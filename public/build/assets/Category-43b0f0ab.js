import{d as f,k as n,e as _,o,a as e,u as t,Z as p,c as u,l as m,b as h,m as k,F as v}from"./app-8bd3d524.js";import{_ as y}from"./AuthLayout.vue_vue_type_script_setup_true_lang-79697dba.js";import{_ as b}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-11531d44.js";import{_ as B}from"./CardProduct.vue_vue_type_script_setup_true_lang-7acd1cf0.js";import{_ as s}from"./CardMerchantLoading.vue_vue_type_script_setup_true_lang-4bd57c1d.js";import{u as C}from"./pagination-3cc4e00e.js";import"./OutlineOrange-a114e387.js";const $={key:0,class:"grid grid-cols-2 gap-4"},N={class:"grid grid-cols-2 gap-4"},j=f({__name:"Category",props:["title","id"],setup(a){const g=a,r=C({route:route("guide.products.category-data",{category:g.id})});return(i,V)=>(o(),n(y,{"hide-nav":!0},{default:_(()=>{var l,c;return[e(t(p),{title:a.title},null,8,["title"]),e(b,{backUrl:i.route("guide.home"),title:a.title},null,8,["backUrl","title"]),(l=t(r))!=null&&l.loading.value?(o(),u("div",$,[e(s),e(s),e(s)])):m("",!0),h("div",N,[t(r)&&!((c=t(r))!=null&&c.loading.value)?(o(!0),u(v,{key:0},k(t(r).data.value,d=>(o(),n(B,{data:d,href:i.route("guide.merchants.detail",d.merchant_id),back_url:i.route("guide.products.category",a.id)},null,8,["data","href","back_url"]))),256)):m("",!0)])]}),_:1}))}});export{j as default};
