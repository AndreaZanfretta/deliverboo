<template>
    <div>
        <app-header />
        <app-main />
        <app-footer />
    </div>
</template>

<script>
import AppFooter from '../components/AppFooter.vue'
import AppHeader from '../components/AppHeader.vue'
import AppMain from '../components/AppMain.vue'

export default {
    name: 'app',
    components: {
        AppHeader,
        AppMain,
        AppFooter
    }
}
</script>
<style  lang="scss">
html, body {
    scroll-behavior: smooth;
    }
</style>