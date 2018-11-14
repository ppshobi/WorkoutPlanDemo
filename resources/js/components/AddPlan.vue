<script>
    import Day from './DayComponent.vue'
    export default {
        props: ['plan'],
        components: {
            Day,
        },
        data: function() {
            return {
                days: []
            }
        },
        mounted() {
            console.log('Add plan Component mounted.');
            this.fetchDays(this.plan.id);
        },
        methods: {
            addDay() {
                self = this;
                axios.post('/days', {
                    'plan_id': this.plan.id
                }).then((response)=>{
                    self.days.push(response.data);
                    console.log("created day");
                });
            },

            removeDay(dayID){

            },

            fetchDays(){
                axios.get('/days').then((response)=>{
                    this.days = response.data;
                    console.log("fetched days");
                });
            }

        }
    }
</script>
