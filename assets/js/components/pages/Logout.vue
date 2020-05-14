<template>
    
</template>

<script>
    export default {
        name: "Logout",
        created: function(){
            localStorage.removeItem('user');
            window.location.replace('/security/logout');
        }
    }
</script>

<style scoped>

</style>