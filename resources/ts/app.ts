import * as Sentry from '@sentry/browser';
import * as Integrations from '@sentry/integrations';
import Vue from 'vue';
import FlashNotification from './components/FlashNotification';

if (process.env.MIX_SENTRY_DSN) {
    Sentry.init({
        dsn: process.env.MIX_SENTRY_DSN,
        integrations: [new Integrations.Vue({Vue, attachProps: true})],
    });
}

new Vue({
    components: {FlashNotification},
}).$mount('#app');

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
