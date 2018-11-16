<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card card-default">
                <div class="card-header">Example Component</div>
                <div class="card-body">
                    <ul v-for="exercise in exercises">
                        <li>{{ exercise.name }}</li>
                        <button class="btn btn-sm btn-secondary" @click="addToDay">+</button>
                    </ul>
                </div>
                <div class="card-footer">
                    <button class="btn-sm btn-primary" @click.prevent="closeModel">Close</button>
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
                days : [],
            }
        },
        methods: {
        },

        mounted() {
            console.log('Exercise Component mounted.')
        },
        methods: {
        }
    }
</script>
