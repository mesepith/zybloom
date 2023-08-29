(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[77,74],{205:function(e,t,a){"use strict";a.d(t,"b",(function(){return u})),a.d(t,"a",(function(){return p}));var n=a(0),s=a(7),c=a(10),r=a(27),o=a.n(r),i=a(118),l=a(353);const m="payment_setup",d=Object(n.createContext)({onPaymentProcessing:()=>()=>()=>{},onPaymentSetup:()=>()=>()=>{}}),u=()=>Object(n.useContext)(d),p=({children:e})=>{const{isProcessing:t,isIdle:a,isCalculating:r,hasError:u}=Object(s.useSelect)(e=>{const t=e(c.CHECKOUT_STORE_KEY);return{isProcessing:t.isProcessing(),isIdle:t.isIdle(),hasError:t.hasError(),isCalculating:t.isCalculating()}}),{isPaymentReady:p}=Object(s.useSelect)(e=>{const t=e(c.PAYMENT_STORE_KEY);return{isPaymentProcessing:t.isPaymentProcessing(),isPaymentReady:t.isPaymentReady()}}),{setValidationErrors:b}=Object(s.useDispatch)(c.VALIDATION_STORE_KEY),[y,h]=Object(n.useReducer)(i.b,{}),{onPaymentSetup:O}=(e=>Object(n.useMemo)(()=>({onPaymentSetup:Object(l.a)(m,e)}),[e]))(h),g=Object(n.useRef)(y);Object(n.useEffect)(()=>{g.current=y},[y]);const{__internalSetPaymentProcessing:j,__internalSetPaymentIdle:v,__internalEmitPaymentProcessingEvent:f}=Object(s.useDispatch)(c.PAYMENT_STORE_KEY);Object(n.useEffect)(()=>{!t||u||r||(j(),f(g.current,b))},[t,u,r,j,f,b]),Object(n.useEffect)(()=>{a&&!p&&v()},[a,p,v]),Object(n.useEffect)(()=>{u&&p&&v()},[u,p,v]);const P={onPaymentProcessing:Object(n.useMemo)(()=>function(...e){return o()("onPaymentProcessing",{alternative:"onPaymentSetup",plugin:"WooCommerce Blocks"}),O(...e)},[O]),onPaymentSetup:O};return Object(n.createElement)(d.Provider,{value:P},e)}},217:function(e,t,a){"use strict";var n=a(0),s=a(4),c=a.n(s);const r=e=>"wc-block-components-payment-method-icon wc-block-components-payment-method-icon--"+e;var o=({id:e,src:t=null,alt:a=""})=>t?Object(n.createElement)("img",{className:r(e),src:t,alt:a}):null,i=a(20);const l=[{id:"alipay",alt:"Alipay",src:i.p+"payment-methods/alipay.svg"},{id:"amex",alt:"American Express",src:i.p+"payment-methods/amex.svg"},{id:"bancontact",alt:"Bancontact",src:i.p+"payment-methods/bancontact.svg"},{id:"diners",alt:"Diners Club",src:i.p+"payment-methods/diners.svg"},{id:"discover",alt:"Discover",src:i.p+"payment-methods/discover.svg"},{id:"eps",alt:"EPS",src:i.p+"payment-methods/eps.svg"},{id:"giropay",alt:"Giropay",src:i.p+"payment-methods/giropay.svg"},{id:"ideal",alt:"iDeal",src:i.p+"payment-methods/ideal.svg"},{id:"jcb",alt:"JCB",src:i.p+"payment-methods/jcb.svg"},{id:"laser",alt:"Laser",src:i.p+"payment-methods/laser.svg"},{id:"maestro",alt:"Maestro",src:i.p+"payment-methods/maestro.svg"},{id:"mastercard",alt:"Mastercard",src:i.p+"payment-methods/mastercard.svg"},{id:"multibanco",alt:"Multibanco",src:i.p+"payment-methods/multibanco.svg"},{id:"p24",alt:"Przelewy24",src:i.p+"payment-methods/p24.svg"},{id:"sepa",alt:"Sepa",src:i.p+"payment-methods/sepa.svg"},{id:"sofort",alt:"Sofort",src:i.p+"payment-methods/sofort.svg"},{id:"unionpay",alt:"Union Pay",src:i.p+"payment-methods/unionpay.svg"},{id:"visa",alt:"Visa",src:i.p+"payment-methods/visa.svg"},{id:"wechat",alt:"WeChat",src:i.p+"payment-methods/wechat.svg"}];var m=a(71);t.a=({icons:e=[],align:t="center",className:a})=>{const s=(e=>{const t={};return e.forEach(e=>{let a={};"string"==typeof e&&(a={id:e,alt:e,src:null}),"object"==typeof e&&(a={id:e.id||"",alt:e.alt||"",src:e.src||null}),a.id&&Object(m.a)(a.id)&&!t[a.id]&&(t[a.id]=a)}),Object.values(t)})(e);if(0===s.length)return null;const r=c()("wc-block-components-payment-method-icons",{"wc-block-components-payment-method-icons--align-left":"left"===t,"wc-block-components-payment-method-icons--align-right":"right"===t},a);return Object(n.createElement)("div",{className:r},s.map(e=>{const t={...e,...(a=e.id,l.find(e=>e.id===a)||{})};var a;return Object(n.createElement)(o,{key:"payment-method-icon-"+e.id,...t})}))}},313:function(e,t,a){"use strict";a.d(t,"b",(function(){return i})),a.d(t,"a",(function(){return l}));var n=a(60),s=a(32),c=a(7),r=a(10);const o=(e=!1)=>{const{paymentMethodsInitialized:t,expressPaymentMethodsInitialized:a,availablePaymentMethods:o,availableExpressPaymentMethods:i}=Object(c.useSelect)(e=>{const t=e(r.PAYMENT_STORE_KEY);return{paymentMethodsInitialized:t.paymentMethodsInitialized(),expressPaymentMethodsInitialized:t.expressPaymentMethodsInitialized(),availableExpressPaymentMethods:t.getAvailableExpressPaymentMethods(),availablePaymentMethods:t.getAvailablePaymentMethods()}}),l=Object.values(o).map(({name:e})=>e),m=Object.values(i).map(({name:e})=>e),d=Object(s.getPaymentMethods)(),u=Object(s.getExpressPaymentMethods)(),p=Object.keys(d).reduce((e,t)=>(l.includes(t)&&(e[t]=d[t]),e),{}),b=Object.keys(u).reduce((e,t)=>(m.includes(t)&&(e[t]=u[t]),e),{}),y=Object(n.a)(p),h=Object(n.a)(b);return{paymentMethods:e?h:y,isInitialized:e?a:t}},i=()=>o(!1),l=()=>o(!0)},352:function(e,t,a){"use strict";a.d(t,"a",(function(){return s}));var n=a(1);const s=Object(n.__)("View my cart","woo-gutenberg-products-block")},485:function(e,t,a){"use strict";a.d(t,"a",(function(){return n}));const n=e=>Object.values(e).reduce((e,t)=>(null!==t.icons&&(e=e.concat(t.icons)),e),[])},60:function(e,t,a){"use strict";a.d(t,"a",(function(){return r}));var n=a(0),s=a(26),c=a.n(s);function r(e){const t=Object(n.useRef)(e);return c()(e,t.current)||(t.current=e),t.current}},916:function(e,t,a){"use strict";a.r(t);var n=a(0),s=a(20),c=a(78),r=a(4),o=a.n(r),i=a(247),l=a(352),m=a(278);t.default=({className:e,cartButtonLabel:t,style:a})=>{const r=Object(i.a)({style:a});return s.d?Object(n.createElement)(c.a,{className:o()(e,r.className,"wc-block-mini-cart__footer-cart"),style:r.style,href:s.d,variant:Object(m.a)(e,"outlined")},t||l.a):null}},971:function(e,t,a){"use strict";a.r(t);var n=a(0),s=a(1),c=a(12),r=a(28),o=a(313),i=a(56),l=a(217),m=a(485),d=a(2),u=a(205),p=a(4),b=a.n(p),y=a(916),h=a(923),O=a(278);const g=()=>{const{paymentMethods:e}=Object(o.b)();return Object(n.createElement)(l.a,{icons:Object(m.a)(e)})};t.default=({children:e,className:t,cartButtonLabel:a,checkoutButtonLabel:o})=>{const{cartTotals:l}=Object(i.a)(),m=Object(d.getSetting)("displayCartPricesIncludingTax",!1)?parseInt(l.total_items,10)+parseInt(l.total_items_tax,10):parseInt(l.total_items,10),p=Object(O.b)(e);return Object(n.createElement)("div",{className:b()(t,"wc-block-mini-cart__footer")},Object(n.createElement)(c.TotalsItem,{className:"wc-block-mini-cart__footer-subtotal",currency:Object(r.getCurrencyFromPriceResponse)(l),label:Object(s.__)("Subtotal","woo-gutenberg-products-block"),value:m,description:Object(s.__)("Shipping, taxes, and discounts calculated at checkout.","woo-gutenberg-products-block")}),Object(n.createElement)("div",{className:"wc-block-mini-cart__footer-actions"},p?e:Object(n.createElement)(n.Fragment,null,Object(n.createElement)(y.default,{cartButtonLabel:a}),Object(n.createElement)(h.default,{checkoutButtonLabel:o}))),Object(n.createElement)(u.a,null,Object(n.createElement)(g,null)))}}}]);