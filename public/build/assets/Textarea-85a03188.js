import{p as u,c as a,f as r,t as i,l,b as n,s as c,y as m,F as p,o as s}from"./app-9e983d03.js";const x={props:["label","icon","help","id"]},g=["for"],b={key:0,class:"text-red"},h=["data-value"],f={key:1,class:"mb-4"},_={class:"text-[11px] text-dark"},y=n("span",{"x-text":"input.length",class:"input-length"},null,-1);function k(e,o,t,v,$,V){return s(),a(p,null,[t.label?(s(),a("label",{key:0,for:t.id,class:"text-[12px] text-dark mb-1 block"},[r(i(t.label)+" ",1),e.$attrs.required?(s(),a("span",b,"*")):l("",!0)],8,g)):l("",!0),n("div",{class:"relative mb-2","x-data":"{input: $el.getAttribute('data-value')}","data-value":e.$attrs.value||""},[t.icon?(s(),a("i",{key:0,class:c([t.icon,"absolute top-[13px] left-4 text-[16px]"])},null,2)):l("",!0),n("textarea",m({"x-model":"input"},e.$attrs,{class:[t.icon?"ps-10":"","bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray"],onInput:o[0]||(o[0]=d=>e.$emit("update:modelValue",d.target.value))}),`
        `,16),e.$attrs.maxlength?(s(),a("div",f,[n("p",_,[y,r("/"+i(e.$attrs.maxlength),1)])])):l("",!0)],8,h)],64)}const N=u(x,[["render",k]]);export{N as T};
