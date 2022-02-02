import VueRouter from "vue-router";
import Dashboard from "./pages/dashboard";
import Token from "./pages/token";
import Review from "./pages/review";
import CreateReview from "./pages/review/create.vue";
import GenerateReview from "./pages/generate-review";
import Setting from "./pages/setting";
import UpdateReview from "./pages/review/update";
import PageNotFound from "./pages/404/404";
import RegisterUser from "./pages/register/create";
import Users from "./pages/register/index";

const router = new VueRouter({
    mode: "history",
    routes:
    [
        {
            path: '/dashboard',
            component: Dashboard,
            meta: {requiresAuth: true}
        },
        {
            path: '/token',
            component: Token,
            meta: {requiresAuth: true}
        },
        {
            path: '/review',
            component: Review,
            meta: {requiresAuth: true}
        },
        {
            path: '/review/:id/edit',
            component: UpdateReview,
            name: 'update-review',
            meta: {requiresAuth: true}
        },
        {
            path: '/review/create',
            component: CreateReview,
            meta: {requiresAuth: true}
        },
        {
            path: '/generate-review',
            component: GenerateReview,
            meta: {requiresAuth: true}
        },
        {
            path: '/setting',
            component: Setting,
            meta: {requiresAuth: true}
        },
        {
            path: '/register-user',
            component: RegisterUser,
            meta: {requiresAuth: true}
        },
        {
            path: '/users',
            component: Users,
            meta: {requiresAuth: true}
        },
       {
           path: '*',
           redirect: '/404'
       }
    ]
})

export default router;
