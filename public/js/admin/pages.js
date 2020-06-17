!function(e){var t={};function n(r){if(t[r])return t[r].exports;var i=t[r]={i:r,l:!1,exports:{}};return e[r].call(i.exports,i,i.exports,n),i.l=!0,i.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)n.d(r,i,function(t){return e[t]}.bind(null,i));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=51)}({51:function(e,t,n){n(52),n(53),n(54),n(55),n(56),n(57),n(58),n(59),n(60),n(61),n(62),e.exports=n(63)},52:function(e,t){$(document).ready((function(){$("#form-campaign").length&&$("#form-campaign").validate({rules:{name:{required:!0,minlength:2,maxlength:100},start_day:{required:!0},start_month:{required:!0},finish_day:{required:!0},finish_month:{required:!0}}})}))},53:function(e,t){$(document).ready((function(){$("#form-category").length&&$("#form-category").validate({rules:{material_id:{required:!0},name:{required:!0,minlength:2,maxlength:100}}})}))},54:function(e,t){$(document).ready((function(){$("#form-color").length&&$("#form-color").validate({rules:{name:{required:!0,minlength:2,maxlength:100}}})}))},55:function(e,t){$(document).ready((function(){function e(){var e="success",t=parseFloat($("#s_price").val().replace(".","").replace(",",".")),n=parseFloat($("#p_price").val().replace(".","").replace(",",".")),r=parseFloat(100*(t-n)/n).toFixed(2);r<=10&&(e="danger"),r>10&&r<100&&(e="warning"),$(".profit-margin").html('<span class="text-'+e+'">'+r.replace(".",",")+"% de lucro</span>")}$("#form-item").length&&($("#form-item").validate({rules:{product_id:{required:!0},product_size_id:{required:!0},"colors[]":{required:!0},supplier_id:{required:!0},s_price:{required:!0},p_price:{required:!0},amount:{required:function(){return 0===$("#stock_id").length},digits:!0},"themes[]":{required:!1}}}),jQuery.validator.addClassRules("custom-file-input",{required:function(){return 0===$("#stock_id").length},extension:!0})),$(".custom-file-input").on("change",(function(){var e=$(this).val().split("\\").pop();$(this).siblings(".custom-file-label").addClass("selected").html(e)})),$("#s_price").blur((function(){""!==$(this).val()&&""!==$("#p_price").val()&&e()})),$("#p_price").blur((function(){""!==$(this).val()&&""!==$("#s_price").val()&&e()}))}))},56:function(e,t){$(document).ready((function(){$("#form-material").length&&$("#form-material").validate({rules:{name:{required:!0,minlength:2,maxlength:100}}})}))},57:function(e,t){$(document).ready((function(){$("#form-coupon").length&&$("#form-coupon").validate({rules:{name:{required:!0,minlength:2,maxlength:150},code:{required:!0,minlength:5,maxlength:15},kind:{required:!0},amount:{required:!0},start_date:{required:!0},finish_date:{required:!0}}}),$('select[name="kind"]').change((function(){"V"==$(this).val()?($(".append-kind").text(""),$(".prepend-kind").text("R$")):"P"==$(this).val()&&($(".append-kind").text("%"),$(".prepend-kind").text(""))})),$('select[name="kind"]').val()&&("V"==$("").val()?($(".append-kind").text(""),$(".prepend-kind").text("R$")):"P"==$('select[name="kind"]').val()&&($(".append-kind").text("%"),$(".prepend-kind").text("")))}))},58:function(e,t){$(document).ready((function(){$("#form-promotion").length&&$("#form-promotion").validate({rules:{name:{required:!0,minlength:2,maxlength:150},kind:{required:!0},amount:{required:!0},start_date:{required:!0},finish_date:{required:!0}}}),$('select[name="kind"]').change((function(){"V"==$(this).val()?($(".append-kind").text(""),$(".prepend-kind").text("R$")):"P"==$(this).val()&&($(".append-kind").text("%"),$(".prepend-kind").text(""))})),$('select[name="kind"]').val()&&("V"==$("").val()?($(".append-kind").text(""),$(".prepend-kind").text("R$")):"P"==$('select[name="kind"]').val()&&($(".append-kind").text("%"),$(".prepend-kind").text("")))}))},59:function(e,t){$(document).ready((function(){$("#form-product").length&&$("#form-product").validate({rules:{material_id:{required:!0},category_id:{required:!0},name:{required:!0,minlength:2,maxlength:300},featured:{required:!1},description:{required:!0,minlength:5,maxlength:2e3}}}),$(".nav-product").mouseenter((function(){$(this).find("em").css("background","#3f6ad8")})).mouseleave((function(){$(this).hasClass("active")||$(this).find("em").css("background","#adb5bd")}))}))},60:function(e,t){$(document).ready((function(){$("#form-product-size").length&&$("#form-product-size").validate({rules:{size:{required:!0},weight:{required:!0},shape:{required:!0},pro_length:{required:!0},pro_width:{required:function(){return $("#shape-Q").is(":checked")}},pro_height:{required:!0},shi_length:{required:!0},shi_width:{required:function(){return $("#shape-Q").is(":checked")}},shi_height:{required:!0}}}),$(".shape").change((function(e){e.preventDefault();var t=$(this).closest(".card-body").find(".div-width"),n=$(this).closest(".card-body").find(".div-length").find("label");"R"===$(this).val()?(t.addClass("hide"),n.html("Diâmetro")):"Q"===$(this).val()&&(t.removeClass("hide"),n.html("Comprimento"))})),$("#pro_length").keyup((function(e){e.preventDefault(),$("#shi_length").val($(this).val())})),$("#pro_width").keyup((function(e){e.preventDefault(),$("#shi_width").val($(this).val())})),$("#pro_height").keyup((function(e){e.preventDefault(),$("#shi_height").val($(this).val())}))}))},61:function(e,t){$(document).ready((function(){$("#form-promotion").length&&$("#form-promotion").validate({rules:{material_id:{required:!0},category_id:{required:!0},name:{required:!0,minlength:2,maxlength:100}}})}))},62:function(e,t){$(document).ready((function(){function e(){var e=0,t="",n=parseInt($("#current_amount").val()),r=parseInt(""!=$("#amount").val()?$("#amount").val():0);if(0===r)return!1;$("#action-I").is(":checked")&&(e=n+r,t="success"),$("#action-O").is(":checked")&&(e=n-r,t="danger"),$(".new-amount").html('<div class="text-'+t+'">'+e+"</div>")}$("#form-stock").length&&$("#form-stock").validate({rules:{id:{required:!0},product_id:{required:!0},item_id:{required:!0},reason_id:{required:!0},action:{required:!0},amount:{required:!0,digits:!0}}}),$("#amount").keyup((function(t){t.preventDefault(),e()})),$(".action").change((function(t){t.preventDefault(),e()}))}))},63:function(e,t){$(document).ready((function(){$("#form-theme").length&&$("#form-theme").validate({rules:{name:{required:!0,minlength:2,maxlength:100},show:{required:!0}}})}))}});