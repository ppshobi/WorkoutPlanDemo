<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <input type="text" v-model="name">
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
    </div>
</template>

<script>
    export default {
        props : ['exercises'],

        data: function() {
            return {
                name : 'Day 1',
            }
        },
        mounted() {
            console.log('Day Component mounted.')
        },
        methods: {

        }
    }
</script>
