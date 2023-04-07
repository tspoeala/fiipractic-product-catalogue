<script>
import Header from "./components/Header.vue";
import Content from "./components/Content.vue";
import { RouterView } from 'vue-router';

export default {
    name: "App",

    components: {
        Header,
        Content,
    },
};
</script>

<template>
    <div>
        <Header></Header>
        <Router-view />
    </div>
</template>
