<template>
   <div> 
       <eventForm></eventForm>
       <nav class="uk-navbar-container" uk-navbar>
            <div class="uk-navbar-left " >
                <ul class="uk-navbar-nav ">
                    <li class="uk-parent"><button type="button" @click="component='year'" class="uk-button uk-button-default">Year</button></li>
                    <li class="uk-active"><button type="button" @click="component='month'" class="uk-button uk-button-default">Month</button></li>
                    <li class="uk-parent"><button type="button" @click="component='year'" class="uk-button uk-button-default">Week</button></li>            
                    <li class="uk-parent"><button type="button" @click="component='day'" class="uk-button uk-button-default">Day</button></li>
                    <li class="uk-parent"><button class="uk-button uk-button-default uk-margin-small-right" type="button" @click="addEvent()" >Add event</button></li>
                </ul>
            </div>
        </nav>
       
       <component :is="component"></component>
       
   </div>
   
</template>

<script>
import month from "./month";
import year from './year'
import day from './day'
import eventForm from './eventForm'
import {mapGetters, mapMutations} from "vuex";

    export default {
        computed: mapGetters(['getUserDate']),
        components:{
            month,year,day,eventForm
        },
        data(){
            return{
               component: 'day'
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

</style>
