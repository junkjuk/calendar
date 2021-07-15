<template>
   <div class="uk-container uk-flex"> 
       <weekSelector></weekSelector>
        <div class="week">
             <div v-for="i in 7" class="day">
                <div>
                        <h4>{{ weekDay(i - 1) }}</h4>
                        <h2> {{setDays()[i].getDate()}}</h2>
                </div>
                <h1>

                </h1>  
            </div>
        </div>
   </div>
   
</template>

<script>


import {mapGetters, mapMutations} from "vuex";
import weekSelector from "./weekSelector";

    export default {
        components:{
            weekSelector
        },
        
        computed: mapGetters(['getUserDate','getEvents']),
        methods:{
            weekDay(index){
                const day = new Date('2021-04-05');
                day.setDate(day.getDate() + index);

                return day.toLocaleDateString('en-EN',{ weekday: 'long'});
            },
            setDays(){
                const date = this.getUserDate;
                const day = date.getDate();
                const weekDay = date.getDay();
                const year = date.getFullYear();
                const month = date.getMonth();
                const dayes = [];
                if( weekDay == 0){
                    for(let i = 0;i <= 7 ;i++){
                        const d = new Date(year, month, day - i)
                        dayes.unshift(d);
                    }
                    return dayes;
                }
                for(let i = 1;i <= 7 ;i++){
                    const d = new Date(year, month, day - (weekDay - i))
                    dayes[i] = d;
                }

                return dayes;
            }
        }
    }
</script>

<style scoped>
.uk-flex{
    margin-top: 30px;
    flex-direction: column;
    justify-content:space-between;
    flex-wrap: wrap;
}
.week{
     margin-top: 30px;
    display: flex;
    flex-direction: row;
    justify-content:space-between;
    flex-wrap: wrap;
}
</style>