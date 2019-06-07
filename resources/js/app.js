import Vue from 'vue';
import FlashNotification from './components/FlashNotification';

new Vue({
    components: { FlashNotification }
}).$mount('#app');

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
