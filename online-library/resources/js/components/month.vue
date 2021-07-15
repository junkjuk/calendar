<template>
    <div class="container">
        <div class="title">
            <monthSelector></monthSelector>
        </div>
        <div class="calendar uk-flex ">
            <div v-for="i in 7" class="item">
                <div class="">
                    <h4>{{ weekDay(i - 1) }}</h4>
                </div>
            </div>
            <div v-for="day in getDays()" class="item days">
                <dayCard v-if="day!=null" :date="day" :events="getDaysEvents[getIndexKey(day)]" >{{ day.getDate() }}</dayCard>
            </div>
        </div>
         {{this.daysEvents()}}
    </div>
   
</template>

<script>
import dayCard from "./dayCadr";
import {mapGetters} from "vuex";
import monthSelector from "./monthSelector";

    export default {


        
        components:{
            dayCard, monthSelector
        },
        
        
        computed: mapGetters(['getUserDate','getEvents', 'getDaysEvents']),

        methods:{
            getDays(){
                const days = [];
                const date = new Date(this.getUserDate); 
                const month = date.getMonth();
                const year = date.getFullYear();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const firstDay = new Date(year, month, 1).getUTCDay();

                for(let i = firstDay; i < daysInMonth + firstDay; i++){
                    days[i] = new Date(year, month, i + 1 - firstDay)
                }

                return days;
            },
            weekDay(index){
                const day = new Date('2021-04-05');
                day.setDate(day.getDate() + index);

                return day.toLocaleDateString('en-EN',{ weekday: 'long'});
            },
            getIndexKey(date){
                return date.toLocaleDateString()
            }
        }
    }

</script>

<style scoped>
    .container{
        margin-left: 15px;
        display: flex;
        flex-direction:column;
        flex-wrap: wrap;
        height: 1000px;
    }
    .calendar{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        height: 90%;
        margin-top: 30px;
    }
    .item{
        width: calc(100% / 7.1);
        height:120px;
        margin: 0;
        padding: 0;
    }
    
    
    .title{
         align-self: center;
    }
</style>
