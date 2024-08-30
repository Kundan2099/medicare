import Alpine from 'alpinejs';
import $ from "jquery";
import swal from 'sweetalert';
import Toastify from 'toastify-js';

window.Alpine = Alpine;

window.Toastify = Toastify;

window.jQuery = window.$ = $

const feather = require('feather-icons');
feather.replace();

window.feather = feather;

Alpine.start();