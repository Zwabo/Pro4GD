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
    import Push from 'push.js';
export default {
    components: {MainFooter, MainNavigation},
    created: function(){

        //Get notifications and create push notifications
        if(localStorage.getItem('user') != null){
            let user = JSON.parse(localStorage.getItem('user'));
            this.$http.get('/api/notifications/' + user.id + '/get')
                .then(response => {
                    this.notificationData = response.data;
                    console.log(this.notificationData);

                    let i = 0;
                    while(i < this.notificationData.length){
                        Push.create(this.notificationData[i][0], {
                            body: 'A user commented: ' + this.notificationData[i][1],
                            timeout: 4000,
                            onClick: function () {
                                window.focus();
                                this.close();
                            }
                        })
                        .then(notification => {
                            notification.close();
                        });
                        i++;
                    }
                })
                .then(() => {
                    this.$http.post('/api/notifications/' + user.id + '/clear')
                    .then(response => {

                    });
                });
        }
    },
};
</script>

<style>
</style>