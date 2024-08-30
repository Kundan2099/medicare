import axios from 'axios';
window.axios = axios;
import Toastify from 'toastify-js';

window.Toastify = Toastify;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Alpine from 'alpinejs';
import Tagify from '@yaireo/tagify';
import swal from 'sweetalert';
import "./datatable";
import $ from "jquery";

window.swal = swal;

window.Tagify = Tagify;

window.Alpine = Alpine;

window.jQuery = window.$ = $

const feather = require('feather-icons');
feather.replace();
window.feather = feather;

Alpine.start();

$(document).ready( function () {
    $('.data-table:not(.ignore)').DataTable({ "order": [[ 0, "asc" ]], });
});

$('.table-dropdown button').click(function() {
    $(this).parent().toggleClass('active');
})
$('.table-dropdown button').blur(function(event) {
    if (!$(this).parent().contains(event.relatedTarget)) {
        $(this).parent().removeClass('active');
    }
});

const toggleSidebar = () => {
    document.getElementById('sidebar').classList.toggle("active");
}

window.toggleSidebar = toggleSidebar;

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
 
window.Pusher = Pusher;
window.Echo = Echo;

const createNotification = (NotificationTitle, NotificationDescription, NotificationTime) => {
    let item = document.createElement('a')
    item.className = "notification-item";

    let body = document.createElement('div');
    body.className = "notification-body";

    let icon = document.createElement('div');
    icon.className = "icon";

    let feather = document.createElement('i');
    feather.setAttribute('data-feather', 'bell');

    let content = document.createElement('div');
    content.className = "content";

    let title = document.createElement('h1');
    title.className = "title";
    title.innerHTML = NotificationTitle;

    let description = document.createElement('p');
    description.className = "description";
    description.innerHTML = NotificationDescription.substr(0, 40) + "...";

    let time = document.createElement('p');
    time.className = "time";
    time.innerHTML = NotificationTime;

    item.append(body);
    content.append(title, description, time);
    icon.append(feather);
    body.append(icon,content);

    return item;
}

const checkNotificaions = () => {
    const notificationCount = document.getElementsByClassName('notification-item').length;
    let message = "";
    const markAsREadButton = document.getElementById('notification-mark-as-read-button');
    if (notificationCount == 0) {
        markAsREadButton.style.display = "none";
        message = "You don't have any unread notifications";
    }
    else if (notificationCount == 1) {
        markAsREadButton.style.display = "block";
        message = "You have 1 unread notification";
    }
    else {
        markAsREadButton.style.display = "block";
        message = `You have ${notificationCount} unread notifications`;
    }
    document.getElementById('notification-status-message').innerHTML = message;
}

window.createNotification = createNotification;
window.checkNotificaions = checkNotificaions;