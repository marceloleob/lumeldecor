!function(n){var e={};function o(t){if(e[t])return e[t].exports;var u=e[t]={i:t,l:!1,exports:{}};return n[t].call(u.exports,u,u.exports,o),u.l=!0,u.exports}o.m=n,o.c=e,o.d=function(n,e,t){o.o(n,e)||Object.defineProperty(n,e,{enumerable:!0,get:t})},o.r=function(n){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(n,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(n,"__esModule",{value:!0})},o.t=function(n,e){if(1&e&&(n=o(n)),8&e)return n;if(4&e&&"object"==typeof n&&n&&n.__esModule)return n;var t=Object.create(null);if(o.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var u in n)o.d(t,u,function(e){return n[e]}.bind(null,u));return t},o.n=function(n){var e=n&&n.__esModule?function(){return n.default}:function(){return n};return o.d(e,"a",e),e},o.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},o.p="/",o(o.s=46)}({46:function(n,e,o){n.exports=o(47)},47:function(n,e){$(document).ready((function(){$(document).on("focus",".decimal",(function(n){$(".decimal").maskMoney({allowNegative:!1,thousands:".",decimal:",",affixesStay:!0})})),$(document).on("focus",".money",(function(n){$(".money").maskMoney({prefix:"R$ ",allowNegative:!1,thousands:".",decimal:",",affixesStay:!0})})),$(document).on("focus",".date",(function(n){$(".date").mask("99/99/9999")})),$(document).on("focus",".ssn",(function(n){$(".ssn").mask("999.999.999-99")})),$(document).on("focus",".cnpj",(function(n){$(".cnpj").mask("99.999.999/9999-99")})),$(document).on("focus",".zip",(function(n){$(".zip").mask("99999")})),$(document).on("focus",".phone",(function(n){$(".phone").mask("(999) 999-9999")}))}))}});
//# sourceMappingURL=jquery.masks.pt-br.js.map