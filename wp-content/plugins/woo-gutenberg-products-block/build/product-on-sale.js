this.wc=this.wc||{},this.wc.blocks=this.wc.blocks||{},this.wc.blocks["product-on-sale"]=function(e){function t(t){for(var r,l,a=t[0],i=t[1],s=t[2],b=0,d=[];b<a.length;b++)l=a[b],Object.prototype.hasOwnProperty.call(n,l)&&n[l]&&d.push(n[l][0]),n[l]=0;for(r in i)Object.prototype.hasOwnProperty.call(i,r)&&(e[r]=i[r]);for(u&&u(t);d.length;)d.shift()();return o.push.apply(o,s||[]),c()}function c(){for(var e,t=0;t<o.length;t++){for(var c=o[t],r=!0,a=1;a<c.length;a++){var i=c[a];0!==n[i]&&(r=!1)}r&&(o.splice(t--,1),e=l(l.s=c[0]))}return e}var r={},n={34:0},o=[];function l(t){if(r[t])return r[t].exports;var c=r[t]={i:t,l:!1,exports:{}};return e[t].call(c.exports,c,c.exports,l),c.l=!0,c.exports}l.m=e,l.c=r,l.d=function(e,t,c){l.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:c})},l.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,t){if(1&t&&(e=l(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var c=Object.create(null);if(l.r(c),Object.defineProperty(c,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)l.d(c,r,function(t){return e[t]}.bind(null,r));return c},l.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return l.d(t,"a",t),t},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},l.p="";var a=window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[],i=a.push.bind(a);a.push=t,a=a.slice();for(var s=0;s<a.length;s++)t(a[s]);var u=i;return o.push([529,0]),c()}({0:function(e,t){e.exports=window.wp.element},1:function(e,t){e.exports=window.wp.i18n},10:function(e,t){e.exports=window.wp.htmlEntities},102:function(e,t,c){"use strict";c.d(t,"a",(function(){return f}));var r=c(0),n=c(1),o=c(2),l=c(70),a=c(614),i=c(4),s=c.n(i),u=c(11),b=c(16),d=c(35),m=c(613),g=c(10);c(55);const h=({id:e,label:t,popoverContents:c,remove:a,screenReaderLabel:i,className:b=""})=>{const[d,p]=Object(r.useState)(!1),E=Object(u.useInstanceId)(h);if(i=i||t,!t)return null;t=Object(g.decodeEntities)(t);const O=s()("woocommerce-tag",b,{"has-remove":!!a}),j=`woocommerce-tag__label-${E}`,w=Object(r.createElement)(r.Fragment,null,Object(r.createElement)("span",{className:"screen-reader-text"},i),Object(r.createElement)("span",{"aria-hidden":"true"},t));return Object(r.createElement)("span",{className:O},c?Object(r.createElement)(o.Button,{className:"woocommerce-tag__text",id:j,onClick:()=>p(!0)},w):Object(r.createElement)("span",{className:"woocommerce-tag__text",id:j},w),c&&d&&Object(r.createElement)(o.Popover,{onClose:()=>p(!1)},c),a&&Object(r.createElement)(o.Button,{className:"woocommerce-tag__remove",onClick:a(e),label:Object(n.sprintf)(
// Translators: %s label.
Object(n.__)("Remove %s","woo-gutenberg-products-block"),t),"aria-describedby":j},Object(r.createElement)(l.a,{icon:m.a,size:20,className:"clear-icon"})))};var p=h;c(54);const E=e=>Object(r.createElement)(d.b,{...e}),O=e=>{const{list:t,selected:c,renderItem:n,depth:o=0,onSelect:l,instanceId:a,isSingle:i,search:s,useExpandedPanelId:u}=e,[b]=u;return t?Object(r.createElement)(r.Fragment,null,t.map((t=>{var d,m;const g=null!==(d=t.children)&&void 0!==d&&d.length&&!i?t.children.every((({id:e})=>c.find((t=>t.id===e)))):!!c.find((({id:e})=>e===t.id)),h=(null===(m=t.children)||void 0===m?void 0:m.length)&&b===t.id;return Object(r.createElement)(r.Fragment,{key:t.id},Object(r.createElement)("li",null,n({item:t,isSelected:g,onSelect:l,isSingle:i,selected:c,search:s,depth:o,useExpandedPanelId:u,controlId:a})),h?Object(r.createElement)(O,{...e,list:t.children,depth:o+1}):null)}))):null},j=({isLoading:e,isSingle:t,selected:c,messages:l,onChange:a,onRemove:i})=>{if(e||t||!c)return null;const s=c.length;return Object(r.createElement)("div",{className:"woocommerce-search-list__selected"},Object(r.createElement)("div",{className:"woocommerce-search-list__selected-header"},Object(r.createElement)("strong",null,l.selected(s)),s>0?Object(r.createElement)(o.Button,{isLink:!0,isDestructive:!0,onClick:()=>a([]),"aria-label":l.clear},Object(n.__)("Clear all","woo-gutenberg-products-block")):null),s>0?Object(r.createElement)("ul",null,c.map(((e,t)=>Object(r.createElement)("li",{key:t},Object(r.createElement)(p,{label:e.name,id:e.id,remove:i}))))):null)},w=({filteredList:e,search:t,onSelect:c,instanceId:o,useExpandedPanelId:i,...s})=>{const{messages:u,renderItem:b,selected:d,isSingle:m}=s,g=b||E;return 0===e.length?Object(r.createElement)("div",{className:"woocommerce-search-list__list is-not-found"},Object(r.createElement)("span",{className:"woocommerce-search-list__not-found-icon"},Object(r.createElement)(l.a,{icon:a.a})),Object(r.createElement)("span",{className:"woocommerce-search-list__not-found-text"},t?Object(n.sprintf)(u.noResults,t):u.noItems)):Object(r.createElement)("ul",{className:"woocommerce-search-list__list"},Object(r.createElement)(O,{useExpandedPanelId:i,list:e,selected:d,renderItem:g,onSelect:c,instanceId:o,isSingle:m,search:t}))},f=e=>{const{className:t="",isCompact:c,isHierarchical:l,isLoading:a,isSingle:i,list:d,messages:m=b.a,onChange:g,onSearch:h,selected:p,type:E="text",debouncedSpeak:O}=e,[_,y]=Object(r.useState)(""),x=Object(r.useState)(-1),k=Object(u.useInstanceId)(f),v=Object(r.useMemo)((()=>({...b.a,...m})),[m]),S=Object(r.useMemo)((()=>Object(b.c)(d,_,l)),[d,_,l]);Object(r.useEffect)((()=>{O&&O(v.updated)}),[O,v]),Object(r.useEffect)((()=>{"function"==typeof h&&h(_)}),[_,h]);const C=Object(r.useCallback)((e=>()=>{i&&g([]);const t=p.findIndex((({id:t})=>t===e));g([...p.slice(0,t),...p.slice(t+1)])}),[i,p,g]),P=Object(r.useCallback)((e=>()=>{Array.isArray(e)?g(e):-1===p.findIndex((({id:t})=>t===e.id))?g(i?[e]:[...p,e]):C(e.id)()}),[i,C,g,p]),N=Object(r.useCallback)((e=>{const[t]=p.filter((t=>!e.find((e=>t.id===e.id))));C(t.id)()}),[C,p]);return Object(r.createElement)("div",{className:s()("woocommerce-search-list",t,{"is-compact":c,"is-loading":a,"is-token":"token"===E})},"text"===E&&Object(r.createElement)(j,{...e,onRemove:C,messages:v}),Object(r.createElement)("div",{className:"woocommerce-search-list__search"},"text"===E?Object(r.createElement)(o.TextControl,{label:v.search,type:"search",value:_,onChange:e=>y(e)}):Object(r.createElement)(o.FormTokenField,{disabled:a,label:v.search,onChange:N,onInputChange:e=>y(e),suggestions:[],__experimentalValidateInput:()=>!1,value:a?[Object(n.__)("Loading…","woo-gutenberg-products-block")]:p.map((e=>({...e,value:e.name}))),__experimentalShowHowTo:!1})),a?Object(r.createElement)("div",{className:"woocommerce-search-list__list"},Object(r.createElement)(o.Spinner,null)):Object(r.createElement)(w,{...e,search:_,filteredList:S,messages:v,onSelect:P,instanceId:k,useExpandedPanelId:x}))};Object(o.withSpokenMessages)(f)},106:function(e,t){},11:function(e,t){e.exports=window.wp.compose},115:function(e,t,c){"use strict";var r=c(0),n=c(1),o=c(2);t.a=({value:e,setAttributes:t})=>Object(r.createElement)(o.SelectControl,{label:Object(n.__)("Order products by","woo-gutenberg-products-block"),value:e,options:[{label:Object(n.__)("Newness - newest first","woo-gutenberg-products-block"),value:"date"},{label:Object(n.__)("Price - low to high","woo-gutenberg-products-block"),value:"price_asc"},{label:Object(n.__)("Price - high to low","woo-gutenberg-products-block"),value:"price_desc"},{label:Object(n.__)("Rating - highest first","woo-gutenberg-products-block"),value:"rating"},{label:Object(n.__)("Sales - most first","woo-gutenberg-products-block"),value:"popularity"},{label:Object(n.__)("Title - alphabetical","woo-gutenberg-products-block"),value:"title"},{label:Object(n.__)("Menu Order","woo-gutenberg-products-block"),value:"menu_order"}],onChange:e=>t({orderby:e})})},14:function(e,t){e.exports=window.wp.apiFetch},15:function(e,t){e.exports=window.wp.url},16:function(e,t,c){"use strict";c.d(t,"a",(function(){return l})),c.d(t,"c",(function(){return i})),c.d(t,"d",(function(){return s})),c.d(t,"b",(function(){return u}));var r=c(0),n=c(1),o=c(57);const l={clear:Object(n.__)("Clear all selected items","woo-gutenberg-products-block"),noItems:Object(n.__)("No items found.","woo-gutenberg-products-block"),
/* Translators: %s search term */
noResults:Object(n.__)("No results for %s","woo-gutenberg-products-block"),search:Object(n.__)("Search for items","woo-gutenberg-products-block"),selected:e=>Object(n.sprintf)(/* translators: Number of items selected from list. */
Object(n._n)("%d item selected","%d items selected",e,"woo-gutenberg-products-block"),e),updated:Object(n.__)("Search results updated.","woo-gutenberg-products-block")},a=(e,t=e)=>{const c=e.reduce(((e,t)=>{const c=t.parent||0;return e[c]||(e[c]=[]),e[c].push(t),e}),{}),r=Object(o.a)(t,"id"),n=["0"],l=(e={})=>e.parent?[...l(r[e.parent]),e.name]:e.name?[e.name]:[],a=e=>e.map((e=>{const t=c[e.id];return n.push(""+e.id),{...e,breadcrumbs:l(r[e.parent]),children:t&&t.length?a(t):[]}})),i=a(c[0]||[]);return Object.entries(c).forEach((([e,t])=>{n.includes(e)||i.push(...a(t||[]))})),i},i=(e,t,c)=>{if(!t)return c?a(e):e;const r=new RegExp(t.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&"),"i"),n=e.map((e=>!!r.test(e.name)&&e)).filter(Boolean);return c?a(n,e):n},s=(e,t)=>{if(!t)return e;const c=new RegExp(`(${t.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&")})`,"ig");return e.split(c).map(((e,t)=>c.test(e)?Object(r.createElement)("strong",{key:t},e):Object(r.createElement)(r.Fragment,{key:t},e)))},u=e=>1===e.length?e.slice(0,1).toString():2===e.length?e.slice(0,1).toString()+" › "+e.slice(-1).toString():e.slice(0,1).toString()+" … "+e.slice(-1).toString()},167:function(e,t,c){"use strict";c.d(t,"a",(function(){return n}));var r=c(0);const n=Object(r.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 230 250",style:{width:"100%"}},Object(r.createElement)("title",null,"Grid Block Preview"),Object(r.createElement)("rect",{width:"65.374",height:"65.374",x:".162",y:".779",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"47.266",height:"5.148",x:"9.216",y:"76.153",fill:"#E1E3E6",rx:"2.574"}),Object(r.createElement)("rect",{width:"62.8",height:"15",x:"1.565",y:"101.448",fill:"#E1E3E6",rx:"5"}),Object(r.createElement)("rect",{width:"65.374",height:"65.374",x:".162",y:"136.277",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"47.266",height:"5.148",x:"9.216",y:"211.651",fill:"#E1E3E6",rx:"2.574"}),Object(r.createElement)("rect",{width:"62.8",height:"15",x:"1.565",y:"236.946",fill:"#E1E3E6",rx:"5"}),Object(r.createElement)("rect",{width:"65.374",height:"65.374",x:"82.478",y:".779",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"47.266",height:"5.148",x:"91.532",y:"76.153",fill:"#E1E3E6",rx:"2.574"}),Object(r.createElement)("rect",{width:"62.8",height:"15",x:"83.882",y:"101.448",fill:"#E1E3E6",rx:"5"}),Object(r.createElement)("rect",{width:"65.374",height:"65.374",x:"82.478",y:"136.277",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"47.266",height:"5.148",x:"91.532",y:"211.651",fill:"#E1E3E6",rx:"2.574"}),Object(r.createElement)("rect",{width:"62.8",height:"15",x:"83.882",y:"236.946",fill:"#E1E3E6",rx:"5"}),Object(r.createElement)("rect",{width:"65.374",height:"65.374",x:"164.788",y:".779",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"47.266",height:"5.148",x:"173.843",y:"76.153",fill:"#E1E3E6",rx:"2.574"}),Object(r.createElement)("rect",{width:"62.8",height:"15",x:"166.192",y:"101.448",fill:"#E1E3E6",rx:"5"}),Object(r.createElement)("rect",{width:"65.374",height:"65.374",x:"164.788",y:"136.277",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"47.266",height:"5.148",x:"173.843",y:"211.651",fill:"#E1E3E6",rx:"2.574"}),Object(r.createElement)("rect",{width:"62.8",height:"15",x:"166.192",y:"236.946",fill:"#E1E3E6",rx:"5"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"13.283",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"21.498",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"29.713",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"37.927",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"46.238",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"95.599",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"103.814",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"112.029",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"120.243",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"128.554",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"177.909",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"186.124",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"194.339",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"202.553",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"210.864",y:"86.301",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"13.283",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"21.498",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"29.713",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"37.927",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"46.238",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"95.599",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"103.814",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"112.029",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"120.243",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"128.554",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"177.909",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"186.124",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"194.339",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"202.553",y:"221.798",fill:"#E1E3E6",rx:"3"}),Object(r.createElement)("rect",{width:"6.177",height:"6.177",x:"210.864",y:"221.798",fill:"#E1E3E6",rx:"3"}))},17:function(e,t,c){"use strict";c.d(t,"p",(function(){return o})),c.d(t,"n",(function(){return l})),c.d(t,"m",(function(){return a})),c.d(t,"o",(function(){return i})),c.d(t,"k",(function(){return s})),c.d(t,"e",(function(){return u})),c.d(t,"h",(function(){return b})),c.d(t,"l",(function(){return d})),c.d(t,"c",(function(){return m})),c.d(t,"d",(function(){return g})),c.d(t,"g",(function(){return h})),c.d(t,"a",(function(){return O})),c.d(t,"b",(function(){return j})),c.d(t,"i",(function(){return w})),c.d(t,"j",(function(){return f})),c.d(t,"f",(function(){return _}));var r,n=c(3);const o=Object(n.getSetting)("wcBlocksConfig",{buildPhase:1,pluginUrl:"",productCount:0,defaultAvatar:"",restApiRoutes:{},wordCountType:"words"}),l=o.pluginUrl+"images/",a=o.pluginUrl+"build/",i=o.buildPhase,s=null===(r=n.STORE_PAGES.shop)||void 0===r?void 0:r.permalink,u=n.STORE_PAGES.checkout.id,b=(n.STORE_PAGES.checkout.permalink,n.STORE_PAGES.privacy.permalink),d=(n.STORE_PAGES.privacy.title,n.STORE_PAGES.terms.permalink),m=(n.STORE_PAGES.terms.title,n.STORE_PAGES.cart.id),g=n.STORE_PAGES.cart.permalink,h=(n.STORE_PAGES.myaccount.permalink?n.STORE_PAGES.myaccount.permalink:Object(n.getSetting)("wpLoginUrl","/wp-login.php"),Object(n.getSetting)("localPickupEnabled",!1)),p=Object(n.getSetting)("countries",{}),E=Object(n.getSetting)("countryData",{}),O=Object.fromEntries(Object.keys(E).filter((e=>!0===E[e].allowBilling)).map((e=>[e,p[e]||""]))),j=Object.fromEntries(Object.keys(E).filter((e=>!0===E[e].allowBilling)).map((e=>[e,E[e].states||[]]))),w=Object.fromEntries(Object.keys(E).filter((e=>!0===E[e].allowShipping)).map((e=>[e,p[e]||""]))),f=Object.fromEntries(Object.keys(E).filter((e=>!0===E[e].allowShipping)).map((e=>[e,E[e].states||[]]))),_=Object.fromEntries(Object.keys(E).map((e=>[e,E[e].locale||[]])))},2:function(e,t){e.exports=window.wp.components},23:function(e,t,c){"use strict";c.d(t,"h",(function(){return s})),c.d(t,"e",(function(){return u})),c.d(t,"b",(function(){return b})),c.d(t,"i",(function(){return d})),c.d(t,"f",(function(){return m})),c.d(t,"c",(function(){return g})),c.d(t,"d",(function(){return h})),c.d(t,"g",(function(){return p})),c.d(t,"a",(function(){return E}));var r=c(15),n=c(14),o=c.n(n),l=c(3),a=c(17);const i=(e,t)=>{const c=new Map;return e.filter((e=>{const r=t(e);return!c.has(r)&&(c.set(r,e),!0)}))},s=({selected:e=[],search:t="",queryArgs:c={}})=>{const n=(({selected:e=[],search:t="",queryArgs:c={}})=>{const n=a.p.productCount>100,o={per_page:n?100:0,catalog_visibility:"any",search:t,orderby:"title",order:"asc"},l=[Object(r.addQueryArgs)("/wc/store/v1/products",{...o,...c})];return n&&e.length&&l.push(Object(r.addQueryArgs)("/wc/store/v1/products",{catalog_visibility:"any",include:e,per_page:0})),l})({selected:e,search:t,queryArgs:c});return Promise.all(n.map((e=>o()({path:e})))).then((e=>{const t=e.flat();return i(t,(e=>e.id)).map((e=>({...e,parent:0})))})).catch((e=>{throw e}))},u=e=>o()({path:`/wc/store/v1/products/${e}`}),b=()=>o()({path:"wc/store/v1/products/attributes"}),d=e=>o()({path:`wc/store/v1/products/attributes/${e}/terms`}),m=({selected:e=[],search:t})=>{const c=(({selected:e=[],search:t})=>{const c=Object(l.getSetting)("limitTags",!1),n=[Object(r.addQueryArgs)("wc/store/v1/products/tags",{per_page:c?100:0,orderby:c?"count":"name",order:c?"desc":"asc",search:t})];return c&&e.length&&n.push(Object(r.addQueryArgs)("wc/store/v1/products/tags",{include:e})),n})({selected:e,search:t});return Promise.all(c.map((e=>o()({path:e})))).then((e=>{const t=e.flat();return i(t,(e=>e.id))}))},g=e=>o()({path:Object(r.addQueryArgs)("wc/store/v1/products/categories",{per_page:0,...e})}),h=e=>o()({path:`wc/store/v1/products/categories/${e}`}),p=e=>o()({path:Object(r.addQueryArgs)("wc/store/v1/products",{per_page:0,type:"variation",parent:e})}),E=(e,t)=>{if(!e.title.raw)return e.slug;const c=1===t.filter((t=>t.title.raw===e.title.raw)).length;return e.title.raw+(c?"":` - ${e.slug}`)}},28:function(e,t,c){"use strict";c.d(t,"a",(function(){return r}));const r=async e=>{if("function"==typeof e.json)try{const t=await e.json();return{message:t.message,type:t.type||"api"}}catch(e){return{message:e.message,type:"general"}}return{message:e.message,type:e.type||"general"}}},3:function(e,t){e.exports=window.wc.wcSettings},31:function(e,t){e.exports=window.wp.escapeHtml},34:function(e,t,c){"use strict";var r=c(0),n=c(1),o=c(31);t.a=({error:e})=>Object(r.createElement)("div",{className:"wc-block-error-message"},(({message:e,type:t})=>e?"general"===t?Object(r.createElement)("span",null,Object(n.__)("The following error was returned","woo-gutenberg-products-block"),Object(r.createElement)("br",null),Object(r.createElement)("code",null,Object(o.escapeHTML)(e))):"api"===t?Object(r.createElement)("span",null,Object(n.__)("The following error was returned from the API","woo-gutenberg-products-block"),Object(r.createElement)("br",null),Object(r.createElement)("code",null,Object(o.escapeHTML)(e))):e:Object(n.__)("An error has prevented the block from being updated.","woo-gutenberg-products-block"))(e))},35:function(e,t,c){"use strict";c.d(t,"a",(function(){return d}));var r=c(0),n=c(4),o=c.n(n),l=c(2);function a(e,t,c){const r=new Set(t.map((e=>e[c])));return e.filter((e=>!r.has(e[c])))}var i=c(10),s=c(16);const u=({label:e})=>Object(r.createElement)("span",{className:"woocommerce-search-list__item-count"},e),b=e=>{const{item:t,search:c}=e,n=t.breadcrumbs&&t.breadcrumbs.length;return Object(r.createElement)("span",{className:"woocommerce-search-list__item-label"},n?Object(r.createElement)("span",{className:"woocommerce-search-list__item-prefix"},Object(s.b)(t.breadcrumbs)):null,Object(r.createElement)("span",{className:"woocommerce-search-list__item-name"},Object(s.d)(Object(i.decodeEntities)(t.name),c)))},d=({countLabel:e,className:t,depth:c=0,controlId:n="",item:d,isSelected:m,isSingle:g,onSelect:h,search:p="",selected:E,useExpandedPanelId:O,...j})=>{var w,f;const[_,y]=O,x=null!=e&&void 0!==d.count&&null!==d.count,k=!(null===(w=d.breadcrumbs)||void 0===w||!w.length),v=!(null===(f=d.children)||void 0===f||!f.length),S=_===d.id,C=o()(["woocommerce-search-list__item",`depth-${c}`,t],{"has-breadcrumbs":k,"has-children":v,"has-count":x,"is-expanded":S,"is-radio-button":g}),P=j.name||`search-list-item-${n}`,N=`${P}-${d.id}`,A=Object(r.useCallback)((()=>{y(S?-1:Number(d.id))}),[S,d.id,y]);return v?Object(r.createElement)("div",{className:C,onClick:A,onKeyDown:e=>"Enter"===e.key||" "===e.key?A():null,role:"treeitem",tabIndex:0},g?Object(r.createElement)(r.Fragment,null,Object(r.createElement)("input",{type:"radio",id:N,name:P,value:d.value,onChange:h(d),onClick:e=>e.stopPropagation(),checked:m,className:"woocommerce-search-list__item-input",...j}),Object(r.createElement)(b,{item:d,search:p}),x?Object(r.createElement)(u,{label:e||d.count}):null):Object(r.createElement)(r.Fragment,null,Object(r.createElement)(l.CheckboxControl,{className:"woocommerce-search-list__item-input",checked:m,...!m&&d.children.some((e=>E.find((t=>t.id===e.id))))?{indeterminate:!0}:{},label:Object(s.d)(Object(i.decodeEntities)(d.name),p),onChange:()=>{m?h(a(E,d.children,"id"))():h(function(e,t,c){const r=a(t,e,"id");return[...e,...r]}(E,d.children))()},onClick:e=>e.stopPropagation()}),x?Object(r.createElement)(u,{label:e||d.count}):null)):Object(r.createElement)("label",{htmlFor:N,className:C},g?Object(r.createElement)(r.Fragment,null,Object(r.createElement)("input",{type:"radio",id:N,name:P,value:d.value,onChange:h(d),checked:m,className:"woocommerce-search-list__item-input",...j}),Object(r.createElement)(b,{item:d,search:p})):Object(r.createElement)(l.CheckboxControl,{id:N,name:P,className:"woocommerce-search-list__item-input",value:Object(i.decodeEntities)(d.value),label:Object(s.d)(Object(i.decodeEntities)(d.name),p),onChange:h(d),checked:m,...j}),x?Object(r.createElement)(u,{label:e||d.count}):null)};t.b=d},5:function(e,t){e.exports=window.wp.blockEditor},529:function(e,t,c){e.exports=c(589)},530:function(e,t){},54:function(e,t){},55:function(e,t){},57:function(e,t,c){"use strict";c.d(t,"a",(function(){return r}));const r=(e,t)=>e.reduce(((e,c)=>(e[String(t?c[t]:c)]=c,e)),{})},589:function(e,t,c){"use strict";c.r(t);var r=c(0),n=c(1),o=c(7),l=c(70),a=c(621),i=c(2),s=c(64),u=c.n(s),b=c(167),d=c(5),m=c(75),g=c(74),h=c(65),p=c(115),E=c(96),O=c(3);const j=e=>{const{attributes:t,setAttributes:c}=e,{categories:o,catOperator:l,columns:a,contentVisibility:s,rows:u,orderby:b,alignButtons:j,stockStatus:w}=t;return Object(r.createElement)(d.InspectorControls,{key:"inspector"},Object(r.createElement)(i.PanelBody,{title:Object(n.__)("Layout","woo-gutenberg-products-block"),initialOpen:!0},Object(r.createElement)(g.a,{columns:a,rows:u,alignButtons:j,setAttributes:c,minColumns:Object(O.getSetting)("minColumns",1),maxColumns:Object(O.getSetting)("maxColumns",6),minRows:Object(O.getSetting)("minRows",1),maxRows:Object(O.getSetting)("maxRows",6)})),Object(r.createElement)(i.PanelBody,{title:Object(n.__)("Content","woo-gutenberg-products-block"),initialOpen:!0},Object(r.createElement)(m.a,{settings:s,onChange:e=>c({contentVisibility:e})})),Object(r.createElement)(i.PanelBody,{title:Object(n.__)("Order By","woo-gutenberg-products-block"),initialOpen:!1},Object(r.createElement)(p.a,{setAttributes:c,value:b})),Object(r.createElement)(i.PanelBody,{title:Object(n.__)("Filter by Product Category","woo-gutenberg-products-block"),initialOpen:!1},Object(r.createElement)(h.a,{selected:o,onChange:(e=[])=>{const t=e.map((({id:e})=>e));c({categories:t})},operator:l,onOperatorChange:(e="any")=>c({catOperator:e})})),Object(r.createElement)(i.PanelBody,{title:Object(n.__)("Filter by stock status","woo-gutenberg-products-block"),initialOpen:!1},Object(r.createElement)(E.a,{setAttributes:c,value:w})))},w=()=>Object(r.createElement)(i.Placeholder,{icon:Object(r.createElement)(l.a,{icon:a.a}),label:Object(n.__)("On Sale Products","woo-gutenberg-products-block"),className:"wc-block-product-on-sale"},Object(n.__)("This block shows on-sale products. There are currently no discounted products in your store.","woo-gutenberg-products-block"));var f=e=>{const{attributes:t,setAttributes:c,name:n}=e;return t.isPreview?b.a:Object(r.createElement)(r.Fragment,null,Object(r.createElement)(j,{attributes:t,setAttributes:c}),Object(r.createElement)(i.Disabled,null,Object(r.createElement)(u.a,{block:n,attributes:t,EmptyResponsePlaceholder:w})))},_=(c(530),c(90));Object(o.registerBlockType)("woocommerce/product-on-sale",{title:Object(n.__)("On Sale Products","woo-gutenberg-products-block"),icon:{src:Object(r.createElement)(l.a,{icon:a.a,className:"wc-block-editor-components-block-icon"})},category:"woocommerce",keywords:[Object(n.__)("WooCommerce","woo-gutenberg-products-block")],description:Object(n.__)("Display a grid of products currently on sale.","woo-gutenberg-products-block"),supports:{align:["wide","full"],html:!1},attributes:{..._.a,orderby:{type:"string",default:"date"}},transforms:{from:[{type:"block",blocks:_.b.filter((e=>"woocommerce/product-on-sale"!==e)),transform:e=>Object(o.createBlock)("woocommerce/product-on-sale",e)}]},edit:e=>Object(r.createElement)(f,{...e}),save:()=>null})},64:function(e,t){e.exports=window.wp.serverSideRender},65:function(e,t,c){"use strict";var r=c(0),n=c(1),o=c(35),l=c(102),a=c(2),i=c(11),s=c(23),u=c(28);const b=Object(i.createHigherOrderComponent)((e=>class extends r.Component{constructor(){super(...arguments),this.state={error:null,loading:!1,categories:[]},this.loadCategories=this.loadCategories.bind(this)}componentDidMount(){this.loadCategories()}loadCategories(){this.setState({loading:!0}),Object(s.c)().then((e=>{this.setState({categories:e,loading:!1,error:null})})).catch((async e=>{const t=await Object(u.a)(e);this.setState({categories:[],loading:!1,error:t})}))}render(){const{error:t,loading:c,categories:n}=this.state;return Object(r.createElement)(e,{...this.props,error:t,isLoading:c,categories:n})}}),"withCategories");var d=b,m=c(34),g=c(4),h=c.n(g);c(106);const p=({categories:e,error:t,isLoading:c,onChange:i,onOperatorChange:s,operator:u,selected:b,isCompact:d,isSingle:g,showReviewCount:p})=>{const E={clear:Object(n.__)("Clear all product categories","woo-gutenberg-products-block"),list:Object(n.__)("Product Categories","woo-gutenberg-products-block"),noItems:Object(n.__)("Your store doesn't have any product categories.","woo-gutenberg-products-block"),search:Object(n.__)("Search for product categories","woo-gutenberg-products-block"),selected:e=>Object(n.sprintf)(/* translators: %d is the count of selected categories. */
Object(n._n)("%d category selected","%d categories selected",e,"woo-gutenberg-products-block"),e),updated:Object(n.__)("Category search results updated.","woo-gutenberg-products-block")};return t?Object(r.createElement)(m.a,{error:t}):Object(r.createElement)(r.Fragment,null,Object(r.createElement)(l.a,{className:"woocommerce-product-categories",list:e,isLoading:c,selected:b.map((t=>e.find((e=>e.id===t)))).filter(Boolean),onChange:i,renderItem:e=>{const{item:t,search:c,depth:l=0}=e,a=t.breadcrumbs.length?`${t.breadcrumbs.join(", ")}, ${t.name}`:t.name,i=p?Object(n.sprintf)(/* translators: %1$s is the item name, %2$d is the count of reviews for the item. */
Object(n._n)("%1$s, has %2$d review","%1$s, has %2$d reviews",t.review_count,"woo-gutenberg-products-block"),a,t.review_count):Object(n.sprintf)(/* translators: %1$s is the item name, %2$d is the count of products for the item. */
Object(n._n)("%1$s, has %2$d product","%1$s, has %2$d products",t.count,"woo-gutenberg-products-block"),a,t.count),s=p?Object(n.sprintf)(/* translators: %d is the count of reviews. */
Object(n._n)("%d review","%d reviews",t.review_count,"woo-gutenberg-products-block"),t.review_count):Object(n.sprintf)(/* translators: %d is the count of products. */
Object(n._n)("%d product","%d products",t.count,"woo-gutenberg-products-block"),t.count);return Object(r.createElement)(o.a,{className:h()("woocommerce-product-categories__item","has-count",{"is-searching":c.length>0,"is-skip-level":0===l&&0!==t.parent}),...e,countLabel:s,"aria-label":i})},messages:E,isCompact:d,isHierarchical:!0,isSingle:g}),!!s&&Object(r.createElement)("div",{hidden:b.length<2},Object(r.createElement)(a.SelectControl,{className:"woocommerce-product-categories__operator",label:Object(n.__)("Display products matching","woo-gutenberg-products-block"),help:Object(n.__)("Pick at least two categories to use this setting.","woo-gutenberg-products-block"),value:u,onChange:s,options:[{label:Object(n.__)("Any selected categories","woo-gutenberg-products-block"),value:"any"},{label:Object(n.__)("All selected categories","woo-gutenberg-products-block"),value:"all"}]})))};p.defaultProps={operator:"any",isCompact:!1,isSingle:!1},t.a=d(p)},7:function(e,t){e.exports=window.wp.blocks},74:function(e,t,c){"use strict";var r=c(0),n=c(1),o=c(2);const l=(e,t,c)=>c?Math.min(e,t)===e?t:Math.max(e,c)===e?c:e:Math.max(e,t)===t?e:t;t.a=({columns:e,rows:t,setAttributes:c,alignButtons:a,minColumns:i=1,maxColumns:s=6,minRows:u=1,maxRows:b=6})=>Object(r.createElement)(r.Fragment,null,Object(r.createElement)(o.RangeControl,{label:Object(n.__)("Columns","woo-gutenberg-products-block"),value:e,onChange:e=>{const t=l(e,i,s);c({columns:Number.isNaN(t)?"":t})},min:i,max:s}),Object(r.createElement)(o.RangeControl,{label:Object(n.__)("Rows","woo-gutenberg-products-block"),value:t,onChange:e=>{const t=l(e,u,b);c({rows:Number.isNaN(t)?"":t})},min:u,max:b}),Object(r.createElement)(o.ToggleControl,{label:Object(n.__)("Align the last block to the bottom","woo-gutenberg-products-block"),help:a?Object(n.__)("Align the last block to the bottom.","woo-gutenberg-products-block"):Object(n.__)("The last inner block will follow other content.","woo-gutenberg-products-block"),checked:a,onChange:()=>c({alignButtons:!a})}))},75:function(e,t,c){"use strict";var r=c(0),n=c(1),o=c(2);t.a=({onChange:e,settings:t})=>{const{image:c,button:l,price:a,rating:i,title:s}=t,u=!1!==c;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(o.ToggleControl,{label:Object(n.__)("Product image","woo-gutenberg-products-block"),checked:u,onChange:()=>e({...t,image:!u})}),Object(r.createElement)(o.ToggleControl,{label:Object(n.__)("Product title","woo-gutenberg-products-block"),checked:s,onChange:()=>e({...t,title:!s})}),Object(r.createElement)(o.ToggleControl,{label:Object(n.__)("Product price","woo-gutenberg-products-block"),checked:a,onChange:()=>e({...t,price:!a})}),Object(r.createElement)(o.ToggleControl,{label:Object(n.__)("Product rating","woo-gutenberg-products-block"),checked:i,onChange:()=>e({...t,rating:!i})}),Object(r.createElement)(o.ToggleControl,{label:Object(n.__)("Add to Cart button","woo-gutenberg-products-block"),checked:l,onChange:()=>e({...t,button:!l})}))}},9:function(e,t){e.exports=window.wp.primitives},90:function(e,t,c){"use strict";c.d(t,"b",(function(){return n}));var r=c(3);const n=["woocommerce/product-best-sellers","woocommerce/product-category","woocommerce/product-new","woocommerce/product-on-sale","woocommerce/product-top-rated"];t.a={columns:{type:"number",default:Object(r.getSetting)("defaultColumns",3)},rows:{type:"number",default:Object(r.getSetting)("defaultRows",3)},alignButtons:{type:"boolean",default:!1},categories:{type:"array",default:[]},catOperator:{type:"string",default:"any"},contentVisibility:{type:"object",default:{image:!0,title:!0,price:!0,rating:!0,button:!0}},isPreview:{type:"boolean",default:!1},stockStatus:{type:"array",default:Object.keys(Object(r.getSetting)("stockStatusOptions",[]))}}},96:function(e,t,c){"use strict";var r=c(0),n=c(1),o=c(3),l=c(2);const a=Object(o.getSetting)("hideOutOfStockItems",!1),i=Object(o.getSetting)("stockStatusOptions",{});t.a=({value:e,setAttributes:t})=>{const{outofstock:c,...o}=i,s=a?o:i,u=Object.entries(s).map((([e,t])=>({value:e,label:t}))).filter((e=>!!e.label)),b=Object.keys(s).filter((e=>!!e)),[d,m]=Object(r.useState)(e||b);Object(r.useEffect)((()=>{t({stockStatus:["",...d]})}),[d,t]);const g=Object(r.useCallback)((e=>{const t=d.includes(e),c=d.filter((t=>t!==e));t||(c.push(e),c.sort()),m(c)}),[d]);return Object(r.createElement)(r.Fragment,null,u.map((e=>{const t=d.includes(e.value)?/* translators: %s stock status. */Object(n.__)('Stock status "%s" visible.',"woo-gutenberg-products-block"):/* translators: %s stock status. */Object(n.__)('Stock status "%s" hidden.',"woo-gutenberg-products-block");return Object(r.createElement)(l.ToggleControl,{label:e.label,key:e.value,help:Object(n.sprintf)(t,e.label),checked:d.includes(e.value),onChange:()=>g(e.value)})})))}}});