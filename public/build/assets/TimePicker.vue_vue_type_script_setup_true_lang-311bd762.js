import{f as c}from"./flatpickr.min-e561b34c.js";import{d as f,r as b,C as h,j as d,c as l,f as g,t as s,l as n,b as i,y as v,s as k,o as r}from"./app-d72d628d.js";const y={key:0,class:"text-[12px] text-dark mb-1 block"},x={key:0,class:"text-red"},_=["data-value"],C=i("i",{class:"isax icon-clock absolute right-4 top-3 pointer-events-none"},null,-1),D={key:0,class:"mt-[-7px] error-text mb-4 block text-[11px]"},w=f({__name:"TimePicker",props:{name:{},default:{},label:{},error:{},min:{}},emits:["update:modelValue"],setup(m,{emit:p}){const t=m,u=p,o=b(null);return h(()=>{o.value=c(`.${t.name}`,{dateFormat:"H:i",time_24hr:!0,defaultDate:t.default,enableTime:!0,noCalendar:!0,minDate:t.min??"",onChange:(e,a)=>{u("update:modelValue",a)}}),u("update:modelValue",t.default)}),d(()=>t.min,(e,a)=>{o.value.set("minDate",t.min)}),d(()=>t.default,(e,a)=>{o.value.set("defaultDate",t.default)}),(e,a)=>(r(),l("div",null,[e.label?(r(),l("label",y,[g(s(e.label)+" "+s(e.min)+" ",1),e.$attrs.required?(r(),l("span",x,"*")):n("",!0)])):n("",!0),i("div",{class:k(["relative mb-2",{"has-error":e.error}]),"x-data":"{input: $el.getAttribute('data-value')}","data-value":e.$attrs.value||""},[i("input",v({type:"text","x-model":"input"},e.$attrs,{class:[e.name,"bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"],placeholder:"00:00"}),null,16),C,e.error?(r(),l("small",D,s(e.error),1)):n("",!0)],10,_)]))}});export{w as _};
