import{p as d,o as t,c as l,f as m,t as r,l as a,b as n,s as c,y as u,x}from"./app-c0e37fe6.js";const b={props:["label","icon","help","id","error","class"]},g=["for"],f={key:0,class:"text-red"},h={key:1,class:"mt-[-7px] error-text mb-4 block text-[11px]"},y={key:2,class:"block mt-[-7px] text-[10px] mb-4"};function k(s,o,e,_,p,S){return t(),l("span",null,[e.label?(t(),l("label",{key:0,for:e.id,class:"text-[12px] text-dark mb-1 block"},[m(r(e.label)+" ",1),s.$attrs.required?(t(),l("span",f,"*")):a("",!0)],8,g)):a("",!0),n("div",{class:c(["relative mb-2",{"has-error":e.error}])},[e.icon?(t(),l("i",{key:0,class:c([e.icon,"absolute top-[11px] left-4 text-[18px] text-[#A4A4A4]"])},null,2)):a("",!0),n("select",u(s.$attrs,{class:[e.icon?"ps-10":"","bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray disabled:bg-light-gray",e.class],onChange:o[0]||(o[0]=i=>s.$emit("update:modelValue",i.target.value))}),[x(s.$slots,"default")],16),e.error?(t(),l("small",h,r(e.error),1)):a("",!0),e.help?(t(),l("small",y,r(e.help),1)):a("",!0)],2)])}const v=d(b,[["render",k]]);export{v as S};
