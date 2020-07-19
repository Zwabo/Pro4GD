<template>
    <div class="container-fluid">
        <div class="whiteLine"></div>
        <div class="row bgDarkGreen fontWhite rowsIndex paddingLeftRight">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 selfAlignCenter left">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <h2 class="h1Logo">Willkommen bei</h2>
                            </div>
                            <div class="row justify-content-center">
                                <div class="loginLogo">
                                    <svg><use href="#plantBaseLogo"></use></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--<div class="col-lg-1 whiteLineVert twoColumns"></div>-->
                    <div class="whiteLine oneColumn"></div>

                    <div class="col-lg-6 selfAlignCenter right">
                        <div class="container-fluid">
                            <div class="vertLine"></div>

                            <div class="paddingNormalize">
                            <login-form></login-form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="loggedInUser === null" class="row paddingLeftRight rowsIndex registerPart">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <h3>Noch kein Mitglied?</h3>
                </div>
                <div class="row justify-content-center">
                    <button class="buttonDarkGreen" @click="goToRegister">Jetzt Registrieren</button>
                </div>
            </div>
        </div>
        <div v-else class="whiteLine"></div>

        <div style="display:none;">
            <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                           xml:space="preserve">
                    <symbol id="plantBaseLogo" viewBox="0 0 385 284.4">
<path d="M189.9,8.3c-55.8,0-101.1,45.3-101.1,101.1c0,55.8,45.3,101.1,101.1,101.1c55.8,0,101.1-45.3,101.1-101.1
	C291,53.6,245.7,8.3,189.9,8.3z M155.5,147.5c-4.9,4.9-19.9,3.1-33-6.9c-15.3-11.6-17.8-32.7-15.9-42c9.3-1.9,30.9,1,42.5,16.3
	C159.1,127.9,160.9,142.1,155.5,147.5z M208.5,108.7c-2.2,23.6-11,40-18.6,40c-7,0-16.3-17.3-18.5-40.9
	C168.9,80.2,182,56,189.9,48.4C197.8,56,211.1,81.1,208.5,108.7z M257,141c-13.1,10-27.3,11.7-32.6,6.4c-4.9-4.9-3.1-19.9,6.9-33
	c11.6-15.3,32.7-17.8,42-15.9C275.1,107.8,272.3,129.4,257,141z"/><g>
<path d="M19.1,259.3V276h-8.8v-47.6h15.5c3.2,0,5.9,0.4,8.3,1.1c2.3,0.7,4.2,1.8,5.8,3.1c1.5,1.3,2.6,2.9,3.4,4.8
		c0.7,1.9,1.1,3.9,1.1,6.1c0,2.3-0.4,4.4-1.2,6.3c-0.8,1.9-1.9,3.6-3.5,4.9c-1.5,1.4-3.5,2.5-5.8,3.2s-5,1.2-8.1,1.2H19.1z
		 M19.1,252.4h6.6c1.6,0,3-0.2,4.2-0.6c1.2-0.4,2.2-1,3-1.7c0.8-0.8,1.4-1.7,1.8-2.8c0.4-1.1,0.6-2.3,0.6-3.6c0-1.3-0.2-2.4-0.6-3.5
		c-0.4-1-1-1.9-1.8-2.6c-0.8-0.7-1.8-1.3-3-1.7c-1.2-0.4-2.6-0.6-4.2-0.6h-6.6V252.4z"/>
                                        <path d="M59.9,268.7h19v7.3H51.1v-47.6h8.8V268.7z"/>
                                        <path d="M126.9,276H120c-0.8,0-1.4-0.2-1.9-0.6c-0.5-0.4-0.8-0.9-1.1-1.4l-3.6-9.7H93.8l-3.6,9.7c-0.2,0.5-0.5,1-1,1.4
		c-0.5,0.4-1.1,0.6-1.9,0.6h-6.9l18.7-47.6h9L126.9,276z M96.1,258.1h15.2l-5.8-15.8c-0.3-0.7-0.6-1.5-0.9-2.5c-0.3-1-0.6-2-0.9-3.1
		c-0.3,1.1-0.6,2.2-0.9,3.1c-0.3,1-0.6,1.8-0.9,2.5L96.1,258.1z"/>
                                        <path d="M137.4,228.5c0.3,0,0.5,0.1,0.7,0.2c0.2,0.1,0.4,0.2,0.6,0.4c0.2,0.2,0.4,0.4,0.7,0.7l25,31.8c-0.1-0.8-0.1-1.5-0.2-2.3
		c0-0.7,0-1.4,0-2.1v-28.9h7.8V276h-4.6c-0.7,0-1.3-0.1-1.7-0.3c-0.5-0.2-0.9-0.6-1.3-1.2l-24.9-31.7c0.1,0.7,0.1,1.4,0.1,2.1
		c0,0.7,0,1.3,0,1.9V276h-7.8v-47.6h4.6C136.8,228.5,137.1,228.5,137.4,228.5z"/>
                                        <path d="M215,228.5v7.3h-14.3V276h-8.8v-40.3h-14.4v-7.3H215z"/>
                                        <path d="M222.7,276v-46.5h13.4c2.7,0,4.9,0.3,6.9,0.8c1.9,0.5,3.5,1.3,4.8,2.3c1.3,1,2.2,2.3,2.8,3.7c0.6,1.5,0.9,3.1,0.9,5
		c0,1.2-0.2,2.4-0.6,3.6c-0.4,1.1-1,2.2-1.9,3.2c-0.8,1-1.8,1.8-3,2.5c-1.2,0.7-2.5,1.3-4,1.6c3.7,0.5,6.5,1.8,8.5,3.7
		c2,1.9,3,4.4,3,7.5c0,2-0.4,3.7-1.1,5.3s-1.7,2.9-3.1,4c-1.3,1.1-3,1.9-4.9,2.5c-2,0.6-4.2,0.9-6.6,0.9H222.7z M226.1,251.3h10.1
		c2.1,0,4-0.3,5.5-0.8c1.5-0.5,2.8-1.3,3.7-2.2c1-0.9,1.7-1.9,2.2-3.1c0.5-1.1,0.7-2.3,0.7-3.5c0-3.1-1-5.5-3-7.1
		c-2-1.6-5-2.4-9.2-2.4h-10V251.3z M226.1,253.7v19.6h11.7c4.1,0,7.2-0.9,9.3-2.6c2.1-1.8,3.1-4.2,3.1-7.4c0-1.5-0.3-2.8-0.8-4
		c-0.6-1.2-1.4-2.2-2.4-3c-1.1-0.8-2.3-1.5-3.9-1.9c-1.5-0.4-3.3-0.7-5.2-0.7H226.1z"/>
                                        <path d="M299.9,276h-2.6c-0.3,0-0.6-0.1-0.8-0.2c-0.2-0.2-0.4-0.4-0.5-0.6l-5.5-13.5h-22.9l-5.5,13.5c-0.1,0.2-0.2,0.4-0.5,0.6
		c-0.2,0.2-0.5,0.3-0.8,0.3h-2.6l19-46.5h3.4L299.9,276z M268.8,259.1h20.9l-9.5-23.5c-0.2-0.4-0.3-0.8-0.5-1.3
		c-0.2-0.5-0.3-1-0.5-1.5c-0.2,0.5-0.3,1-0.5,1.5c-0.2,0.5-0.3,0.9-0.5,1.3L268.8,259.1z"/>
                                        <path d="M329.8,235.1c-0.2,0.4-0.5,0.6-0.9,0.6c-0.3,0-0.7-0.2-1.1-0.6c-0.5-0.4-1.1-0.9-1.8-1.3c-0.8-0.5-1.7-0.9-2.9-1.4
		c-1.2-0.4-2.6-0.6-4.3-0.6s-3.2,0.2-4.5,0.7c-1.3,0.5-2.4,1.1-3.2,2c-0.9,0.8-1.5,1.8-2,2.9c-0.5,1.1-0.7,2.2-0.7,3.5
		c0,1.6,0.3,2.9,1,3.9c0.7,1,1.6,1.9,2.7,2.6c1.1,0.7,2.3,1.3,3.7,1.8c1.4,0.5,2.8,1,4.3,1.5c1.5,0.5,2.9,1,4.3,1.6
		c1.4,0.6,2.6,1.3,3.7,2.2c1.1,0.9,2,2,2.7,3.2c0.7,1.3,1,2.9,1,4.8c0,2-0.3,3.8-1,5.5c-0.7,1.7-1.6,3.2-2.9,4.5
		c-1.3,1.3-2.8,2.3-4.7,3c-1.8,0.7-3.9,1.1-6.3,1.1c-3.1,0-5.7-0.5-7.9-1.6c-2.2-1.1-4.2-2.6-5.8-4.5l0.9-1.4
		c0.3-0.3,0.6-0.5,0.9-0.5c0.2,0,0.4,0.1,0.8,0.4c0.3,0.3,0.7,0.6,1.1,1c0.4,0.4,1,0.8,1.6,1.3s1.3,0.9,2.1,1.2
		c0.8,0.4,1.7,0.7,2.8,1c1.1,0.3,2.3,0.4,3.6,0.4c1.8,0,3.5-0.3,4.9-0.8c1.4-0.6,2.7-1.3,3.7-2.3c1-1,1.8-2.1,2.3-3.4
		c0.5-1.3,0.8-2.7,0.8-4.3c0-1.6-0.3-3-1-4.1c-0.7-1.1-1.6-2-2.7-2.7c-1.1-0.7-2.3-1.3-3.7-1.8c-1.4-0.5-2.8-1-4.3-1.4
		c-1.5-0.5-2.9-1-4.3-1.5c-1.4-0.6-2.6-1.3-3.7-2.2c-1.1-0.9-2-2-2.7-3.3s-1-3-1-5c0-1.6,0.3-3.1,0.9-4.5c0.6-1.4,1.5-2.7,2.6-3.8
		c1.1-1.1,2.6-2,4.2-2.7c1.7-0.7,3.6-1,5.7-1c2.4,0,4.6,0.4,6.5,1.2c1.9,0.8,3.7,1.9,5.3,3.5L329.8,235.1z"/>
                                        <path d="M369.6,229.5v2.8h-24.5v18.8h20.4v2.7h-20.4v19.4h24.5v2.8h-27.9v-46.5H369.6z"/></g>
                    </symbol>
                                        </svg>
        </div>
    </div>
</template>

<script>
    import LoginForm from "../forms/LoginForm";
    export default {
        name: "Login",
        components: {LoginForm},

        data: function() {
            return {
                loggedInUser: null
            }
        },

        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
        },

        methods: {
            goToRegister: function() {
                this.$router.push({path: '/register'});
            }
        }
    }
</script>

<style scoped>
    .loginLogo svg {
        fill: white;
        width: 100%;
        height: 100%;
    }

    .h1Logo {
        font-size: 300%;
        text-transform: uppercase;
    }

    .left { width: 50%; }
    .twoColumns { width: 5%; }
    .right {
        width: 45%;
        border-left: 1px solid white;
    }

    .oneColumn { display: none; }

    /*Formular*/

    #loginForm label {
        width: 25%;
        font-size: 130%;
        text-align: left;
        margin-right: 2%;
    }
    #loginForm input {
        width: 61%;
        margin-bottom: 2%;
        color: #707070;
        height: 80%;
        border-radius: 10px;
    }
    #loginForm button {
        margin-right: 13%;
    }


    /*---------------------------------------Media Queries-----------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        .right { width: 120%; }
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        .oneColumn {
            display: block;
            margin: 5% 0%;
        }
        .left { width: 100%; }
        .right {
            width: 100%;
            border-left: none;
        }
    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {

    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .h1Logo {
            font-size: 200%;
            margin-top: 4%;
        }
        .loginLogo svg {
            width: 50%;
            /*height: 70%;*/
        }
        .loginLogo { text-align: center; }

    }
</style>