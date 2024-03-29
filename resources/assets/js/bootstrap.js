/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
import axios from "axios";
// import "bootstrap";
import jquery from "jquery";
import PopperJs from "@popperjs/core";

// import "./modernizr-custom";

window.$ = window.jQuery = jquery;
window.PopperJs = PopperJs.default;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */
window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */
const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
    // Posta o token do form toda fez que for ativado um post por ajax
    $.ajaxPrefilter(function (options, originalOptions, jqXHR) {
        return jqXHR.setRequestHeader("X-CSRF-Token", token.content);
    });
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

/**
 * API Token as common header
 */
const apiToken = document.head.querySelector('meta[name="api-token"]');

if (apiToken) {
    window.axios.defaults.headers.common.Authorization =
        "Bearer " + apiToken.content;
}
