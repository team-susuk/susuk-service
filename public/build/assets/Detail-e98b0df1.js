import{d as f,k as n,e as d,o as i,a,u as c,Z as _,b as t,t as s,f as o,h,S as x,c as m,F as p,m as g,l as k}from"./app-10e88ffe.js";import{_ as b}from"./AuthLayout.vue_vue_type_script_setup_true_lang-992d2cda.js";import{_ as w}from"./HeaderDetail.vue_vue_type_script_setup_true_lang-36d25409.js";import{M as v,_ as y}from"./PopupBooking.vue_vue_type_script_setup_true_lang-6854039c.js";import{P as B,W as j}from"./Whatsapp-999406ab.js";import{O as F}from"./OutlineOrange-565dd78d.js";import{_ as C}from"./CardProduct.vue_vue_type_script_setup_true_lang-0b039ae0.js";import"./OutlineBlue-4a3fc3c8.js";import"./DatePicker.vue_vue_type_script_setup_true_lang-699f4926.js";import"./flatpickr.min-e561b34c.js";import"./TimePicker.vue_vue_type_script_setup_true_lang-cd629f69.js";import"./InputNumber-cbb0bda7.js";import"./moment-fbc5633a.js";const D=["src"],M={class:"font-bold text-2xl mt-4"},N={class:"flex justify-between"},V={class:"max-w-[75%] text-neutral-gray-2 text-sm"},W=["href"],$={class:"flex gap-5 mt-2"},O={class:"flex-center gap-2"},P={class:"font-medium text-sm"},S={class:"flex-center gap-2"},E={class:"font-medium text-sm"},L=t("div",{class:"bg-[#F2F6FE] h-[1px] w-full my-3"},null,-1),U=t("span",{class:"text-xs text-neutral-dark-gray"}," Jam & hari operasional ",-1),q={class:"flex gap-4 mb-6"},I={class:"text-sm"},J=t("span",{class:"font-medium"},"Weekdays:",-1),K={class:"text-sm"},T=t("span",{class:"font-medium"},"Weekend:",-1),Z=t("span",{class:"text-sm"},null,-1),z={key:0,class:"mt-8"},A=t("div",{class:"flex items-center justify-between mb-3"},[t("h2",{class:"font-bold text-lg"},"List Produk")],-1),G={class:"grid grid-cols-2 gap-4"},nt=f({__name:"Detail",props:["data"],setup(e){return(r,l)=>(i(),n(b,{"hide-nav":!0},{default:d(()=>[a(c(_),{title:"Detail Merchant "+e.data.name},null,8,["title"]),a(w,{backUrl:r.route("guide.merchants.index"),title:"Detail Merchant"},null,8,["backUrl"]),t("img",{src:e.data.profile_url,class:"w-full h-64 object-cover rounded-lg aspect-video"},null,8,D),t("h1",M,s(e.data.name),1),t("div",N,[t("p",V,s(e.data.full_address),1),t("div",null,[t("a",{href:"https://www.google.com/maps?q="+e.data.full_address,target:"_blank"},[a(v)],8,W)])]),t("div",$,[t("div",O,[t("div",null,[a(B)]),t("span",P,s(e.data.pic_name),1)]),t("div",S,[t("div",null,[a(j)]),t("span",E,s(e.data.whatsapp_number),1)])]),a(F,{class:"!font-semibold !text-xs md:!text-sm !px-4 !py-1 justify-center !rounded-full mt-4 !cursor-default"},{default:d(()=>[o(" Komisi: "+s(e.data.full_commission),1)]),_:1}),L,U,t("div",q,[t("span",I,[J,o(" "+s(e.data.weekday_time.start)+" - "+s(e.data.weekday_time.end),1)]),t("span",K,[T,o(" "+s(e.data.weekend_time.start)+" - "+s(e.data.weekend_time.end),1)]),Z]),a(x,{class:"!font-semibold !text-xs md:!text-sm !px-9 !py-2 justify-center !w-fit",onClick:l[0]||(l[0]=()=>c(h)("popup-booking"))},{default:d(()=>[o(" Booking ")]),_:1}),e.data.products?(i(),m("section",z,[A,t("div",G,[(i(!0),m(p,null,g(e.data.products,u=>(i(),n(C,{data:u},null,8,["data"]))),256))])])):k("",!0),a(y,{id:e.data.uuid},null,8,["id"])]),_:1}))}});export{nt as default};
