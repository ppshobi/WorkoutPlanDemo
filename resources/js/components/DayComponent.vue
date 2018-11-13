<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-default">
                <div class="card-header">
                    <input type="text" id="dayName" v-model="name" class="form-control" disabled/> <label for="dayName" @click="editName">{{ this.editing ? "Save" : "Edit"}}</label>
                </div>
                <div class="card-body">
                    <ul v-for="exercise in this.exercises">
                        <li>{{ exercise.name }}</li>
                        <button class="btn btn-sm btn-secondary" @click.prevent="remove"> - </button>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['exercises'],

        data: function() {
            return {
                name : 'Day 1',
                editing: false,
            }
        },
        mounted() {
            console.log('Day Component mounted.')
        },

        methods: {
            editName(){
               this.editing = ! this.editing;
            },
        },
        watch: {
            editing: function(val){
                if(val) {
                    console.log("Editing name");
                    $("#dayName").prop("disabled", false);
                }else{
                    $("#dayName").prop("disabled", true);
                }
            }
        }
    }
</script>
