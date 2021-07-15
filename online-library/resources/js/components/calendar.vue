<template>
   <div> 
       <eventForm></eventForm>
       
       <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left " >
                <ul class="uk-navbar-nav ">
                    <li class="uk-parent"><a @click="component='year'" class="uk-button uk-button-default">Year</a></li>
                    <li class="uk-active"><a @click="component='month'" class="uk-button uk-button-default">Month</a></li>
                    <li class="uk-parent"><a @click="component='week'" class="uk-button uk-button-default">Week</a></li>            
                    <li class="uk-parent"><a @click="component='day'" class="uk-button uk-button-default">Day</a></li>
                    <li class="uk-parent"><a class="uk-button uk-button-default"  @click="addEvent()" >Add event</a></li>
                    <li class="uk-parent"><a class="uk-button uk-button-default" href="/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
       <component :is="component"></component>
       
   </div>
   
</template>

<script>
import month from "./month";
import year from './year'
import week from './week'
import day from './day'
import eventForm from './eventForm'
import {mapGetters, mapMutations} from "vuex";

    export default {
        computed: mapGetters(['getUserDate','getEvents']),
        mounted(){
           this.$store.dispatch('ajaxEventsFromDB')            
        },
        components:{
            month,year,day,eventForm,week
        },
        data(){
            return{
               component: 'week'
            }
        },
        methods:{
            ...mapMutations(['updateDate']),
            addEvent(){
                UIkit.modal('#task-form').show();
            }
        }
    }
</script>

<style scoped>
.uk-button-default {
    color: #000;
}
</style>
