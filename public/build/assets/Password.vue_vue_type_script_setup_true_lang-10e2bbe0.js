import{d as u,r as d,c as t,b as a,f as m,t as n,l,s as p,y as c,F as b,o as s}from"./app-c0e37fe6.js";const f=["for"],h={key:0,class:"text-red"},x=["type"],y={key:1,class:"mt-[-7px] error-text mb-4 block text-[11px]"},g={key:2,class:"block mt-[-7px] text-[10px] mb-2"},w=u({__name:"Password",props:{label:{},icon:{},help:{},error:{},id:{}},setup(k){const o=d(!1);return(e,r)=>(s(),t(b,null,[a("label",{for:e.id,class:"text-[12px] text-dark mb-1 block"},[m(n(e.label)+" ",1),e.$attrs.required?(s(),t("span",h,"*")):l("",!0)],8,f),a("div",{class:p(["relative mb-2",e.error?"has-error":""]),"x-data":"{ show: false }"},[e.icon?(s(),t("i",{key:0,class:p([e.icon,"absolute top-[11px] left-4 text-[18px] text-dark"])},null,2)):l("",!0),a("input",c({type:o.value?"text":"password"},e.$attrs,{class:[e.icon?"ps-12":"","bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"],onInput:r[0]||(r[0]=i=>e.$emit("update:modelValue",i.target.value)),autocomplete:"off"}),null,16,x),a("i",{class:p(["isax absolute cursor-pointer top-[14px] right-4 text-[14px]",o.value?"icon-eye-slash":"icon-eye"]),onClick:r[1]||(r[1]=i=>o.value=!o.value)},null,2),e.error?(s(),t("small",y,n(e.error),1)):l("",!0),e.help?(s(),t("small",g,n(e.help),1)):l("",!0)],2)],64))}});export{w as _};
