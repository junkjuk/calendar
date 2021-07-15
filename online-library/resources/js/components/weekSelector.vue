<template>
    <div class="uk-container">
        <button class="uk-margin-small-right" uk-icon="chevron-left" @click="prevWeek"></button>
        <div class="uk-text-uppercase uk-text-bold uk-text-center uk-inline-block">{{ getYear}}</div>
        <div class="uk-text-uppercase uk-text-bold uk-text-center uk-inline-block">{{ getMonthNames}}</div>
        <button class="uk-margin-small-left"  uk-icon="chevron-right" @click="nextWeek"></button>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";

    export default {
        
        computed: mapGetters(['getUserDate', 'getYear','getMonthNames']),
    
        methods:{
            ...mapMutations(['updateDate']),
            nextWeek(){
                const date = new Date(this.getUserDate);
                const day = date.getDate();      
                date.setDate(day + 7); 
                this.updateDate(date)
            },
            prevWeek(){
                const date = new Date(this.getUserDate);
                const day = date.getDate();      
                date.setDate(day - 7); 
                this.updateDate(date)
            }
        }
    }
</script>


<style scoped>
    .day{
        color: blue;
    }
</style>
