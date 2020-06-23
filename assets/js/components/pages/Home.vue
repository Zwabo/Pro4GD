 <template>
    <div id="root">
    <div v-if="userCreated == true">

        <div class="container-fluid">

            <div class="row bgDarkGreen fontWhite rowsIndexWelcome">
                <div class="container-fluid">
                    <div class="row" >
                        <div><svg id="indexLogo"><use href="#logoIndex"></use></svg></div>
                    </div>
                    <div class="row paddingLeftRight">
                        <div class="col-lg-6 selfAlignCenter">

                            <h1 id="h1Start">Willkommen</h1>
                            <div v-if="loggedUser == null">

                                <form method="post" @submit="submitFormIndex" id="loginIndex">

                                    <div v-if="errorIndex" class="alert alert-danger">{{ errorIndex }}</div>

                                    <div class="mb-3">
                                        <p>Du bist nicht eingelogged.</p>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <label for="inputEmail">Email</label>
                                            <input v-model="emailIndex" placeholder="email@plantbase.com" type="email" value="" name="email" id="inputEmail" class="form-control" required autofocus>
                                        </div>
                                        <div class="row">
                                            <label for="inputPassword">Password</label>
                                            <input v-model="passwordIndex" placeholder="************" type="password" name="password" id="inputPassword" class="form-control" required>
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-primary buttonWhiteIndex float-right" type="submit">
                                        Einloggen
                                    </button>
                                </form>
                            </div>

                            <div v-else>
                                <p class="text-center">{{ loggedUser.username }}
                                <router-link to="/logout"  id="naviLogo">
                                    Logout
                                </router-link>
                                </p>
                            </div>

                        </div>

                        <div class="col-lg-1 whiteLineVert"></div>

                        <div class ="col-lg-3 selfAlignCenter">

                            <div><img id="handyImg" src="/images/plantBase/PhoneMockup.png"></div>
                        </div>

                        <div class="col-lg-2 text-center selfAlignCenter">
                            <h3>Downloade JETZT!</h3>
                            <p id="pIndexDownload">Lade dir PlantBase jetzt auf dein Handy!</p>
                            <button class="buttonWhiteIndex">Download</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row paddingLeftRight rowsIndex">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2 selfAlignCenter">
                            <img id="indexAloe" src="/images/plants/Aloe.png">
                        </div>
                        <div class="col-lg-10">
                            <div class="container-fluid">
                                <h3 class="h3Index fontDarkGreen text-center">Über <span class="fontBold">Plant</span>Base</h3>
                                <p class="text-center pIndex">Mit <span class="fontUpperCase">PlantBase</span> soll eine Seite angeboten werden, die allen Pflanzenliebhabern und -haltern, oder denen die es gern noch werden möchten, eine Unterstützung bieten. Hierbei wird großes Augenmerk auf unsere Angebote gelegt, welches den Nutzern von <span class="fontUpperCase">PlantBase</span> eine aktive Hilfe - mit Erinnerungsfunktionen, Tipps und Tricks, täglichen Neuigkeiten und vieles mehr - bieten kann. Darüber hinaus bietet <span class="fontUpperCase">PlantBase</span> für ihre Community auch eine geeignete Plattform, um sich gegenseitig Auszutauschen, zu Helfen und Anzuspornen. Die ganzen Funktionen von <span class="fontUpperCase">PlantBase</span> können auch ganz einfach über die App von zuhause aus verwendet werden.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row paddingLeftRight bgDarkGreen fontWhite rowsIndex">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <h3 class="h3Index">Unser <span class="fontBold">Angebot</span></h3>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-2">
                            <div class="container-fluid" >
                                <div class="row">
                                    <div class="indexIconRotation">
                                        <div id="indexWateringCan" class="indexIcon text-center">
                                            <svg @click="waterClick" xmlns="http://www.w3.org/2000/svg" width="205" height="205" viewBox="0 0 205 205">
                                                <g id="Gruppe_1001" data-name="Gruppe 1001" transform="translate(-179 -2003)">
                                                    <circle class="circle" data-name="Ellipse 115" cx="102.5" cy="102.5" r="102.5" transform="translate(179 2003)" fill="#fff"/>
                                                    <path class="grey" data-name="Vereinigungsmenge 49" d="M68.134,93.159l-8.882-8.882L17.645,81.5a7.77,7.77,0,0,0-4.4,1.023l-9.521,5.5A2.482,2.482,0,0,1,0,85.872V64.982a2.482,2.482,0,0,1,3.724-2.15l9.521,5.5a7.776,7.776,0,0,0,4.4,1.023l25.014-1.668L26.22,51.244a5.918,5.918,0,0,1,0-8.368L59.33,9.765a5.918,5.918,0,0,1,8.368,0l.841.841,4.632-4.632h0a20.428,20.428,0,0,1,34.873,14.445V50.111l1.569,1.569a5.918,5.918,0,0,1,0,8.368L76.5,93.159a5.919,5.919,0,0,1-8.369,0ZM97.513,39.58V20.418a9.9,9.9,0,0,0-16.894-7l-4.632,4.633Z" transform="translate(222.759 2039.906)" fill="#707070"/>
                                                    <path class="green" data-name="Pfad 392" d="M27.6,404.434a10.044,10.044,0,1,1-20.088,0c0-4.541,6.73-16.913,9.171-21.253a1,1,0,0,1,1.744,0c2.443,4.341,9.172,16.713,9.172,21.253Zm0,0" transform="translate(209.219 1755.722)" fill="#97b753"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="pIndex">Bewässerungshilfe</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="indexIconRotation">
                                        <div id="indexIdea" class="indexIcon text-center">
                                            <svg @click="tippsClick" xmlns="http://www.w3.org/2000/svg" width="205" height="205" viewBox="0 0 205 205">
                                                <g data-name="Gruppe 1002" transform="translate(-517 -2003)">
                                                    <circle class="circle" data-name="Ellipse 116" cx="102.5" cy="102.5" r="102.5" transform="translate(517 2003)" fill="#fff"/>
                                                    <path class="green" data-name="Pfad 393" d="M45.792,74.731H19.246A3.041,3.041,0,0,1,16.2,71.69a25.58,25.58,0,0,0-7-17.542A32.064,32.064,0,0,1,9.785,9.617,31.7,31.7,0,0,1,32.456,0h.063A32.075,32.075,0,0,1,64.54,32.128a32.049,32.049,0,0,1-8.779,22.1A25.318,25.318,0,0,0,48.832,71.69a3.042,3.042,0,0,1-3.041,3.041Zm0,0" transform="translate(585.503 2053)" stroke-width="1"/>
                                                    <path class="grey" data-name="Pfad 394" d="M108.725,392.492H82.974a3.041,3.041,0,0,1,0-6.082h25.751a3.041,3.041,0,0,1,0,6.082Zm0,0" transform="translate(522.171 1744.929)" stroke-width="1"/>
                                                    <path class="grey" data-name="Pfad 395" d="M108.725,440.285H82.974a3.041,3.041,0,1,1,0-6.082h25.751a3.041,3.041,0,1,1,0,6.082Zm0,0" transform="translate(522.171 1706.825)" stroke-width="1"/>
                                                    <path class="grey" data-name="Pfad 396" d="M122.621,488.082H106.346a3.041,3.041,0,1,1,0-6.082h16.275a3.041,3.041,0,0,1,0,6.082Zm0,0" transform="translate(503.538 1668.718)" stroke-width="1"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="pIndex">Tipps und Tricks</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="indexIconRotation">
                                        <div id="indexPlant" class="indexIcon text-center">
                                            <svg @click="gardenClick" xmlns="http://www.w3.org/2000/svg" width="205" height="205" viewBox="0 0 205 205">
                                                <g data-name="Gruppe 1003" transform="translate(-864 -2003)">
                                                    <circle class="circle" data-name="Ellipse 117" cx="102.5" cy="102.5" r="102.5" transform="translate(864 2003)"/>
                                                    <path class="green" data-name="Pfad 397" d="M317.206,45.536c.588,1.608,7.123,20.745-6.279,43.312-8.14,13.707-20.5,14.614-21.71,14.67-.709-.983-7.687-11.224-2.018-26.124C296.533,52.863,315.582,46.076,317.206,45.536Z" transform="translate(689.033 2003.207)" stroke-width="1"/>
                                                    <path class="green" data-name="Pfad 398" d="M97.095,45.536c-.588,1.608-7.123,20.745,6.279,43.312,8.14,13.707,20.5,14.614,21.71,14.67.709-.983,7.687-11.224,2.018-26.124C117.769,52.863,98.72,46.076,97.095,45.536Z" transform="translate(829.649 2003.207)" stroke-width="1"/>
                                                    <path class="green" data-name="Pfad 399" d="M193.973,0c-2,1.936-25.061,25.309-21.393,67.772,2.228,25.792,19.662,35.843,21.393,36.779,1.73-.937,19.165-10.988,21.393-36.779C219.035,25.309,195.969,1.936,193.973,0Z" transform="translate(772.518 2036.906)" stroke-width="1"/>
                                                    <path class="green" data-name="Pfad 400" d="M305.381,168.113a83.569,83.569,0,0,0,2.871-28.779s-8.358,3.723-29.361,17.3c-16.326,10.55-21.377,29.047-22.891,34.033h19.188A31.411,31.411,0,0,0,305.381,168.113Z" transform="translate(710.492 1933.792)" stroke-width="1"/>
                                                    <path class="green" data-name="Pfad 401" d="M57.179,168.113a83.568,83.568,0,0,1-2.871-28.779s8.358,3.723,29.361,17.3c16.326,10.55,21.377,29.047,22.891,34.033H87.373A31.411,31.411,0,0,1,57.179,168.113Z" transform="translate(859.931 1933.792)" stroke-width="1"/>
                                                    <path class="grey" data-name="Pfad 402" d="M170.676,385.378h-27.75a15.278,15.278,0,0,1-15.02-12.485L121.956,340.9h69.689L185.7,372.893A15.278,15.278,0,0,1,170.676,385.378Z" transform="translate(809.691 1784.622)" stroke-width="1"/>
                                                    <path class="grey" data-name="Pfad 403" d="M174.337,338.43H102.218a5.292,5.292,0,0,1-5.292-5.292h0a5.292,5.292,0,0,1,5.292-5.292h72.119a5.292,5.292,0,0,1,5.292,5.292h0A5.292,5.292,0,0,1,174.337,338.43Z" transform="translate(828.215 1794.283)" stroke-width="1"/>
                                                </g>
                                            </svg>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="pIndex">Eigener Garten</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="container-fluid" id="indexOffer">
                                <div class="row">
                                    <div class="indexIconRotation">
                                        <div id="indexBell" class="indexIcon text-center">
                                            <svg @click="reminderClick" xmlns="http://www.w3.org/2000/svg" width="205" height="205" viewBox="0 0 205 205">
                                                <g data-name="Gruppe 1004" transform="translate(-1207 -2003)">
                                                    <circle class="circle" data-name="Ellipse 7" cx="102.5" cy="102.5" r="102.5" transform="translate(1207 2003)"/>
                                                    <g data-name="Gruppe 122" transform="translate(1265 2049.196)"><g  data-name="Gruppe 121">
                                                        <path class="green" data-name="Pfad 213" d="M129.7,88.4l-7.5-12.5a37.124,37.124,0,0,1-5.293-19.1V45.852a30.607,30.607,0,0,0-21.834-29.28V8.734a8.734,8.734,0,0,0-17.468,0v7.838a30.607,30.607,0,0,0-21.834,29.28V56.8a37.147,37.147,0,0,1-5.288,19.1l-7.5,12.5a2.187,2.187,0,0,0,1.869,3.31h82.97A2.183,2.183,0,0,0,129.7,88.4Z" transform="translate(-42.675)" stroke-width="1"/></g></g>
                                                    <g data-name="Gruppe 124" transform="translate(1294.914 2145.266)"><g data-name="Gruppe 123">
                                                        <path class="grey" data-name="Pfad 214" d="M188.815,469.333a15.192,15.192,0,0,0,27.5,0Z" transform="translate(-188.815 -469.333)"  stroke-width="1"/></g></g></g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="pIndex">Erinnerungen</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="container-fluid" id="indexOffer">
                                <div class="row">
                                    <div class="indexIconRotation">
                                        <div id="indexCommunity" class="indexIcon text-center">
                                            <svg @click="communityClick" id="communitySvg" xmlns="http://www.w3.org/2000/svg" width="205" height="205" viewBox="0 0 205 205">
                                                <g data-name="Gruppe 1005" transform="translate(-1545 -2003)">
                                                    <circle class="circle" data-name="Ellipse 118" cx="102.5" cy="102.5" r="102.5" transform="translate(1545 2003)"/>
                                                    <path class="green" data-name="Pfad 71" d="M260.365,227.782a32.682,32.682,0,0,0-17.923-29.1,44.444,44.444,0,0,1-43.762,43.762,32.593,32.593,0,0,0,45.681,13.394l15.862,4.387-4.387-15.862a32.466,32.466,0,0,0,4.53-16.579Zm0,0" transform="translate(1433.435 1888.435)" stroke-width="1"/>
                                                    <path class="green" data-name="Pfad 72" d="M76.978,38.489A38.489,38.489,0,1,0,5.337,58.053L.142,76.836l18.784-5.195A38.5,38.5,0,0,0,76.978,38.489ZM35.536,17.719h5.906V47.447H35.536Zm0,35.634h5.906v5.906H35.536Zm0,0" transform="translate(1593 2048)"stroke-width="1"/></g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <p class="pIndex">Community</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="waterInfo==true || tippsInfo==true || gardenInfo==true || reminderInfo==true || communityInfo==true"
                 class="row paddingLeftRight bgDarkGreen fontWhite rowsIndexBottom">
                <p v-if="waterInfo == true" class="text-center">Nützen Sie mit unserer App oder auf unserer Homepage unsere Bewässerungs-Erinnerungshilfe und erhalten Sie Push-Up Benachrichtigungen und/oder EMails immer dann, wenn ihre lieben Pflanzen versorgt werden müssen.</p>
                <p v-if="tippsInfo == true" class="text-center">Mit unseren vielseitigen Tipps und Tricks erhalten Sie Anregungen und Informationen zur Pflege, Standort, Umsetzung, Überwinterung, Düngen u.ä., damit Ihre Lieblinge bestimmt gesund und fröhlich durch das Jahr kommen.</p>
                <p v-if="gardenInfo == true" class="text-center">Fügen Sie in Ihrem Online Garten Ihre Lieblinge hinzu und haben so immer einen Überblick über den Status und das Befinden Ihrer lieben Pflanzen.</p>
                <p v-if="reminderInfo == true" class="text-center">Stellen Sie sich Erinnerungshilfen, nicht nur für Bewässerung, sondern auch für andere vielseitige Bedürfnisse Ihrer Pflanzen.</p>
                <p v-if="communityInfo == true" class="text-center">Nutzen Sie unsere Community um sich mit Gleichgesinnten auszutauschen, neue Freunde zu finden und Hilfe zu erhalten. Die große Community and Pflanzenliebhabern hilft immer gerne.</p>
            </div>


            <div class="row paddingLeftRight rowsIndex">
                <div class="container-fluid">
                    <h3 class="h3Index text-center fontDarkGreen">Jetzt <span class="fontBold">Mitglied</span> werden!</h3>
                    <p class="text-center pIndex">Registrieren Sie sich sofort und nutzen Sie  unser einzigartiges Angebot für Ihr zuhause.</p>
                    <div class="text-center"><button class="buttonIndexDarkGreen">Registrieren</button></div>
                </div>
            </div>

            <div class="row paddingLeftRight bgDarkGreen fontWhite rowsIndex">
                <div class="container-fluid">
                    <h3 class="h3Index text-center">Unsere <span class="fontBold">App</span></h3>
                    <p class="text-center pIndex"><span class="fontUpperCase">PlantBase</span> ganz einfach vom Handy mobil nützen.</p>
                    <p class="text-center pIndex">Die praktischen Funktionen der Webseite können auch ganz einfach vom Handy aus genützt und eingesetzt werden. Um Ihren Pflanzen optimale Pflege zu gewährleisten, nützen Sie die Erinnerungsfunktion und die vielen Tipps und Neuigkeiten via Push-Up-Benachrichtigungen. Treten Sie sich auch Unterwegs mit der <span class="fontUpperCase">PlantBase</span> Community in Kontakt, um Fragen zu stellen oder einfach nur sich mit Gleichgesinnten zu Unterhalten.</p>
                    <div class="text-center"><button class="buttonWhiteIndex">Jetzt herunterladen</button></div>
                </div>
            </div>

            <div class="row paddingLeftRight rowsIndex">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <h3 class="h3Index">Plantbase <span class="fontBold">News</span></h3>
                    </div>
                    <div class="row">
                        <Slider></Slider>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>

<script>
    import Slider from "../layout/Slider";
    export default {
        name: "Home",

        data: function() {
            return{
                loggedUser: null,
                userCreated: false,

                emailIndex: "",
                passwordIndex: "",
                isLoading: false,
                errorIndex: '',

                waterInfo: false,
                tippsInfo: false,
                gardenInfo: false,
                reminderInfo: false,
                communityInfo: false
            }
        },

        created: function(){
            this.loggedUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedUser = JSON.parse(localStorage.getItem('user'));
            });
        },

        mounted: function() {
            console.log(this.loggedUser);
            this.userCreated = true;
        },

        methods: {
            submitFormIndex: function(e){
                e.preventDefault();

                this.isLoading = true;
                this.errorIndex = '';

                this.$http
                    .post('/security/login', {
                        email: this.emailIndex,
                        password: this.passwordIndex
                    })
                    .then(response => {
                        console.log(response.data);
                        this.loggedUser = response.data;

                        //Store user in local storage
                        localStorage.setItem('user', JSON.stringify(this.loggedUser));

                        //Send logged in information to Event Bus
                        this.$root.$emit('loggedIn');
                        this.redirect();

                        //this.$emit('user-authenticated', userUri);
                        //this.email = '';
                        //this.password = '';
                    }).catch(error => {
                    if(error.response.data){
                        this.errorIndex = error.response.data.error;
                    }
                    console.log(error.response.data);
                    }).finally(() => {
                        this.isLoading = false;
                    })
            },

            redirect: function() {
              this.$router.push({name: 'profile'});
            },

            waterClick: function() {
                this.tippsInfo = false;
                this.gardenInfo = false;
                this.reminderInfo = false;
                this.communityInfo = false;
                this.waterInfo = true;
            },

            tippsClick: function() {
                this.waterInfo = false;
                this.gardenInfo = false;
                this.reminderInfo = false;
                this.communityInfo = false;
                this.tippsInfo = true;
            },

            gardenClick: function() {
                this.waterInfo = false;
                this.tippsInfo = false;
                this.reminderInfo = false;
                this.communityInfo = false;
                this.gardenInfo = true;
            },

            reminderClick: function() {
                this.waterInfo = false;
                this.tippsInfo = false;
                this.gardenInfo = false;
                this.communityInfo = false;
                this.reminderInfo = true;
            },

            communityClick: function() {
                this.waterInfo = false;
                this.tippsInfo = false;
                this.gardenInfo = false;
                this.reminderInfo = false;
                this.communityInfo = true;

                /*let icon = document.getElementById("communitySvg");
                console.log(icon);

                let circle= icon.getElementsByClassName("circle");
                console.log(circle);*/
            },

        },
        components:{
            Slider
        }
    }
</script>

<style scoped>
    .rowsIndexBottom { padding-bottom: 5%; }

    .rowsIndexBottom p {
        font-size: 120%;
        margin: 0 5%;
    }
</style>