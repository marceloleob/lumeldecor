!function(n){var e={};function t(o){if(e[o])return e[o].exports;var u=e[o]={i:o,l:!1,exports:{}};return n[o].call(u.exports,u,u.exports,t),u.l=!0,u.exports}t.m=n,t.c=e,t.d=function(n,e,o){t.o(n,e)||Object.defineProperty(n,e,{enumerable:!0,get:o})},t.r=function(n){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(n,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(n,"__esModule",{value:!0})},t.t=function(n,e){if(1&e&&(n=t(n)),8&e)return n;if(4&e&&"object"==typeof n&&n&&n.__esModule)return n;var o=Object.create(null);if(t.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var u in n)t.d(o,u,function(e){return n[e]}.bind(null,u));return o},t.n=function(n){var e=n&&n.__esModule?function(){return n.default}:function(){return n};return t.d(e,"a",e),e},t.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},t.p="/",t(t.s=34)}({34:function(n,e,t){t(35),t(64),t(86),n.exports=t(91)},35:function(n,e){$(document).ready((function(){$(document).on("focus",".stripspaces",(function(n){$(".stripspaces").keydown((function(n){$(this).val($.trim($(this).val()))}))})),$(document).on("focus",".decimal",(function(n){$(".decimal").maskMoney({allowNegative:!1,thousands:".",decimal:",",affixesStay:!0})})),$(document).on("focus",".weight",(function(n){$(".weight").maskMoney({allowNegative:!1,thousands:".",decimal:",",precision:3,affixesStay:!0})})),$(document).on("focus",".money",(function(n){$(".money").maskMoney({prefix:"R$ ",allowNegative:!1,thousands:".",decimal:",",affixesStay:!0})})),$(document).on("focus",".date",(function(n){$(".date").mask("99/99/9999")})),$(document).on("focus",".ssn",(function(n){$(".ssn").mask("999.999.999-99")})),$(document).on("focus",".cnpj",(function(n){$(".cnpj").mask("99.999.999/9999-99")})),$(document).on("focus",".zip",(function(n){$(".zip").mask("99999")})),$(document).on("focus",".phone",(function(n){$(".phone").mask("(99) 99999999?9").focusin((function(n){$(this).unmask(),$(this).mask("(99) 99999999?9")})).focusout((function(n){var e,t;e=(t=$(this)).val().replace(/\D/g,""),t.unmask(),e.length>10?t.mask("(99) 99999-999?9"):t.mask("(99) 9999-9999?9")}))}))}))},64:function(n,e){},86:function(n,e){},91:function(n,e){}});