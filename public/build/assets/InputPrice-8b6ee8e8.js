import{p as m,o as r,c as l,f as u,t as o,l as s,b as i,s as d,y as h,F as b}from"./app-d72d628d.js";const x={props:["label","icon","help","error","id","class","modelValue"],emits:["update:modelValue"],computed:{value:{get(){return this.modelValue},set(e){this.$emit("update:modelValue",e)}}},methods:{formatPrice(){if(this.value){const e=this.value.replace(/[.,]/g,""),t=Number(e).toLocaleString("id-ID");if(isNaN(Number(t.replace(/[.,]/g,""))))return 0;this.value=t}},isNumber(e){var t=e.which?e.which:e.keyCode;return(t<48||t>57)&&e.preventDefault(),!0}},watch:{value(e,t){e!==t&&this.formatPrice()}}},g=["for"],p={key:0,class:"text-red"},f=["data-value"],k={key:1,class:"mb-4"},y={class:"text-[11px] text-dark float-right"},_=i("span",{"x-text":"input.length"},null,-1),v={key:2,class:"mt-[-7px] error-text mb-4 block text-[11px]"},N={key:3,class:"block mt-[-7px] text-[10px] mb-4"};function V(e,t,a,w,P,c){return r(),l(b,null,[a.label?(r(),l("label",{key:0,for:a.id,class:"text-[12px] text-dark mb-1 block"},[u(o(a.label)+" ",1),e.$attrs.required?(r(),l("span",p,"*")):s("",!0)],8,g)):s("",!0),i("div",{class:d(["relative mb-2",{"has-error":a.error}]),"x-data":"{input: $el.getAttribute('data-value')}","data-value":e.$attrs.value||""},[a.icon?(r(),l("i",{key:0,class:d([a.icon,"absolute top-[11px] right-4 text-[18px] text-dark"])},null,2)):s("",!0),i("input",h(e.$attrs,{class:[a.icon?"pe-10":"","bg-white rounded-lg placeholder:text-neutral-gray px-4 text-sm min-h-[42px] outline-none py-2 w-full mb-2 border-light-gray font-medium focus:ring-0 focus:border-light-gray disabled:bg-light-gray",a.class],"x-model":"input",onInput:t[0]||(t[0]=n=>e.$emit("update:modelValue",n.target.value)),onKeypress:t[1]||(t[1]=n=>c.isNumber(n))}),null,16),e.$attrs.maxlength?(r(),l("div",k,[i("p",y,[_,u("/"+o(e.$attrs.maxlength),1)])])):s("",!0),a.error?(r(),l("small",v,o(a.error),1)):s("",!0),a.help?(r(),l("small",N,o(a.help),1)):s("",!0)],10,f)],64)}const I=m(x,[["render",V]]);export{I};
