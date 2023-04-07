import { createApp } from "vue";
import App from "./App.vue";

import { createRouter, createWebHistory } from 'vue-router';

import Content from "./components/Content.vue";
import AddProduct from "./components/AddProduct.vue";
import EditProduct from "./components/EditProduct.vue";
import NotFound from "./components/NotFound.vue";
import "./assets/css/index.css";

const app = createApp(App);

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        { path: "/", name: 'home', component: Content },
        { path: "/addproduct", name: 'addProduct', component: AddProduct },
        { path: '/edit/:id', name: 'editProduct', component: EditProduct },
        { path: '/delete/:id', name: 'deleteProduct', component: Content },
        { path: "/:pathMatch(.*)*", name: "NotFound", component: NotFound },
    ],
});
app.use(router);

app.mount("#app");
