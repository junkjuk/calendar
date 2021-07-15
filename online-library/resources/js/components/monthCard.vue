<template>
    <div class="container">
        <div class="title">
            <h4>{{ getMonthNameLocal() }}</h4>
        </div>
        <div class="calendar uk-flex ">
            <div v-for="i in 7" class="item ">
                <div class="">
                    {{ weekDay(i - 1) }}
                </div>
            </div>
            <div v-for="day in getDays()" class="item">
                <div v-if="day!=null">
                     {{day.getDate()}}

                            <a v-if="getDaysEvents[getIndexKey(day)]!=null" class="uk-badge">{{getDaysEvents[getIndexKey(day)].length}}</a>
                        
                    
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

    export default {
        
        
        computed: mapGetters(['getUserDate','getMonthNames', 'getYear', 'getDaysEvents']),
        props:['monthNomber'],
        methods:{
            getDays(){
                const days = [];
                const date = new Date(this.getUserDate); 
                
                const month = this.monthNomber - 1;
                
                const year = date.getFullYear();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const firstDay = new Date(year, month, 1).getUTCDay();
                for(let i = firstDay; i < daysInMonth + firstDay; i++){
                     days[i] = new Date(year, month, i + 1 - firstDay)
                }

                return days;
            },
            getMonthNameLocal(){
 

                const month = this.monthNomber - 1;
                const date = new Date(2000, month, 1);
                return date.toLocaleDateString('en-EN', {month: 'long'});
            },
            weekDay(index){
                const day = new Date('2021-04-05');
                day.setDate(day.getDate() + index);

                return day.toLocaleDateString('en-EN',{ weekday: 'short'});
            },
            getIndexKey(date){
                return date.toLocaleDateString()
            }
        }
    }

</script>

<style scoped>
    .item{
        width: calc(100% / 7);
        margin: 0;
        padding: 0;
    }
    .calendar{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    .container{
        border: 1px solid teal;
        margin: 10px 10px 10px 10px;

    }
</style>
