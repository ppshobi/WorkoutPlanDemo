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
            this.fetchDays(this.plan.id);
        },
        methods: {
            addDay() {
                self = this;
                axios.post('/days', {
                    'plan_id': this.plan.id
                }).then((response)=>{
                    self.days.push(response.data);
                    toastr.success('Created Day');
                });
            },

            removeDay(dayId){
                let self = this;
                axios.delete('/days/'+dayId).then((response)=>{
                    self.days = [];
                    self.fetchDays();
                    toastr.warning("Added Exercises to Day");
                });
            },

            fetchDays(){
                axios.get('/days', { params: {
                        plan_id:this.plan.id
                    }
                }).then((response)=>{
                    this.days = response.data;
                });
            },

            updatePlan() {
                axios.patch(`/plans/${this.plan.id}`,{
                    name: this.name,
                    description: this.description,
                    difficulty: this.difficulty,
                }).then((response) => {
                    toastr.success('Day Updated');
                });
            }
        }
    }
</script>
