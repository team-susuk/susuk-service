import{d,k as o,e as u,o as t,a as c,u as h,Z as _,c as s,b as r,F as i,m as l,l as m}from"./app-2bf97dd4.js";import{_ as f}from"./AuthLayout.vue_vue_type_script_setup_true_lang-8269e0c1.js";import{_ as g}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-2ae56418.js";import{_ as b}from"./CardMerchant.vue_vue_type_script_setup_true_lang-7a02cec3.js";import{_ as k}from"./CardProduct.vue_vue_type_script_setup_true_lang-5b7dcfb7.js";import"./MerchantFill-3e68b966.js";import"./OutlineOrange-043ca9e7.js";const p={key:0,class:"mb-6"},B=r("h2",{class:"text-lg font-semibold mb-4"}," Merchant ",-1),$={class:"grid grid-cols-2 md:grid-cols-3 gap-4"},v={key:1,class:"mb-3"},x=r("h2",{class:"text-lg font-semibold mb-4"}," Produk ",-1),C={class:"grid grid-cols-2 gap-4"},M=d({__name:"Search",props:["title","merchants","products"],setup(e){return(n,N)=>(t(),o(f,{"hide-nav":!0},{default:u(()=>[c(h(_),{title:e.title},null,8,["title"]),c(g,{backUrl:n.route("guide.home"),title:e.title},null,8,["backUrl","title"]),e.merchants.length?(t(),s("section",p,[B,r("div",$,[(t(!0),s(i,null,l(e.merchants,a=>(t(),o(b,{data:a},null,8,["data"]))),256))])])):m("",!0),e.products.length?(t(),s("section",v,[x,r("div",C,[(t(!0),s(i,null,l(e.products,a=>(t(),o(k,{data:a,href:n.route("guide.merchants.detail",a.merchant_id)},null,8,["data","href"]))),256))])])):m("",!0)]),_:1}))}});export{M as default};