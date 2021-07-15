<template>
   <div class="uk-container uk-flex"> 
       <weekSelector></weekSelector>
        <div class="week">
             <div v-for="i in 7" class="day">
                <div>
                        <h4>{{ weekDay(i - 1) }}</h4>
                        <h2> {{setDays()[i].getDate()}}</h2>
                         <div class="calendar_events">
                <p class="ce_title">Upcoming Events <button class="uk-ikon-link" uk-icon="plus-circle" @click="addEvent()"></button></p>


                <div class="event_item" v-for="event in getDaysEvents[getIndexKey(setDays()[i])]">
                    <div class="ei_Dot dot_active"></div>
                    <div class="ei_Title">{{event.time}}</div>
                    <div class="ei_Copy">{{event.content}}</div>
                </div>
     
            </div>
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
        
        computed: mapGetters(['getUserDate','getEvents','getDaysEvents']),
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
            },
            getIndexKey(date){
                return date.toLocaleDateString()
            },
            addEvent( ){
                UIkit.modal('#task-form').show();
            },
        },
            
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
.calendar{
  width:370px;
  box-shadow: 0px 0px 35px -16px rgba(0,0,0,0.75);
  font-family:"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
  padding: 20px 30px;
  color:#363b41;
  display: inline-block;
}

.calendar_header{
  border-bottom: 2px solid rgba(0, 0, 0, 0.08);
}

.header_copy{
  font-size:20px;
}

.ce_title{
  font-size:14px;
}

.event_item{
  margin: 18px 0;
  padding:5px;
  cursor: pointer;
}
.event_item:hover{
    background-image: linear-gradient(-222deg, #84abff, #a9d5ff);
    box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
  }

.ei_Dot,.ei_Title{
  display:inline-block;
}

.ei_Dot{
  border-radius:50%;
  width:10px;
  height: 10px;
  box-shadow: 0px 0px 52px -18px rgba(0, 0, 0, 0.75);
}
.dot_active{
  background-color: #8684ff;
}

.ei_Title{
  margin-left:10px;
  color:#363b41;
}

.ei_Copy{
  font-size:12px;
  margin-left:27px;
}
</style>