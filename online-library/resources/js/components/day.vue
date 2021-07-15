<template>
   <div class="uk-container">
       
    <div class="calendar">
    <div class="calendar_header">
      <h1 class = "header_title">Events list</h1>
      <h2>{{ getISODate(getUserDate)}}</h2>
                <input type="date" class="uk-input uk-width-1-2" id="task-date" v-model="date" @change="dateSelect()">                 
      <p class="header_copy"></p>
    </div>

    <div class="calendar_events">
      <p class="ce_title">Upcoming Events <button class="uk-ikon-link" uk-icon="plus-circle" @click="addEvent()"></button></p>


        <div class="event_item" v-for="event in getDaysEvents[getIndexKey(getUserDate)]">
        <div class="ei_Dot dot_active"></div>
        <div class="ei_Title">{{event.time}}</div>
        <div class="ei_Copy">{{event.content}}</div>
      </div>
     
    </div>
  </div>

</div>
  
   
</template>

<script>
import { mapGetters, mapMutations } from "vuex";


    export default {
         computed: mapGetters(['getUserDate','getMonthNames', 'getYear', 'getDaysEvents']),
         data(){
            return{
                date:''
            }
         },
         methods:{
            ...mapMutations(['updateDate']),
            getISODate(date){
                const d = new Date(date);
                d.setMinutes(d.getUTCMilliseconds() - d.getTimezoneOffset())
                
                return d.toISOString().split('T')[0];
            },
            addEvent(){
                UIkit.modal('#task-form').show();
            },
            dateSelect(){
                const d = new Date(this.date);
                this.updateDate(d);
            },
            getIndexKey(date){
                return date.toLocaleDateString()
            }

         }
    }
</script>

<style scoped>
.uk-ikon-link{
    margin-left:10px ;
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
