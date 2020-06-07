<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="buttonDarkGreenSmall" data-toggle="modal" data-backdrop="static" data-target="#addUserplant" @click="modalOpen = true" >
            Hinzufügen
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addUserplant" tabindex="-1" role="dialog" aria-hidden="true" v-if="modalOpen == true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5>Füge eine neue Pflanze hinzu: </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="modalOpen = false">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form v-on:submit.prevent="addUserplant">
                            <p><b>{{plant.name}}</b> ({{plant.genus}})</p>
                            <div class="form-group">
                                <label for="userplantName">Name</label>
                                <input type="text" class="form-control" id="userplantName" v-model="name">
                            </div>
                            <div class="form-group">
                                <label for="userplantLocation">Standort</label>
                                <input type="text" class="form-control" id="userplantLocation" v-model="location">
                            </div>
                            <div class="form-group">
                                <label for="userplantNotes">Notizen</label>
                                <textarea name="Notes" cols="40" rows="5" class="form-control" id="userplantNotes" v-model="notes"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" @click="addUserplant" data-dismiss="modal">Speichern</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "addUserplantModal",
        data: function(){
            return{
                modalOpen: false,
                plantName: this.plant.name,
                name: '',
                location: '',
                notes: '',
                error: ''
            }
        },
        props:{
            plant: null,
        },
        methods:{
            addUserplant: function(){

                this.$http.post('/api/garden/createUserplant/', {
                    plantName: this.plantName,
                    name: this.name,
                    location: this.location,
                    notes: this.notes
                    })
                    .catch(error => {
                        if(error.response.data){
                            this.error = error.response.data;
                        }
                     });
            }
        }
    }
</script>

<style scoped>

</style>