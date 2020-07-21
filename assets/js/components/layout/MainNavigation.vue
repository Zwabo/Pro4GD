<template>
    <div class="container-fluid bgDarkGreen">

        <!----------------------------------------desktop navi----------------------------------------------------------------->
        <nav class="navbar navbar-expand-md desktopNavi" id="naviLarge">

            <router-link to="/" class="selfAlignCenter" id="naviLogo">
                <svg><use href="#logoNavi"></use></svg>
            </router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown selfAlignCenter">
                        <a class="nav-link" href="#" id="datenbankDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Datenbank</a>
                        <div class="dropdown-menu dropdownShow bgDarkGrey" aria-labelledby="datenbankDropdown">
                            <router-link class="dropdown-item" :to="'/database/'">In Datenbank Suchen</router-link>
                            <!-- hides drop down item addPlant for standard user -->
                            <router-link v-if="navigationUser" id ="addPlant-dropDown" class="dropdown-item" :to="'/addPlant/'">Neue Pflanze hinufügen</router-link>

                        </div>
                    </li>
                    <li class="nav-item dropdown selfAlignCenter">
                        <a class="nav-link" href="#" id="communityDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Community</a>
                        <div class="dropdown-menu dropdownShow bgDarkGrey" aria-labelledby="communityDropdown">
                            <a class="dropdown-item" href="/forum">Forum</a>
                            <router-link class="dropdown-item" :to="'/tipps/'">Tipps</router-link>
                            <router-link class="dropdown-item" :to="'/news/'">Neuigkeiten</router-link>
                        </div>
                    </li>
                    <li class="nav-item selfAlignCenter" v-if="navigationUser">
                        <router-link class="nav-link" :to="'/garden/' + navigationUser.id">Mein Garten</router-link>
                    </li>
                    <li class="nav-item dropdown selfAlignCenter" id="naviUser" v-if="navigationUser">
                        <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{navigationUser.username}} <img id="naviImg" v-bind:src="navigationUser.userPic  + '?' + new Date().getTime()"></a>
                        <div class="dropdown-menu dropdownShow bgDarkGrey" aria-labelledby="userDropdown">
                            <a :href="'/profile/' + navigationUser.username" class="dropdown-item">          <!-- change to dynamic -->
                                Profil
                            </a>
                            <router-link to="/friends" class="dropdown-item">          <!-- change to dynamic -->
                                Freunde
                            </router-link>
                            <router-link class="dropdown-item" :to="'/settings/'">Einstellungen</router-link>
                            <router-link class="dropdown-item" to="/logout">Ausloggen</router-link>
                        </div>
                    </li>
                    <li class="nav-item selfAlignCenter" v-if="navigationUser == null">
                        <router-link class="nav-link" to="/login">Login</router-link>
                    </li>

                </ul>
            </div>
        </nav>

        <!----------------------------------------mobile navi----------------------------------------------------------------->
        <div class="mobileNavi">
            <nav class="navbar navbar-expand-md">
                    <router-link to="/" class="selfAlignCenter" id="naviLogoOnly">
                        <div><svg><use href="#logoOnly"></use></svg></div>
                    </router-link>

                <button class="navbar-toggler navbarMenuButton" data-toggle="collapse" data-target="#navbarMenu">
                    <svg id="svgMenu"><use href="#menuButton"></use></svg>
                </button>

                <div class="collapse navbar-collapse" id="navbarMenu">
                    <div class="whiteLine mobileNaviLine"></div>
                    <ul class="navbar-nav text-right ml-auto mainUL">

                        <!------------------------------Datenbank----------------------------------------------------->
                        <li class="nav-item mainLI">
                            <button class="navbar-toggler upperMenu" data-toggle="collapse" data-target="#datenbankMenu">
                                Datenbank
                            </button>
                            <div class="collapse navbar-collapse" id="datenbankMenu">
                                <ul class="navbar-nav text-right ml-auto subUL">
                                    <li class="nav-item">
                                        <router-link class="dropdown-item" :to="'/database/'">In Datenbank Suchen</router-link>
                                        <router-link v-if="navigationUser" class="dropdown-item"
                                                     :to="'/addPlant/'">Neue Pflanze hinufügen</router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!------------------------------Community----------------------------------------------------->
                        <li class="nav-item">
                            <button class="navbar-toggler upperMenu" data-toggle="collapse" data-target="#communityMenu">
                                Community
                            </button>
                            <div class="collapse navbar-collapse" id="communityMenu">
                                <ul class="navbar-nav text-right ml-auto subUL">
                                    <li class="nav-item">
                                        <router-link class="dropdown-item" :to="'/forum'">Forum</router-link>
                                        <router-link class="dropdown-item" :to="'/tipps/'">Tipps</router-link>
                                        <router-link class="dropdown-item" :to="'/news/'">Neuigkeiten</router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!------------------------------Garten----------------------------------------------------->
                        <li v-if="navigationUser" class="nav-item directLink">
                            <button class="navbar-toggler upperMenu" data-toggle="collapse" data-target="#login">
                                <router-link class="nav-link" :to="'/garden/' + navigationUser.id">Mein Garten</router-link>
                            </button>
                        </li>

                        <!------------------------------Loged In User----------------------------------------------------->
                            <li v-if="navigationUser" class="nav-item">
                                <button class="navbar-toggler upperMenu" data-toggle="collapse" data-target="#userMenu">
                                    {{navigationUser.username}}
                                </button>
                                <div class="collapse navbar-collapse" id="userMenu">
                                    <ul class="navbar-nav text-right ml-auto subUL">
                                        <li class="nav-item">
                                            <a :href="'/profile/' + navigationUser.username" class="dropdown-item">
                                                Profil
                                            </a>
                                            <router-link to="/friends" class="dropdown-item">
                                                Freunde
                                            </router-link>
                                            <router-link class="dropdown-item" :to="'/settings/'">Einstellungen</router-link>
                                            <router-link class="dropdown-item" to="/logout">Ausloggen</router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        <!------------------------------Login----------------------------------------------------->
                        <li v-else class="nav-item directLink">
                            <button class="navbar-toggler upperMenu" data-toggle="collapse" data-target="#login">
                                <router-link class="nav-link" to="/login">Login</router-link>
                            </button>
                        </li>
                    </ul>

                    <div class="mobileNavSpacing"></div>
                </div>


            </nav>
        </div>

        <!-----------------------------------------svg------------------------------------------------------------------>
        <div style="display: none;">
            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" width="512" xmlns="http://www.w3.org/2000/svg">
                <symbol id="menuIcon" viewBox="0 0 512 512" >
                    <path d="m464.883 64.267h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z"/><path d="m464.883 208.867h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z"/><path d="m464.883 353.467h-417.766c-25.98 0-47.117 21.137-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.012-21.137-47.149-47.117-47.149z"/>
                </symbol>
            </svg>

            <svg vxmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <symbol id="logoOnly" viewBox="0 0 209.1 205.5" >
                    <path class="st0" d="M104.4,2C48.5,2,3.3,47.3,3.3,103.1s45.3,101.1,101.1,101.1s101.1-45.3,101.1-101.1S160.2,2,104.4,2z M70,141.2
                        c-4.9,4.9-19.9,3.1-33-6.9c-15.3-11.6-17.8-32.7-15.9-42c9.3-1.9,30.9,1,42.5,16.3C73.6,121.6,75.3,135.8,70,141.2z M122.9,102.5
                        c-2.2,23.6-11,40-18.6,40c-7,0-16.3-17.3-18.5-40.9C83.2,74,96.3,49.8,104.3,42.2C112.3,49.8,125.5,74.9,122.9,102.5z M171.4,134.7
                        c-13.1,10-27.3,11.7-32.6,6.4c-4.9-4.9-3.1-19.9,6.9-33c11.6-15.3,32.7-17.8,42-15.9C189.6,101.5,186.7,123.1,171.4,134.7z"/>
                </symbol>
            </svg>

            <svg id="Layer_1" enable-background="new 0 0 512 512" height="512" width="512" xmlns="http://www.w3.org/2000/svg">
                <symbol id="menuButton" viewBox="0 0 512 512">
                    <path d="m464.883 64.267h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z"/><path d="m464.883 208.867h-417.766c-25.98 0-47.117 21.136-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.013-21.137-47.149-47.117-47.149z"/><path d="m464.883 353.467h-417.766c-25.98 0-47.117 21.137-47.117 47.149 0 25.98 21.137 47.117 47.117 47.117h417.766c25.98 0 47.117-21.137 47.117-47.117 0-26.012-21.137-47.149-47.117-47.149z"/>
                </symbol>
            </svg>

        </div>
    </div>
</template>

<script>
    export default {
        name: "MainNavigation",
        data: function(){
            return{
                navigationUser: null,
                loggedInUser: {}
            }
        },
        mounted: function(){
            this.navigationUser = JSON.parse(localStorage.getItem('user'));
            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.navigationUser = JSON.parse(localStorage.getItem('user'));
            });
        },
        // hides drop down item add plant in database
        methods: {
            checkRole: function () {
                if ((this.loggedInUser == null) ||(this.loggedInUser.roles == 'ROLE_USER') ) {
                    // redirect auf login einfügen
                    let dropDown = document.getElementById('addPlant-dropDown');
                    dropDown.style.display='none';
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
</script>

<style scoped>
    /*----------------------------navbar big---------------------------------------*/
    .navbar {
        margin: 0px;
        padding: 5px 0px;
        border: 1px solid #97B753;
    }

    /*navigation links*/
    .navbar div ul li a { color: white; }
    .navbar div ul li:hover .nav-link { color: #707070; }

    /*navigation list*/
    .navbar div ul li { padding: 7px 10px; }
    #naviUser { padding: 4px 10px; }
    .navbar div ul li:last-of-type { margin-right: 20px; }
    .navbar div ul li:hover { background-color: #B8E269; }
    .navbar div ul li:active { background-color: #B8E269; }

    /*dropdown Menue*/
    .dropdown-menu .dropdown-item { color: white; }
    .dropdown-menu .dropdown-item:hover { background-color: #97B753; }
    .dropdown-menu .dropdown-item:active { background-color: #B8E269;}

    /*navigation userimage*/
    #naviImg {
        width: 30px;
        height: 30px;
        border-radius: 50px;
        margin-left: 10px;
    }
    /*navigation logo*/
    #naviLogo {
        padding-left: 30px;
        padding-top: 3px;
    }

    #naviLogo svg {
        width:135px;
        height:40px;
        fill: white;
    }

    #naviLogo svg:hover { fill: #B8E269; }
    #naviLogo svg:active { fill: #707070; }

    .mobileNavi { display: none; }

    /*---------------------------navbar small---------------------------------------*/
    #naviLogoSmall svg {
        width:135px;
        height:40px;
        fill: white;
        padding-top: 5px;
    }

    .navbarMenuButton {
        margin-right: 2%;
    }

    #mobileNavi ul {
        flex-direction: column;
        margin: 0;
    }

    #naviLogoOnly {
        padding-left: 30px;
        padding-top: 3px;
    }

    #naviLogoOnly svg {
        width:40px;
        height:40px;
        fill: white;
    }

    #naviLogoOnly svg:hover { fill: #B8E269; }
    #naviLogoOnly svg:active { fill: #707070; }

    #svgMenu {
        height: 40px;
        width: 40px;
        fill: white;
    }
    #svgMenu:hover { fill: #B8E269 ; }
    #svgMenu:active { fill: #707070; }

    /*menue items - upper menu----------------------------------*/
    .upperMenu, .directLink .nav-link {
        color: white;
        padding: 7px 10px;
        margin: 0;
    }

    .directLink {
        padding: 0px !important;
        margin: 0px !important;
    }

    .mobileNavi .mainUL {
        width: 40%;
        margin-right: 2%;
    }
    .mobileNavi .subUL li {
        margin-right: 0 !important;
        padding: 0 !important;
        margin-top: 2% !important;
    }

    .mobileNavi ul li:hover, .directLink .nav-link:hover {
        background-color: #707070 !important;
        color: white !important;
    }
    .mobileNavi ul li:active, .directLink .nav-link:active, .directLink .nav-link:focus {
        background-color: #B8E269 !important;
        color: #707070 !important;
    }

    .mobileNavi ul li .dropdown-item:hover {
        background-color: #B8E269;
        color: #707070;
    }
    .mobileNavi ul li .dropdown-item:active {
        background-color: #707070;
        color: white;
    }

    .mobileNaviLine {
        margin: 2% 0% 1% 0%;
    }

    .mobileNavSpacing { margin-bottom: 3%; }


    /*---------------------------------------------Media Queries----------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
    }

    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {

    }

    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        .desktopNavi { display: none; }
        .mobileNavi { display: block; }

        .mobileNavi .mainUL { width: 60%; }
    }

    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        .mobileNavi .mainUL { width: 100%; }
        .mobileNavi .subUL li { font-size: 140%; }
    }
</style>