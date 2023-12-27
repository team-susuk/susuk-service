import{p as V,o as l,c as o,b as t,d as L,r as C,j as $,f as u,t as p,l as r,s as E,w as f,n as I,$ as j,P as M,a as B,F,a0 as Z}from"./app-5edd660c.js";const z={},H={width:"28",height:"28",viewBox:"0 0 28 28",fill:"none",xmlns:"http://www.w3.org/2000/svg"},N=t("path",{d:"M25.6667 16.2167V18.8883C25.6667 23.135 23.135 25.6667 18.8884 25.6667H9.11169C6.13669 25.6667 3.99003 24.4183 2.98669 22.2017L3.11503 22.1083L8.85503 18.2583C9.78836 17.6283 11.1067 17.6983 11.935 18.4217L12.3317 18.7483C13.2417 19.53 14.7117 19.53 15.6217 18.7483L20.475 14.5833C21.385 13.8017 22.855 13.8017 23.765 14.5833L25.6667 16.2167Z",fill:"#667687"},null,-1),P=t("path",{opacity:"0.4",d:"M24.465 9.3335H21.035C19.5534 9.3335 18.6667 8.44683 18.6667 6.96516V3.53516C18.6667 3.0685 18.76 2.67183 18.9234 2.3335C18.9117 2.3335 18.9 2.3335 18.8884 2.3335H9.11171C4.86504 2.3335 2.33337 4.86516 2.33337 9.11183V18.8885C2.33337 20.1602 2.55504 21.2685 2.98671 22.2018L3.11504 22.1085L8.85504 18.2585C9.78837 17.6285 11.1067 17.6985 11.935 18.4218L12.3317 18.7485C13.2417 19.5302 14.7117 19.5302 15.6217 18.7485L20.475 14.5835C21.385 13.8018 22.855 13.8018 23.765 14.5835L25.6667 16.2168V9.11183C25.6667 9.10016 25.6667 9.0885 25.6667 9.07683C25.3284 9.24016 24.9317 9.3335 24.465 9.3335Z",fill:"#667687"},null,-1),T=t("path",{d:"M10.5001 12.11C12.0336 12.11 13.2767 10.8668 13.2767 9.33331C13.2767 7.7998 12.0336 6.55664 10.5001 6.55664C8.96654 6.55664 7.72339 7.7998 7.72339 9.33331C7.72339 10.8668 8.96654 12.11 10.5001 12.11Z",fill:"#667687"},null,-1),G=t("path",{d:"M24.465 1.1665H21.035C19.5533 1.1665 18.6666 2.05317 18.6666 3.53484V6.96484C18.6666 8.4465 19.5533 9.33317 21.035 9.33317H24.465C25.9466 9.33317 26.8333 8.4465 26.8333 6.96484V3.53484C26.8333 2.05317 25.9466 1.1665 24.465 1.1665ZM24.7216 5.02817C24.5816 5.16817 24.395 5.23817 24.2083 5.23817C24.0216 5.23817 23.835 5.16817 23.695 5.02817L23.485 4.81817V7.4315C23.485 7.83984 23.1583 8.1665 22.75 8.1665C22.3416 8.1665 22.015 7.83984 22.015 7.4315V4.81817L21.805 5.02817C21.525 5.30817 21.0583 5.30817 20.7783 5.02817C20.4983 4.74817 20.4983 4.2815 20.7783 4.0015L22.2366 2.54317C22.295 2.48484 22.3766 2.43817 22.4583 2.40317C22.4816 2.3915 22.505 2.3915 22.5283 2.37984C22.5866 2.3565 22.645 2.34484 22.715 2.34484C22.7383 2.34484 22.7616 2.34484 22.785 2.34484C22.8666 2.34484 22.9366 2.3565 23.0183 2.3915C23.03 2.3915 23.03 2.3915 23.0416 2.3915C23.1233 2.4265 23.1933 2.47317 23.2516 2.5315C23.2633 2.54317 23.2633 2.54317 23.275 2.54317L24.7333 4.0015C25.0133 4.2815 25.0133 4.74817 24.7216 5.02817Z",fill:"#667687"},null,-1),S=[N,P,T,G];function U(g,h){return l(),o("svg",H,S)}const O=V(z,[["render",U]]),R=["for"],q={key:0,class:"text-red"},A={class:"relative mb-2"},J=["onDragover","onDragenter","onDragleave","onDrop","for"],K=["src"],Q={class:"flex-center flex-col z-[2] relative w-full h-full"},W=["for"],X=t("span",{class:"font-semibold"},"Drag",-1),Y=t("span",{class:"font-semibold"},"klik",-1),ee=["id"],te={key:0,class:"mb-4"},ae={class:"text-[11px] text-dark float-right"},le=t("span",{"x-text":"input.length"},null,-1),oe={key:1,class:"mt-[-7px] error-text mb-4 block text-[11px]"},se={key:2,class:"block mt-[-7px] text-[10px] mb-4"},ne=L({__name:"DropZoneImage",props:{id:{},label:{},name:{},error:{},help:{},modelValue:{},defaultImage:{}},emits:["update:modelValue"],setup(g,{emit:h}){const d=h,c=g,a=C(void 0),s=C(!1);let n=0;const _=e=>{e.preventDefault(),s.value=!0,e.dataTransfer.dropEffect="copy"},b=e=>{n++,n>0&&(s.value=!0)},x=()=>{n--,n<=0&&(s.value=!1)},y=e=>{if(n=0,s.value=!1,e.dataTransfer&&e.dataTransfer.files){const i=e.dataTransfer.files[0];i&&(a.value=i,d("update:modelValue",i))}},k=e=>{const m=e.target.files;m&&m.length>0&&(a.value=m[0],w())},w=()=>{a.value?d("update:modelValue",a.value):(document.getElementById(c.id).value="",d("update:modelValue",null))},v=()=>{a.value&&(["image/png","image/jpeg","image/jpg"].includes(a.value.type)||(document.getElementById(c.id).value="",a.value=void 0,d("update:modelValue",null),Z("Invalid image format. Please upload a PNG or JPEG image.","error")))},D=()=>a.value?URL.createObjectURL(a.value):c.defaultImage?c.defaultImage:"";return $(a,v),v(),(e,i)=>(l(),o(F,null,[e.label?(l(),o("label",{key:0,for:e.id,class:"text-[12px] text-dark mb-1 block"},[u(p(e.label)+" ",1),e.$attrs.required?(l(),o("span",q,"*")):r("",!0)],8,R)):r("",!0),t("div",A,[t("label",{class:E(["bg-white rounded-lg w-full mb-2 border border-light-gray h-[150px] flex-center cursor-pointer relative flex-col overflow-hidden",{"bg-gray-200":s.value}]),onDragover:f(_,["prevent"]),onDragenter:f(b,["prevent"]),onDragleave:f(x,["prevent"]),onDrop:f(y,["prevent"]),for:e.id},[a.value||e.defaultImage?(l(),o("img",{key:0,src:D(),alt:"",class:"w-full object-cover absolute inset-0 opacity-50 m-auto"},null,8,K)):r("",!0),t("div",Q,[I(t("div",{class:"absolute inset-0 rounded-lg flex-center text-white text-3xl font-semibold",style:M({background:"rgba(0, 0, 0, 0.3)",opacity:s.value?1:0,transition:"opacity 0.3s"})}," Place here ",4),[[j,s.value]]),B(O,{class:"mb-2"}),t("label",{for:e.id,class:"text-neutral-dark-gray text-sm"},[X,u(" file atau "),Y,u(" untuk upload image")],8,W),t("input",{id:e.id,ref:"input",class:"drop-zone-file",type:"file",onChange:k,accept:"image/x-png,image/jpeg,image/jpg",hidden:""},null,40,ee)])],42,J),e.$attrs.maxlength?(l(),o("div",te,[t("p",ae,[le,u("/"+p(e.$attrs.maxlength),1)])])):r("",!0),e.error?(l(),o("small",oe,p(e.error),1)):r("",!0),e.help?(l(),o("small",se,p(e.help),1)):r("",!0)])],64))}});export{ne as _};