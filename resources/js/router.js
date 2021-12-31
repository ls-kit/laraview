import VueRouter from "vue-router";
import Dashboard from "./pages/dashboard";
import Token from "./pages/token";
import Review from "./pages/review";
import CreateReview from "./pages/review/create.vue";
import GenerateReview from "./pages/generate-review";
import Setting from "./pages/setting";

const router = new VueRouter({
    mode: "history",
    routes:
    [
        {
            path: '/dashboard',
            component: Dashboard
        },
        {
            path: '/token',
            component: Token
        },
        {
            path: '/review',
            component: Review
        },
        {
            path: '/review/create',
            component: CreateReview
        },
        {
            path: '/generate-review',
            component: GenerateReview
        },
        {
            path: '/setting',
            component: Setting
        }
    ]
})

export default router;
