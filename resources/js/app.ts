import './bootstrap';
import '../css/app.css';
import MainLayout from './Layouts/MainLayout.vue'

import { createApp, h, DefineComponent } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import route from '../../vendor/tightenco/ziggy/dist/index.m';
import Alpine from 'alpinejs';

window.route = (name?: string, params?: RouteParamsWithQueryOverload | RouteParam, absolute?: boolean) => route(name, params, absolute, Ziggy)
Alpine.start()

window.Alpine = Alpine


const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
        const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob<DefineComponent>('./Pages/**/*.vue'))
        page.then((module: any) => {
            module.default.layout = name == 'Welcome' ? module.default.layout : MainLayout;
        });
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#0D5CAB',
    },
});
