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
                        <input type="submit" class="btn btn-primary" value="Nein">
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
            }
        },
        props:{
            userplant: null,
        },
        methods:{
            removeUserplant: function(e){
                    //remove plant
            }
        }
    }
</script>

<style scoped>

</style>