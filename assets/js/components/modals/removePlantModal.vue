<template>
    <div>
    <button type="button" class="remove" data-toggle="modal" data-backdrop="static" data-target="#removeUserplant" @click="modalOpen = true" >
        &times;
    </button>

    <div class="modal fade" id="removeUserplant" tabindex="-1" role="dialog" aria-hidden="true" v-if="modalOpen == true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5>Willst du {{userplant.name}} {{userplant.plant.name}} wirklich löschen?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="modalOpen = false">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form v-on:submit="removeUserplant">
                        <input type="submit" class="btn btn-primary" value="Ja">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" @click="modalOpen = false">
                            <span aria-hidden="true">Nein</span></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "removePlantModal",
        data: function(){
            return{
                modalOpen: false,
                plantId: null,
                error: ''
            }
        },
        props:{
            userplant: null,
        },
        methods:{
            removeUserplant: function(e){

                this.$http.delete('/api/garden/removeUserplant/'+ this.userplant.id)
                    .then((response) => {
                        this.plantId = response.data;
                    })
                    .catch(error => {
                    if(error.response.data){
                        this.error = error.response.data;
                    }
                 });
                this.$emit('newUserplant');

                e.preventDefault();
            }
        }
    }
</script>

<style scoped>

    .remove {
        position: fixed;
        height: 30px;
        width: 30px;
        z-index: 0;
        background-color: #97B753;
        color: white;
        border: 2px solid #97B753;
        border-radius: 15px;
        font-size: 10pt;
    }
</style>