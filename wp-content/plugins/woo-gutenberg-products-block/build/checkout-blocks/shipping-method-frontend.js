(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[52],{113:function(e,t,c){"use strict";var o=c(0),i=c(147),n=c(4),s=c.n(n);c(222);const a=e=>({thousandSeparator:null==e?void 0:e.thousandSeparator,decimalSeparator:null==e?void 0:e.decimalSeparator,fixedDecimalScale:!0,prefix:null==e?void 0:e.prefix,suffix:null==e?void 0:e.suffix,isNumericString:!0});t.a=({className:e,value:t,currency:c,onValueChange:n,displayType:r="text",...l})=>{var p;const d="string"==typeof t?parseInt(t,10):t;if(!Number.isFinite(d))return null;const u=d/10**c.minorUnit;if(!Number.isFinite(u))return null;const h=s()("wc-block-formatted-money-amount","wc-block-components-formatted-money-amount",e),m=null!==(p=l.decimalScale)&&void 0!==p?p:null==c?void 0:c.minorUnit,b={...l,...a(c),decimalScale:m,value:void 0,currency:void 0,onValueChange:void 0},g=n?e=>{const t=+e.value*10**c.minorUnit;n(t)}:()=>{};return Object(o.createElement)(i.a,{className:h,displayType:r,...b,value:u,onValueChange:g})}},222:function(e,t){},295:function(e,t,c){"use strict";var o=c(0),i=c(4),n=c.n(i);c(296),t.a=({children:e,className:t,headingLevel:c,...i})=>{const s=n()("wc-block-components-title",t),a=`h${c}`;return Object(o.createElement)(a,{className:s,...i},e)}},296:function(e,t){},297:function(e,t){},298:function(e,t,c){"use strict";var o=c(1);t.a=({defaultTitle:e=Object(o.__)("Step","woo-gutenberg-products-block"),defaultDescription:t=Object(o.__)("Step description text.","woo-gutenberg-products-block"),defaultShowStepNumber:c=!0})=>({title:{type:"string",default:e},description:{type:"string",default:t},showStepNumber:{type:"boolean",default:c}})},319:function(e,t,c){"use strict";var o=c(0),i=c(4),n=c.n(i),s=c(295);c(297);const a=({title:e,stepHeadingContent:t})=>Object(o.createElement)("div",{className:"wc-block-components-checkout-step__heading"},Object(o.createElement)(s.a,{"aria-hidden":"true",className:"wc-block-components-checkout-step__title",headingLevel:"2"},e),!!t&&Object(o.createElement)("span",{className:"wc-block-components-checkout-step__heading-content"},t));t.a=({id:e,className:t,title:c,legend:i,description:s,children:r,disabled:l=!1,showStepNumber:p=!0,stepHeadingContent:d=(()=>{})})=>{const u=i||c?"fieldset":"div";return Object(o.createElement)(u,{className:n()(t,"wc-block-components-checkout-step",{"wc-block-components-checkout-step--with-step-number":p,"wc-block-components-checkout-step--disabled":l}),id:e,disabled:l},!(!i&&!c)&&Object(o.createElement)("legend",{className:"screen-reader-text"},i||c),!!c&&Object(o.createElement)(a,{title:c,stepHeadingContent:d()}),Object(o.createElement)("div",{className:"wc-block-components-checkout-step__container"},!!s&&Object(o.createElement)("p",{className:"wc-block-components-checkout-step__description"},s),Object(o.createElement)("div",{className:"wc-block-components-checkout-step__content"},r)))}},501:function(e,t,c){"use strict";c.r(t);var o=c(0),i=c(4),n=c.n(i),s=c(145),a=c(319),r=c(5),l=c(3),p=c(93),d=c(30),u=c(1),h=c(502),m=c(499),b=c(76),g=c(483),k=c(484),_=c(88),w=c(2),O=c(39),v=c(113);const j=({minRate:e,maxRate:t,multiple:c=!1})=>{if(void 0===e||void 0===t)return null;const i=Object(w.getSetting)("displayCartPricesIncludingTax",!1)?parseInt(e.price,10)+parseInt(e.taxes,10):parseInt(e.price,10),n=Object(w.getSetting)("displayCartPricesIncludingTax",!1)?parseInt(t.price,10)+parseInt(t.taxes,10):parseInt(t.price,10),s=0===i?Object(o.createElement)("em",null,Object(u.__)("free","woo-gutenberg-products-block")):Object(o.createElement)(v.a,{currency:Object(O.getCurrencyFromPriceResponse)(e),value:i});return Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-price"},i!==n||c?Object(o.createInterpolateElement)(0===i&&0===n?"<price />":Object(u.__)("from <price />","woo-gutenberg-products-block"),{price:s}):s)};function f(e){return e?{min:e.reduce(((e,t)=>Object(_.c)(t.method_id)?e:void 0===e||parseInt(t.price,10)<parseInt(e.price,10)?t:e),void 0),max:e.reduce(((e,t)=>Object(_.c)(t.method_id)?e:void 0===e||parseInt(t.price,10)>parseInt(e.price,10)?t:e),void 0)}:{min:void 0,max:void 0}}function E(e){return e?{min:e.reduce(((e,t)=>Object(_.c)(t.method_id)&&(void 0===e||t.price<e.price)?t:e),void 0),max:e.reduce(((e,t)=>Object(_.c)(t.method_id)&&(void 0===e||t.price>e.price)?t:e),void 0)}:{min:void 0,max:void 0}}const x=Object(u.__)("Local Pickup","woo-gutenberg-products-block"),N=Object(u.__)("Shipping","woo-gutenberg-products-block");c(535),c(15);const S={hidden:!0,message:Object(u.__)("Shipping options are not available","woo-gutenberg-products-block")},C=({checked:e,rate:t,showPrice:c,showIcon:i,toggleText:s,multiple:a})=>Object(o.createElement)(h.a,{value:"pickup",className:n()("wc-block-checkout__shipping-method-option",{"wc-block-checkout__shipping-method-option--selected":"pickup"===e})},!0===i&&Object(o.createElement)(b.a,{icon:g.a,size:28,className:"wc-block-checkout__shipping-method-option-icon"}),Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-title"},s),!0===c&&Object(o.createElement)(j,{multiple:a,minRate:t.min,maxRate:t.max})),y=({checked:e,rate:t,showPrice:c,showIcon:i,toggleText:s,shippingCostRequiresAddress:a=!1})=>{const p=Object(r.useSelect)((e=>e(l.CART_STORE_KEY).getShippingRates().some((({shipping_rates:e})=>!e.every(_.d))))),d=a&&(()=>{const e=Object(r.select)("wc/store/validation"),t=e.getValidationError("shipping_state"),c=e.getValidationError("shipping_address_1"),o=e.getValidationError("shipping_country"),i=e.getValidationError("shipping_postcode");return[e.getValidationError("shipping_city"),t,c,o,i].some((e=>void 0!==e))})()&&!p,m=void 0!==t.min&&void 0!==t.max,{setValidationErrors:g,clearValidationError:w}=Object(r.useDispatch)(l.VALIDATION_STORE_KEY);Object(o.useEffect)((()=>{"shipping"!==e||m?w("shipping-rates-error"):g({"shipping-rates-error":S})}),[e,w,m,g]);const O=void 0===t.min||d?Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-price"},Object(u.__)("calculated with an address","woo-gutenberg-products-block")):Object(o.createElement)(j,{minRate:t.min,maxRate:t.max});return Object(o.createElement)(h.a,{value:"shipping",className:n()("wc-block-checkout__shipping-method-option",{"wc-block-checkout__shipping-method-option--selected":"shipping"===e})},!0===i&&Object(o.createElement)(b.a,{icon:k.a,size:28,className:"wc-block-checkout__shipping-method-option-icon"}),Object(o.createElement)("span",{className:"wc-block-checkout__shipping-method-option-title"},s),!0===c&&O)};var I=({checked:e,onChange:t,showPrice:c,showIcon:i,localPickupText:n,shippingText:s,shippingCostRequiresAddress:a=!1})=>{var r,l;const{shippingRates:d}=Object(p.a)();return Object(o.createElement)(m.a,{id:"shipping-method",className:"wc-block-checkout__shipping-method-container",label:"options",onChange:t,checked:e},Object(o.createElement)(y,{checked:e,rate:f(null===(r=d[0])||void 0===r?void 0:r.shipping_rates),showPrice:c,showIcon:i,shippingCostRequiresAddress:a,toggleText:s||N}),Object(o.createElement)(C,{checked:e,rate:E(null===(l=d[0])||void 0===l?void 0:l.shipping_rates),multiple:d.length>1,showPrice:c,showIcon:i,toggleText:n||x}))},T=c(298),R={...Object(T.a)({defaultTitle:Object(u.__)("Shipping method","woo-gutenberg-products-block"),defaultDescription:Object(u.__)("Select how you would like to receive your order.","woo-gutenberg-products-block")}),className:{type:"string",default:""},showIcon:{type:"boolean",default:!0},showPrice:{type:"boolean",default:!0},localPickupText:{type:"string",default:x},shippingText:{type:"string",default:N},lock:{type:"object",default:{move:!0,remove:!0}},shippingCostRequiresAddress:{type:"boolean",default:!1}};t.default=Object(s.withFilteredAttributes)(R)((({title:e,description:t,showStepNumber:c,children:i,className:s,showPrice:u,showIcon:h,shippingText:m,localPickupText:b,shippingCostRequiresAddress:g})=>{const{checkoutIsProcessing:k,prefersCollection:_}=Object(r.useSelect)((e=>{const t=e(l.CHECKOUT_STORE_KEY);return{checkoutIsProcessing:t.isProcessing(),prefersCollection:t.prefersCollection()}})),{setPrefersCollection:w}=Object(r.useDispatch)(l.CHECKOUT_STORE_KEY),{shippingRates:O,needsShipping:v,hasCalculatedShipping:j,isCollectable:f}=Object(p.a)();return v&&j&&O&&f&&d.f?Object(o.createElement)(a.a,{id:"shipping-method",disabled:k,className:n()("wc-block-checkout__shipping-method",s),title:e,description:t,showStepNumber:c},Object(o.createElement)(I,{checked:_?"pickup":"shipping",onChange:e=>{w("pickup"===e)},showPrice:u,showIcon:h,localPickupText:b,shippingText:m,shippingCostRequiresAddress:g}),i):null}))}}]);