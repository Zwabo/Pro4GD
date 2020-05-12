<template>
    <div class="container-fluid bgDarkGreen">
        <nav class="navbar navbar-expand-lg" id="naviLarge">

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
                            <a class="dropdown-item" href="">In Datenbank Suchen</a>
                            <a class="dropdown-item" href="#">Kategorie</a>
                            <a class="dropdown-item" href="#">Kategorie</a>
                            <a class="dropdown-item" href="#">Kategorie</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown selfAlignCenter">
                        <a class="nav-link" href="#" id="communityDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Community</a>
                        <div class="dropdown-menu dropdownShow bgDarkGrey" aria-labelledby="communityDropdown">
                            <a class="dropdown-item" href="#">Forum</a>
                            <a class="dropdown-item" href="#">Tipps</a>
                            <a class="dropdown-item" href="news">Neuigkeiten</a>
                        </div>
                    </li>
                    <li class="nav-item selfAlignCenter">
                        <a class="nav-link" href="">My Garden</a>
                    </li>
                    <li class="nav-item dropdown selfAlignCenter" id="naviUser">
                        <a class="nav-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe <img id="naviImg" src=""></a>
                        <div class="dropdown-menu dropdownShow bgDarkGrey" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="">Profil</a>
                            <a class="dropdown-item" href="#">Freunde</a>
                            <a class="dropdown-item" href="">Mein Garten</a>
                            <a class="dropdown-item" href="#">Statistik</a>
                            <a class="dropdown-item" href="#">Einstellungen</a>
                            <a class="dropdown-item" href="">Ausloggen</a>
                        </div>
                    </li>
                    <li class="nav-item selfAlignCenter">
                        <router-link class="nav-link" to="login">Login</router-link>

                    </li>

                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        name: "MainNavigation"
    }
</script>

<style scoped>

</style>