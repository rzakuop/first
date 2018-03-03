window.$ = window.jQuery = require('jquery');
require('jquery-ujs');
//require('tether');
require('bootstrap');
require('bootstrap-datepicker');

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayBtn: 'linked',
    clearBtn: true,
    todayHighlight: true
});

