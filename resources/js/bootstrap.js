import _ from 'lodash';
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import mask from '@alpinejs/mask';
import Swiper, {Autoplay, Navigation, Pagination, Controller, EffectFade, Thumbs,} from 'swiper'
import ymaps from 'ymaps'

window._ = _;

try {
    window.Swiper = Swiper.use([Autoplay, Navigation, Pagination, Controller, EffectFade, Thumbs]);
} catch (e) {}

window.ymaps = ymaps

Alpine.plugin(focus)
Alpine.plugin(mask)

window.Alpine = Alpine

Alpine.start()

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
