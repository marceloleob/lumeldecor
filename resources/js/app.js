require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

//import 'jquery-ui/ui/widgets/datepicker.js';
import 'metismenu/dist/metisMenu.min.js';

// Triggers UI Plugin
//$('#datepicker').datepicker();
$("#metismenu").metisMenu();
