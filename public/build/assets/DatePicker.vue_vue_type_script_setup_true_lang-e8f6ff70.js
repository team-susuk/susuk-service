import{f as c}from"./flatpickr.min-e561b34c.js";import{d as f,r as h,C as b,j as m,c as l,f as y,t as i,l as o,b as n,y as g,s as v,o as r}from"./app-1a8e93b6.js";const x={key:0,class:"text-[12px] text-dark mb-1 block"},k={key:0,class:"text-red"},D=["data-value"],_=n("i",{class:"isax icon-calendar-2 absolute right-4 top-3 pointer-events-none"},null,-1),V={key:0,class:"mt-[-7px] error-text mb-4 block text-[11px]"},w=f({__name:"DatePicker",props:{name:{},default:{},label:{},error:{},min:{},maxDate:{}},emits:["update:modelValue"],setup(u,{emit:p}){const t=u,d=p,s=h(null);return b(()=>{s.value=c(`.${t.name}`,{dateFormat:"Y-m-d",time_24hr:!0,maxDate:t.maxDate??"",minDate:t.min??"",defaultDate:t.default,onChange:(e,a)=>{d("update:modelValue",a)}}),d("update:modelValue",t.default)}),m(()=>t.min,(e,a)=>{s.value.set("minDate",t.min)}),m(()=>t.default,(e,a)=>{s.value.set("defaultDate",t.default)}),(e,a)=>(r(),l("div",null,[e.label?(r(),l("label",x,[y(i(e.label)+" ",1),e.$attrs.required?(r(),l("span",k,"*")):o("",!0)])):o("",!0),n("div",{class:v(["relative mb-2",{"has-error":e.error}]),"x-data":"{input: $el.getAttribute('data-value')}","data-value":e.$attrs.value||""},[n("input",g({type:"text","x-model":"input"},e.$attrs,{class:[e.name,"bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"],placeholder:"yyyy-mm-dd"}),null,16),_,e.error?(r(),l("small",V,i(e.error),1)):o("",!0)],10,D)]))}});export{w as _};
