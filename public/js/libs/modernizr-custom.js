/*! For license information please see modernizr-custom.js.LICENSE.txt */
!function(e){var n={};function t(o){if(n[o])return n[o].exports;var r=n[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,t),r.l=!0,r.exports}t.m=e,t.c=n,t.d=function(e,n,o){t.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:o})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,n){if(1&n&&(e=t(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(t.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var r in e)t.d(o,r,function(n){return e[n]}.bind(null,r));return o},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},t.p="/",t(t.s=51)}({51:function(e,n,t){e.exports=t(52)},52:function(e,n){function t(e){return(t="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}!function(e,n,o){function r(e,n){return t(e)===n}var s=[],a=[],i={_version:"3.6.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout((function(){n(t[e])}),0)},addTest:function(e,n,t){a.push({name:e,fn:n,options:t})},addAsyncTest:function(e){a.push({name:null,fn:e})}},f=function(){};f.prototype=i,f=new f;var u=n.documentElement,l="svg"===u.nodeName.toLowerCase();f.addTest("passiveeventlisteners",(function(){var n=!1;try{var t=Object.defineProperty({},"passive",{get:function(){n=!0}});e.addEventListener("test",null,t)}catch(e){}return n})),function(){var e,n,t,o,i,u;for(var l in a)if(a.hasOwnProperty(l)){if(e=[],(n=a[l]).name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(o=r(n.fn,"function")?n.fn():n.fn,i=0;i<e.length;i++)1===(u=e[i].split(".")).length?f[u[0]]=o:(!f[u[0]]||f[u[0]]instanceof Boolean||(f[u[0]]=new Boolean(f[u[0]])),f[u[0]][u[1]]=o),s.push((o?"":"no-")+u.join("-"))}}(),function(e){var n=u.className,t=f._config.classPrefix||"";if(l&&(n=n.baseVal),f._config.enableJSClass){var o=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(o,"$1"+t+"js$2")}f._config.enableClasses&&(n+=" "+t+e.join(" "+t),l?u.className.baseVal=n:u.className=n)}(s),delete i.addTest,delete i.addAsyncTest;for(var c=0;c<f._q.length;c++)f._q[c]();e.Modernizr=f}(window,document)}});