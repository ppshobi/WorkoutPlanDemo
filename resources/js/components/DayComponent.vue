<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-default">
                <div class="card-header">
                    <input type="text" id="dayName" @blur="updateDayName" v-model="name" class="form-control" />
                    <label class="form-label" for="dayName"> <a class="btn btn-sm text-red" @click.prevent="$emit('remove-day', day.id)"><i class="fe fe-trash"></i> Delete</a></label>
                </div>
                <div class="card-body o-auto">
                    <ul class="list-unstyled list-separated">
                        <li class="list-separated-item " v-for="exercise in this.dayExercises">
                            <div class="row align-items-center">
                                <div class="col">
                                    {{ exercise.name }}
                                </div>
                                <div class="col d-flex">
                                    <label class="form-label align-self-center">Duration</label>
                                    <input type="text" class="form-control-sm" @blur="persistExerciseInstance" placeholder="duration" v-model="exercise.duration">
                                </div>
                                <div class="col-auto">
                                    <a href="#" class="btn btn-sm btn-secondary" @click.prevent="remove(exercise.exercise_id)"><i class="fe fe-trash"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-sm btn-primary" @click.prevent="openModal">Add an Exercise</a>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal" @click="saveExercises">Add to Day</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['day'],

        data: function() {
            return {
                name : this.day.name,
                editing: true,
                allExercises: [],
                dayExercises: []
            }
        },
        mounted() {
            this.dayExercises = this.day.exercises;
            console.log('Day Component mounted.');
            this.fetchExercises();
        },

        methods: {
            openModal(event){
                $('input:checkbox[name=exercise]').prop('checked', false);
                $(event.target).parents().eq(2).siblings().closest('.modal').modal()
            },
            updateDayName(){
                axios.patch('/days/'+this.day.id, {name:this.name}).then((response) => {
                    console.log("Name Updated Successfully");
                });
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

                this.dayExercises = _.unionBy(temporaryExercises, this.dayExercises, 'exercise_id');

                this.persistExerciseInstance();
            },

            persistExerciseInstance() {
                let self = this;

                axios.post('/exercise-instance',{
                    exercises: this.dayExercises.map((ex) => {
                        return {
                            id: ex.exercise_id,
                            duration:ex.duration,
                            day_id: self.day.id,
                        }
                    }),
                    dayId: self.day.id,
                }).then((response) => {
                    console.log(response.body);
                });
            },

            deleteDay(){
                let self=this;
                // axios.delete('/days/'+this.dayId).then((response)=>{
                //     this.$emit('remove-day', self.dayId)
                // });
                this.$emit('remove-day', self.day.id)
            },

            remove(id) {
                this.dayExercises = this.dayExercises.filter(function(ex) {
                    return ex.exercise_id !== parseInt(id);
                });

                axios.delete(`/exercise-instance/${this.day.id}/${id}`)
                    .then((response)=>{
                        console.log(response.data);
                    });
            },

            fetchExercises() {
                axios.get('/exercise').then((response)=>{
                   this.allExercises = response.data.map((ex)=>{
                       ex.exercise_id = ex.id;
                       return ex;
                   });
                });
            }
        },
        watch: {

        }
    }
</script>
