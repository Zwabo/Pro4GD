 <template>
    <div id="root">
    <div v-if="userCreated == true">

        <div class="container-fluid">

            <div v-if="loggedUser" class="whiteLine"></div>

            <div class="row bgDarkGreen fontWhite rowsIndexWelcome">
                <div class="container-fluid">
                    <!-----------------------großes Logo ---------------------------------------->
                    <div v-if="loggedUser === null" class="row" id="indexLogo">
                        <div id="widthLogoIndex"><svg><use href="#logoIndex"></use></svg></div>
                    </div>

                    <!-----------------------------------wilkommen handy download----------------------->
                    <div class="row paddingLeftRight" id="welcomeRow">

                        <!----------------------------------------links - Willkommen/Login----------------------->
                        <div class="col-lg-6 selfAlignCenter">

                            <div class="row">
                            <div class="paddingNormalize marginNormalize container-fluid">
                            <h1 id="h1Start">Willkommen</h1>

                            <!-------------------------------------Login formular----------------------------->
                            <div v-if="loggedUser == null">
                                <form method="post" @submit="submitFormIndex" id="loginIndex">

                                    <div v-if="errorIndex" class="alert alert-danger">{{ errorIndex }}</div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <label for="inputEmail" class="loginindexLabel">Email</label>
                                            <input v-model="emailIndex" placeholder="email@plantbase.com" type="email"
                                                   value="" name="email" id="inputEmail" class="form-control loginIndexInput" required autofocus>
                                        </div>
                                        <div class="row">
                                            <label for="inputPassword" class="loginIndexLabel">Password</label>
                                            <input v-model="passwordIndex" placeholder="************" type="password" name="password"
                                                   id="inputPassword" class="form-control loginIndexInput" required>
                                        </div>
                                    </div>

                                    <button class="btn btn-lg btn-primary buttonWhiteIndex float-right loginIndexButton" type="submit">
                                        Einloggen
                                    </button>
                                </form>
                            </div>

                            <div v-else class="loggedInIndex">
                                <p class="text-center">
                                    <span id="loginText">
                                        Sie sind als
                                        <router-link :to="'/profile/' + loggedUser.username" class="profileLink">
                                            {{loggedUser.username}} </router-link>
                                        eingeloggt.
                                    </span>
                                    <span id="logoutTextLink">
                                        <router-link to="/logout"  id="naviLogo" class="logoutButton">Ausloggen</router-link>
                                    </span>
                                </p>
                            </div>
                            </div>
                            </div>
                            <div class="registerIndex row">
                                <div class="col-lg-6 paddingNormalize h3RegisterCol align-self-center"><div class="paddingNormalize text-right h3RegisterDiv">
                                    <h3 id="h3Register">Noch kein Mitglied?</h3>
                                </div></div>
                                <div class="col-lg-6 buttonRegisterCol">
                                    <button class="buttonWhiteIndex buttonRegister" @click="goToRegister">Jetzt registrieren</button>
                                </div>
                            </div>
                        </div>

                        <div class="whiteLine oneColumn"></div>

                        <!---------------------------------------download app------------------------------>
                        <!--<div class ="col-lg-3 selfAlignCenter" id="phoneImg">
                            <div><img id="handyImg" src="/images/plantBase/PhoneMockup.png"></div>
                        </div>

                        <div class="col-lg-3 text-center selfAlignCenter phoneAppDownload">
                            <h3 id="dowloadNow">Downloade JETZT!</h3>
                            <p id="pIndexDownload">Lade dir PlantBase jetzt auf dein Handy!</p>
                            <button class="buttonWhiteIndex">Download</button>
                        </div>-->

                        <div class="col-lg-6 selfAlignCenter desktopCol">
                            <div class="text-center"> <img id="desktopImg" src="/images/plantBase/mockUp_Endgeraete.png"> </div>
                            <h3 id="h3Info" class="text-center">Nutze unser Angebot auf allen Endgeräten.</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-----------------------------------über plantbase----------------------->
            <div class="row paddingLeftRight rowsIndex" id="plantbaseInfo">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 selfAlignCenter aloePicture">
                            <img id="indexAloe" src="/images/plants/AloeQuad.png">
                        </div>
                        <div class="col-lg-9 selfAlignCenter plantbaseInfoText">
                            <div class="container-fluid">
                                <h3 class="h3Index fontDarkGreen text-center">Über <span class="fontBold">Plant</span>Base</h3>
                                <p class="text-center pIndex">Mit <span class="fontUpperCase">PlantBase</span> soll eine Seite angeboten werden, die allen Pflanzenliebhabern und -haltern, oder denen die es gern noch werden möchten, eine Unterstützung bieten. Hierbei wird großes Augenmerk auf unsere Angebote gelegt, welches den Nutzern von <span class="fontUpperCase">PlantBase</span> eine aktive Hilfe - mit Erinnerungsfunktionen, Tipps und Tricks, täglichen Neuigkeiten und vieles mehr - bieten kann. Darüber hinaus bietet <span class="fontUpperCase">PlantBase</span> für ihre Community auch eine geeignete Plattform, um sich gegenseitig Auszutauschen, zu Helfen und Anzuspornen. Die ganzen Funktionen von <span class="fontUpperCase">PlantBase</span> können auch ganz einfach über die App von zuhause aus verwendet werden.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-----------------------------------angebot----------------------->
            <div class="row paddingLeftRight bgDarkGreen fontWhite rowsIndex" id="offerRowHL">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <h3 class="h3Index">Unser <span class="fontBold">Angebot</span></h3>
                    </div>

                    <div class="row justify-content-center" id="offerRowElements">
                        <!-------------------------Bewässerungshilfe------------------------>
                        <div class="col-lg-2 wateringHelp" @click="waterClick">
                            <div class="container-fluid" >
                                <div class="row offerIcon">
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
                                <div class="row text-center offerText">
                                    <p class="pIndex">Bewässerungshilfe</p>
                                </div>
                            </div>
                        </div>

                        <!-------------------------Tipps und Tricks------------------------>
                        <div class="col-lg-2 tipsTricks" @click="tippsClick">
                            <div class="container-fluid">
                                <div class="row offerIcon">
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
                                <div class="row text-center offerText">
                                    <p class="pIndex">Tipps und Tricks</p>
                                </div>
                            </div>
                        </div>

                        <!-------------------------Eigener Garten------------------------>
                        <div class="col-lg-2 userGarden" @click="gardenClick">
                            <div class="container-fluid">
                                <div class="row offerIcon">
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
                                <div class="row text-center offerText">
                                    <p class="pIndex">Eigener Garten</p>
                                </div>
                            </div>
                        </div>

                        <!-------------------------Erinnerungen------------------------>
                        <div class="col-lg-2 userReminder" @click="reminderClick">
                            <div class="container-fluid">
                                <div class="row offerIcon">
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
                                <div class="row text-center offerText">
                                    <p class="pIndex">Erinnerungen</p>
                                </div>
                            </div>
                        </div>

                        <!-------------------------Community------------------------>
                        <div class="col-lg-2 community" @click="communityClick" >
                            <div class="container-fluid">
                                <div class="row offerIcon">
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
                                <div class="row text-center offerText">
                                    <p class="pIndex">Community</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="waterInfo===true || tippsInfo===true || gardenInfo===true || reminderInfo===true || communityInfo===true"
                 class="row paddingLeftRight bgDarkGreen fontWhite rowsIndexBottom justify-content-center">
                <div class="paddingNormalize text-center"><h4 v-if="waterInfo === true" class="h4Offer">Bewässerungshilfe</h4></div>
                <p v-if="waterInfo === true" class="text-center">Nützen Sie mit unserer App oder auf unserer Homepage unsere Bewässerungs-Erinnerungshilfe und erhalten Sie Push-Up Benachrichtigungen und/oder EMails immer dann, wenn ihre lieben Pflanzen versorgt werden müssen.</p>
                <h4 v-if="tippsInfo === true" class="h4Offer">Tipps und Tricks</h4>
                <p v-if="tippsInfo === true" class="text-center">Mit unseren vielseitigen Tipps und Tricks erhalten Sie Anregungen und Informationen zur Pflege, Standort, Umsetzung, Überwinterung, Düngen u.ä., damit Ihre Lieblinge bestimmt gesund und fröhlich durch das Jahr kommen.</p>
                <h4 v-if="gardenInfo === true" class="h4Offer text-center">Eigener Garten</h4>
                <p v-if="gardenInfo === true" class="text-center">Fügen Sie in Ihrem Online Garten Ihre Lieblinge hinzu und haben so immer einen Überblick über den Status und das Befinden Ihrer lieben Pflanzen.</p>
                <h4 v-if="reminderInfo === true" class="h4Offer text-center">Erinnerungen</h4>
                <p v-if="reminderInfo === true" class="text-center">Stellen Sie sich Erinnerungshilfen, nicht nur für Bewässerung, sondern auch für andere vielseitige Bedürfnisse Ihrer Pflanzen.</p>
                <h4 v-if="communityInfo === true" class="h4Offer text-center">Community</h4>
                <p v-if="communityInfo === true" class="text-center">Nutzen Sie unsere Community um sich mit Gleichgesinnten auszutauschen, neue Freunde zu finden und Hilfe zu erhalten. Die große Community and Pflanzenliebhabern hilft immer gerne.</p>
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

        <div style="display: none;">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	  enable-background="new 0 0 723.1 205.5" xml:space="preserve">
                <symbol id="logoIndex" viewBox="0 0 723.1 205.5">
                    <path d="M104.4,2C48.5,2,3.3,47.3,3.3,103.1c0,55.8,45.3,101.1,101.1,101.1c55.8,0,101.1-45.3,101.1-101.1
                        C205.5,47.3,160.2,2,104.4,2z M70,141.2c-4.9,4.9-19.9,3.1-33-6.9c-15.3-11.6-17.8-32.7-15.9-42c9.3-1.9,30.9,1,42.5,16.3
                        C73.6,121.6,75.3,135.8,70,141.2z M122.9,102.5c-2.2,23.6-11,40-18.6,40c-7,0-16.3-17.3-18.5-40.9c-2.6-27.6,10.5-51.8,18.5-59.4
                        C112.3,49.8,125.5,74.9,122.9,102.5z M171.4,134.7c-13.1,10-27.3,11.7-32.6,6.4c-4.9-4.9-3.1-19.9,6.9-33
                        c11.6-15.3,32.7-17.8,42-15.9C189.6,101.5,186.7,123.1,171.4,134.7z"/>
                    <g>
                        <path d="M269.2,111.8v21.5h-11.4V72.2h19.9c4.1,0,7.6,0.5,10.6,1.4c3,1,5.5,2.3,7.4,4c1.9,1.7,3.4,3.8,4.3,6.2
                            c0.9,2.4,1.4,5,1.4,7.9c0,3-0.5,5.7-1.5,8.1c-1,2.5-2.5,4.6-4.4,6.4c-2,1.8-4.4,3.2-7.4,4.1c-3,1-6.4,1.5-10.4,1.5H269.2z
                             M269.2,103h8.5c2.1,0,3.9-0.3,5.5-0.8c1.5-0.5,2.8-1.3,3.8-2.2c1-1,1.8-2.2,2.3-3.6c0.5-1.4,0.8-3,0.8-4.7c0-1.6-0.3-3.1-0.8-4.4
                            c-0.5-1.3-1.3-2.5-2.3-3.4c-1-0.9-2.3-1.6-3.8-2.1c-1.6-0.5-3.4-0.7-5.5-0.7h-8.5V103z"/>
                        <path d="M321.7,124h24.5v9.4h-35.9V72.2h11.4V124z"/>
                        <path d="M407.8,133.4H399c-1,0-1.8-0.2-2.4-0.7c-0.6-0.5-1.1-1.1-1.4-1.8l-4.6-12.5h-25.3l-4.6,12.5c-0.2,0.6-0.7,1.2-1.3,1.8
                            c-0.7,0.5-1.5,0.8-2.4,0.8h-8.8l24-61.1h11.6L407.8,133.4z M368.2,110.3h19.5l-7.4-20.3c-0.3-0.9-0.7-2-1.1-3.2
                            c-0.4-1.2-0.8-2.6-1.2-4c-0.4,1.4-0.8,2.8-1.2,4c-0.4,1.2-0.8,2.3-1.1,3.3L368.2,110.3z"/>
                        <path d="M421.4,72.3c0.3,0,0.6,0.1,0.9,0.3c0.3,0.1,0.5,0.3,0.8,0.5c0.3,0.2,0.5,0.6,0.8,1l32.1,40.9c-0.1-1-0.2-2-0.2-2.9
                            c0-0.9-0.1-1.8-0.1-2.6V72.2h10v61.1h-5.9c-0.9,0-1.6-0.1-2.2-0.4c-0.6-0.3-1.2-0.8-1.7-1.5l-32-40.7c0.1,0.9,0.1,1.8,0.2,2.7
                            s0.1,1.7,0.1,2.4v37.6h-10V72.2h6C420.6,72.2,421,72.2,421.4,72.3z"/>
                        <path d="M521.2,72.2v9.3h-18.4v51.8h-11.4V81.6h-18.5v-9.3H521.2z"/>
                        <path d="M531.1,133.4V73.5h17.2c3.4,0,6.4,0.3,8.9,1c2.5,0.7,4.6,1.7,6.2,3c1.6,1.3,2.9,2.9,3.7,4.8c0.8,1.9,1.2,4,1.2,6.4
                            c0,1.6-0.3,3.1-0.8,4.6c-0.5,1.5-1.3,2.8-2.4,4.1c-1,1.2-2.3,2.3-3.8,3.2c-1.5,0.9-3.2,1.6-5.2,2.1c4.7,0.7,8.3,2.3,10.9,4.7
                            c2.5,2.4,3.8,5.6,3.8,9.6c0,2.5-0.5,4.8-1.4,6.9c-0.9,2-2.2,3.7-3.9,5.2c-1.7,1.4-3.8,2.5-6.3,3.2c-2.5,0.7-5.4,1.1-8.5,1.1H531.1z
                             M535.4,101.5h13c2.8,0,5.1-0.4,7.1-1.1c2-0.7,3.6-1.6,4.8-2.8c1.3-1.2,2.2-2.5,2.8-3.9c0.6-1.5,0.9-3,0.9-4.5c0-4-1.3-7.1-3.8-9.2
                            c-2.6-2.1-6.5-3.1-11.8-3.1h-12.9V101.5z M535.4,104.7v25.2h15c5.3,0,9.2-1.1,11.9-3.4c2.7-2.3,4-5.5,4-9.6c0-1.9-0.4-3.6-1.1-5.1
                            c-0.7-1.5-1.8-2.8-3.1-3.8c-1.4-1.1-3-1.9-5-2.4c-2-0.6-4.2-0.8-6.7-0.8H535.4z"/>
                        <path d="M630.4,133.4H627c-0.4,0-0.7-0.1-1-0.3c-0.3-0.2-0.5-0.5-0.6-0.8l-7.1-17.4H589l-7,17.4c-0.1,0.3-0.3,0.6-0.6,0.8
                            c-0.3,0.2-0.6,0.3-1,0.3h-3.3l24.5-59.8h4.3L630.4,133.4z M590.3,111.6h26.8l-12.2-30.2c-0.2-0.5-0.4-1-0.6-1.6
                            c-0.2-0.6-0.4-1.2-0.6-1.9c-0.2,0.7-0.4,1.3-0.6,1.9c-0.2,0.6-0.4,1.2-0.6,1.7L590.3,111.6z"/>
                        <path d="M668.8,80.8c-0.3,0.5-0.6,0.7-1.1,0.7c-0.4,0-0.8-0.3-1.4-0.8c-0.6-0.5-1.4-1.1-2.4-1.7c-1-0.6-2.2-1.2-3.7-1.8
                            c-1.5-0.5-3.3-0.8-5.5-0.8c-2.2,0-4.1,0.3-5.7,0.9c-1.7,0.6-3,1.5-4.2,2.5c-1.1,1.1-2,2.3-2.5,3.7c-0.6,1.4-0.9,2.9-0.9,4.4
                            c0,2,0.4,3.7,1.3,5c0.9,1.3,2,2.5,3.4,3.4c1.4,0.9,3,1.7,4.8,2.3c1.8,0.6,3.6,1.3,5.5,1.9c1.9,0.6,3.7,1.3,5.5,2.1
                            c1.8,0.7,3.4,1.7,4.8,2.8c1.4,1.1,2.5,2.5,3.4,4.2c0.9,1.6,1.3,3.7,1.3,6.2c0,2.5-0.4,4.9-1.3,7.1c-0.9,2.2-2.1,4.1-3.7,5.8
                            c-1.6,1.6-3.6,2.9-6,3.9c-2.4,0.9-5.1,1.4-8.1,1.4c-3.9,0-7.3-0.7-10.2-2.1c-2.8-1.4-5.3-3.3-7.5-5.7l1.2-1.9
                            c0.3-0.4,0.7-0.6,1.2-0.6c0.3,0,0.6,0.2,1,0.5c0.4,0.3,0.9,0.8,1.4,1.2c0.6,0.5,1.2,1,2,1.6s1.7,1.1,2.8,1.6c1,0.5,2.2,0.9,3.6,1.2
                            c1.4,0.3,2.9,0.5,4.6,0.5c2.4,0,4.5-0.4,6.4-1.1c1.9-0.7,3.4-1.7,4.7-2.9c1.3-1.2,2.3-2.7,2.9-4.4c0.7-1.7,1-3.5,1-5.5
                            c0-2.1-0.4-3.9-1.3-5.2c-0.9-1.4-2-2.5-3.4-3.4c-1.4-0.9-3-1.7-4.8-2.3c-1.8-0.6-3.6-1.2-5.5-1.8c-1.9-0.6-3.7-1.3-5.5-2
                            c-1.8-0.7-3.4-1.7-4.8-2.8c-1.4-1.1-2.5-2.6-3.4-4.3c-0.9-1.7-1.3-3.8-1.3-6.4c0-2,0.4-3.9,1.1-5.8c0.8-1.9,1.9-3.5,3.3-4.9
                            c1.5-1.4,3.3-2.6,5.4-3.4c2.2-0.9,4.6-1.3,7.4-1.3c3.1,0,5.9,0.5,8.4,1.5c2.5,1,4.7,2.5,6.8,4.5L668.8,80.8z"/>
                        <path d="M719.9,73.5v3.6h-31.5v24.2h26.2v3.5h-26.2v25h31.5v3.6H684V73.5H719.9z"/>
                    </g>
                    </symbol>
            </svg>
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
            goToRegister: function() {
                this.$router.push({path: '/register'});
            },

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

                if (this.waterInfo === false) {
                    this.waterInfo = true;
                } else {
                    this.waterInfo = false;
                }
            },

            tippsClick: function() {
                this.waterInfo = false;
                this.gardenInfo = false;
                this.reminderInfo = false;
                this.communityInfo = false;

                if (this.tippsInfo === false) {
                    this.tippsInfo = true;
                } else {
                    this.tippsInfo = false;
                }
            },

            gardenClick: function() {
                this.waterInfo = false;
                this.tippsInfo = false;
                this.reminderInfo = false;
                this.communityInfo = false;

                if (this.gardenInfo === false) {
                    this.gardenInfo = true;
                } else {
                    this.gardenInfo = false;
                }
            },

            reminderClick: function() {
                this.waterInfo = false;
                this.tippsInfo = false;
                this.gardenInfo = false;
                this.communityInfo = false;

                if (this.reminderInfo === false) {
                    this.reminderInfo = true;
                } else {
                    this.reminderInfo = false;
                }

            },

            communityClick: function() {
                this.waterInfo = false;
                this.tippsInfo = false;
                this.gardenInfo = false;
                this.reminderInfo = false;

                if (this.communityInfo === false) {
                    this.communityInfo = true;
                } else {
                    this.communityInfo = false;
                }
            },
        },
        components:{
            Slider
        }
    }
</script>

<style scoped>
    #indexLogo svg {
        padding-left: 35px;
        fill: white;
        width: 150%;
        margin-bottom: 20%;
    }
    #widthLogoIndex { width: 20%; }

    /*---------------------------------allgemein---------------------*/

    .rowsIndex {
        padding-top: 5%;
        padding-bottom: 5%;
    }

    .rowsIndexWelcome {
        padding-top: 5%;
        padding-bottom: 9%;
    }

    /*fonts*/
    .h3Index {
        font-size: 250%;
        margin-bottom: 3%;
        text-transform: uppercase;
        font-weight: lighter;
    }
    .pIndex {
        font-size: 110%;
        font-weight: lighter;
        line-height: 1.8;
    }

    /*---------------------------------welcome row----------------------*/
    /* mit login, wilkommen und app download*/
    #welcomeRow #h1Start {
        font-size: 350%;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 10%;
    }
    #welcomeRow .profileLink { color: #707070; }
    #welcomeRow .profileLink:hover { color: #B8E269; }
    #welcomeRow .profileLink:active { color: #707070; }

    #welcomeRow .logoutButton {
        background-color: white;
        padding: 1% 2%;
        color: #97B753;;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 90%;
        margin-left: 2%;
    }
    #welcomeRow .logoutButton:hover {
        background-color: #B8E269;
        color: #707070;
        border: 2px solid #B8E269;
    }
    #welcomeRow .logoutButton:active {
        background-color: white;
        color: #97B753;;
        border: 2px solid white;
    }


    /*login form*/
    #welcomeRow #loginIndex label {
        width: 20%;
        font-size: 120%;
        text-align: right;
        margin-right: 2%;
    }
    #welcomeRow #loginIndex input {
        width: 65%;
        margin-bottom: 4%;
        color: #707070;
        height: 90%;
        border-radius: 10px;
    }
    #welcomeRow .notLoggedIn {
        text-align: right;
        margin-right: 13%;
    }

    #welcomeRow #loginIndex button { margin-right: 13%; }
    #welcomeRow .oneColumn {
        display: none;
        margin: 2% 0% 6% 0%;
    }

    /*registrierern*/
    #welcomeRow .registerIndex { padding-top: 5%; }
    #welcomeRow .registerIndex #h3Register {
        font-size: 100%;
        margin: 0;
    }
    #welcomeRow .registerIndex .buttonWhiteIndex {
        font-size: 80%;
        padding: 1% 2%;
        margin: 0;
    }

    /*phone right*/
    #welcomeRow #pIndexDownload { margin-bottom: 20%; }
    #welcomeRow #phoneImg { border-left: 1px solid white; }
    #welcomeRow #phoneImg div { text-align-last: center; }
    #welcomeRow #handyImg { width: 90%; }

    /*desktop right*/
    #welcomeRow .desktopCol { border-left: 1px solid white; }
    #welcomeRow .desktopCol #desktopImg { width: 100%; margin-bottom: 1%;}
    #welcomeRow #h3Info { font-size: 150%; }




    /*---------------------------------über plantbase row----------------------*/
    #plantbaseInfo #indexAloe { width: 70%; }


    /*---------------------------------Angebote row----------------------*/

    #offerRowElements .indexIcon svg {
        width: 90%;
        height: 80%;
        margin-bottom: 15%;
        margin-top: 10%;
    }

    /*hover Animations*/
    #offerRowElements .indexIconRotation:hover {
        transform: rotateY(360deg);
        transition: transform 1s;
    }
    #offerRowElements .rowsIndexBottom { padding-bottom: 5%; }
    #offerRowElements .rowsIndexBottom p {
        font-size: 120%;
        margin: 0 5%;
    }
    #offerRowElements .offerText { place-content: center; }

    /*fillings of the icons*/
    #indexWateringCan svg .circle { fill: white; }
    #indexWateringCan svg .grey { fill: #707070; }
    #indexWateringCan svg .green { fill: #97B753 }

    #indexWateringCan svg:active .circle { fill: #707070; }
    #indexWateringCan svg:active .grey { fill: #B8E269; }
    #indexWateringCan svg:active .green { fill: white; }

    #indexIdea svg .circle { fill: white; }
    #indexIdea svg .grey { fill: #707070; }
    #indexIdea svg .green { fill: #97B753 }

    #indexIdea svg:active .circle { fill: #707070; }
    #indexIdea svg:active .grey { fill: #B8E269; }
    #indexIdea svg:active .green { fill: white; }

    #indexPlant svg .circle { fill: white; }
    #indexPlant svg .green { fill: #97B753; stroke: #B8E269; }
    #indexPlant svg .grey { fill: #707070; }

    #indexPlant svg:active .circle { fill: #707070; }
    #indexPlant svg:active .green { fill: white; stroke: #DEDEDE; }
    #indexPlant svg:active .grey { fill: #B8E269; }

    #indexBell svg .circle { fill: white; }
    #indexBell svg .green { fill: #97B753; }
    #indexBell svg .grey { fill: #707070; }

    #indexBell svg:active .circle { fill: #707070; }
    #indexBell svg:active .green { fill: white; }
    #indexBell svg:active .grey { fill: #B8E269; }

    #indexCommunity svg .circle { fill: white; }
    #indexCommunity svg .green { fill: #97B753; }
    #indexCommunity svg .grey { fill: #707070; }

    #indexCommunity svg:active .circle { fill: #707070; }
    #indexCommunity svg:active .green { fill: white; }
    #indexCommunity svg:active .grey { fill: #B8E269; }



    /*---------------------------------news slider row----------------------*/

    /*news Sllider*/
    .indexArrows svg { width: 50%; fill: #97B753; color:BLACK; }
    .indexArrows svg:hover { fill: #B8E269; }
    .indexArrows svg:active { fill: #707070; }
    #indexNewsSlider {
        color: transparent;
        border: 2px solid #97B753;
        border-radius: 10px;
    }

    /*---------------------------------------------Media Queries----------------------------*/
    /*-----------------------------1200px-----------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        #welcomeRow #h3Info { font-size: 130%; }

        #indexLogo svg { width: 110%; }
        #widthLogoIndex { width: 30%; }

        #welcomeRow #loginIndex label {
            width: 100%;
            text-align-last: left;
        }
        #welcomeRow #loginIndex input { width: 87%; }
        #welcomeRow #h1Start {
            font-size: 300%;
            margin-top: 5%;
        }
    }
    /*-----------------------------992px-----------------------------*/
    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        #welcomeRow .registerIndex .h3RegisterCol { width: 50%; }
        #welcomeRow .registerIndex .buttonRegisterCol { width: 50%; }
        #welcomeRow .registerIndex { margin-bottom: 5%; }

        #welcomeRow #h3Info { font-size: 160%; }

        #indexLogo svg{
            width: 100%;
            margin-bottom: 0;
        }
        #widthLogoIndex { width: 40%; }

        #welcomeRow #loginIndex label {
            width: 20%;
            text-align-last: right;
        }
        #welcomeRow #loginIndex input { width: 70%; }
        #welcomeRow #loginIndex button { margin-right: 8%; }
        #welcomeRow .oneColumn { display: block; }
        #welcomeRow #h1Start {
            font-size: 200%;
            margin-bottom: 5%;
        }

        #welcomeRow #phoneImg {
            border: none;
            width: 50%;
        }
        #welcomeRow .phoneAppDownload { width: 50%; }

        #welcomeRow .desktopCol { border-left: none; }
        #welcomeRow .desktopCol #desktopImg { width: 80%; }



        #plantbaseInfo .aloePicture { width: 30%; }
        #plantbaseInfo .plantbaseInfoText { width: 70%; }

        #offerRowElements .wateringHelp { width: 30%; }
        #offerRowElements .tipsTricks { width: 30%; }
        #offerRowElements .userGarden { width: 30%; }
        #offerRowElements .userReminder { width: 30%; }
        #offerRowElements .community { width: 30%; }
    }

    /*-----------------------------768px-----------------------------*/
    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        #welcomeRow #h3Info { font-size: 130%; }

        .h3Index { font-size: 150%; }
        .pIndex { font-size: 100%; }
        #welcomeRow #dowloadNow { font-size: 150%; }

        #plantbaseInfo .aloePicture { display: none; }
        #plantbaseInfo .plantbaseInfoText { width: 100%; }


    }

    /*-----------------------------576px-----------------------------*/
    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        #welcomeRow .registerIndex #h3Register { font-size: 140%; }
        #welcomeRow .registerIndex .buttonRegister { font-size: 120%; }

        #welcomeRow #h3Info { font-size: 140%; }
        #welcomeRow .desktopCol #desktopImg { width: 100%; margin-bottom: 2%; }

        #indexLogo svg { max-width: 50%; min-width: 15em; }
        #widthLogoIndex { width: 100%; }

        #welcomeRow #h1Start { margin-bottom: 7%; }
        #welcomeRow #loginText { display: block; }
        #welcomeRow #logoutTextLink {
            display: block;
            width: 100%;
            margin-top: 8%;
        }
        #welcomeRow #logoutTextLink .logoutButton {
            background-color: white;
            padding: 5px 14px;
            color: #97B753;;
            border: 2px solid white;
            border-radius: 10px;
            font-size: 110%;
            margin: 2% 0%;
            font-weight: bold;
        }

        #welcomeRow #loginIndex label {
            width: 100%;
            text-align-last: left;
            font-size: 140%;
        }
        #welcomeRow #loginIndex input { width: 100%; }
        #welcomeRow #loginIndex button { margin-right: 0; }
        #welcomeRow .oneColumn { margin: 8% 0% 10% 0%; }

        #welcomeRow #phoneImg { display: none; }
        #welcomeRow .phoneAppDownload { width: 100%; }
        #welcomeRow #pIndexDownload { margin-bottom: 5%; }

        #offerRowElements .wateringHelp {
            width: 100%;
            margin-top: 3%;
        }
        #offerRowElements .tipsTricks { width: 100%; }
        #offerRowElements .userGarden { width: 100%; }
        #offerRowElements .userReminder { width: 100%; }
        #offerRowElements .community { width: 100%; }

        #offerRowElements .offerIcon {
            width: 15%;
            float: left;
            margin-left: 10%;
        }
        #offerRowElements .offerText {
            font-size: 150%;
            float: left;
            margin-left: 10%;
            margin-top: 3%;
        }
        #offerRowElements .offerText .pIndex { margin-bottom: 0; }

        #offerRowElements .wateringHelp:hover,
        #offerRowElements .tipsTricks:hover,
        #offerRowElements .userGarden:hover,
        #offerRowElements .userReminder:hover,
        #offerRowElements .community:hover{
            background-color: white;
            color: #707070;
            border-radius: 10px;
        }
        #offerRowElements .wateringHelp:active,
        #offerRowElements .tipsTricks:active,
        #offerRowElements .userGarden:active,
        #offerRowElements .userReminder:active,
        #offerRowElements .community:active{
            background-color: #707070;
            color: white;
            border-radius: 10px;
        }


        /*own media*/
        @media (max-width: 450px) {
            #welcomeRow .registerIndex .h3RegisterCol { width: 100%; }
            #welcomeRow .registerIndex .buttonRegisterCol {
                width: 100%;
                text-align: center;
            }
            #welcomeRow .registerIndex .h3RegisterDiv {
                text-align: center !important;
                margin-bottom: 3%;
                margin-top: 5%;
            }

            #offerRowElements .offerIcon { margin-left: 4%; }
            #offerRowElements .offerText { font-size: 120%; }
        }
    }
</style>