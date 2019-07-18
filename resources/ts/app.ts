import * as Sentry from '@sentry/browser';
import * as Integrations from '@sentry/integrations';
import Inertia from 'inertia-vue';
import Vue from 'vue';

Vue.use(Inertia);

if (process.env.MIX_SENTRY_DSN) {
    Sentry.init({
        dsn: process.env.MIX_SENTRY_DSN,
        integrations: [new Integrations.Vue({Vue, attachProps: true})],
    });
}

const app = document.getElementById('app');
if (!app) {
    throw new Error('#app element does not exist!');
}

const page = app.dataset.page;

if (!page) {
    throw new Error('page dataset on #app does not exists!');
}

new Vue({
    render: (h) => h(Inertia, {
        props: {
            initialPage: JSON.parse(page),
            resolveComponent: (name: string) => import(`@/Pages/${name}`).then((module) => module.default),
        },
    }),
}).$mount(app);

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
