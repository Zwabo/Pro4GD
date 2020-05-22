<template>
    
</template>

<script>
    export default {
        name: "Friends",
        mounted: function(){
            this.$http.get('/api/friends/')
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    alert(error);
                });
        }
    }
</script>

<style scoped>

</style>