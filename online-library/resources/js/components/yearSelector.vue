<template>
    <div class="uk-container">
        <button class="uk-margin-small-right" uk-icon="chevron-left" @click="prevYear"></button>
        <div class="uk-text-uppercase uk-text-bold uk-text-center uk-inline-block">{{ getYear}}</div>
        <button class="uk-margin-small-left"  uk-icon="chevron-right" @click="nextYear"></button>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";

    export default {

        computed: mapGetters(['getUserDate', 'getYear']),
    
        methods:{
            ...mapMutations(['updateDate']),
            nextYear(){
                const date = new Date(this.getUserDate);       
                date.setFullYear(date.getFullYear() + 1);
                this.updateDate(date )
            },
            prevYear(){
                const date = new Date(this.getUserDate);       
                date.setFullYear(date.getFullYear() - 1);
                this.updateDate(date )
            }
        }
    }
</script>


<style scoped>
    .day{
        color: blue;
    }
</style>
