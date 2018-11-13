<script>
    import Day from './DayComponent.vue';
    export default {
        components: {
            Day
        },
        data: function() {
            return {
                days: [Day]
            }
        },
        mounted() {
            console.log('Add plan Component mounted.')
        },
        methods: {
            addDay() {
                this.days.push(Day);
            },
        }
    }
</script>
