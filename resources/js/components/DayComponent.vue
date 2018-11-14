<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-default">
                <div class="card-header">
                    <input type="text" id="dayName" v-model="name" class="form-control" :disabled="! this.editing" />
                    <label class="form-label" for="dayName" @click="editName"> <a class="btn" href="javascript:void(0)">{{ this.editing ? "Save" : "Edit"}}</a></label>
                </div>
                <div class="card-body o-auto">
                    <ul class="list-unstyled list-separated">
                        <li class="list-separated-item p-1" v-for="exercise in this.dayExercises">
                            <div class="row align-items-center">
                                <div class="col">
                                    {{ exercise.name }}
                                </div>
                                <div class="col-auto">
                                    <a href="" class="btn btn-sm btn-secondary" @click.prevent="remove"><i class="fe fe-trash"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <div data-toggle="modal" data-target="#exerciseModel" class="btn btn-sm btn-primary">Add an Exercise</div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exerciseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Select Exercise</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-label">Exercises</div>
                            <div class="custom-controls-stacked" v-for="exercise in this.allExercises">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="exercise" :value="exercise.id">
                                    <span class="custom-control-label">{{ exercise.name }}</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" @click="saveExercises">Add to Day</button>
                    </div>
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
                editing: true,
                allExercises: [],
                dayExercises: []
            }
        },
        mounted() {
            this.dayExercises = this.exercises;
            console.log('Day Component mounted.');
            this.fetchExercises();
        },

        methods: {
            editName(){
               this.editing = ! this.editing;
            },
            saveExercises(event){
                self = this;
                let temporaryExercises = [];
                $("input:checkbox[name=exercise]:checked").each(function () {
                    let val = parseInt($(this).val());
                    let result = self.allExercises.find((ex) => {
                        return ex.id === val;
                    });
                    temporaryExercises.push(result);
                });

                this.dayExercises = _.unionBy(temporaryExercises, this.dayExercises, 'id');

            },
            fetchExercises() {
                axios.get('/exercise').then((response)=>{
                   this.allExercises = response.data;
                });
            }
        },
        watch: {

        }
    }
</script>
