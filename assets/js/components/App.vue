<template>
    <div id ="baseContainer" class="container-fluid">
        <main-navigation></main-navigation>
        <router-view></router-view>
        <main-footer></main-footer>
    </div>
</template>

<script>
    import MainNavigation from "./layout/MainNavigation";
    import MainFooter from "./layout/MainFooter";
export default {
    components: {MainFooter, MainNavigation}
};
</script>

<style>
</style>