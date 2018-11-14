<script>
    export default {
        data: function() {
            return {
                dayCount: 1
            }
        },
        mounted() {
            console.log('Add plan Component mounted.')
        },
        methods: {
            addDay() {
                this.dayCount++;
            },
        }
    }
</script>
