import './bootstrap';
import '../css/app.css';

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/vue3';
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers';
import {library} from '@fortawesome/fontawesome-svg-core'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'
import {
    faBars,
    faBook,
    faBookOpenReader,
    faBuildingColumns,
    faChalkboardUser,
    faCircleInfo,
    faEllipsisVertical,
    faHeartPulse,
    faLaptopFile,
    faMicrophone,
    faMobileScreen,
    faPeopleArrows,
    faPeopleGroup,
    faPersonBurst,
    faPlay,
    faStar,
    faStop,
    faTv,
    faUserGear,
    faPenToSquare,
    faCheck,
    faPen,
    faUpRightAndDownLeftFromCenter,
    faDownLeftAndUpRightToCenter, faBan, faHeart as faHeartSolid,
} from '@fortawesome/free-solid-svg-icons'
import {faComments, faNoteSticky, faSquareMinus, faSquarePlus, faHeart as faHeartRegular} from "@fortawesome/free-regular-svg-icons";
import {faYoutube } from "@fortawesome/free-brands-svg-icons";
import {ZiggyVue} from "ziggy-js";
import {Ziggy} from "@/ziggy.js";

/* add icons to the library */
library.add(faPlay, faStop, faPenToSquare, faChalkboardUser, faLaptopFile, faMobileScreen, faMicrophone, faYoutube,
    faTv, faBookOpenReader, faBuildingColumns, faBook, faPeopleArrows, faComments, faPeopleGroup, faUserGear,
    faPersonBurst, faHeartPulse, faBars, faEllipsisVertical, faCircleInfo, faStar, faCheck, faPen, faNoteSticky,
    faSquarePlus, faSquareMinus, faUpRightAndDownLeftFromCenter, faDownLeftAndUpRightToCenter, faBan, faHeartSolid, faHeartRegular);



const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
