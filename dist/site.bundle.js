!function(){var t=[,function(){!function(){"use strict";if("undefined"!=typeof window){var t=window.navigator.userAgent.match(/Edge\/(\d{2})\./),e=t?parseInt(t[1],10):null,i=!!e&&16<=e&&e<=18;if("objectFit"in document.documentElement.style==0||i){var n=function(t){var e=t.parentNode;!function(t){var e=window.getComputedStyle(t,null),i=e.getPropertyValue("position"),n=e.getPropertyValue("overflow"),o=e.getPropertyValue("display");i&&"static"!==i||(t.style.position="relative"),"hidden"!==n&&(t.style.overflow="hidden"),o&&"inline"!==o||(t.style.display="block"),0===t.clientHeight&&(t.style.height="100%"),-1===t.className.indexOf("object-fit-polyfill")&&(t.className=t.className+" object-fit-polyfill")}(e),function(t){var e=window.getComputedStyle(t,null),i={"max-width":"none","max-height":"none","min-width":"0px","min-height":"0px",top:"auto",right:"auto",bottom:"auto",left:"auto","margin-top":"0px","margin-right":"0px","margin-bottom":"0px","margin-left":"0px"};for(var n in i)e.getPropertyValue(n)!==i[n]&&(t.style[n]=i[n])}(t),t.style.position="absolute",t.style.height="100%",t.style.width="auto",t.clientWidth>e.clientWidth?(t.style.top="0",t.style.marginTop="0",t.style.left="50%",t.style.marginLeft=t.clientWidth/-2+"px"):(t.style.width="100%",t.style.height="auto",t.style.left="0",t.style.marginLeft="0",t.style.top="50%",t.style.marginTop=t.clientHeight/-2+"px")},o=function(t){if(void 0===t||t instanceof Event)t=document.querySelectorAll("[data-object-fit]");else if(t&&t.nodeName)t=[t];else{if("object"!=typeof t||!t.length||!t[0].nodeName)return!1;t=t}for(var e=0;e<t.length;e++)if(t[e].nodeName){var o=t[e].nodeName.toLowerCase();if("img"===o){if(i)continue;t[e].complete?n(t[e]):t[e].addEventListener("load",(function(){n(this)}))}else"video"===o?0<t[e].readyState?n(t[e]):t[e].addEventListener("loadedmetadata",(function(){n(this)})):n(t[e])}return!0};"loading"===document.readyState?document.addEventListener("DOMContentLoaded",o):o(),window.addEventListener("resize",o),window.objectFitPolyfill=o}else window.objectFitPolyfill=function(){return!1}}}()},function(t,e,i){t.exports=function(){"use strict";function t(t){"complete"===document.readyState||"interactive"===document.readyState?t():document.addEventListener("DOMContentLoaded",t,{capture:!0,once:!0,passive:!0})}let e;e="undefined"!=typeof window?window:void 0!==i.g?i.g:"undefined"!=typeof self?self:{};var n=e;const{navigator:o}=n,s=/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(o.userAgent);let r,a;function l(){return!r&&document.body&&(r=document.createElement("div"),r.style.cssText="position: fixed; top: -9999px; left: 0; height: 100vh; width: 0;",document.body.appendChild(r)),(r?r.clientHeight:0)||n.innerHeight||document.documentElement.clientHeight}function c(){a=s?l():n.innerHeight||document.documentElement.clientHeight}c(),n.addEventListener("resize",c),n.addEventListener("orientationchange",c),n.addEventListener("load",c),t((()=>{c()}));const u=[];function h(t){const e=[];for(;null!==t.parentElement;)1===(t=t.parentElement).nodeType&&e.push(t);return e}function p(){u.length&&(u.forEach(((t,e)=>{const{instance:i,oldData:o}=t,s=i.$item.getBoundingClientRect(),r={width:s.width,height:s.height,top:s.top,bottom:s.bottom,wndW:n.innerWidth,wndH:a},l=!o||o.wndW!==r.wndW||o.wndH!==r.wndH||o.width!==r.width||o.height!==r.height,c=l||!o||o.top!==r.top||o.bottom!==r.bottom;u[e].oldData=r,l&&i.onResize(),c&&i.onScroll()})),n.requestAnimationFrame(p))}let d=0;class f{constructor(t,e){const i=this;i.instanceID=d,d+=1,i.$item=t,i.defaults={type:"scroll",speed:.5,imgSrc:null,imgElement:".jarallax-img",imgSize:"cover",imgPosition:"50% 50%",imgRepeat:"no-repeat",keepImg:!1,elementInViewport:null,zIndex:-100,disableParallax:!1,disableVideo:!1,videoSrc:null,videoStartTime:0,videoEndTime:0,videoVolume:0,videoLoop:!0,videoPlayOnlyVisible:!0,videoLazyLoading:!0,onScroll:null,onInit:null,onDestroy:null,onCoverImage:null};const n=i.$item.dataset||{},s={};if(Object.keys(n).forEach((t=>{const e=t.substr(0,1).toLowerCase()+t.substr(1);e&&void 0!==i.defaults[e]&&(s[e]=n[t])})),i.options=i.extend({},i.defaults,s,e),i.pureOptions=i.extend({},i.options),Object.keys(i.options).forEach((t=>{"true"===i.options[t]?i.options[t]=!0:"false"===i.options[t]&&(i.options[t]=!1)})),i.options.speed=Math.min(2,Math.max(-1,parseFloat(i.options.speed))),"string"==typeof i.options.disableParallax&&(i.options.disableParallax=new RegExp(i.options.disableParallax)),i.options.disableParallax instanceof RegExp){const t=i.options.disableParallax;i.options.disableParallax=()=>t.test(o.userAgent)}if("function"!=typeof i.options.disableParallax&&(i.options.disableParallax=()=>!1),"string"==typeof i.options.disableVideo&&(i.options.disableVideo=new RegExp(i.options.disableVideo)),i.options.disableVideo instanceof RegExp){const t=i.options.disableVideo;i.options.disableVideo=()=>t.test(o.userAgent)}"function"!=typeof i.options.disableVideo&&(i.options.disableVideo=()=>!1);let r=i.options.elementInViewport;r&&"object"==typeof r&&void 0!==r.length&&([r]=r),r instanceof Element||(r=null),i.options.elementInViewport=r,i.image={src:i.options.imgSrc||null,$container:null,useImgTag:!1,position:"fixed"},i.initImg()&&i.canInitParallax()&&i.init()}css(t,e){return"string"==typeof e?n.getComputedStyle(t).getPropertyValue(e):(Object.keys(e).forEach((i=>{t.style[i]=e[i]})),t)}extend(t,...e){return t=t||{},Object.keys(e).forEach((i=>{e[i]&&Object.keys(e[i]).forEach((n=>{t[n]=e[i][n]}))})),t}getWindowData(){return{width:n.innerWidth||document.documentElement.clientWidth,height:a,y:document.documentElement.scrollTop}}initImg(){const t=this;let e=t.options.imgElement;return e&&"string"==typeof e&&(e=t.$item.querySelector(e)),e instanceof Element||(t.options.imgSrc?(e=new Image,e.src=t.options.imgSrc):e=null),e&&(t.options.keepImg?t.image.$item=e.cloneNode(!0):(t.image.$item=e,t.image.$itemParent=e.parentNode),t.image.useImgTag=!0),!(!t.image.$item&&(null===t.image.src&&(t.image.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",t.image.bgImage=t.css(t.$item,"background-image")),!t.image.bgImage||"none"===t.image.bgImage))}canInitParallax(){return!this.options.disableParallax()}init(){const t=this,e={position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"};let i={pointerEvents:"none",transformStyle:"preserve-3d",backfaceVisibility:"hidden",willChange:"transform,opacity"};if(!t.options.keepImg){const e=t.$item.getAttribute("style");if(e&&t.$item.setAttribute("data-jarallax-original-styles",e),t.image.useImgTag){const e=t.image.$item.getAttribute("style");e&&t.image.$item.setAttribute("data-jarallax-original-styles",e)}}if("static"===t.css(t.$item,"position")&&t.css(t.$item,{position:"relative"}),"auto"===t.css(t.$item,"z-index")&&t.css(t.$item,{zIndex:0}),t.image.$container=document.createElement("div"),t.css(t.image.$container,e),t.css(t.image.$container,{"z-index":t.options.zIndex}),"fixed"===this.image.position&&t.css(t.image.$container,{"-webkit-clip-path":"polygon(0 0, 100% 0, 100% 100%, 0 100%)","clip-path":"polygon(0 0, 100% 0, 100% 100%, 0 100%)"}),t.image.$container.setAttribute("id",`jarallax-container-${t.instanceID}`),t.$item.appendChild(t.image.$container),t.image.useImgTag?i=t.extend({"object-fit":t.options.imgSize,"object-position":t.options.imgPosition,"max-width":"none"},e,i):(t.image.$item=document.createElement("div"),t.image.src&&(i=t.extend({"background-position":t.options.imgPosition,"background-size":t.options.imgSize,"background-repeat":t.options.imgRepeat,"background-image":t.image.bgImage||`url("${t.image.src}")`},e,i))),"opacity"!==t.options.type&&"scale"!==t.options.type&&"scale-opacity"!==t.options.type&&1!==t.options.speed||(t.image.position="absolute"),"fixed"===t.image.position){const e=h(t.$item).filter((t=>{const e=n.getComputedStyle(t),i=e["-webkit-transform"]||e["-moz-transform"]||e.transform;return i&&"none"!==i||/(auto|scroll)/.test(e.overflow+e["overflow-y"]+e["overflow-x"])}));t.image.position=e.length?"absolute":"fixed"}i.position=t.image.position,t.css(t.image.$item,i),t.image.$container.appendChild(t.image.$item),t.onResize(),t.onScroll(!0),t.options.onInit&&t.options.onInit.call(t),"none"!==t.css(t.$item,"background-image")&&t.css(t.$item,{"background-image":"none"}),t.addToParallaxList()}addToParallaxList(){u.push({instance:this}),1===u.length&&n.requestAnimationFrame(p)}removeFromParallaxList(){const t=this;u.forEach(((e,i)=>{e.instance.instanceID===t.instanceID&&u.splice(i,1)}))}destroy(){const t=this;t.removeFromParallaxList();const e=t.$item.getAttribute("data-jarallax-original-styles");if(t.$item.removeAttribute("data-jarallax-original-styles"),e?t.$item.setAttribute("style",e):t.$item.removeAttribute("style"),t.image.useImgTag){const i=t.image.$item.getAttribute("data-jarallax-original-styles");t.image.$item.removeAttribute("data-jarallax-original-styles"),i?t.image.$item.setAttribute("style",e):t.image.$item.removeAttribute("style"),t.image.$itemParent&&t.image.$itemParent.appendChild(t.image.$item)}t.image.$container&&t.image.$container.parentNode.removeChild(t.image.$container),t.options.onDestroy&&t.options.onDestroy.call(t),delete t.$item.jarallax}clipContainer(){}coverImage(){const t=this,e=t.image.$container.getBoundingClientRect(),i=e.height,{speed:n}=t.options,o="scroll"===t.options.type||"scroll-opacity"===t.options.type;let s=0,r=i,l=0;return o&&(0>n?(s=n*Math.max(i,a),a<i&&(s-=n*(i-a))):s=n*(i+a),1<n?r=Math.abs(s-a):0>n?r=s/n+Math.abs(s):r+=(a-i)*(1-n),s/=2),t.parallaxScrollDistance=s,l=o?(a-r)/2:(i-r)/2,t.css(t.image.$item,{height:`${r}px`,marginTop:`${l}px`,left:"fixed"===t.image.position?`${e.left}px`:"0",width:`${e.width}px`}),t.options.onCoverImage&&t.options.onCoverImage.call(t),{image:{height:r,marginTop:l},container:e}}isVisible(){return this.isElementInViewport||!1}onScroll(t){const e=this,i=e.$item.getBoundingClientRect(),o=i.top,s=i.height,r={};let l=i;if(e.options.elementInViewport&&(l=e.options.elementInViewport.getBoundingClientRect()),e.isElementInViewport=0<=l.bottom&&0<=l.right&&l.top<=a&&l.left<=n.innerWidth,!t&&!e.isElementInViewport)return;const c=Math.max(0,o),u=Math.max(0,s+o),h=Math.max(0,-o),p=Math.max(0,o+s-a),d=Math.max(0,s-(o+s-a)),f=Math.max(0,-o+a-s),m=1-(a-o)/(a+s)*2;let g=1;if(s<a?g=1-(h||p)/s:u<=a?g=u/a:d<=a&&(g=d/a),"opacity"!==e.options.type&&"scale-opacity"!==e.options.type&&"scroll-opacity"!==e.options.type||(r.transform="translate3d(0,0,0)",r.opacity=g),"scale"===e.options.type||"scale-opacity"===e.options.type){let t=1;0>e.options.speed?t-=e.options.speed*g:t+=e.options.speed*(1-g),r.transform=`scale(${t}) translate3d(0,0,0)`}if("scroll"===e.options.type||"scroll-opacity"===e.options.type){let t=e.parallaxScrollDistance*m;"absolute"===e.image.position&&(t-=o),r.transform=`translate3d(0,${t}px,0)`}e.css(e.image.$item,r),e.options.onScroll&&e.options.onScroll.call(e,{section:i,beforeTop:c,beforeTopEnd:u,afterTop:h,beforeBottom:p,beforeBottomEnd:d,afterBottom:f,visiblePercent:g,fromViewportCenter:m})}onResize(){this.coverImage()}}const m=function(t,e,...i){("object"==typeof HTMLElement?t instanceof HTMLElement:t&&"object"==typeof t&&null!==t&&1===t.nodeType&&"string"==typeof t.nodeName)&&(t=[t]);const n=t.length;let o,s=0;for(;s<n;s+=1)if("object"==typeof e||void 0===e?t[s].jarallax||(t[s].jarallax=new f(t[s],e)):t[s].jarallax&&(o=t[s].jarallax[e].apply(t[s].jarallax,i)),void 0!==o)return o;return t};m.constructor=f;const g=n.jQuery;if(void 0!==g){const t=function(...t){Array.prototype.unshift.call(t,this);const e=m.apply(n,t);return"object"!=typeof e?e:this};t.constructor=m.constructor;const e=g.fn.jarallax;g.fn.jarallax=t,g.fn.jarallax.noConflict=function(){return g.fn.jarallax=e,this}}return t((()=>{m(document.querySelectorAll("[data-jarallax]"))})),m}()},function(t){t.exports=function(){"use strict";function t(){return"undefined"!=typeof window}function e(){var t=!1;try{var e={get passive(){t=!0}};window.addEventListener("test",e,e),window.removeEventListener("test",e,e)}catch(e){t=!1}return t}function i(){return!!(t()&&function(){}.bind&&"classList"in document.documentElement&&Object.assign&&Object.keys&&requestAnimationFrame)}function n(t){return 9===t.nodeType}function o(t){return t&&t.document&&n(t.document)}function s(t){var e=t.document,i=e.body,n=e.documentElement;return{scrollHeight:function(){return Math.max(i.scrollHeight,n.scrollHeight,i.offsetHeight,n.offsetHeight,i.clientHeight,n.clientHeight)},height:function(){return t.innerHeight||n.clientHeight||i.clientHeight},scrollY:function(){return void 0!==t.pageYOffset?t.pageYOffset:(n||i.parentNode||i).scrollTop}}}function r(t){return{scrollHeight:function(){return Math.max(t.scrollHeight,t.offsetHeight,t.clientHeight)},height:function(){return Math.max(t.offsetHeight,t.clientHeight)},scrollY:function(){return t.scrollTop}}}function a(t){return o(t)?s(t):r(t)}function l(t,i,n){var o,s=e(),r=!1,l=a(t),c=l.scrollY(),u={};function h(){var t=Math.round(l.scrollY()),e=l.height(),o=l.scrollHeight();u.scrollY=t,u.lastScrollY=c,u.direction=t>c?"down":"up",u.distance=Math.abs(t-c),u.isOutOfBounds=t<0||t+e>o,u.top=t<=i.offset,u.bottom=t+e>=o,u.toleranceExceeded=u.distance>i.tolerance[u.direction],n(u),c=t,r=!1}function p(){r||(r=!0,o=requestAnimationFrame(h))}var d=!!s&&{passive:!0,capture:!1};return t.addEventListener("scroll",p,d),h(),{destroy:function(){cancelAnimationFrame(o),t.removeEventListener("scroll",p,d)}}}function c(t){return t===Object(t)?t:{down:t,up:t}}function u(t,e){e=e||{},Object.assign(this,u.options,e),this.classes=Object.assign({},u.options.classes,e.classes),this.elem=t,this.tolerance=c(this.tolerance),this.initialised=!1,this.frozen=!1}return u.prototype={constructor:u,init:function(){return u.cutsTheMustard&&!this.initialised&&(this.addClass("initial"),this.initialised=!0,setTimeout((function(t){t.scrollTracker=l(t.scroller,{offset:t.offset,tolerance:t.tolerance},t.update.bind(t))}),100,this)),this},destroy:function(){this.initialised=!1,Object.keys(this.classes).forEach(this.removeClass,this),this.scrollTracker.destroy()},unpin:function(){!this.hasClass("pinned")&&this.hasClass("unpinned")||(this.addClass("unpinned"),this.removeClass("pinned"),this.onUnpin&&this.onUnpin.call(this))},pin:function(){this.hasClass("unpinned")&&(this.addClass("pinned"),this.removeClass("unpinned"),this.onPin&&this.onPin.call(this))},freeze:function(){this.frozen=!0,this.addClass("frozen")},unfreeze:function(){this.frozen=!1,this.removeClass("frozen")},top:function(){this.hasClass("top")||(this.addClass("top"),this.removeClass("notTop"),this.onTop&&this.onTop.call(this))},notTop:function(){this.hasClass("notTop")||(this.addClass("notTop"),this.removeClass("top"),this.onNotTop&&this.onNotTop.call(this))},bottom:function(){this.hasClass("bottom")||(this.addClass("bottom"),this.removeClass("notBottom"),this.onBottom&&this.onBottom.call(this))},notBottom:function(){this.hasClass("notBottom")||(this.addClass("notBottom"),this.removeClass("bottom"),this.onNotBottom&&this.onNotBottom.call(this))},shouldUnpin:function(t){return"down"===t.direction&&!t.top&&t.toleranceExceeded},shouldPin:function(t){return"up"===t.direction&&t.toleranceExceeded||t.top},addClass:function(t){this.elem.classList.add(this.classes[t])},removeClass:function(t){this.elem.classList.remove(this.classes[t])},hasClass:function(t){return this.elem.classList.contains(this.classes[t])},update:function(t){t.isOutOfBounds||!0!==this.frozen&&(t.top?this.top():this.notTop(),t.bottom?this.bottom():this.notBottom(),this.shouldUnpin(t)?this.unpin():this.shouldPin(t)&&this.pin())}},u.options={tolerance:{up:0,down:0},offset:0,scroller:t()?window:null,classes:{frozen:"headroom--frozen",pinned:"headroom--pinned",unpinned:"headroom--unpinned",top:"headroom--top",notTop:"headroom--not-top",bottom:"headroom--bottom",notBottom:"headroom--not-bottom",initial:"headroom"}},u.cutsTheMustard=i(),u}()},function(t,e,i){var n;!function(o,s,r,a){"use strict";var l,c=["","webkit","Moz","MS","ms","o"],u=s.createElement("div"),h=Math.round,p=Math.abs,d=Date.now;function f(t,e,i){return setTimeout(E(t,i),e)}function m(t,e,i){return!!Array.isArray(t)&&(g(t,i[e],i),!0)}function g(t,e,i){var n;if(t)if(t.forEach)t.forEach(e,i);else if(t.length!==a)for(n=0;n<t.length;)e.call(i,t[n],n,t),n++;else for(n in t)t.hasOwnProperty(n)&&e.call(i,t[n],n,t)}function v(t,e,i){var n="DEPRECATED METHOD: "+e+"\n"+i+" AT \n";return function(){var e=new Error("get-stack-trace"),i=e&&e.stack?e.stack.replace(/^[^\(]+?[\n$]/gm,"").replace(/^\s+at\s+/gm,"").replace(/^Object.<anonymous>\s*\(/gm,"{anonymous}()@"):"Unknown Stack Trace",s=o.console&&(o.console.warn||o.console.log);return s&&s.call(o.console,n,i),t.apply(this,arguments)}}l="function"!=typeof Object.assign?function(t){if(t===a||null===t)throw new TypeError("Cannot convert undefined or null to object");for(var e=Object(t),i=1;i<arguments.length;i++){var n=arguments[i];if(n!==a&&null!==n)for(var o in n)n.hasOwnProperty(o)&&(e[o]=n[o])}return e}:Object.assign;var y=v((function(t,e,i){for(var n=Object.keys(e),o=0;o<n.length;)(!i||i&&t[n[o]]===a)&&(t[n[o]]=e[n[o]]),o++;return t}),"extend","Use `assign`."),T=v((function(t,e){return y(t,e,!0)}),"merge","Use `assign`.");function b(t,e,i){var n,o=e.prototype;(n=t.prototype=Object.create(o)).constructor=t,n._super=o,i&&l(n,i)}function E(t,e){return function(){return t.apply(e,arguments)}}function x(t,e){return"function"==typeof t?t.apply(e&&e[0]||a,e):t}function w(t,e){return t===a?e:t}function A(t,e,i){g(S(e),(function(e){t.addEventListener(e,i,!1)}))}function I(t,e,i){g(S(e),(function(e){t.removeEventListener(e,i,!1)}))}function C(t,e){for(;t;){if(t==e)return!0;t=t.parentNode}return!1}function P(t,e){return t.indexOf(e)>-1}function S(t){return t.trim().split(/\s+/g)}function j(t,e,i){if(t.indexOf&&!i)return t.indexOf(e);for(var n=0;n<t.length;){if(i&&t[n][i]==e||!i&&t[n]===e)return n;n++}return-1}function $(t){return Array.prototype.slice.call(t,0)}function O(t,e,i){for(var n=[],o=[],s=0;s<t.length;){var r=e?t[s][e]:t[s];j(o,r)<0&&n.push(t[s]),o[s]=r,s++}return i&&(n=e?n.sort((function(t,i){return t[e]>i[e]})):n.sort()),n}function M(t,e){for(var i,n,o=e[0].toUpperCase()+e.slice(1),s=0;s<c.length;){if((n=(i=c[s])?i+o:e)in t)return n;s++}return a}var z=1;function D(t){var e=t.ownerDocument||t;return e.defaultView||e.parentWindow||o}var L="ontouchstart"in o,R=M(o,"PointerEvent")!==a,_=L&&/mobile|tablet|ip(ad|hone|od)|android/i.test(navigator.userAgent),H="touch",N="mouse",k=24,V=["x","y"],Y=["clientX","clientY"];function F(t,e){var i=this;this.manager=t,this.callback=e,this.element=t.element,this.target=t.options.inputTarget,this.domHandler=function(e){x(t.options.enable,[t])&&i.handler(e)},this.init()}function W(t,e,i){var n=i.pointers.length,o=i.changedPointers.length,s=1&e&&n-o==0,r=12&e&&n-o==0;i.isFirst=!!s,i.isFinal=!!r,s&&(t.session={}),i.eventType=e,function(t,e){var i=t.session,n=e.pointers,o=n.length;i.firstInput||(i.firstInput=B(e));o>1&&!i.firstMultiple?i.firstMultiple=B(e):1===o&&(i.firstMultiple=!1);var s=i.firstInput,r=i.firstMultiple,l=r?r.center:s.center,c=e.center=X(n);e.timeStamp=d(),e.deltaTime=e.timeStamp-s.timeStamp,e.angle=Q(l,c),e.distance=G(l,c),function(t,e){var i=e.center,n=t.offsetDelta||{},o=t.prevDelta||{},s=t.prevInput||{};1!==e.eventType&&4!==s.eventType||(o=t.prevDelta={x:s.deltaX||0,y:s.deltaY||0},n=t.offsetDelta={x:i.x,y:i.y});e.deltaX=o.x+(i.x-n.x),e.deltaY=o.y+(i.y-n.y)}(i,e),e.offsetDirection=U(e.deltaX,e.deltaY);var u=q(e.deltaTime,e.deltaX,e.deltaY);e.overallVelocityX=u.x,e.overallVelocityY=u.y,e.overallVelocity=p(u.x)>p(u.y)?u.x:u.y,e.scale=r?(h=r.pointers,f=n,G(f[0],f[1],Y)/G(h[0],h[1],Y)):1,e.rotation=r?function(t,e){return Q(e[1],e[0],Y)+Q(t[1],t[0],Y)}(r.pointers,n):0,e.maxPointers=i.prevInput?e.pointers.length>i.prevInput.maxPointers?e.pointers.length:i.prevInput.maxPointers:e.pointers.length,function(t,e){var i,n,o,s,r=t.lastInterval||e,l=e.timeStamp-r.timeStamp;if(8!=e.eventType&&(l>25||r.velocity===a)){var c=e.deltaX-r.deltaX,u=e.deltaY-r.deltaY,h=q(l,c,u);n=h.x,o=h.y,i=p(h.x)>p(h.y)?h.x:h.y,s=U(c,u),t.lastInterval=e}else i=r.velocity,n=r.velocityX,o=r.velocityY,s=r.direction;e.velocity=i,e.velocityX=n,e.velocityY=o,e.direction=s}(i,e);var h,f;var m=t.element;C(e.srcEvent.target,m)&&(m=e.srcEvent.target);e.target=m}(t,i),t.emit("hammer.input",i),t.recognize(i),t.session.prevInput=i}function B(t){for(var e=[],i=0;i<t.pointers.length;)e[i]={clientX:h(t.pointers[i].clientX),clientY:h(t.pointers[i].clientY)},i++;return{timeStamp:d(),pointers:e,center:X(e),deltaX:t.deltaX,deltaY:t.deltaY}}function X(t){var e=t.length;if(1===e)return{x:h(t[0].clientX),y:h(t[0].clientY)};for(var i=0,n=0,o=0;o<e;)i+=t[o].clientX,n+=t[o].clientY,o++;return{x:h(i/e),y:h(n/e)}}function q(t,e,i){return{x:e/t||0,y:i/t||0}}function U(t,e){return t===e?1:p(t)>=p(e)?t<0?2:4:e<0?8:16}function G(t,e,i){i||(i=V);var n=e[i[0]]-t[i[0]],o=e[i[1]]-t[i[1]];return Math.sqrt(n*n+o*o)}function Q(t,e,i){i||(i=V);var n=e[i[0]]-t[i[0]],o=e[i[1]]-t[i[1]];return 180*Math.atan2(o,n)/Math.PI}F.prototype={handler:function(){},init:function(){this.evEl&&A(this.element,this.evEl,this.domHandler),this.evTarget&&A(this.target,this.evTarget,this.domHandler),this.evWin&&A(D(this.element),this.evWin,this.domHandler)},destroy:function(){this.evEl&&I(this.element,this.evEl,this.domHandler),this.evTarget&&I(this.target,this.evTarget,this.domHandler),this.evWin&&I(D(this.element),this.evWin,this.domHandler)}};var Z={mousedown:1,mousemove:2,mouseup:4},J="mousedown",K="mousemove mouseup";function tt(){this.evEl=J,this.evWin=K,this.pressed=!1,F.apply(this,arguments)}b(tt,F,{handler:function(t){var e=Z[t.type];1&e&&0===t.button&&(this.pressed=!0),2&e&&1!==t.which&&(e=4),this.pressed&&(4&e&&(this.pressed=!1),this.callback(this.manager,e,{pointers:[t],changedPointers:[t],pointerType:N,srcEvent:t}))}});var et={pointerdown:1,pointermove:2,pointerup:4,pointercancel:8,pointerout:8},it={2:H,3:"pen",4:N,5:"kinect"},nt="pointerdown",ot="pointermove pointerup pointercancel";function st(){this.evEl=nt,this.evWin=ot,F.apply(this,arguments),this.store=this.manager.session.pointerEvents=[]}o.MSPointerEvent&&!o.PointerEvent&&(nt="MSPointerDown",ot="MSPointerMove MSPointerUp MSPointerCancel"),b(st,F,{handler:function(t){var e=this.store,i=!1,n=t.type.toLowerCase().replace("ms",""),o=et[n],s=it[t.pointerType]||t.pointerType,r=s==H,a=j(e,t.pointerId,"pointerId");1&o&&(0===t.button||r)?a<0&&(e.push(t),a=e.length-1):12&o&&(i=!0),a<0||(e[a]=t,this.callback(this.manager,o,{pointers:e,changedPointers:[t],pointerType:s,srcEvent:t}),i&&e.splice(a,1))}});var rt={touchstart:1,touchmove:2,touchend:4,touchcancel:8},at="touchstart",lt="touchstart touchmove touchend touchcancel";function ct(){this.evTarget=at,this.evWin=lt,this.started=!1,F.apply(this,arguments)}function ut(t,e){var i=$(t.touches),n=$(t.changedTouches);return 12&e&&(i=O(i.concat(n),"identifier",!0)),[i,n]}b(ct,F,{handler:function(t){var e=rt[t.type];if(1===e&&(this.started=!0),this.started){var i=ut.call(this,t,e);12&e&&i[0].length-i[1].length==0&&(this.started=!1),this.callback(this.manager,e,{pointers:i[0],changedPointers:i[1],pointerType:H,srcEvent:t})}}});var ht={touchstart:1,touchmove:2,touchend:4,touchcancel:8},pt="touchstart touchmove touchend touchcancel";function dt(){this.evTarget=pt,this.targetIds={},F.apply(this,arguments)}function ft(t,e){var i=$(t.touches),n=this.targetIds;if(3&e&&1===i.length)return n[i[0].identifier]=!0,[i,i];var o,s,r=$(t.changedTouches),a=[],l=this.target;if(s=i.filter((function(t){return C(t.target,l)})),1===e)for(o=0;o<s.length;)n[s[o].identifier]=!0,o++;for(o=0;o<r.length;)n[r[o].identifier]&&a.push(r[o]),12&e&&delete n[r[o].identifier],o++;return a.length?[O(s.concat(a),"identifier",!0),a]:void 0}b(dt,F,{handler:function(t){var e=ht[t.type],i=ft.call(this,t,e);i&&this.callback(this.manager,e,{pointers:i[0],changedPointers:i[1],pointerType:H,srcEvent:t})}});function mt(){F.apply(this,arguments);var t=E(this.handler,this);this.touch=new dt(this.manager,t),this.mouse=new tt(this.manager,t),this.primaryTouch=null,this.lastTouches=[]}function gt(t,e){1&t?(this.primaryTouch=e.changedPointers[0].identifier,vt.call(this,e)):12&t&&vt.call(this,e)}function vt(t){var e=t.changedPointers[0];if(e.identifier===this.primaryTouch){var i={x:e.clientX,y:e.clientY};this.lastTouches.push(i);var n=this.lastTouches;setTimeout((function(){var t=n.indexOf(i);t>-1&&n.splice(t,1)}),2500)}}function yt(t){for(var e=t.srcEvent.clientX,i=t.srcEvent.clientY,n=0;n<this.lastTouches.length;n++){var o=this.lastTouches[n],s=Math.abs(e-o.x),r=Math.abs(i-o.y);if(s<=25&&r<=25)return!0}return!1}b(mt,F,{handler:function(t,e,i){var n=i.pointerType==H,o=i.pointerType==N;if(!(o&&i.sourceCapabilities&&i.sourceCapabilities.firesTouchEvents)){if(n)gt.call(this,e,i);else if(o&&yt.call(this,i))return;this.callback(t,e,i)}},destroy:function(){this.touch.destroy(),this.mouse.destroy()}});var Tt=M(u.style,"touchAction"),bt=Tt!==a,Et="compute",xt="auto",wt="manipulation",At="none",It="pan-x",Ct="pan-y",Pt=function(){if(!bt)return!1;var t={},e=o.CSS&&o.CSS.supports;return["auto","manipulation","pan-y","pan-x","pan-x pan-y","none"].forEach((function(i){t[i]=!e||o.CSS.supports("touch-action",i)})),t}();function St(t,e){this.manager=t,this.set(e)}St.prototype={set:function(t){t==Et&&(t=this.compute()),bt&&this.manager.element.style&&Pt[t]&&(this.manager.element.style[Tt]=t),this.actions=t.toLowerCase().trim()},update:function(){this.set(this.manager.options.touchAction)},compute:function(){var t=[];return g(this.manager.recognizers,(function(e){x(e.options.enable,[e])&&(t=t.concat(e.getTouchAction()))})),function(t){if(P(t,At))return At;var e=P(t,It),i=P(t,Ct);if(e&&i)return At;if(e||i)return e?It:Ct;if(P(t,wt))return wt;return xt}(t.join(" "))},preventDefaults:function(t){var e=t.srcEvent,i=t.offsetDirection;if(this.manager.session.prevented)e.preventDefault();else{var n=this.actions,o=P(n,At)&&!Pt.none,s=P(n,Ct)&&!Pt["pan-y"],r=P(n,It)&&!Pt["pan-x"];if(o){var a=1===t.pointers.length,l=t.distance<2,c=t.deltaTime<250;if(a&&l&&c)return}if(!r||!s)return o||s&&6&i||r&&i&k?this.preventSrc(e):void 0}},preventSrc:function(t){this.manager.session.prevented=!0,t.preventDefault()}};var jt=32;function $t(t){this.options=l({},this.defaults,t||{}),this.id=z++,this.manager=null,this.options.enable=w(this.options.enable,!0),this.state=1,this.simultaneous={},this.requireFail=[]}function Ot(t){return 16&t?"cancel":8&t?"end":4&t?"move":2&t?"start":""}function Mt(t){return 16==t?"down":8==t?"up":2==t?"left":4==t?"right":""}function zt(t,e){var i=e.manager;return i?i.get(t):t}function Dt(){$t.apply(this,arguments)}function Lt(){Dt.apply(this,arguments),this.pX=null,this.pY=null}function Rt(){Dt.apply(this,arguments)}function _t(){$t.apply(this,arguments),this._timer=null,this._input=null}function Ht(){Dt.apply(this,arguments)}function Nt(){Dt.apply(this,arguments)}function kt(){$t.apply(this,arguments),this.pTime=!1,this.pCenter=!1,this._timer=null,this._input=null,this.count=0}function Vt(t,e){return(e=e||{}).recognizers=w(e.recognizers,Vt.defaults.preset),new Yt(t,e)}$t.prototype={defaults:{},set:function(t){return l(this.options,t),this.manager&&this.manager.touchAction.update(),this},recognizeWith:function(t){if(m(t,"recognizeWith",this))return this;var e=this.simultaneous;return e[(t=zt(t,this)).id]||(e[t.id]=t,t.recognizeWith(this)),this},dropRecognizeWith:function(t){return m(t,"dropRecognizeWith",this)||(t=zt(t,this),delete this.simultaneous[t.id]),this},requireFailure:function(t){if(m(t,"requireFailure",this))return this;var e=this.requireFail;return-1===j(e,t=zt(t,this))&&(e.push(t),t.requireFailure(this)),this},dropRequireFailure:function(t){if(m(t,"dropRequireFailure",this))return this;t=zt(t,this);var e=j(this.requireFail,t);return e>-1&&this.requireFail.splice(e,1),this},hasRequireFailures:function(){return this.requireFail.length>0},canRecognizeWith:function(t){return!!this.simultaneous[t.id]},emit:function(t){var e=this,i=this.state;function n(i){e.manager.emit(i,t)}i<8&&n(e.options.event+Ot(i)),n(e.options.event),t.additionalEvent&&n(t.additionalEvent),i>=8&&n(e.options.event+Ot(i))},tryEmit:function(t){if(this.canEmit())return this.emit(t);this.state=jt},canEmit:function(){for(var t=0;t<this.requireFail.length;){if(!(33&this.requireFail[t].state))return!1;t++}return!0},recognize:function(t){var e=l({},t);if(!x(this.options.enable,[this,e]))return this.reset(),void(this.state=jt);56&this.state&&(this.state=1),this.state=this.process(e),30&this.state&&this.tryEmit(e)},process:function(t){},getTouchAction:function(){},reset:function(){}},b(Dt,$t,{defaults:{pointers:1},attrTest:function(t){var e=this.options.pointers;return 0===e||t.pointers.length===e},process:function(t){var e=this.state,i=t.eventType,n=6&e,o=this.attrTest(t);return n&&(8&i||!o)?16|e:n||o?4&i?8|e:2&e?4|e:2:jt}}),b(Lt,Dt,{defaults:{event:"pan",threshold:10,pointers:1,direction:30},getTouchAction:function(){var t=this.options.direction,e=[];return 6&t&&e.push(Ct),t&k&&e.push(It),e},directionTest:function(t){var e=this.options,i=!0,n=t.distance,o=t.direction,s=t.deltaX,r=t.deltaY;return o&e.direction||(6&e.direction?(o=0===s?1:s<0?2:4,i=s!=this.pX,n=Math.abs(t.deltaX)):(o=0===r?1:r<0?8:16,i=r!=this.pY,n=Math.abs(t.deltaY))),t.direction=o,i&&n>e.threshold&&o&e.direction},attrTest:function(t){return Dt.prototype.attrTest.call(this,t)&&(2&this.state||!(2&this.state)&&this.directionTest(t))},emit:function(t){this.pX=t.deltaX,this.pY=t.deltaY;var e=Mt(t.direction);e&&(t.additionalEvent=this.options.event+e),this._super.emit.call(this,t)}}),b(Rt,Dt,{defaults:{event:"pinch",threshold:0,pointers:2},getTouchAction:function(){return[At]},attrTest:function(t){return this._super.attrTest.call(this,t)&&(Math.abs(t.scale-1)>this.options.threshold||2&this.state)},emit:function(t){if(1!==t.scale){var e=t.scale<1?"in":"out";t.additionalEvent=this.options.event+e}this._super.emit.call(this,t)}}),b(_t,$t,{defaults:{event:"press",pointers:1,time:251,threshold:9},getTouchAction:function(){return[xt]},process:function(t){var e=this.options,i=t.pointers.length===e.pointers,n=t.distance<e.threshold,o=t.deltaTime>e.time;if(this._input=t,!n||!i||12&t.eventType&&!o)this.reset();else if(1&t.eventType)this.reset(),this._timer=f((function(){this.state=8,this.tryEmit()}),e.time,this);else if(4&t.eventType)return 8;return jt},reset:function(){clearTimeout(this._timer)},emit:function(t){8===this.state&&(t&&4&t.eventType?this.manager.emit(this.options.event+"up",t):(this._input.timeStamp=d(),this.manager.emit(this.options.event,this._input)))}}),b(Ht,Dt,{defaults:{event:"rotate",threshold:0,pointers:2},getTouchAction:function(){return[At]},attrTest:function(t){return this._super.attrTest.call(this,t)&&(Math.abs(t.rotation)>this.options.threshold||2&this.state)}}),b(Nt,Dt,{defaults:{event:"swipe",threshold:10,velocity:.3,direction:30,pointers:1},getTouchAction:function(){return Lt.prototype.getTouchAction.call(this)},attrTest:function(t){var e,i=this.options.direction;return 30&i?e=t.overallVelocity:6&i?e=t.overallVelocityX:i&k&&(e=t.overallVelocityY),this._super.attrTest.call(this,t)&&i&t.offsetDirection&&t.distance>this.options.threshold&&t.maxPointers==this.options.pointers&&p(e)>this.options.velocity&&4&t.eventType},emit:function(t){var e=Mt(t.offsetDirection);e&&this.manager.emit(this.options.event+e,t),this.manager.emit(this.options.event,t)}}),b(kt,$t,{defaults:{event:"tap",pointers:1,taps:1,interval:300,time:250,threshold:9,posThreshold:10},getTouchAction:function(){return[wt]},process:function(t){var e=this.options,i=t.pointers.length===e.pointers,n=t.distance<e.threshold,o=t.deltaTime<e.time;if(this.reset(),1&t.eventType&&0===this.count)return this.failTimeout();if(n&&o&&i){if(4!=t.eventType)return this.failTimeout();var s=!this.pTime||t.timeStamp-this.pTime<e.interval,r=!this.pCenter||G(this.pCenter,t.center)<e.posThreshold;if(this.pTime=t.timeStamp,this.pCenter=t.center,r&&s?this.count+=1:this.count=1,this._input=t,0===this.count%e.taps)return this.hasRequireFailures()?(this._timer=f((function(){this.state=8,this.tryEmit()}),e.interval,this),2):8}return jt},failTimeout:function(){return this._timer=f((function(){this.state=jt}),this.options.interval,this),jt},reset:function(){clearTimeout(this._timer)},emit:function(){8==this.state&&(this._input.tapCount=this.count,this.manager.emit(this.options.event,this._input))}}),Vt.VERSION="2.0.7",Vt.defaults={domEvents:!1,touchAction:Et,enable:!0,inputTarget:null,inputClass:null,preset:[[Ht,{enable:!1}],[Rt,{enable:!1},["rotate"]],[Nt,{direction:6}],[Lt,{direction:6},["swipe"]],[kt],[kt,{event:"doubletap",taps:2},["tap"]],[_t]],cssProps:{userSelect:"none",touchSelect:"none",touchCallout:"none",contentZooming:"none",userDrag:"none",tapHighlightColor:"rgba(0,0,0,0)"}};function Yt(t,e){var i;this.options=l({},Vt.defaults,e||{}),this.options.inputTarget=this.options.inputTarget||t,this.handlers={},this.session={},this.recognizers=[],this.oldCssProps={},this.element=t,this.input=new((i=this).options.inputClass||(R?st:_?dt:L?mt:tt))(i,W),this.touchAction=new St(this,this.options.touchAction),Ft(this,!0),g(this.options.recognizers,(function(t){var e=this.add(new t[0](t[1]));t[2]&&e.recognizeWith(t[2]),t[3]&&e.requireFailure(t[3])}),this)}function Ft(t,e){var i,n=t.element;n.style&&(g(t.options.cssProps,(function(o,s){i=M(n.style,s),e?(t.oldCssProps[i]=n.style[i],n.style[i]=o):n.style[i]=t.oldCssProps[i]||""})),e||(t.oldCssProps={}))}Yt.prototype={set:function(t){return l(this.options,t),t.touchAction&&this.touchAction.update(),t.inputTarget&&(this.input.destroy(),this.input.target=t.inputTarget,this.input.init()),this},stop:function(t){this.session.stopped=t?2:1},recognize:function(t){var e=this.session;if(!e.stopped){var i;this.touchAction.preventDefaults(t);var n=this.recognizers,o=e.curRecognizer;(!o||o&&8&o.state)&&(o=e.curRecognizer=null);for(var s=0;s<n.length;)i=n[s],2===e.stopped||o&&i!=o&&!i.canRecognizeWith(o)?i.reset():i.recognize(t),!o&&14&i.state&&(o=e.curRecognizer=i),s++}},get:function(t){if(t instanceof $t)return t;for(var e=this.recognizers,i=0;i<e.length;i++)if(e[i].options.event==t)return e[i];return null},add:function(t){if(m(t,"add",this))return this;var e=this.get(t.options.event);return e&&this.remove(e),this.recognizers.push(t),t.manager=this,this.touchAction.update(),t},remove:function(t){if(m(t,"remove",this))return this;if(t=this.get(t)){var e=this.recognizers,i=j(e,t);-1!==i&&(e.splice(i,1),this.touchAction.update())}return this},on:function(t,e){if(t!==a&&e!==a){var i=this.handlers;return g(S(t),(function(t){i[t]=i[t]||[],i[t].push(e)})),this}},off:function(t,e){if(t!==a){var i=this.handlers;return g(S(t),(function(t){e?i[t]&&i[t].splice(j(i[t],e),1):delete i[t]})),this}},emit:function(t,e){this.options.domEvents&&function(t,e){var i=s.createEvent("Event");i.initEvent(t,!0,!0),i.gesture=e,e.target.dispatchEvent(i)}(t,e);var i=this.handlers[t]&&this.handlers[t].slice();if(i&&i.length){e.type=t,e.preventDefault=function(){e.srcEvent.preventDefault()};for(var n=0;n<i.length;)i[n](e),n++}},destroy:function(){this.element&&Ft(this,!1),this.handlers={},this.session={},this.input.destroy(),this.element=null}},l(Vt,{INPUT_START:1,INPUT_MOVE:2,INPUT_END:4,INPUT_CANCEL:8,STATE_POSSIBLE:1,STATE_BEGAN:2,STATE_CHANGED:4,STATE_ENDED:8,STATE_RECOGNIZED:8,STATE_CANCELLED:16,STATE_FAILED:jt,DIRECTION_NONE:1,DIRECTION_LEFT:2,DIRECTION_RIGHT:4,DIRECTION_UP:8,DIRECTION_DOWN:16,DIRECTION_HORIZONTAL:6,DIRECTION_VERTICAL:k,DIRECTION_ALL:30,Manager:Yt,Input:F,TouchAction:St,TouchInput:dt,MouseInput:tt,PointerEventInput:st,TouchMouseInput:mt,SingleTouchInput:ct,Recognizer:$t,AttrRecognizer:Dt,Tap:kt,Pan:Lt,Swipe:Nt,Pinch:Rt,Rotate:Ht,Press:_t,on:A,off:I,each:g,merge:T,extend:y,assign:l,inherit:b,bindFn:E,prefixed:M}),(void 0!==o?o:"undefined"!=typeof self?self:{}).Hammer=Vt,(n=function(){return Vt}.call(e,i,e,t))===a||(t.exports=n)}(window,document)},function(){jQuery(document).ready((function(t){t(".jarallax-contain").jarallax({speed:.8,imgSize:"contain"})}))}],e={};function i(n){var o=e[n];if(void 0!==o)return o.exports;var s=e[n]={exports:{}};return t[n].call(s.exports,s,s.exports,i),s.exports}i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,{a:e}),e},i.d=function(t,e){for(var n in e)i.o(e,n)&&!i.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},i.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"==typeof window)return window}}(),i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})};var n={};!function(){"use strict";i.r(n);i(1),i(2),i(3);i(4),i(5)}()}();