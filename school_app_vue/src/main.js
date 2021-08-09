import Vue from 'vue'
import App from './App.vue'
import {BootstrapVue, IconsPlugin} from "bootstrap-vue";
import VueRouter from "vue-router";


// Import Bootstrap an BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";
// components
import Students from './components/Students/StudentsContainer';
import Teachers from './components/Teachers/TeachersContainer'
import Courses from './components/Courses/CoursesContainer'
import EnrolledClasses from './components/EnrolledClasses/EnrolledClassesContainer'
import Home from './components/Home'

// use the vue-router
Vue.use(VueRouter);
// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);

Vue.config.productionTip = false

// routes array mapping paths to components
const routes = [
    {path: '/', component: Home},
    {path: '/students', component: Students},
    {path: '/teachers', component: Teachers},
    {path: '/courses', component: Courses},
    {path: '/enrolled-classes', component: EnrolledClasses},
]

// router instance that takes in the routes array
const router = new VueRouter({
    routes
})

// attaching the vue instance with routing
new Vue({
    el: '#app',
    router,
    data: {
        currentRoute: window.location.pathname
    },
    computed: {
        ViewComponent() {
            return routes[this.currentRoute]
        }
    },
    render(h) {
        return h(App)
    }
})
