import{d as f,k as l,e as o,o as i,a,u as c,Z as _,b as t,t as s,f as n,h as x,S as h,c as m,F as p,m as g,l as k}from"./app-5edd660c.js";import{_ as b}from"./AuthLayout.vue_vue_type_script_setup_true_lang-9217fdec.js";import{_ as v}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-aa096ad4.js";import{M as y,_ as w}from"./PopupBooking.vue_vue_type_script_setup_true_lang-bfe0fc59.js";import{P as B,W as j}from"./Whatsapp-1d88f685.js";import{O as F}from"./OutlineOrange-4a60150f.js";import{_ as C}from"./CardProduct.vue_vue_type_script_setup_true_lang-dc7a808a.js";import"./OutlineBlue-96d83412.js";import"./DatePicker.vue_vue_type_script_setup_true_lang-408771f1.js";import"./flatpickr.min-e561b34c.js";import"./TimePicker.vue_vue_type_script_setup_true_lang-7d65ebee.js";import"./InputNumber-072839b7.js";import"./moment-fbc5633a.js";const D=["src"],M={class:"font-bold text-2xl mt-4"},N={class:"flex justify-between"},V={class:"max-w-[75%] text-neutral-gray-2 text-sm"},W={class:"flex gap-5 mt-2"},$={class:"flex-center gap-2"},O={class:"font-medium text-sm"},P={class:"flex-center gap-2"},S={class:"font-medium text-sm"},E=t("div",{class:"bg-[#F2F6FE] h-[1px] w-full my-3"},null,-1),L=t("span",{class:"text-xs text-neutral-dark-gray"}," Jam & hari operasional ",-1),U={class:"flex gap-4 mb-6"},I={class:"text-sm"},J=t("span",{class:"font-medium"},"Weekdays:",-1),K={class:"text-sm"},T=t("span",{class:"font-medium"},"Weekend:",-1),Z=t("span",{class:"text-sm"},null,-1),q={key:0,class:"mt-8"},z=t("div",{class:"flex items-center justify-between mb-3"},[t("h2",{class:"font-bold text-lg"},"List Produk")],-1),A={class:"grid grid-cols-3 gap-4"},dt=f({__name:"Detail",props:["data"],setup(e){return(r,d)=>(i(),l(b,{"hide-nav":!0},{default:o(()=>[a(c(_),{title:"Detail Merchant "+e.data.name},null,8,["title"]),a(v,{backUrl:r.route("guide.merchants.index"),title:"Detail Merchant"},null,8,["backUrl"]),t("img",{src:e.data.profile_url,class:"w-full h-64 object-cover rounded-lg aspect-video"},null,8,D),t("h1",M,s(e.data.name),1),t("div",N,[t("p",V,s(e.data.full_address),1),t("div",null,[a(y)])]),t("div",W,[t("div",$,[t("div",null,[a(B)]),t("span",O,s(e.data.pic_name),1)]),t("div",P,[t("div",null,[a(j)]),t("span",S,s(e.data.whatsapp_number),1)])]),a(F,{class:"!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mt-4 !cursor-default"},{default:o(()=>[n(" Komisi: "+s(e.data.full_commission),1)]),_:1}),E,L,t("div",U,[t("span",I,[J,n(" "+s(e.data.weekday_time.start)+" - "+s(e.data.weekday_time.end),1)]),t("span",K,[T,n(" "+s(e.data.weekend_time.start)+" - "+s(e.data.weekend_time.end),1)]),Z]),a(h,{class:"!font-semibold !text-xs md:!text-sm !px-9 !py-2 justify-center !w-fit",onClick:d[0]||(d[0]=()=>c(x)("popup-booking"))},{default:o(()=>[n(" Booking ")]),_:1}),e.data.products?(i(),m("section",q,[z,t("div",A,[(i(!0),m(p,null,g(e.data.products,u=>(i(),l(C,{data:u},null,8,["data"]))),256))])])):k("",!0),a(w,{id:e.data.uuid},null,8,["id"])]),_:1}))}});export{dt as default};
