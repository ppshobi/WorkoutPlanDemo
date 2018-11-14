<script>
    import Day from './DayComponent.vue'
    export default {
        props: ['plan'],
        components: {
            Day,
        },
        data: function() {
            return {
                days: [],
                difficulty: this.plan.difficulty,
                name: this.plan.name,
                description: this.plan.description
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

            removeDay(dayId){
                this.days = this.days.filter(function(day) {
                    return day.id !== dayId;
                });
            },

            fetchDays(){
                axios.get('/days').then((response)=>{
                    this.days = response.data;
                    console.log("fetched days");
                });
            },

            updatePlan() {
                axios.patch(`/plans/${this.plan.id}`,{
                    name: this.name,
                    description: this.description,
                    difficulty: this.difficulty,
                }).then((response) => {
                    console.log(response.data)
                });
            }

        }
    }
</script>
