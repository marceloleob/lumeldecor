!function(e){var t={};function r(n){if(t[n])return t[n].exports;var a=t[n]={i:n,l:!1,exports:{}};return e[n].call(a.exports,a,a.exports,r),a.l=!0,a.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)r.d(n,a,function(t){return e[t]}.bind(null,a));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="/",r(r.s=60)}({60:function(e,t,r){r(61),e.exports=r(62)},61:function(e,t){$(document).ready((function(){if($('select[name="category_id"]').length){if($('input[name="category_id_hide"]').val()&&setTimeout((function(){t($('select[name="material_id"]').val(),$('input[name="category_id_hide"]').val())}),1e3),$('select[name="material_id"]').val()&&!$('input[name="category_id_hide"]').val()){var e=$('select[name="category_id"]');e.selectpicker("refresh"),e.selectpicker({title:"Carregando..."}),e.selectpicker("render"),t($('select[name="material_id"]').val(),null)}$('select[name="material_id"]').change((function(){var e=$('select[name="category_id"]');e.selectpicker("refresh"),e.selectpicker({title:"Carregando..."}),e.selectpicker("render"),t($(this).val(),null)}))}function t(e,t){var r="../category/options";if($("#id").length)r="../../category/options";$.ajax({url:r,type:"POST",dataType:"html",data:{material:e,category:t},success:function(e){var t=$('select[name="category_id"]');t.selectpicker("refresh"),t.selectpicker({title:"Selecione uma Categoria"}),t.append(e),t.selectpicker("render"),t.selectpicker("refresh")}})}}))},62:function(e,t){$(document).ready((function(){$(".action").length&&$(".action").change((function(e){e.preventDefault();var t,r=$('select[name="reason_id"]');r.selectpicker("refresh").empty(),r.selectpicker({title:"Carregando..."}),r.selectpicker("render"),t=$(this).val(),$.ajax({url:"../../reason/options",type:"POST",dataType:"html",data:{action:t},success:function(e){var t=$("#reason_id");t.selectpicker("refresh"),t.selectpicker({title:"Selecione um Motivo"}),t.append(e),t.selectpicker("render"),t.selectpicker("refresh")}})}))}))}});