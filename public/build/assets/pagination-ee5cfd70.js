import{r as s,D as x,I as y,W as u}from"./app-d72d628d.js";const R=({route:m,callback:p,query:i})=>{const c=s(!1),g=s(m),v=s(i),f=s([]),n=s({current_page:1,last_page:1,from:1,to:1,total:1,per_page:10}),a=()=>{var e=window.location.search,t={};if(e){var L=new URLSearchParams(e);for(const[l,r]of L)t[l]=r}t={...t,...v.value},Object.keys(t).length?t=`?${new URLSearchParams(t).toString()}`:t="",c.value=!0,y.get(`${g.value}${t}`).then(l=>{const r=l.data;var o=r;r.meta&&(o=r.meta),c.value=!1,f.value=r.data,n.value={current_page:o.current_page,last_page:o.last_page,from:o.from,to:o.to,total:o.total,per_page:o.per_page},p&&p(r)})},_=e=>{v.value=e,a()},d=e=>{g.value=e},h=()=>{const e=n.value.current_page+1;u({page:e}),a()},P=()=>{if(n.value.current_page>1){const e=n.value.current_page-1;u({page:e}),a()}},w=e=>{e=Number(e),e>=5&&(u({limit:e,page:1}),a())},U=e=>{e>=1&&e<=n.value.last_page&&(u({page:e}),a())};return window.addEventListener("changeUrlParameter",a),x(()=>{window.removeEventListener("changeUrlParameter",a)}),a(),{data:f,information:n,loading:c,fetchData:a,changeLimit:w,next:h,prev:P,setRoute:d,updateParam:_,goToPage:U}};export{R as u};
