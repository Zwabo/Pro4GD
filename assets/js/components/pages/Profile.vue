<template>
    <div id="root">
    <div v-if="profileUser !== null && createdUserString !== null && loggedInUser !== null && profileUserFriends !== null">

        <div class="container-fluid">

            <!--------------------------------- upper profile part - HEADER ------------------------------------------------------------->
            <div class="row bgDarkGrey fontWhite" id="userHeader">

                <!---------------------------user pictuer------------------------->
                <div class="col-lg-4" id="userPicCnt">
                    <img class="userPicture" v-bind:src="profileUser.userPic + '?' + new Date().getTime()" v-if="!editProfile">
                    <div v-if="editProfile">
                        <label class="imageUpload">
                            <input accept="image/jpeg, image/png" type="file" id="file" ref="file" v-on:change="handleFileUpload()"/>
                            <img src="/images/icons/edit_profile.png">
                        </label>
                            <img class="userPicture" v-bind:src="previewUserPic">
                    </div>
                </div>
                <div class="smallMobile">
                    <h2 class="userCntH2"> {{ profileUser.username }}</h2>
                    <p class="userCntRang">{{getLevel(profileUser.xp)}}</p>
                </div>

                <!---------------------------user name / info------------------------->
                <div id="userCnt" class="col-lg-5">
                    <h1 class="userCntH1 biggerMobile">{{ profileUser.firstname}} {{ profileUser.lastname }}</h1>
                    <h2 class="userCntH2 biggerMobile"> {{ profileUser.username }}</h2>
                    <p class="userCntRang biggerMobile">{{getLevel(profileUser.xp)}}</p>
                    <p class="userCntLevelbar"><b-progress :value="profileUser.xp" :max="max" variant="dark" class="w-50 mb-2" height="1.2rem"></b-progress></p>
                    <p class="userCntXPLeft">{{XPleft(profileUser.xp)}}</p>

                    <!---------------------------changable button------------------------>
                    <button v-if="!(loggedInUser.username == profileUser.username) && loggedInUserIsStranger" @click="sendFriendRequest()" id="userButton">Hinzufügen <svg><use href="#plusOnly"></use></svg></button>
                    <button v-else-if="loggedInUser.username===profileUser.username && editProfile!=true" id="userButton"  v-on:click="changeProfile">Profil bearbeiten</button>
                    <button v-else-if="loggedInUser.username===profileUser.username && editProfile==true" id="userButton" v-on:click="saveProfile">Profil speichern</button>
                </div>

                <!------------------------------------user info---------------------------->
                <div id="userDataCnt" class="col-lg-3">
                    <ul class="noListStyle">
                        <li id="userDataCntCreated" class="floatSmall">
                            <svg><use href="#profile"></use></svg>
                            seit {{ createdUserString }} Mitglied
                        </li>
                        <li id="userDataCntLocation">
                            <svg><use href="#locationPin"></use></svg>
                            {{ profileUser.country }}
                        </li>
                        <li v-if="showBirthday" id="userDataCntBirthday" class="floatSmall">
                            <svg><use href="#calendar"></use></svg>
                            {{ birthdayString }}
                        </li>
                        <li v-if="showBirthday" id="userDataCntAge">
                            <svg><use href="#birthday"></use></svg>
                            {{ userAge }}
                        </li>
                    </ul>
                </div>


            </div>

            <!--------------------------------- lower profile part ------------------------------------------------------------->
            <div class="row marginLeftRight" id="lowerProfile">

                <!------------------------------------------------------------------------------->
                <div class="col-lg-8 leftCol">

                    <!------------------------------------left part------------------------------>
                    <div class="left">

                        <!--------------------------------profile description desktop-------------------->
                        <div id="description">
                            <h3 v-if="loggedInUser.username === profileUser.username" class="h3Margin">Über mich</h3>
                            <h3 v-else class="h3Margin">Über {{ profileUser.username }}</h3>
                            <div class="greenLine"></div>

                            <p v-if="editProfile">
                                <textarea class="smallInput" @blur="saveProfile" v-model="profileUser.description"></textarea>
                            </p>
                            <p v-if="!editProfile">
                                {{ profileUser.description }}
                            </p>
                        </div>

                        <!--------------------------------friends-------------------------------->
                        <div v-if="showFriends && profileUserFriends.length > 0" id="profileFriends">
                            <!-----desktop------>
                            <div class="row h3Margin desktop">
                                <div class="col-lg-8 desktopHL desktop">
                                    <h4>Freunde</h4>
                                </div>
                                <div class="col-lg-4 rightBoxesLink desktopLink ">
                                    <router-link :to="'/friends'" class="routerText desktop">
                                        <span>Alle Freunde</span>
                                        <svg class="forthSvg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 41 49" style="enable-background:new 0 0 41 49;" xml:space="preserve">
<g id="Polygon_98" transform="translate(41) rotate(90)">
	<path class="st0" d="M41.9,38H7c-1.1,0-2.1-0.6-2.6-1.5c-0.5-0.9-0.5-2.1,0-3L21.8,4.3c0.5-0.9,1.5-1.5,2.6-1.5s2,0.5,2.6,1.5
		l17.4,29.2c0.6,0.9,0.6,2.1,0,3C43.9,37.4,42.9,38,41.9,38z"/>
	<path class="st0" d="M24.4,3.8c-0.3,0-1.2,0.1-1.7,1L5.2,34c-0.5,0.9-0.2,1.7,0,2c0.2,0.3,0.7,1,1.7,1h35c1.1,0,1.6-0.7,1.7-1
		c0.2-0.3,0.5-1.1,0-2L26.1,4.8C25.6,3.9,24.7,3.8,24.4,3.8 M24.4,1.8c1.3,0,2.7,0.6,3.4,1.9L45.3,33c1.6,2.6-0.3,6-3.4,6H7
		c-3.1,0-5-3.4-3.4-6.1L21,3.7C21.7,2.4,23.1,1.8,24.4,1.8z"/>
</g>
</svg>
                                    </router-link>
                                </div>
                            </div>
                            <!-----mobile------>
                            <div class="row mobileDevice">
                                <div class="col-lg-8"><h3 class="h3Margin">Freunde</h3></div>
                            </div>

                            <div class="greenLine"></div>

                            <!-------------------------------freunde auflistung----------------------->
                            <div class="container-fluid" id="profileFriendsList">

                                <div v-for="(friend, index) in profileUserFriends" class="row friends bgWhiteGrey dropShadow borderRad10" @click="goToFriend(friend.username)">
                                    <div class="col-lg-2 friendsPicture text-center justify-content-center">
                                        <!-- change to friends.userPic when friends are implemented correctly-->
                                        <img class="smallUserPics" v-bind:src="friend.userPic">
                                    </div>

                                    <div class="col-lg-6 friendsInfo selfAlignCenter">
                                        <ul class="noListStyle">
                                            <li class="friendUsernameHL">{{ friend.username }}</li>
                                            <li class="friendWholeName">{{ friend.firstName }} {{ friend.lastName }}</li> <!-- {{ profileUser.username }}-->
                                            <li class="friendLevel"><b-progress :value="friend.xp" :max="friend.xp- friend.xp%100 +100" variant="dark" class="w-25"></b-progress></li>
                                            <li v-if="friend.lvlAward === null" class="friendTitle">Sprössling</li>
                                            <li v-else class="friendTitle">{{friend.lvlAward}}</li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 text-right selfAlignCenter friendsButtons justify-content-center">
                                        <a :href="'/profile/' + friend.username">
                                        <span class="userProfileButton">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve">
<path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><g><g><path class="path2" d="M229,16.7c-61.1,0-110.9,49.8-110.9,110.9S167.9,238.5,229,238.5s110.9-49.8,110.9-110.9S290.1,16.7,229,16.7z"/></g></g><path class="path2" d="M366,304.9c-30.4-30.8-70.6-47.8-113.3-47.8h-49.3c-42.7,0-83,17-113.3,47.8c-26,26.4-42,60.2-45.9,96.5c1.9,1.9,3.8,3.7,5.8,5.3c68.3,56.9,285.9,56.9,355.6,0c2.2-1.8,4.3-3.7,6.3-5.9C407.8,364.8,391.9,331.2,366,304.9z"/></svg>
                                        </span>
                                        </a>
                                        <span class="addUserButton">
                                            <span class="addUserButton">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg>
                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-end buttonDesktop">
                                    <button class="buttonDarkGreen mobileDevice" @click="goToFriends">Alle Freunde</button>
                                </div>

                            </div>
                        </div>


                        <!---------------------------------Garden----------------------------------------->
                        <div class="container-fluid paddingNormalize" v-if="showGarden && profileUserplants !== null">

                        <div id="garden">
                            <!-----desktop------>
                            <div class="row h3Margin desktop">
                                <div class="col-lg-8 desktopHL desktop">
                                    <h4  v-if="loggedInUser.username === profileUser.username">Mein Garten</h4>
                                    <h4 v-else>{{profileUser.username}}s Garten</h4>
                                </div>
                                <div class="col-lg-4 rightBoxesLink desktopLink ">
                                    <router-link :to="'/garden/' + profileUser.id" class="routerText desktop">
                                        <span>Zum Garten</span>
                                        <svg class="forthSvg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 41 49" style="enable-background:new 0 0 41 49;" xml:space="preserve">
<g id="Polygon_98" transform="translate(41) rotate(90)">
	<path class="st0" d="M41.9,38H7c-1.1,0-2.1-0.6-2.6-1.5c-0.5-0.9-0.5-2.1,0-3L21.8,4.3c0.5-0.9,1.5-1.5,2.6-1.5s2,0.5,2.6,1.5
		l17.4,29.2c0.6,0.9,0.6,2.1,0,3C43.9,37.4,42.9,38,41.9,38z"/>
	<path class="st0" d="M24.4,3.8c-0.3,0-1.2,0.1-1.7,1L5.2,34c-0.5,0.9-0.2,1.7,0,2c0.2,0.3,0.7,1,1.7,1h35c1.1,0,1.6-0.7,1.7-1
		c0.2-0.3,0.5-1.1,0-2L26.1,4.8C25.6,3.9,24.7,3.8,24.4,3.8 M24.4,1.8c1.3,0,2.7,0.6,3.4,1.9L45.3,33c1.6,2.6-0.3,6-3.4,6H7
		c-3.1,0-5-3.4-3.4-6.1L21,3.7C21.7,2.4,23.1,1.8,24.4,1.8z"/>
</g>
</svg>
                                    </router-link>
                                </div>
                            </div>
                            <!-----mobile------>
                            <div class="row mobileDevice">
                                <div class="col-lg-8"><h3 class="h3Margin">Zum Garten</h3></div>
                            </div>

                            <div class="greenLine"></div>
                        </div>

                        <div class="container-fluid paddingNormalize" id="profileGarden">
                            <div class="row">

                                <div class="col-lg-6 paddingNormalize gardenLeft">
                                    <div v-for="(userplant, index) in profileUserplants" class="container-fluid">
                                        <div v-if="(index % 2 == 0 || index == 0) && index < 4" class="row paddingNormalize">
                                            <router-link :to="'/userplant/' + userplant.id" class="container-fluid">
                                                <div class="container-fluid plantsProfile dropShadow bgWhiteGrey ">
                                                    <div class="row">
                                                        <div class="col-lg-8 selfAlignCenter plantsProfileInfoCol">
                                                            <ul class="noListStyle">
                                                                <li class="userplantGardenHL">{{ userplant.name }} ({{userplant.plant.name}})</li>
                                                                <li class="userplantGardenLocation">{{ userplant.location }}</li>
                                                                <li class="userplantGardenXPBar"><b-progress :value="userplant.xp" :max="userplant.xp - userplant.xp%100 +100" variant="dark" class="w-25"></b-progress></li>
                                                                <li class="userplantGardenLevel">Level {{plantLevel(userplant.xp)}}</li>
                                                                <li class="userplantGardenAge">
                                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve" fill="#97B753">
		<g>
			<path d="M234.56,128c23.573,0,42.667-19.093,42.667-42.667c0-8-2.24-15.573-6.08-21.973L234.56,0l-36.587,63.36
				c-3.84,6.4-6.08,13.973-6.08,21.973C191.893,108.907,210.987,128,234.56,128z"/>
			<path d="M362.56,192L362.56,192H255.893v-42.667h-42.667V192H106.56c-35.307,0-64,28.693-64,64v32.853
				c0,23.04,18.773,41.813,41.813,41.813c11.2,0,21.653-4.373,29.547-12.267l45.653-45.547l45.547,45.44
				c15.787,15.787,43.307,15.787,59.093,0l45.653-45.44l45.547,45.44c7.893,7.893,18.347,12.267,29.547,12.267
				c23.04,0,41.813-18.773,41.813-41.813V256C426.56,220.693,397.867,192,362.56,192z"/>
			<path d="M332.587,341.013L332.587,341.013l-22.933-22.933l-23.04,22.933c-27.84,27.84-76.48,27.84-104.32,0L159.36,318.08
				l-23.04,22.933c-13.76,13.973-32.213,21.653-51.947,21.653c-15.467,0-29.867-4.907-41.813-13.12V448
				c0,11.733,9.6,21.333,21.333,21.333h341.333c11.733,0,21.333-9.6,21.333-21.333v-98.453c-11.947,8.213-26.24,13.12-41.813,13.12
				C365.013,362.667,346.56,354.987,332.587,341.013z"/>
		</g>
</svg>
                                                                    <p>{{getUserplantLived(userplant.dateAdded)}}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4 plantsProfileImgCol text-right align-self-center">
                                                            <div class="plantsProfileImgDiv">
                                                                <img class="plantsProfileImg" v-bind:src="'../' + userplant.plant.icon">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 paddingNormalize gardenRight">
                                    <div v-for="(userplant, index) in profileUserplants" class="container-fluid">
                                        <div v-if="index % 2 !== 0 && index < 4" class="row paddingNormalize">
                                            <router-link :to="'/userplant/' + userplant.id" class="container-fluid">
                                                <div class="container-fluid plantsProfile dropShadow bgWhiteGrey">
                                                    <div class="row">
                                                        <div class="col-lg-8 selfAlignCenter plantsProfileInfoCol">
                                                            <ul class="noListStyle">
                                                                <li class="userplantGardenHL">{{ userplant.name }} ({{userplant.plant.name}})</li>
                                                                <li class="userplantGardenLocation">{{ userplant.location }}</li>
                                                                <li class="userplantGardenXPBar"><b-progress :value="userplant.xp" :max="userplant.xp - userplant.xp%100 +100" variant="dark" class="w-25"></b-progress></li>
                                                                <li class="userplantGardenLevel">Level {{plantLevel(userplant.xp)}}</li>
                                                                <li class="userplantGardenAge">
                                                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 469.333 469.333" style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve" fill="#97B753">
		<g>
			<path d="M234.56,128c23.573,0,42.667-19.093,42.667-42.667c0-8-2.24-15.573-6.08-21.973L234.56,0l-36.587,63.36
				c-3.84,6.4-6.08,13.973-6.08,21.973C191.893,108.907,210.987,128,234.56,128z"/>
			<path d="M362.56,192L362.56,192H255.893v-42.667h-42.667V192H106.56c-35.307,0-64,28.693-64,64v32.853
				c0,23.04,18.773,41.813,41.813,41.813c11.2,0,21.653-4.373,29.547-12.267l45.653-45.547l45.547,45.44
				c15.787,15.787,43.307,15.787,59.093,0l45.653-45.44l45.547,45.44c7.893,7.893,18.347,12.267,29.547,12.267
				c23.04,0,41.813-18.773,41.813-41.813V256C426.56,220.693,397.867,192,362.56,192z"/>
			<path d="M332.587,341.013L332.587,341.013l-22.933-22.933l-23.04,22.933c-27.84,27.84-76.48,27.84-104.32,0L159.36,318.08
				l-23.04,22.933c-13.76,13.973-32.213,21.653-51.947,21.653c-15.467,0-29.867-4.907-41.813-13.12V448
				c0,11.733,9.6,21.333,21.333,21.333h341.333c11.733,0,21.333-9.6,21.333-21.333v-98.453c-11.947,8.213-26.24,13.12-41.813,13.12
				C365.013,362.667,346.56,354.987,332.587,341.013z"/>
		</g>
</svg>
                                                                    <p>{{getUserplantLived(userplant.dateAdded)}}</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-4 plantsProfileImgCol text-rigth align-self-center imgBoxRight">
                                                            <img class="plantsProfileImg" v-bind:src="'../' + userplant.plant.icon">
                                                        </div>
                                                    </div>
                                                </div>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="row d-flex justify-content-end">
                            <button class="buttonDarkGreen plantButton mobileDevice" @click="goToGarden">Zum Garten</button>
                        </div>
                        </div>

                        <!---------------------------------Awards & Forum Einspaltig--------------------------------->
                        <div class="oneColumn rightToLeft">

                            <!-----------------------------------------Awards One Column-------------------------------->
                            <div id="awardOneColumn" v-if="profileUser.awards.length > 0">
                                <!-----desktop------>
                                <div class="row h3Margin desktop">
                                    <div class="col-lg-8 desktopHL desktop">
                                        <h4>Auszeichnungen</h4>
                                    </div>
                                    <div class="col-lg-4 rightBoxesLink desktopLink ">
                                        <router-link :to="'/profile/' + profileUser.username + '/awards'" class="routerText desktop">
                                            <span>Alle anzeigen</span>
                                            <svg class="forthSvg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 41 49" style="enable-background:new 0 0 41 49;" xml:space="preserve">
    <g id="Polygon_98" transform="translate(41) rotate(90)">
        <path class="st0" d="M41.9,38H7c-1.1,0-2.1-0.6-2.6-1.5c-0.5-0.9-0.5-2.1,0-3L21.8,4.3c0.5-0.9,1.5-1.5,2.6-1.5s2,0.5,2.6,1.5
            l17.4,29.2c0.6,0.9,0.6,2.1,0,3C43.9,37.4,42.9,38,41.9,38z"/>
        <path class="st0" d="M24.4,3.8c-0.3,0-1.2,0.1-1.7,1L5.2,34c-0.5,0.9-0.2,1.7,0,2c0.2,0.3,0.7,1,1.7,1h35c1.1,0,1.6-0.7,1.7-1
            c0.2-0.3,0.5-1.1,0-2L26.1,4.8C25.6,3.9,24.7,3.8,24.4,3.8 M24.4,1.8c1.3,0,2.7,0.6,3.4,1.9L45.3,33c1.6,2.6-0.3,6-3.4,6H7
            c-3.1,0-5-3.4-3.4-6.1L21,3.7C21.7,2.4,23.1,1.8,24.4,1.8z"/>
    </g>
    </svg>
                                        </router-link>
                                    </div>
                                </div>
                                <!-----mobile------>
                                <div class="row mobileDevice">
                                    <div class="col-lg-8">
                                        <h3 class="h3Margin">Auszeichnungen</h3>
                                    </div>
                                </div>

                                <div class="greenLine"></div>

                                <div class="awardTextDiv desktop">
                                    <p v-for="(award, index) in profileUser.awards" v-if="index < 3">
                                        <img class="awardImage" v-bind:src="'../' + award.awardIcon" v-bind:alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                                        <span class="awardText"> {{profileUser.username}} {{award.altText}}</span>
                                    </p>
                                </div>

                                <div class="awardTextDiv mobileDevice">
                                    <span v-for="(award, index) in profileUser.awards" v-if="index < 14">
                                <img class="awardImage" v-bind:src="'../' + award.awardIcon" v-bind:alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                            </span>
                                </div>

                                <div class="row d-flex justify-content-end">
                                    <button class="buttonDarkGreen plantButton mobileDevice" @click="goToAwards">Alle Anzeigen</button>
                                </div>
                            </div>

                            <!-----------------------------------------Forum One Column-------------------------------->
                            <div id="forumOneColumn" v-if="createdThreads !== null || writtenComments !== null">
                                <!-----desktop------>
                                <div class="row h3Margin desktop">
                                    <div class="col-lg-8 desktopHL desktop">
                                        <h4>Forum</h4>
                                    </div>
                                    <div class="col-lg-4 rightBoxesLink desktopLink ">
                                        <router-link :to="'/profile/' + profileUser.username + '/forum'" class="routerText desktop">
                                            <span>Alle anzeigen</span>
                                            <svg class="forthSvg" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         viewBox="0 0 41 49" style="enable-background:new 0 0 41 49;" xml:space="preserve">
    <g id="Polygon_98" transform="translate(41) rotate(90)">
        <path class="st0" d="M41.9,38H7c-1.1,0-2.1-0.6-2.6-1.5c-0.5-0.9-0.5-2.1,0-3L21.8,4.3c0.5-0.9,1.5-1.5,2.6-1.5s2,0.5,2.6,1.5
            l17.4,29.2c0.6,0.9,0.6,2.1,0,3C43.9,37.4,42.9,38,41.9,38z"/>
        <path class="st0" d="M24.4,3.8c-0.3,0-1.2,0.1-1.7,1L5.2,34c-0.5,0.9-0.2,1.7,0,2c0.2,0.3,0.7,1,1.7,1h35c1.1,0,1.6-0.7,1.7-1
            c0.2-0.3,0.5-1.1,0-2L26.1,4.8C25.6,3.9,24.7,3.8,24.4,3.8 M24.4,1.8c1.3,0,2.7,0.6,3.4,1.9L45.3,33c1.6,2.6-0.3,6-3.4,6H7
            c-3.1,0-5-3.4-3.4-6.1L21,3.7C21.7,2.4,23.1,1.8,24.4,1.8z"/>
    </g>
    </svg>
                                        </router-link>
                                    </div>
                                </div>
                                <!-----mobile------>
                                <div class="row mobileDevice">
                                    <div class="col-lg-8">
                                        <h3 class="h3Margin">Forum</h3>
                                    </div>
                                </div>

                                <div class="greenLine"></div>

                                <div class="paddingNormalize threadComments" v-if="createdThreads !== null">
                                    <h5 class="threadCommentsHL">Eröffnete Threads</h5> <!-- wird aus dem Forum ausgelesen -->
                                    <hr class="threadCommentsPaddingLR threadCommentsHr">
                                    <div class="threadCommentsInfo">
                                        <p v-for="(thread, id) in createdThreads" v-if="id < 3" class="threadCommentsPaddingLR threadList">
                                            <router-link :to="'/forum/' + thread.id">
                                                <span class="threadHL">{{thread.headline}}</span>
                                                <span class="threadCreated">{{getDateString(thread.created)}}</span>
                                            </router-link>
                                        </p>
                                    </div>
                                </div>

                                <div class="paddingNormalize threadComments" v-if="writtenComments !== null">
                                    <h5 class="threadCommentsHL">Kommentierte Threads</h5>
                                    <hr class="threadCommentsPaddingLR threadCommentsHr">
                                    <div class="threadsCommentsInfo">
                                        <p v-for="(comment, index) in writtenComments" v-if="index < 3" class="threadCommentsPaddingLR threadList">
                                            <router-link :to="'/forum/' + comment.thread.id + '#comment' + comment.id">
                                                <div class="paddingNormalize">
                                                    <span class="commentHL">{{comment.thread.headline}}</span>
                                                    <span class="commentCreated">{{getDateString(comment.created)}}</span>
                                                </div>
                                                <div class="paddingNormalize commentText">
                                                    <span>{{shortenString(comment.text)}}</span>
                                                </div>
                                            </router-link>
                                        </p>
                                    </div>
                                </div>

                                <div class="row d-flex justify-content-end">
                                    <button class="buttonDarkGreen plantButton mobileDevice" @click="goToProfileForum">Alle Anzeigen</button>
                                </div>
                            </div>

                        </div>

                        <!---------------------------------Besuchernachrichten----------------------------------------->
                        <div class="container-fluid" id="visitorComments" v-if="showComments">
                            <h3 class="h3Margin">Besuchernachrichten</h3>
                            <div class="greenLine"></div>

                            <div v-if="profileUser.comments.length === 0" id="commentInfo">Keine Besuchernachrichten vorhanden</div>

                            <div class="row" id="leaveComment">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2 commentPicDiv"><img class="commentPic" v-bind:src="profileUser.userPic"></div>
                                        <div class="col-lg-10 commentInputDiv"><textarea v-model="commentMessage" class="commentInput" type="text" placeholder="Nachricht hinterlassen"></textarea></div>
                                    </div>
                                    <div class="text-right buttonCommentDiv"><button v-on:click="saveComment" class="buttonComment">Nachricht speichern</button></div>
                                </div>
                            </div>


                            <div v-if="profileUser.comments.length !== 0" v-for="(profileComment, index) in profileUser.comments" class="container-fluid" id="commentEntries">
                                <div class="row commentRow">
                                    <div class="col-lg-1 paddingNormalize commentPicDiv"><img class="commentPic" v-bind:src="profileComment.userpic"></div>
                                    <div class="col-lg-11 commentEntry paddingNormalize container-fluid">
                                        <div class="container-fluid ">
                                            <div class="row commentMsgDiv">
                                                <div class="container-fluid paddingNormalize">
                                                    <div class="commentMsg">
                                                        <p class="paddingNormalize">{{profileComment.msg}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row commentTextRow">
                                                <div class="col-lg-6 paddingNormalize commentUsernameDiv">
                                                    <p class="commentUsername">{{profileComment.username}}</p>
                                                </div>
                                                <div class="col-lg-6 paddingNormalize text-right commentStatsDiv">
                                                    <p class="commentStats">{{profileComment.date}},  {{profileComment.time}}</p></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row deleteRow">
                                    <div class="container-fluid text-right paddingNormalize deleteButtonDiv">
                                        <button v-if="profileUser!=null && editProfile==true" class="deleteButton" @click="deleteComment(index)">Löschen</button>
                                    </div>
                                </div>
                                <div class="row smallWhiteGreyLine paddingNormalize"></div>
                            </div>
                        </div>
                    </div>

                </div>

                <!------------------------------------right part------------------------------>

                <div class="col-lg-4 rightCol twoColumns">

                    <!------------------------------------errungenschaften------------------------------>
                    <div class="rightBoxes" id="awardBox">
                        <div class="bgLightGrey rightBoxesPadding h4Box">
                            <div class="row rightBoxesRow">
                                <div class="col-lg-7 paddingNormalize rightBoxesH4Div">
                                    <h4 class="rightBoxesH4">Auszeichnungen</h4>
                                </div>
                                <div class="col-lg-5 paddingNormalize rightBoxesLink">
                                    <router-link :to="'/profile/' + profileUser.username + '/awards'">
                                        Alle anzeigen
                                    </router-link>
                                </div>
                            </div>
                        </div>
                        <p v-if="profileUser.awards.length === 0" class="rightBoxesPadding">
                            {{profileUser.username}} hat noch keine Errungeschaften freigeschalten.
                        </p>
                        <p v-else class="rightBoxesPadding">
                            <span v-for="(award, index) in profileUser.awards" v-if="index < 12">
                                <img class="awardImage" v-bind:src="'../' + award.awardIcon" v-bind:alt="profileUser.username + award.altText" v-b-tooltip.hover :title="profileUser.username + award.altText">
                            </span>
                        </p>
                    </div>

                    <!------------------------------------forum------------------------------>
                    <div class="rightBoxes" id="forumBox" v-if="createdThreads !== null || writtenComments !== null">
                        <div class="bgLightGrey rightBoxesPadding h4Box">
                        <div class="row rightBoxesRow">
                            <div class="col-lg-7 paddingNormalize rightBoxesH4Div">
                                <h4 class="rightBoxesH4">Forum</h4>
                            </div>
                            <div class="col-lg-5 paddingNormalize rightBoxesLink">
                                <router-link class="router-link" :to="'/profile/' + profileUser.username + '/forum'">
                                    Alle anzeigen
                                </router-link>
                            </div>
                        </div>
                        </div>

                        <div class="paddingNormalize threadComments" v-if="createdThreads !== null">
                            <h5 class="threadCommentsHL">Eröffnete Threads</h5> <!-- wird aus dem Forum ausgelesen -->
                            <hr class="threadCommentsPaddingLR threadCommentsHr">
                            <div class="threadCommentsInfo">
                                <p v-for="(thread, id) in createdThreads" v-if="id < 3" class="threadCommentsPaddingLR threadList">
                                    <router-link :to="'/forum/' + thread.id">
                                        <span class="threadHL">{{thread.headline}}</span>
                                        <span class="threadCreated">{{getDateString(thread.created)}}</span>
                                    </router-link>
                                </p>
                            </div>
                        </div>

                        <div class="paddingNormalize threadComments" v-if="writtenComments !== null">
                            <h5 class="threadCommentsHL">Kommentierte Threads</h5>
                            <hr class="threadCommentsPaddingLR threadCommentsHr">
                            <div class="threadsCommentsInfo">
                                <p v-for="(comment, index) in writtenComments" v-if="index < 3" class="threadCommentsPaddingLR threadList">
                                    <router-link :to="'/forum/' + comment.thread.id + '#comment' + comment.id">
                                        <div class="paddingNormalize">
                                            <span class="commentHL">{{comment.thread.headline}}</span>
                                            <span class="commentCreated">{{getDateString(comment.created)}}</span>
                                        </div>
                                        <div class="paddingNormalize commentText">
                                            <span>{{shortenString(comment.text)}}</span>
                                        </div>
                                    </router-link>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!------------------------------------modal for awards------------------------------>
        <div>
            <b-modal id="modal-award" centered :title="awardModalTitle" ok-only>
                <p class="my-4">
                    <span class="modalImg"><img class="awardImage"
                                                v-bind:src="'../' + awardModalImg"
                                                v-bind:alt="awardModalText"
                                                v-b-tooltip.hover :title="awardModalText"></span>
                    <span class="modalHL">Glückwunsch!</span>
                    <span class="modalText">{{awardModalText}}</span></p>
            </b-modal>
        </div>

        <div style="display: none;">
            <!-- plus symbole -->
            <svg height="448pt"  width="448pt" xmlns="http://www.w3.org/2000/svg">
                <symbol id="plusOnly" viewBox="0 0 448 448">
                    <path d="m408 184h-136c-4.417969 0-8-3.582031-8-8v-136c0-22.089844-17.910156-40-40-40s-40 17.910156-40 40v136c0 4.417969-3.582031 8-8 8h-136c-22.089844 0-40 17.910156-40 40s17.910156 40 40 40h136c4.417969 0 8 3.582031 8 8v136c0 22.089844 17.910156 40 40 40s40-17.910156 40-40v-136c0-4.417969 3.582031-8 8-8h136c22.089844 0 40-17.910156 40-40s-17.910156-40-40-40zm0 0"/></symbol></svg>
            <!-- profile symbole -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          xml:space="preserve">
    <symbol id="profile" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;">
    <g> <g> <path d="M256,0c-74.4,0-135,60.6-135,135s60.6,135,135,135s135-60.6,135-135S330.4,0,256,0z"/></g></g>
    <g><g><path d="M424,358.2c-37-37.5-86-58.2-138-58.2h-60c-52,0-101,20.7-138,58.2C51.3,395.5,31,444.8,31,497c0,8.3,6.7,15,15,15h420
			c8.3,0,15-6.7,15-15C481,444.8,460.7,395.5,424,358.2z"/></g></g>
    </symbol></svg>
            <!-- location pin -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         style="enable-background:new 0 0 512 512;" xml:space="preserve">
    <symbol id="locationPin" viewBox="0 0 512 512" >
    <g><g><path d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z"/>
    </g></g></symbol></svg>
            <!-- birthday symbole -->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
     style="enable-background:new 0 0 469.333 469.333;" xml:space="preserve">
    <symbol id="birthday" viewBox="0 0 469.333 469.333" >
    <g><g><g>
   <path d="M234.56,128c23.573,0,42.667-19.093,42.667-42.667c0-8-2.24-15.573-6.08-21.973L234.56,0l-36.587,63.36
	c-3.84,6.4-6.08,13.973-6.08,21.973C191.893,108.907,210.987,128,234.56,128z"/>
    <path d="M362.56,192L362.56,192H255.893v-42.667h-42.667V192H106.56c-35.307,0-64,28.693-64,64v32.853
	c0,23.04,18.773,41.813,41.813,41.813c11.2,0,21.653-4.373,29.547-12.267l45.653-45.547l45.547,45.44
	c15.787,15.787,43.307,15.787,59.093,0l45.653-45.44l45.547,45.44c7.893,7.893,18.347,12.267,29.547,12.267
	c23.04,0,41.813-18.773,41.813-41.813V256C426.56,220.693,397.867,192,362.56,192z"/>
    <path d="M332.587,341.013L332.587,341.013l-22.933-22.933l-23.04,22.933c-27.84,27.84-76.48,27.84-104.32,0L159.36,318.08
	l-23.04,22.933c-13.76,13.973-32.213,21.653-51.947,21.653c-15.467,0-29.867-4.907-41.813-13.12V448
	c0,11.733,9.6,21.333,21.333,21.333h341.333c11.733,0,21.333-9.6,21.333-21.333v-98.453c-11.947,8.213-26.24,13.12-41.813,13.12
	C365.013,362.667,346.56,354.987,332.587,341.013z"/></g></g></g>
    </symbol></svg>
            <!-- calender symbole -->
            <svg height="512pt"  width="512pt" xmlns="http://www.w3.org/2000/svg">
                <symbol id="calendar" viewBox="0 0 512 512"><path d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/>
                </symbol></svg>
        </div>

    </div>
    <div class="lastBeforeFooter"></div>

    </div>


</template>

<script>

    class ProfileComment {
        constructor(msg, username, userid, userpic, date, time) {
            this.msg = msg;
            this.username = username;
            this.userid = userid;
            this.userpic = userpic;
            this.date = date;
            this.time = time;
        }

        get commentDate() { return this.date; }
        get commentTime() { return this.time; }
        get commentUsername() { return this.username; }
        get commentUserid() { return this.userid; }
        get commentMsg() { return this.msg; }
        get commentUserpic() { return this.userpic; }
    }

    export default {
        name: "Profile",
        data: function() {
            return {
                profileUser: null,              // object for user
                profileUserplants: null,        // object for userplants
                profileUserFriends: null,

                createdUserString: null,        // date objects and age calculated from date objects
                birthdayString: null,
                userAge: null,

                editProfile: false,             // bool if edit profile is active or not
                userTemp: null,

                commentMessage: "",             // new comment added in textarea
                newComment: "",                 // comment class of ProfileComment
                commentArray: "",               // temp array for deleting purpose

                loggedInUser: null,
                loggedInUserData: null,
                loggedInUserDataUserplants: null,
                loggedInUserDataFriends: null,

                loggedInUserIsFriend: false,
                loggedInUserIsProfileUser: false,
                loggedInUserIsStranger: false,

                requestsFinished: false,

                //Bools that determine whether certain components are shown or not
                showBirthday: false,
                showComments: false,
                showFriends: false,
                showGarden: false,
                showForum: false,

                max: 0,

                friendXP: [],

                createdThreads: null,
                writtenComments: null,

                awardModalTitle: null,
                awardModalImg: null,
                awardModalText: null,

                previewUserPic: null,
            }
        },

        created: function(){
            this.loggedInUser = JSON.parse(localStorage.getItem('user'));

            //Retrieve user item from local storage in case of login
            this.$root.$on('loggedIn', () => {
                this.loggedInUser = JSON.parse(localStorage.getItem('user'));
            });
            if(this.loggedInUser == null){
                this.$router.push('/login');
            }
        },

        mounted: function(){
            //user

            console.log("loggedInUser");
            console.log(this.loggedInUser);

            this.$http.get('/api/profile/' + this.$route.params.username)
                .then(response => {
                    this.profileUser = response.data;
                    this.previewUserPic = this.profileUser.userPic;

                    /*save the created date as string*/
                    this.createdUserString = this.profileUser.dateCreated.date.substr(8,2)
                        + "." + this.profileUser.dateCreated.date.substr(5,2)
                        + "." + this.profileUser.dateCreated.date.substr(0,4);

                    /*save the birtday as string*/
                    this.birthdayString = this.profileUser.dateBirth.date.substr(8,2)
                        + "." + this.profileUser.dateBirth.date.substr(5,2)
                        + "." + this.profileUser.dateBirth.date.substr(0,4);

                    /*calculate the age*/
                    let year = Number(this.profileUser.dateBirth.date.substr(0,4));
                    let month = Number(this.profileUser.dateBirth.date.substr(5,2));
                    let day = Number(this.profileUser.dateBirth.date.substr(8,2));
                    let today = new Date();
                    let age = today.getFullYear() - year;
                    if(today.getMonth() < month || (today.getMonth() == month && today.getDate() < day)) {
                        age--;
                    }
                    this.userAge = age.toString();

                    //console.log("start");
                    if(this.profileUser.comments == null) {
                        //console.log("it's null");
                    } else {
                        //console.log(this.profileUser.comments);
                    }

                    this.getCreatedThreads();
                    this.getWrittenComments();
                    return this.$http.get('/api/profile/' + this.$route.params.username + '/friends');
                })
                //friends
                .then(response => {
                    this.profileUserFriends = response.data;

                    this.checkRelationshipSelf(); //Check if logged in user is profile user
                    this.checkRelationshipFriend(); //Check if logged in user is a friend of profile user
                })
                .catch(error => {
                    //alert(error);
                    console.log(error);
                });


            //userplants
            this.$http.get('/api/profile/' + this.$route.params.username + '/userplants')
                .then(response => {

                    if (response.data.length === 0) {
                        this.profileUserplants = null;
                    } else {
                        this.profileUserplants = response.data;
                    }

                    if (this.profileUser !== null && this.profileUser.username === this.loggedInUser.username) {
                        this.checkAwards();
                    }
                })
                    .catch(error => {
                        console.log(error);
                });

            /*---------------------------------------------------awards data-------------------------*/


            /*---------------------------------------------------badges data end-------------------------*/
        },
        watch: {
            loggedInUserIsFriend: function(val) {
                if(this.profileUser.privacyBirthday == "friends" || "all"){
                    this.showBirthday = true;
                } if(this.profileUser.privacyComments == "friends" || "all") {
                    this.showComments = true;
                } if(this.profileUser.privacyFriends == "friends" || "all") {
                    this.showFriends = true;
                } if(this.profileUser.privacyGarden == "friends" || "all") {
                    this.showGarden = true;
                } if(this.profileUser.privacyForum == "friends" || "all") {
                    this.showForum = true;
                }
            },
            loggedInUserIsProfileUser: function(val){
                if(val){
                    this.showBirthday = true; this.showComments = true;
                    this.showFriends = true; this.showGarden = true;
                    this.showForum = true;
                }
            },
            loggedInUserIsStranger: function(val){
                if(this.profileUser.privacyBirthday == "all"){
                    this.showBirthday = true;
                } if(this.profileUser.privacyComments == "all") {
                    this.showComments = true;
                } if(this.profileUser.privacyFriends == "all") {
                    this.showFriends = true;
                } if(this.profileUser.privacyGarden == "all") {
                    this.showGarden = true;
                } if(this.profileUser.privacyForum == "all") {
                    this.showForum = true;
                }
            },
        },

        methods: {
            goToFriends: function() {
                this.$router.push({path: '/friends'});
            },
            goToFriend: function(username) {
                this.$router.push({path: '/profile/' + username});
                location.reload(true);
            },

            goToGarden: function() {
              this.$router.push({path: '/garden/' + this.profileUser.id})
            },

            goToAwards: function() {
                this.$router.push({path: '/profile/' + this.profileUser.username + '/awards'})
            },

            goToProfileForum: function() {
                this.$router.push({path: '/profile/' + this.profileUser.username + '/forum'})
            },

            shortenString: function(string) {
                if (string.length > 47) {
                    string = string.substring(0,47);
                    string = string + "...";
                }
                return string;
            },

            changeProfile: function() {
                this.editProfile = true;
            },

            saveProfile: function() {
                this.$http.put('/api/profile/' + this.$route.params.username + '/setDescription', this.profileUser.description)
                    .then(response => {
                        this.editProfile = false;
                        this.submitFile();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            saveComment: function() {

                let datetime = new Date();

                let month = datetime.getUTCMonth()+ 1;
                let day = datetime.getUTCDate();
                let year = datetime.getUTCFullYear();
                let hours = datetime.getHours();
                let minutes = datetime.getMinutes();

                let date = day + "." + month + "." + year;
                let time = hours + ":" + minutes;

                this.newComment = new ProfileComment(this.commentMessage, this.loggedInUser.username,
                    this.loggedInUser.id, this.loggedInUser.userPic, date, time);

                this.$http.put('/api/profile/' + this.$route.params.username + '/saveComment', this.newComment)
                    .then(response => {
                        this.profileUser = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
                this.commentMessage = "";
                this.newComment = "";
            },

            deleteComment: function(index) {
                console.log(index);
                //this.profileUser.comments = this.profileUser.comments.splice(index, 1);
                console.log(this.profileUser.comments);
                this.commentArray = this.profileUser.comments.splice(index, 1);
                console.log("this.commentArray before");
                console.log(this.commentArray);

                this.commentArray = JSON.stringify(this.commentArray);

                console.log("splice");
                console.log(this.commentArray);


                this.$http.put('/api/profile/' + this.$route.params.username + '/deleteComment', this.commentArray)
                    .then(response => {
                        this.profileUser = response.data;
                        console.log(response.data);
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            getError(error) {
                console.log(error);

                let element = document.getElementById("root");
                let div = document.createElement("div");
                div.setAttribute('class', 'text-center errorMsg');

                let p1 = document.createElement("p");
                p1.textContent = "Ups. An error occured.";
                let p2 = document.createElement("p");
                p2.textContent = error;

                element.appendChild(div);
                div.appendChild(p1);
                div.appendChild(p2);
            },

            checkRelationshipSelf: function(){
                if(this.profileUser.username == this.loggedInUser.username){
                    this.loggedInUserIsProfileUser = true;
                }
            },
            checkRelationshipFriend: function(){
                if(!this.loggedInUserIsProfileUser){
                    for(let i = 0; i < this.profileUserFriends.length; i++){
                        if(this.profileUserFriends[i].username == this.loggedInUser.username){
                            this.loggedInUserIsFriend = true;
                            return;
                        }
                    }
                    this.loggedInUserIsStranger = true;
                }
            },

            getLevel: function (xp) {

                let level;

                if(xp <= 99){
                    level = "Sprössling";
                    this.max = 100;
                } else if(xp <= 399) {
                    level = "Hobbygärtner";
                    this.max = 400;
                } else if(xp <= 999) {
                    level = "Pflanzenflüsterer";
                    this.max = 1000;
                } else {
                    level = "Goldener Daumen";
                }

                return level;

            },

            XPleft: function (xp) {

                let string;

                if(xp <= 99){
                    string = xp + "/100XP bis zum Hobbygärtner";
                } else if(xp <= 399) {
                    string =  xp + "/400XP bis zum Pflanzenflüsterer";
                } else if(xp <= 999) {
                    string =  xp + "/1000XP bis zum Goldener Daumen";
                } else {
                    string ='';
                }

                return string;

            },

            plantLevel: function (xp) {
                return Math.trunc(xp/100)+1;
            },

            getFriendXP(friendname) {
                //console.log("friendname: " + friendname);
                this.$http.get('/api/profile/getFriendXP/' + friendname + '/')
                    .then(response => {
                        //console.log(this.friendXP);
                        this.friendXP = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            sendFriendRequest: function(){
                this.$http.post('/api/friends/sendRequest/' + this.profileUser.id)
                    .then(response => {
                        return this.$http.get('/api/profile/' + this.$route.params.username + '/friends');
                    })
                    .then(response => {
                        this.profileUserFriends = response.data;
                        this.checkRelationshipSelf(); //Check if logged in user is profile user
                        this.checkRelationshipFriend(); //Check if logged in user is a friend of profile user
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },

            getUserplantLived: function(dateCreated) {
                let currentDate = new Date();

                let currentDay = currentDate.getDay();
                let currentMonth = currentDate.getMonth();
                let currentYear = currentDate.getFullYear();

                let createdDay = Number(dateCreated.date.substr(8,2));
                let createdMonth = Number(dateCreated.date.substr(5,2));
                let createdYear = Number(dateCreated.date.substr(0,4));

                let year = currentYear - createdYear;

                let month = null;
                if (createdMonth < currentMonth) {
                    year--;
                    month = 12 - currentMonth - createdMonth;
                } else {
                    month = createdMonth - currentMonth;
                }

                let day = null;
                if (createdDay < currentDay) {
                    month--;
                    day = 30 - currentDay - createdMonth;
                } else {
                    day = createdDay - currentDay;
                }

                let string;

                if (year === 0 && month === 0) {
                    string = day.toString() + " Tage";
                } else if (year === 0) {
                    string = month.toString() + " Monate, " + day.toString() + " Tage";
                } else {
                    string = year.toString() + " Jahre, " + month.toString() + " Monate";
                }

                return string;
            },

            getCreatedThreads: function() {
                console.log(this.profileUser.id);
                this.$http.get('/api/profile/getCreatedThreads/' + this.profileUser.id)
                    .then(response => {
                        /*console.log("getCreatedThreads");
                        console.log(response.data);
                        console.log(response.data[0].created);
                        console.log(response.data[0].headline);
                        console.log(response.data[0].id);
                        console.log(response.data[0].inputtext);*/
                        if (response.data.length === 0) {
                            this.createdThreads = null;
                        } else {
                            this.createdThreads = response.data;
                        }
                    })
                    .catch(error => {
                        //console.log("getCreatedThreads");
                        console.log(error);
                    });
            },

            getWrittenComments: function() {
                this.$http.get('/api/profile/getWrittenComments/' + this.profileUser.id)
                    .then(response => {
                        /*console.log("writtencomments");
                        console.log(response.data);
                        console.log(response.data.length);*/

                        if (response.data.length === 0) {
                            this.writtenComments = null;
                        } else {
                            this.writtenComments = response.data;
                        }
                    })
                    .catch(error => {
                        //console.log("getWrittenComments");
                        console.log(error);
                    })
            },

            getThreadToComment: function(commentId) {
              this.$http.get('/api/profile/getThreadToComment/' + commentId)
                  .then(response => {
                      //console.log("getThreadToComment with commentid: " + commentId);
                      //console.log(response.data);
                  })
                  .catch(error => {
                      console.log(error);
                  })
            },

            getDateString: function(date) {
                return date.date.substr(8,2)
                    + "." + date.date.substr(5,2)
                    + "." + date.date.substr(0,4)
                    + ", " + date.date.substr(11,2)
                    + ":" + date.date.substr(14,2);
            },

            checkAwards: function() {
                //if user is on it's profile for the first time after registration
                if (this.loggedInUser.username === this.profileUser.username) {

                    /*----------------------------------member awards----------------------------------------------------*/
                    let memberAward = null;
                    let memberAwardVar = null;
                    let modalTitle = null;
                    let modalMsg = null;

                    if (this.profileUser.memberAward === null) {
                        memberAward = "memberNew";
                        memberAwardVar = 1;
                        modalMsg = "Sie haben Errungenschaft \"Mitglied geworden\" freigeschalten.";
                        modalTitle = "Mitglied geworden";
                    }
                    else if (this.profileUser.memberAward < 4) {
                        /*calculate difference between the dates*/
                        let currentDate = new Date();
                        let year = Number(this.profileUser.dateCreated.date.substr(0,4));
                        let month = Number(this.profileUser.dateCreated.date.substr(5,2));
                        let difference = (currentDate.getUTCFullYear()*12 + currentDate.getUTCMonth()) - (year*12 + month);

                        if (this.profileUser.memberAward === 1 && difference >= 3) {
                            memberAward = "memberBronce";
                            memberAwardVar = 2;
                            modalMsg = "Sie haben die Errungenschaft \"Bronze Mitglied\" freigeschalten.";
                            modalTitle = "Bronze Mitgliedschaft";
                        } else if (this.profileUser.memberAward === 2 && difference >= 6) {
                            memberAward = "memberSilver";
                            memberAwardVar = 3;
                            modalMsg = "Sie haben die Errungenschaft \"Silber Mitglied\" freigeschalten.";
                            modalTitle = "Silber Mitgliedschaft";
                        } else if (this.profileUser.memberAward === 3 && difference >= 12) {
                            memberAward = "memberGold";
                            memberAwardVar = 4;
                            modalMsg = "Sie haben die Errungenschaft \"Gold Mitglied\" freigeschalten.";
                            modalTitle = "Goldene Mitgliedschaft";
                        }
                    }

                    if (memberAward !== null || modalMsg !== null) {
                        this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', memberAward)
                            .then(response => {
                                this.profileUser = response.data;

                                this.awardModalText = modalMsg;
                                this.awardModalTitle = modalTitle;
                                this.awardModalImg = this.profileUser.awards[this.profileUser.awards.length - 1].awardIcon;

                                this.$bvModal.show('modal-award');
                            })
                            .catch(error => { console.log(error); });

                        this.$http.put('/api/profile/' + this.profileUser.username + '/setMemberAward', memberAwardVar)
                            .then(response => { this.profileUser = response.data; })
                            .catch(error => { console.log(error); });
                    }

                    /*----------------------------------friends awards----------------------------------------------------*/

                    if (this.profileUser.friendsAward < 300) {
                        let friendsAward = null;
                        let friendsAwardVar = null;
                        let modalMsg = null;
                        let modalTitle

                        if (this.profileUser.friendsAward === null && this.profileUser.counterFriends >= 1) {
                            friendsAward = "friendsOne";
                            friendsAwardVar = 1;
                            modalMsg = "Sie haben die Errungenschaft \"Erste Freundschaf geschlossen\" freigeschalten.";
                            modalTitle = "Erse Freundschaft geschlossen";
                        } else if (this.profileUser.friendsAward === 1 && this.profileUser.counterFriends >= 5) {
                            friendsAward = "friendsFive";
                            friendsAwardVar = 5;
                            modalMsg = "Sie haben die Errungenschaft \"Fünf Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "Fünf Freundschaften geschlsosen";
                        } else if (this.profileUser.friendsAward === 5 && this.profileUser.counterFriends >= 10) {
                            friendsAward = "friendsTen";
                            friendsAwardVar = 10;
                            modalMsg = "Sie haben die Errungenschaft \"Zehn Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "Zehn Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 10 && this.profileUser.counterFriends >= 20) {
                            friendsAward = "friendsTwenty";
                            friendsAwardVar = 20;
                            modalMsg = "Sie haben die Errungenschaft \"Zwanzig Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "Zwanzig Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 20 && this.profileUser.counterFriends >= 50) {
                            friendsAward = "friendsFifty";
                            friendsAwardVar = 50;
                            modalMsg = "Sie haben die Errungenschaft \"50 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle ="50 Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 50 && this.profileUser.counterFriends >= 70) {
                            friendsAward = "friendsSeventy";
                            friendsAwardVar = 70;
                            modalMsg = "Sie haben die Errungenschaft \"70 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "70 Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 70 && this.profileUser.counterFriends >= 100) {
                            friendsAward = "friendsOnehundret";
                            friendsAwardVar = 100;
                            modalMsg = "Sie haben die Errungenschaft \"100 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "100 Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 100 && this.profileUser.counterFriends >= 150) {
                            friendsAward = "friendsOnehundretfifty";
                            friendsAwardVar = 150;
                            modalMsg = "Sie haben die Errungenschaft \"150 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "150 Freundschaften geschlossen";
                        } else if (this.profileUser.firendsAward === 150 && this.profileUser.counterFriends >= 200) {
                            friendsAward = "friendsTwohundret";
                            friendsAwardVar = 200;
                            modalMsg = "Sie haben die Errungenschaft \"200 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "200 Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 200 && this.profileUser.counterFriends >= 250) {
                            friendsAward = "friendsTwohundretfifty";
                            friendsAwardVar = 250;
                            modalMsg = "Sie haben die Errungenschaft \"250 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "250 Freundschaften geschlossen";
                        } else if (this.profileUser.friendsAward === 250 && this.profileUser.counterFriends >= 300) {
                            friendsAward = "friendsThreehundret";
                            friendsAwardVar = 300;
                            modalMsg = "Sie haben die Errungenschaft \"300 Freundschaften geschlossen\" freigeschalten.";
                            modalTitle = "300 Freundschaften geschlossen";
                        }

                        if (friendsAward !== null || friendsAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', friendsAward)
                                .then(response => {
                                    this.profileUser = response.data;

                                    this.awardModalText = modalMsg;
                                    this.awardModalTitle = modalTitle;
                                    this.awardModalImg = this.profileUser.awards[this.profileUser.awards.length - 1].awardIcon;

                                    this.$bvModal.show('modal-award');
                                })
                                .catch(error => { console.log(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setFriendsAward', friendsAwardVar)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { console.log(error); });
                        }
                    }

                    /*----------------------------------plant lived awards----------------------------------------------------*/
                    if (this.profileUserplants.length > 0 && this.profileUser.livedAward < 12) {

                        let currentDate = new Date;
                        let difference = 0;

                        // get the longest date out of the userplants created data
                        for (let i = 0; i < this.profileUserplants.length; i++) {
                            let currentYear = Number(this.profileUserplants[i].dateAdded.date.substr(0,4));
                            let currentMonth = Number(this.profileUserplants[i].dateAdded.date.substr(5,2));
                            let currentDifference = (currentDate.getUTCFullYear()*12 + currentDate.getUTCMonth()) - (currentYear*12 + currentMonth);
                            if (currentDifference > difference) {
                                difference = currentDifference;
                            }
                        }

                        let livedAward = null;
                        let livedAwardVar = null;
                        let modalMsg = null;
                        let modalTitle = null;

                        if (this.profileUser.livedAward === null && difference >= 1) {
                            livedAward = "livedOneMonth";
                            livedAwardVar = 1;
                            modalMsg = "Sie haben die Errungenschaft \"Pflanze hat einen Monat überlebt.\" freigeschalten.";
                            modalTitle = "Ein Monat überlebt";
                        } else if (this.profileUser.livedAward === 1 && difference >= 3) {
                            livedAward = "livedThreeMonths";
                            livedAwardVar = 3;
                            modalMsg = "Sie haben die Errungenschaft \"Pflanze hat drei Monate überlebt.\" freigeschalten.";
                            modalTitle = "Drei Monate überlebt";
                        } else if (this.profileUser.livedAward === 3 && difference >= 6) {
                            livedAward = "livedSixMonths";
                            livedAwardVar = 6;
                            modalMsg = "Sie haben die Errungenschaft \"Pflanze hat sechs Monate überlebt.\" freigeschalten.";
                            modalTitle = "Sechs Monate überlebt";
                        } else if (this.profileUser.livedAward === 6 && difference >= 12) {
                            livedAward ="livedTwelveMonths";
                            livedAwardVar = 12;
                            modalMsg = "Sie haben die Errungenschaft \"Pflanze hat ein Jahr überlebt.\" freigeschalten.";
                            modalTitle = "Ein Jahr überlebt";
                        }

                        if (livedAward !== null || livedAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', livedAward)
                                .then(response => {
                                    this.profileUser = response.data;

                                    this.awardModalText = modalMsg;
                                    this.awardModalTitle = modalTitle;
                                    this.awardModalImg = this.profileUser.awards[this.profileUser.awards.length - 1].awardIcon;

                                    this.$bvModal.show('modal-award');
                                })
                                .catch(error => { console.log(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setLivedAward', livedAwardVar)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { console.log(error); });
                        }
                    }

                    /*----------------------------------userplant added awards----------------------------------------------------*/

                    if (this.profileUserplants.length > 0 && this.profileUser.userplantAward < 500) {
                        let userplantAward = null;
                        let userplantAwardVar = null;
                        let modalMsg = null;
                        let modalTitle = null;

                        if (this.profileUser.userplantAward === null && this.profileUser.counterPlantsAdded >= 1) {
                            userplantAward = "userplantOne";
                            userplantAwardVar = 1;
                            modalMsg = "Sie haben die Errungenschaft \"Eine Pflanze dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "Erste Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 1 && this.profileUser.counterPlantsAdded >= 5) {
                            userplantAward = "userplantFive";
                            userplantAwardVar = 5;
                            modalMsg = "Sie haben die Errungenschaft \"Fünf Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "Fünf Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 5 && this.profileUser.counterPlantsAdded >= 10) {
                            userplantAward = "userplantTen";
                            userplantAwardVar = 10;
                            modalMsg = "Sie haben die Errungenschaft \"Zehn Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "Zehn Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 10 && this.profileUser.counterPlantsAdded >= 20) {
                            userplantAward = "userplantTwenty";
                            userplantAwardVar = 20;
                            modalMsg = "Sie haben die Errungenschaft \"Zwanzig Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "Zwanzig Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 20 && this.profileUser.counterPlantsAdded >= 50) {
                            userplantAward ="userplantFifty";
                            userplantAwardVar = 50;
                            modalMsg = "Sie haben die Errungenschaft \"50 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "50 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 50 && this.profileUser.counterPlantsAdded >= 70) {
                            userplantAward = "userplantSeventy";
                            userplantAwardVar = 70;
                            modalMsg = "Sie haben die Errungenschaft \"70 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "70 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 70 && this.profileUser.counterPlantsAdded >= 100) {
                            userplantAward = "userplantOnehundret";
                            userplantAwardVar = 100;
                            modalMsg = "Sie haben die Errungenschaft \"100 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "100 Pflanzen zum Garten hinzugefügt.";
                        } else if (this.profileUser.userplantAward === 100 && this.profileUser.counterPlantsAdded >= 150) {
                            userplantAward = "userplantOnehundretfifty";
                            userplantAwardVar = 150;
                            modalMsg = "Sie haben die Errungenschaft \"150 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "150 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 150 && this.profileUser.counterPlantsAdded >= 200) {
                            userplantAward = "userplantTwohundret";
                            userplantAwardVar = 200;
                            modalMsg = "Sie haben die Errungenschaft \"200 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "200 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 200 && this.profileUser.counterPlantsAdded >= 250) {
                            userplantAward = "userplantTwohundretfifty";
                            userplantAwardVar = 250;
                            modalMsg = "Sie haben die Errungenschaft \"250 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "250 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 250 && this.profileUser.counterPlantsAdded >= 300) {
                            userplantAward = "userplantThreehundret";
                            userplantAwardVar = 300;
                            modalMsg = "Sie haben die Errungenschaft \"300 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "300 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 300 && this.profileUser.counterPlantsAdded >= 350) {
                            userplantAward = "userplantThreehundretfifty";
                            userplantAwardVar = 350;
                            modalMsg = "Sie haben die Errungenschaft \"350 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "350 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 350 && this.profileUser.counterPlantsAdded >= 400) {
                            userplantAward = "userplantFourhundret";
                            userplantAwardVar = 400;
                            modalMsg = "Sie haben die Errungenschaft \"400 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "400 Pflanzen zum Garten hinzugefügt";
                        } else if (this.profileUser.userplantAward === 400 && this.profileUser.counterPlantsAdded >= 500) {
                            userplantAward = "userplantFivehundret";
                            userplantAwardVar = 500;
                            modalMsg = "Sie haben die Errungenschaft \"500 Pflanzen dem eigenen Garten hinzugefügt.\" freigeschalten.";
                            modalTitle = "500 Pflanzen zum Garten hinzugefügt";
                        }

                        if (userplantAward !== null || userplantAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', userplantAward)
                                .then(response => {
                                    this.profileUser = response.data;

                                    this.awardModalText = modalMsg;
                                    this.awardModalTitle = modalTitle;
                                    this.awardModalImg = this.profileUser.awards[this.profileUser.awards.length - 1].awardIcon;

                                    this.$bvModal.show('modal-award');
                                })
                                .catch(error => { console.log(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setUserplantAddedAward', userplantAwardVar)
                                .then(response => { this.profileUser = response.data; })
                                .catch(error => { console.log(error); });
                        }
                    }

                    /*----------------------------------userplant watered awards----------------------------------------------------*/

                    if (this.profileUserplants.length > 0 && this.profileUser.counterPlantsWatered < 500) {
                        let wateredAward = null;
                        let wateredAwardVar = null;
                        let modalMsg = null;
                        let modalTitle = null;

                        if (this.profileUser.wateredAward === null && this.profileUser.counterPlantsWatered >= 1) {
                            wateredAward = "wateredOne";
                            wateredAwardVar = 1;
                            modalTitle = "Eine Pflanze gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"Eine Pflanze gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 1 && this.profileUser.counterPlantsWatered >= 5) {
                            wateredAward = "wateredFive";
                            wateredAwardVar = 5;
                            modalTitle = "Fünf Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"Fünf Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 5 && this.profileUser.counterPlantsWatered >= 10) {
                            wateredAward = "wateredTen";
                            wateredAwardVar = 10;
                            modalTitle = "Zehn Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"Zehn Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 10 && this.profileUser.counterPlantsWatered >= 20) {
                            wateredAward = "wateredTwenty";
                            wateredAwardVar = 20;
                            modalTitle = "Zwanzig Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"Zwanzig Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 20 && this.profileUser.counterPlantsWatered >= 50) {
                            wateredAward ="wateredFifty";
                            wateredAwardVar = 50;
                            modalTitle = "50 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"50 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 50 && this.profileUser.counterPlantsWatered >= 70) {
                            wateredAward = "wateredSeventy";
                            wateredAwardVar = 70;
                            modalTitle = "70 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"70 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 70 && this.profileUser.counterPlantsWatered >= 100) {
                            wateredAward = "wateredOnehundret";
                            wateredAwardVar = 100;
                            modalTitle = "100 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"100 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 100 && this.profileUser.counterPlantsWatered >= 150) {
                            wateredAward = "wateredOnehundretfifty";
                            wateredAwardVar = 150;
                            modalTitle = "150 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"150 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 150 && this.profileUser.counterPlantsWatered >= 200) {
                            wateredAward = "wateredTwohundret";
                            wateredAwardVar = 200;
                            modalTitle = "200 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"200 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 200 && this.profileUser.counterPlantsWatered >= 250) {
                            wateredAward = "wateredTwohundretfifty";
                            wateredAwardVar = 250;
                            modalTitle = "250 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"250 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 250 && this.profileUser.counterPlantsWatered >= 300) {
                            wateredAward = "wateredThreehundret";
                            wateredAwardVar = 300;
                            modalTitle = "300 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"300 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 300 && this.profileUser.counterPlantsWatered >= 350) {
                            wateredAward = "wateredThreehundretfifty";
                            wateredAwardVar = 350;
                            modalTitle = "350 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"350 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 350 && this.profileUser.counterPlantsWatered >= 400) {
                            wateredAward = "wateredFourhundret";
                            wateredAwardVar = 400;
                            modalTitle = "400 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"400 Pflanzen gegossen\" freigechalten.";
                        } else if (this.profileUser.wateredAward === 400 && this.profileUser.counterPlantsWatered >= 500) {
                            wateredAward = "wateredFivehundret";
                            wateredAwardVar = 500;
                            modalTitle = "500 Pflanzen gegossen.";
                            modalMsg = "Sie haben die Errungenschaft \"500 Pflanzen gegossen\" freigechalten.";
                        }

                        if (wateredAward !== null || wateredAwardVar !== null) {
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', wateredAward)
                                .then(response => {
                                    this.profileUser = response.data;
                                    console.log(response.data);

                                    this.awardModalText = modalMsg;
                                    this.awardModalTitle = modalTitle;
                                    this.awardModalImg = this.profileUser.awards[this.profileUser.awards.length - 1].awardIcon;

                                    this.$bvModal.show('modal-award');
                                })
                                .catch(error => { console.log(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setWateredAward', wateredAwardVar)
                                .then(response => { this.profileUser = response.data; console.log(response.data);})
                                .catch(error => { console.log(error); });
                        }
                    }

                    /*----------------------------------xp rang awards----------------------------------------------------*/
                    if (this.profileUser.lvlAward !== "GoldenerDaumen") {
                        let lvlAward = null;
                        let lvlAwardVar = null;
                        let modalMsg = null;
                        let modalTitle = null;

                        if (this.profileUser.xp >= 0 && this.profileUser.lvlAward === null) {
                            lvlAward = "lvlSproessling";
                            lvlAwardVar = "Sproessling";
                            modalMsg ="Sie haben den Rang \"Sprössling\" erreicht!";
                            modalTitle = "Sprössling";
                        } else if (this.profileUser.xp >= 100 && this.profileUser.lvlAward === "Sproessling") {
                            lvlAward = "lvlHobbygaertner";
                            lvlAwardVar = "Hobbygaertner";
                            modalMsg ="Sie haben den Rang \"Hobbygärtner\" erreicht!";
                            modalTitle = "Hobbygärtner";
                        } else if (this.profileUser.xp >= 400 && this.profileUser.lvlAward === "Hobbygaertner") {
                            lvlAward = "lvlPflanzenfluesterer";
                            lvlAwardVar = "Pflanzenfluesterer";
                            modalMsg = "Sie haben den Rang \"Pflanzenflüsterer\" erreicht!";
                            modalTitle = "Pflanzenflüsterer";
                        } else if (this.profileUser.xp >= 1000 && this.profileUser.lvlAward === "Pflanzenfluesterer") {
                            lvlAward = "lvlGoldenerDaumen";
                            lvlAwardVar = "GoldenerDaumen";
                            modalMsg = "Sie haben den Rang \"Goldener Daumen\" erreicht!";
                            modalTitle = "Goldener Daumen";
                        }

                        if (lvlAward !== null || lvlAwardVar !== null ){
                            this.$http.put('/api/profile/' + this.profileUser.username + '/addNewAward', lvlAward)
                                .then(response => {
                                    this.profileUser = response.data;
                                    console.log(response.data);

                                    this.awardModalText = modalMsg;
                                    this.awardModalTitle = modalTitle;
                                    this.awardModalImg = this.profileUser.awards[this.profileUser.awards.length - 1].awardIcon;

                                    this.$bvModal.show('modal-award');

                                })
                                .catch(error => { console.log(error); });

                            this.$http.put('/api/profile/' + this.profileUser.username + '/setLvlAward', lvlAwardVar)
                                .then(response => { this.profileUser = response.data; console.log(response.data);})
                                .catch(error => { console.log(error); });
                        }
                    }
                }
            },
            submitFile: function(){
                let formData = new FormData();
                formData.append('file', this.file);
                return this.$http.post( '/api/profile/setProfilePic/' + this.profileUser.id,
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(response => {
                    console.log('SUCCESS!!');
                    this.profileUser = response.data;
                })
                    .catch(function(){
                        console.log('FAILURE!!');
                    });
            },
            handleFileUpload: function(){
                this.file = this.$refs.file.files[0];
                this.previewUserPic = URL.createObjectURL(this.file);
            }
        }
    }
</script>

<style scoped>
    /*-------------------------------allgemein-------------------------------*/
    .mobileDevice { display: none; }
    .oneColumn { display: none; }
    .desktopHL h4 { font-size: 30px; }

    .plantButton {
        margin-top: 1%;
        margin-right: 2%;
    }

    /* trigger fields with class editProfile*/
    .smallInput {
        display: block;
        width: 100%;
        height: 200px;
        border: 1px solid #97B753;
        background-color: #F5F5F5;
        font-size: 100%;
        padding: 1% 2%;
    }

    /*linke seite weiter zu den unterseiten*/
    .rightBoxesLink {
        text-align-last: right;
        align-self: center;
    }

    /*weiter desktop*/
    .rightBoxesLink a:link { color: #707070; }
    .routerText:hover, .routerText:hover span { color: #97B753; }
    .routerText:active, routerText:hover span { color: #B8E269; }
    .forthSvg {
        width: 20px;
        height: 20px;
        fill: #97B753;
        padding-left: 2%;
    }
    .routerText:hover .forthSvg { fill: #B8E269; }
    .routerText:active .forthSvg { fill: #707070; }

    /*rechte boxen centered*/
    .rightToLeft { padding-left: 2%; padding-right: 2%; }

    /*modal style*/
    .modal-header {
        color: #97B753;
        text-transform: uppercase;
    }
    .modal-body { padding: 3% 6%; }
    .modal-footer .btn {
        background-color: #97B753;
        color: white;
    }
    .modal-footer .btn:hover {
        background-color: #B8E269;
        color: #707070;
    }
    .modal-footer .btn:active {
        background-color: #707070;
        color: white;
    }


    /*-------------------------------upper profile part - header -------------------------------*/
    #userHeader { padding: 40px 50px; }

    #userHeader {padding: 40px 50px; }
    #userHeader .smallMobile { display: none; }

    #userHeader #userPicCnt {
        text-align-last: center;
        align-self: center;
    }
    #userHeader #userPicCnt .userPicture {
        width: 150px;
        height: 150px;
        border-radius: 100px;
    }
    #userHeader #userCnt .userCntH1 {
        font-size: 180%;
        color: #B8E269;
    }
    #userHeader #userCnt .userCntH2 { font-size: 140%; }

    #userHeader #userDataCnt { align-self: center; }
    #userHeader #userDataCnt ul { font-size: 110%; }

    #userDataCnt ul li svg {
        width: 18px;
        height: 18px;
        margin-right: 3%;
        fill: #B8E269;
    }

    /*-----------------------------------change user pic----------------------------*/
    .imageUpload input[type="file"] {
        display: none;
    }
    .imageUpload{
        position: absolute;
        padding: 6px 12px;
        cursor: pointer;
    }

    /*------------------------------profile lower part---------------------------------------*/

    /*------------------------------descriptpion------------------------------------*/

    /*------------------------------friends----------------------------------------*/

    /*friend container*/
    #profileFriends #profileFriendsList .friends {
        padding: 10px 0;
        margin-bottom: 10px;
    }
    #profileFriends #profileFriendsList .friends:hover {
        background-color: #707070;
        color: white;
    }
    #profileFriends #profileFriendsList .friends:active {
        background-color: #DEDEDE;
        color: #707070;
    }

    /*styling schrift und elemente für friends*/
    #profileFriends #profileFriendsList .friendsInfo .friendUsernameHL {
        font-size: 120%;
        font-weight: bold;
    }
    #profileFriends #profileFriendsList .friendsInfo .friendWholeName {
        font-size: 90%;
        font-style: italic;
        margin-bottom: 5%;
    }
    #profileFriends #profileFriendsList .friendsInfo .friendLevel { width: 500%; }
    #profileFriends #profileFriendsList .friendsInfo .friendTitle {
        font-size: 95%;
        margin-bottom: 5%;
    }

    /*friends pictures*/
    #profileFriends #profileFriendsList .friends .friendsPicture {
        width: 20%;
        align-self: center;
    }
    #profileFriends #profileFriendsList .friends .friendsInfo { width: 50%; }
    #profileFriends #profileFriendsList .friends .friendsButtons { width: 30%; }

    /* picture in Buttons +*/
    #profileFriends .userProfileButton svg{ width: 20%; fill: white; }
    #profileFriends .userProfileButton svg .path1 { fill: #707070; }
    #profileFriends .firends:hover .userProfileButton svg { fill: white; }
    #profileFriends .friends:hover .userProfileButton svg .path1 {  fill: #97B753; }
    #profileFriends .friends:hover .userProfileButton svg:hover .path1 { fill: #B8E269; }
    #profileFriends .friends:active .userProfileButton svg:active { fill: #B8E269; }
    #profileFriends .friends:active .userProfileButton svg:active .path1 { fill: #000000;}

    #profileFriends .addUserButton svg { width: 20%; fill: white; }
    #profileFriends .addUserButton svg .path1 { fill: #707070; }
    #profileFriends .friends:hover .addUserButton svg { fill: white; }
    #profileFriends .friends:hover .addUserButton svg .path1 {  fill: #97B753; }
    #profileFriends .friends:hover .addUserButton svg:hover .path1 { fill: #B8E269; }
    #profileFriends .friends:active .addUserButton svg:active { fill: #B8E269; }
    #profileFriends .friends:active .addUserButton svg:active .path1 { fill: #000000;}

    /*------------------------------garden----------------------------------------*/
    /* left and right the same*/

    /*main container*/
    #profileGarden .plantsProfile {
        margin-bottom: 20px;
        border-radius: 10px;
        padding: 10px 10px 10px 30px;
        width: 97%;
    }
    #profileGarden .plantsProfile:hover {
        background-color: #707070;
        color: white;
    }
    #profileGarden .plantsProfile:active {
        background-color: #DEDEDE;
        color: #707070;
    }

    /*plant img*/
     #profileGarden .plantsProfileImg {
         height: 120px;
         width: 120px;
    }
    #profileGarden .gardenRight .imgBoxRight { text-align: right; }

    /*styling schrift und elemente*/
    #profileGarden .plantsProfileInfoCol .userplantGardenHL {
        font-size: 120%;
        font-weight: bold;
    }
    #profileGarden .plantsProfileInfoCol .userplantGardenLocation {
        font-size: 90%;
        font-style: italic;
        margin-bottom: 5%;
    }
    #profileGarden .plantsProfileInfoCol .userplantGardenXPBar div { width: 100% !important; }
    #profileGarden .plantsProfileInfoCol .userplantGardenLevel {
        font-size: 95%;
        margin-bottom: 5%;
    }
    #profileGarden .plantsProfileInfoCol .userplantGardenAge svg {
        width: 10%;
        padding-bottom: 5%;
    }
    #profileGarden .plantsProfileInfoCol .userplantGardenAge p {
        display: inline-block;
        padding-left: 3%;
        margin-bottom: 2%;
    }

    /*------------------------------Besuchernachrichten----------------------------------------*/
    #visitorComments #commentInfo { margin-bottom: 4%; }

    /*Bild Allgemein*/
    #visitorComments .commentPic {
        max-width: 100px;
        min-width: 50px;
        width: 80%;
        border-radius: 100px;
    }

    /*Eingabebereich Besuchernachrichten*/
    #visitorComments #leaveComment .commentInputDiv .commentInput {
        width: 100%;
        height: 100%;
        border: 1px solid #97B753;
        border-radius: 4px;
        background-color: #F5F5F5;
        font-size: 100%;
        padding: 1% 2%;
    }
    #visitorComments #leaveComment .buttonCommentDiv .buttonComment {
        background-color: #97B753;
        padding: 1%;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 80%;
        margin-bottom: 2%;
        margin-top: 1%;
    }
    #visitorComments #leaveComment .commentButtonDiv .buttonComment:hover {
        background-color: #B8E269;
        border: 2px solid #B8E269;
        color: #707070;
    }
    #visitorComments #leaveComment .commentButtonDiv .buttonComment:active {
        background-color: #97B753;
        border: 2px solid #97B753;
        color: white;
    }

    /*anzeige msg wenn gespeichert*/
    #visitorComments .commentRow { margin-top: 3%; }
    #visitorComments .commentRow .commentMsgDiv { padding-left: 3%; }
    #visitorComments .commentRow .commentMsgDiv .commentMsg {
        background-color: #F5F5F5;
        border-radius: 10px;
        padding: 1% 2%;
        margin-bottom: 0;
    }
    #visitorComments .commentRow p { margin-bottom: 0;}
    #visitorComments .commentRow .commentTextRow {
        font-size: 80%;
        padding: 1% 0% 0% 3%;
    }

    /*deleteButton --> for deleting a comment in bearbeiten*/
    #visitorComments .deleteRow .deleteButtonDiv .deleteButton {
        background-color: #97B753;
        padding: 1%;
        color: white;
        border: 2px solid #97B753;
        border-radius: 10px;
        font-size: 80%;
        margin-top: 1%;
    }
    #visitorComments .deleteRow .deleteButtonDiv .deleteButton:hover {
        background-color: #B8E269;
        border: 2px solid #B8E269;
        color: #707070;
    }
    #visitorComments .deleteRow .deleteButtonDiv .deleteButton:active {
        background-color: #97B753;
        border: 2px solid #97B753;
        color: white;
    }

    /*------------------------------Right Boxes----------------------------------------*/
    .rightBoxes {
        background-color: white;
        border: 2px solid #DEDEDE;
        border-radius: 10px;
        margin-bottom: 50px;
    }
    .rightBoxes:first-of-type { margin-top: 50px; }
    .rightBoxes .rightBoxesRow { margin-left: 1%; margin-right: 1%; }

    .rightBoxes .h4Box .rightBoxesH4Div .rightBoxesH4 { font-size: 110%; }
    .rightBoxes .h4Box .rightBoxesLink {
        text-align-last: right;
        align-self: center;
        font-size: 90%;
    }
    .rightBoxes .h4Box .rightBoxesLink a:hover { color: #97B753; }
    .rightBoxes .h4Box .rightBoxesLink a:active { color: #B8E269; }

    /*------------------------------Awards----------------------------------------*/
    #awardBox .awardImage {
        width: 15%;
        margin-bottom: 2%;
        margin-left: 1%;
    }
    #awardOneColumn .awardImage { width: 5%; }
    #awardOneColumn .awardTextDiv p { margin-bottom: 2%; }

    /*modal*/
    .modalImg {
        display: block;
        /*text-align: center !important;*/
        text-align: -webkit-center !important;
        margin-bottom: 10%;
    }
    .modalImg .awardImage {
        display: block;
        width: 40%;
    }
    .modalText {
        display: block;
        text-align: center;
    }
    .modalHL {
        display: block;
        font-weight: bolder;
        color: #97B753;
        text-align-last: center;
        margin-bottom: 3%;
        font-size: 130%;
    }

    /*------------------------------Forum----------------------------------------*/

    #forumBox .threadComments .threadCommentsPaddingLR {
        margin-left: 4%;
        margin-right: 4%;
    }
    #forumBox .threadComments .threadCommentsHL {
        margin: 6% 4% 2% 4%;
        font-weight: normal;
        color: #97B753;
        font-size: 100%;
    }
    #forumBox .threadComments .threadCommentsHr { margin-top: 1%; }
    #forumBox .threadComments .threadHL, #forumBox .threadComments .commentHL { font-weight: bold; font-size: 100%; }
    #forumBox .threadComments .threadCreated, #forumBox .threadComments .commentCreated { float: right; }
    #forumBox .threadComments .threadList { margin-bottom: 1%; font-size: 90%; }
    #forumBox .threadComments .threadList:last-of-type { margin-bottom: 5%; }
    #forumBox .threadComments .commentText {
        color: grey;
        margin-bottom: 2%;
        font-style: italic;
    }

    /* UserButton ----------------------"Profil Bearbeiten / Hinzufügen+"------------------------*/
    #userButton {
        background-color: #97B753;
        padding: 10px 20px;
        color: white;
        border: 2px solid #97B753;
        border-radius: 0px 50px 50px 0px;
        font-size: 120%;
    }
    #userButton svg {
        fill: white;
        width: 15px;
        height: 15px;
        margin-left: 10px;
    }
    #userButton:hover {
        background-color: #B8E269;
        border: 2px solid #B8E269;
        color: #707070;
    }
    #userButton:hover svg { fill: #707070; }
    #userButton:active {
        background-color: #97B753;
        border: 2px solid #97B753;
        color: white;
    }
    #userButton:active svg { fill: white; }


    /*---------------------------------------Media Queries---------------------------------------------------------*/
    @media (max-width: 1600px) {
        /*-----------------------------------allgemein 1600px----------------------------------*/

        /*-----------------------------------garden 1600px----------------------------------*/
        #profileGarden .gardenLeft {
            width: 100%;
            display: contents;
        }
        #profileGarden .gardenRight {
            width: 100%;
            display: contents;
        }
        #profileGarden .plantsProfileImg {
            height: 160px;
            width: 160px;
        }
        #profileGarden .plantsProfileInfoCol .userplantGardenLocation { margin-bottom: 2%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenLevel { margin-bottom: 2%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenAge { font-size: 95%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenAge svg { width: 5%; padding: 0; margin-bottom: 2%; }
    }


    /*-------------------------------------------------------------------------------------------------*/
    /*Large devices (desktops, less than 1200px)*/
    @media (max-width: 1199.98px) {
        /*-----------------------------------allgemein 1199.98px----------------------------------*/
        #userButton {
            padding: 7px 15px;
            font-size: 100%;
        }
        #userButton svg {
            width: 10px;
            height: 10px;
            margin-left: 7px;
        }

        /*-----------------------------------profile header 1199.98px----------------------------*/
        #userHeader #userPicCnt { width: 20%; }

        #userHeader #userCnt { width: 50%; }
        #userHeader #userCnt .userCntH1 { font-size: 160%; }
        #userHeader #userCnt .userCntH2 { font-size: 120%; }

        #userDataCnt { width: 30%; }
        #userHeader #userDataCnt li {
            margin-bottom: 2%;
            font-size: 90%;
        }
        #userHeader #userDataCnt ul { font-size: 90%; }
        #userHeader #userDataCnt ul li svg {
            width: 15px;
            height: 15px;
        }

        /*-----------------------------------friends 1199.98px----------------------------*/
        #profileFriends .userProfileButton svg { width: 20%; }
        #profileFriends .addUserButton svg { width: 20%; }

        /*-----------------------------------garden 1199.98px----------------------------*/
        #profileGarden .plantsProfileImg {
            height: 110px;
            width: 110px;
        }
        #profileGarden .plantsProfileInfoCol .userplantGardenXPBar div { width: 110% !important; }

        /*-----------------------------------Besuchernachrichten 1199.98px----------------------------*/

        #visitorComments .commentRow .commentMsgDiv { padding-left: 6%; }
        #visitorComments .commentRow .commentTextRow { font-size: 90%; padding-left: 6%; }

        /*------------------------------Right Boxes----------------------------------------*/

        .rightBoxes .h4Box .rightBoxesH4Div .rightBoxesH4 { font-size: 100%; }
        .rightBoxes .h4Box .rightBoxesLink { font-size: 80%; }

        /*------------------------------Forum----------------------------------------*/
        #forumBox .threadComments .threadCommentsHL { font-size: 90%; }
        #forumBox .threadComments .threadHL, #forumBox .threadComments .commentHL { font-size: 100%; }
        #forumBox .threadComments .threadList { font-size: 90%; }
        #forumBox .threadComments .commentText {  font-size: 90%; }
        #forumBox .threadComments .threadCommentsHr { margin-bottom: 1%; }
    }

    /*-------------------------------------------------------------------------------------------------*/
    /* Medium devices (tablets, less than 992px)*/
    @media (max-width: 991.98px) {
        /*-----------------------------------allgemein 992px---------------------------------*/
        .twoColumns { display: none; }
        .oneColumn { display: block; }

        .desktopHL { width: 50%; }
        .desktopLink { width: 50%; }

        #lowerProfile .leftCol { width: 100%; }
        #lowerProfile .rightCol { width: 100%; }

        #userButton {
            padding: 5px 10px;
            font-size: 80%;
        }
        #userButton svg {
            width: 7px;
            height: 7px;
            margin-left: 5px;
        }

        /*-----------------------------------profile header 992px----------------------------*/
        #userHeader #userPicCnt .userPicture {
            width: 120px;
            height: 120px;
            border-radius: 100px;
        }
        .imageUpload img{ width: 120px; }
        #userHeader #userCnt { padding-left: 4%; }
        #userHeader #userCnt .userCntH1 { font-size: 140%; }
        #userHeader #userCnt .userCntH2 {
            font-size: 100%;
            margin-bottom: 1%;
        }
        #userHeader #userCnt p { font-size: 80%; }
        #userHeader #userCnt .userCntLevelbar { width: 150%; }
        #userHeader #userDataCnt ul { font-size: 80%; }
        #userHeader #userDataCnt ul li svg {
            width: 12px;
            height: 12px;
        }

        #userHeader #userDataCnt li { font-size: 80%; }

        /*-----------------------------------friends 992px----------------------------*/

        /*-----------------------------------garden 992px----------------------------*/
        #profileGarden .plantsProfile {
            width: 100%;
            margin-left: 0px;
            margin-right: 0px;
        }
        #profileGarden .plantsProfile .plantsProfileInfoCol { width: 60%; }
        #profileGarden .plantsProfile .plantsProfileImgCol { width: 40%; align-self: center; }
        #profileGarden .plantsProfileImg { height: 130px; width: 130px; }
        #profileGarden .plantsProfileInfoCol .userplantGardenXPBar div { width: 120% !important; }

        /*-----------------------------------Besuchernachrichten 992px----------------------------*/
        #visitorComments #leaveComment .commentPicDiv { width: 20%; }
        #visitorComments #leaveComment .commentInputDiv { width: 80%; padding-left: 0; }

        #visitorComments #commentEntries .commentRow .commentPicDiv { width: 12%; }

        #visitorComments #commentEntries .commentRow .commentEntry { width: 88%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentMsgDiv { padding-left: 3%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentTextRow { padding-left: 3%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentTextRow .commentUsernameDiv { width: 50%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentTextRow .commentStatsDiv { width: 50%; }

        /*-----------------------------------forum 992px----------------------------*/
        /*one column*/
        #forumOneColumn .threadComments .threadList a:hover { color: #97B753; }
        #forumOneColumn .threadComments .threadList a:active { color: #B8E269; }

        #forumOneColumn .threadList a:hover { color: #97B753; }
        #forumOneColumn .threadList a:active { color: #B8E269; }

        #forumOneColumn .threadComments { font-size: 120%; }
        #forumOneColumn .threadComments .threadCommentsHL {
            margin: 6% 0% 2% 0%;
            font-weight: normal;
            color: #97B753;
            font-size: 95%;
        }
        #forumOneColumn .threadCommentsHr { margin-top: 1%; }
        #forumOneColumn .threadHL, #forumOneColumn .commentHL { font-weight: bold; font-size: 100%; }
        #forumOneColumn .threadCreated, #forumOneColumn .commentCreated { float: right; }
        #forumOneColumn .threadList { margin-bottom: 1%; font-size: 90%; }
        #forumOneColumn .threadList:last-of-type { margin-bottom: 5%; }
        #forumOneColumn .commentText {
            color: grey;
            margin-bottom: 2%;
            font-style: italic;
        }
    }

    /*-------------------------------------------------------------------------------------------------*/
    /*Small devices (landscape phones, less than 768px)*/
    @media (max-width: 767.98px) {
        /*-----------------------------------allgemein 768px---------------------------------*/
        .desktopHL { width: 60%; }
        .desktopHL h4 { font-size: 105%; }

        .desktopLink {
            width: 40%;
            font-size: 80%;
        }

        /*-----------------------------------profile header 768px----------------------------*/
        #userHeader #userPicCnt { width: 30%; }
        #userHeader #userPicCnt .userPicture {
            float: left;
        }

        #userHeader #userCnt { width: 70%; align-self: center; }
        #userHeader #userCnt .userCntH1 { font-size: 120%; }
        #userHeader #usercnt .userCntH2 { font-size: 110%; }
        #userHeader #userCnt .userCntLevelbar { margin-bottom: 2%; }

        #userHeader #userDataCnt {
            width: 100%;
            margin-left: 31%;
            margin-top: 6%;
        }
        #userHeader #userDataCnt li { margin-bottom: 1%; }
        #userHeader #userDataCnt .floatSmall {
            float: left;
            width: 180px;
        }

        /*-----------------------------------friends 768px----------------------------*/
        #profileFriends .userProfileButton svg { width: 22%; }
        #profileFriends .addUserButton svg { width: 22%; }

        #profileFriends #profileFriendsList .friends .friendsPicture { width: 30%; }

        #profileFriends #profileFriendsList .friends .friendsInfo { width: 70%; }
        #profileFriends #profileFriendsList .friends .friendsInfo .friendLevel { width: 100%; }
        #profileFriends #profileFriendsList .friends .friendsInfo .friendLevel div { width: 90% !important; }

        #profileFriends #profileFriendsList .friendsButtons { display: none; }
        #profileFriends #profileFriendsList .buttonDesktop { margin-bottom: 5%; }

        /*-----------------------------------garden 768px----------------------------*/
        #profileGarden .plantsProfileImg {
            height: 110px;
            width: 110px;
        }

        #profileGarden .plantsProfileInfoCol .userplantGardenLocation { margin-bottom: 4%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenLevel { margin-bottom: 4%; }
    }

    /*-------------------------------------------------------------------------------------------------*/
    /* Extra small devices (portrait phones, less than 576px)*/
    @media (max-width: 575.98px) {
        /*-----------------------------------allgemein 576px----------------------------*/
        .desktop { display: none; }
        .mobileDevice { display: block; }

        /*-----------------------------------profile header 576px----------------------------*/
        #userHeader #userPicCnt { width: 40%; }
        #userHeader #userPicCnt .userPicture {
            width: 100px;
            height: 100px;
        }
        .imageUpload img{ width: 100px; }
        #userHeader #userCnt { width: 60%; }
        #userHeader #userCnt .userCntLevelbar { width: 200%; }

        #userHeader #userDataCnt {
            width: 100%;
            margin-left: 39%;
        }
        #userHeader #userDataCnt .floatSmall {float: none; }
        #userHeader #userDataCnt li { font-size: 80%; }

        /*-----------------------------------friends 576px----------------------------*/
        #profileFriends .userProfileButton svg { width: 40%; }
        #profileFriends .addUserButton svg { width: 40%; }

        /*-----------------------------------garden 576px----------------------------*/
        #profileGarden .plantsProfileImg {
            height: 90px;
            width: 90px;
        }
        #profileGarden .plantsProfileInfoCol .userplantGardenHL { font-size: 120%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenLevel { font-size: 110%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenAge { font-size: 110%; }
        #profileGarden .plantsProfileInfoCol .userplantGardenAge svg { width: 7%; margin-bottom: 3%; }

        /*-----------------------------------Besuchernachrichten 576px----------------------------*/

        #visitorComments #commentEntries .commentRow .commentPicDiv { display: none; }
        #visitorComments #commentEntries .commentRow .commentEntry { width: 100%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentMsgDiv { padding-left: 0 !important; font-size: 110%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentMsgDiv .commentMsg { padding: 2% 3%; }
        #visitorComments #commentEntries .commentRow .commentEntry .commentTextRow { padding-left: 0; font-size: 110%; }

        #visitorComments #leaveComment .buttonCommentDiv .buttonComment {
            font-size: 100%;
            padding: 2% 3%;
            margin-bottom: 4%;
            margin-top: 3%;
        }

        /*-----------------------------------award und forum one column 576px----------------------------*/
        #awardOneColumn .awardImage {
            width: 13%;
            margin-bottom: 2%;
            margin-left: 1%;
        }
    }

    /*-------------------------------------------------------------------------------------------------*/
    /* eigener Query */
    @media (max-width: 520px) {
        /*-----------------------------------Besuchernachrichten 520px----------------------------*/
        #visitorComments #leaveComment .commentPicDiv { display: none; }
        #visitorComments #leaveComment .commentInputDiv { width: 100%; padding-left: 3%; }
    }

    /*-------------------------------------------------------------------------------------------------*/
    /* eigener Query */
    @media (max-width: 430px) {
        /*-----------------------------------profile header 430px----------------------------*/
        #userHeader #userPicCnt { width: 50%; }
        #userHeader #userPicCnt .userPicture {
            width: 80px;
            height: 80px;
            margin-bottom: 10%;
        }
        .imageUpload img{ width: 80px; }

        #userHeader .biggerMobile { display: none; }
        #userHeader .smallMobile {
            display: block;
            align-self: center;
        }
        #userHeader .smallMobile .userCntH2 {
            font-size: 120%;
            margin-bottom: 1%;
        }
        #userHeader .smallMobile .userCntRang { font-size: 100%; }

        #userHeader #userCnt {
            width: 100%;
            font-size: 110%;
        }
        #userHeader #userButton { font-size: 80%; }

        #userHeader #userDataCnt {
            width: 100%;
            margin-left: 0;
        }
        #userHeader #userDataCnt .floatSmall {
            float: left;
            width: 150px;
        }

        /*-----------------------------------friends 430px----------------------------*/

        /*-----------------------------------garden 430px----------------------------*/
        #profileGarden .plantsProfileImg { display: none; }
        #profileGarden .plantsProfileInfoCol { width: 100% !important; }
        #profileGarden .plantsProfileInfoCol .userplantGardenXPBar div { width: 90% !important; }

        /*-----------------------------------forum 430px----------------------------*/
        #forumOneColumn .threadHL, #forumOneColumn .commentHL { width: 100%; }
        #forumOneColumn .threadCreated, #forumOneColumn .commentCreated { display: none; }
    }
</style>