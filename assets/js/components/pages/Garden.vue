<template>

    <div class="row">

        <div class="col right marginLeftRight">

            <div class="row garden">
                <h1 class="col-sm">Mein Garten</h1>
                <div class="col-sm text-right add"><span @click="addPlant()" class="iconGarden">

                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg></span></div>

            </div>
            <div class="greenLine"></div>

            <div>{{getUserPlants()}}</div>

            <div v-for="userplant in userPlants">
                <div class="row userplants">

                    <div class="col-sm" v-on:mouseover="replaceImage(userplant[0].plant.WindowIcon)">
                        <router-link class="link" :to="{ name: 'userplant', params: { id: userplant[0].id  }}">
                            <div class="bgWhiteGrey plantsProfil dropShadow ">

                                <div class="row">
                                    <div class="col-sm-7 plantInfo">
                                        <p class="text-left gardenPFirst"><b>{{ userplant[0].name }}</b> ({{ userplant[0].plant.name }})</p>
                                        <p>Ist durstig!</p>
                                        <div class="list"></div>
                                        <p><span class="location iconGarden"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg>
                                    </span> {{ userplant[0].location }}</p>
                                        <p><span class="calendar"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                    </span> Gießzeit</p>
                                        <p><span class="iconGarden"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg>
                                    </span> Menge</p>
                                        <button class="buttonDarkGreenSmall"> Gießen</button>
                                    </div>

                                    <img class="col-sm-5 imgTest" v-bind:src="'../' + userplant[0].plant.icon"  alt="Picture of plant" height="190" >

                                </div>
                            </div>

                        </router-link>
                    </div>
                    <div v-if="userplant[1] !== null" class="col-sm" v-on:mouseover="replaceImage(userplant[1].plant.WindowIcon)">
                        <router-link class="link" :to="{ name: 'userplant', params: { id: userplant[0].id  }}">
                            <div class="bgWhiteGrey plantsProfil dropShadow ">

                                <div class="row">
                                    <div class="col-sm-7 plantInfo" id="Eintrag" >
                                        <p class="text-left gardenPFirst"><b>{{ userplant[1].name }}</b> ({{ userplant[1].plant.name }})</p>
                                        <p>Ist durstig!</p>
                                        <div class="list"></div>
                                        <p><span class="location iconGarden"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg>
                                    </span> {{ userplant[1].location }}</p>
                                        <p><span class="calendar"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="m80 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m80 448h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m229.332031 320h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m229.332031 448h53.335938c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.335938c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m378.667969 320h53.332031c8.832031 0 16-7.167969 16-16v-53.332031c0-8.832031-7.167969-16-16-16h-53.332031c-8.832031 0-16 7.167969-16 16v53.332031c0 8.832031 7.167969 16 16 16zm0 0"/><path class="path1" d="m448 64h-21.332031v-42.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031h-21.332031c-11.777344 0-21.332031 9.558594-21.332031 21.332031v42.667969h-213.335938v-42.667969c0-11.773437-9.554687-21.332031-21.332031-21.332031h-21.332031c-11.777344 0-21.335938 9.558594-21.335938 21.332031v42.667969h-21.332031c-35.285156 0-64 28.714844-64 64v320c0 35.285156 28.714844 64 64 64h384c35.285156 0 64-28.714844 64-64v-320c0-35.285156-28.714844-64-64-64zm21.332031 384c0 11.753906-9.578125 21.332031-21.332031 21.332031h-384c-11.753906 0-21.332031-9.578125-21.332031-21.332031v-233.8125h426.664062zm0 0"/></svg>
                                    </span> Gießzeit</p>
                                        <p><span class="iconGarden"> <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M256,0C153.755,0,70.573,83.182,70.573,185.426c0,126.888,165.939,313.167,173.004,321.035
			c6.636,7.391,18.222,7.378,24.846,0c7.065-7.868,173.004-194.147,173.004-321.035C441.425,83.182,358.244,0,256,0z M256,278.719
			c-51.442,0-93.292-41.851-93.292-93.293S204.559,92.134,256,92.134s93.291,41.851,93.291,93.293S307.441,278.719,256,278.719z
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg>
                                    </span> Menge</p>
                                        <button class="buttonDarkGreenSmall"> Gießen</button>
                                    </div>

                                    <img class="col-sm-5 imgTest" v-bind:src="'../' + userplant[1].plant.icon"  alt="Picture of plant" height="190" >

                                </div>
                            </div>

                        </router-link>
                    </div>
                    <div v-else class="col-sm w-100">

                    </div>

                </div>
            </div>

        </div>

        <div>{{getPlants()}}</div>

        <div class="col"v-if="add">

        <div class="col addPlant">

            <div class="row search">
            <div class="col-11">
                <input type="text" placeholder="Suche nach Pflanzen.." class="searchBar form-control" aria-label="Search">
            </div>

                <span @click="close()" class="col iconGarden">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 455.4 455.4" style="enable-background:new 0 0 455.4 455.4;" xml:space="preserve"><path class="path1" d="M405.5,412.8c-69.7,56.9-287.3,56.9-355.6,0c-69.7-56.9-62.6-300.1,0-364.1s293-64,355.6,0S475.2,355.9,405.5,412.8z"/><path class="path2" d="M362.8,227.9c0,14.2-11.4,25.6-25.6,25.6h-85.3v85.3c0,14.2-11.4,25.6-25.6,25.6s-25.6-11.4-25.6-25.6v-85.3
	h-85.3c-14.2,0-25.6-11.4-25.6-25.6s11.4-25.6,25.6-25.6h85.3v-85.3c0-14.2,11.4-25.6,25.6-25.6s25.6,11.4,25.6,25.6v85.3h85.3
	C351.4,202.3,362.8,213.7,362.8,227.9z"/></svg></span>
            </div>

            <div v-for="plant in plants">
                <div class="row plants">

                    <div class="col-sm"> <div class="bgWhiteGrey plantProfil spacingPlants dropShadow ">

                        <div class="row">
                            <div class="col-sm-7 plantInfo">

                                    <p class="text-left gardenPFirst"><b>{{ plant[0].name }}</b></p>
                                    <p>{{ plant[0].genus}}</p>
                                <add-userplant-modal :plant="plant[0]" :user="$route.params.id">{{addUserplant()}}
                                </add-userplant-modal>
                            </div>

                            <img class="col-sm-5 imgTest" v-bind:src="'../' + plant[0].icon"  alt="Picture of plant" height="100" >

                        </div>

                    </div></div>
                    <div v-if="plant[1] !== null" class="col-sm">
                        <div class="bgWhiteGrey plantProfil dropShadow ">

                            <div class="row">
                                <div class="col-sm-7 plantInfo">
                                    <p class="text-left gardenPFirst"><b>{{ plant[1].name }}</b></p>
                                    <p>{{ plant[1].genus}}</p>
                                    <add-userplant-modal :plant="plant[1]" :user="$route.params.id">{{addUserplant()}}
                                    </add-userplant-modal>

                                </div>
                                <img class="col-sm-5 imgTest" v-bind:src="'../' + plant[1].icon"  alt="Picture of plant" height="100" >

                            </div>

                        </div>
                    </div>
                    <div v-else class="col-sm w-100">

                    </div>

                </div>
            </div>
        </div>
        </div>

        <div class="col windowImage" v-else>
            <div v-if="image === ''" class="windowImage" >
                <img :src="'../' + garden[0].plant.WindowIcon" alt="Plant side view" height="700" class="col-sm plantWindow">
            </div>
            <div v-else="image !== ''" class="windowImage">
                <img :src="'../' + image" alt="Plant side view" height="700" class="col-sm plantWindow">
            </div>
        </div>

    </div>

</template>

<script>

   import AddUserplantModal from "../modals/addUserplantModal";
   export default {
       name: "Garden",
       components: {AddUserplantModal},
       data: function(){
           return{
               garden: null,
               data: null,
               userPlants: [],
               index: 0,
               i: 0,
               plants: [],
               image: '',
               add: false
           }
       },
       mounted: function(){
           this.$http.get('/api/garden/' + this.$route.params.id)
               .then(response => {
                   this.garden = response.data;
               })
               .catch(error => {
                   alert(error);
               });
           this.$http.get('/api/garden/')
               .then(response => {
                   this.data = response.data;
               })
               .catch(error => {
                   alert(error);
               });



       },

       methods:{

           replaceImage: function (image) {

               this.image= image;

           },

           getUserPlants: function () {

              while(this.i < this.garden.length && this.index < this.garden.length){

                  this.userPlants[this.i] = [this.garden[this.index],this.garden[this.index+1]];
                  this.i++;
                  this.index +=2;
              }

              if(this.index % 2 === 0) {
                  this.userPlants[this.i-1][1] = null;
              }

           },


           getPlants: function () {

               var i = 0;
               var index = 0;

               while(i < this.data.length && index < this.data.length){

                   this.plants[i] = [this.data[index],this.data[index+1]];
                   i++;
                   index +=2;
               }

               if(index % 2 === 0) {
                   this.plants[i-1][1] = null;
               }

           },

           addPlant: function () {

            this.add = true;

           },

           close: function () {

            this.add = false;

           },

           addUserplant: function(){
              // vm.$forceUpdate();
           }

       }

   }
</script>

<style scoped>

</style>