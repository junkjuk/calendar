<template>
    <div class="container container-main">
        <yearSelector></yearSelector>
        <div class="calendar-year">
            <div class="calendar" v-for="i in 12">
                <monthCard :monthNomber="i"></monthCard>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import yearSelector from "./yearSelector";
import monthCard from "./monthCard";
    export default {
        computed: mapGetters(['getUserDate','getMonthNames', 'getYear']),
        components:{
            yearSelector,monthCard
        }

    }
</script>

<style scoped>
    .container{
        display: flex;
        flex-direction:column;
        flex-wrap: wrap;
        align-items: center;
    }
    .container-main{
        margin-left: 100px;
        margin-right: 100px;
    }
    .calendar{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: calc(100% / 4); 
    }
    .calendar-year{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
       justify-content: center;
    }
    
</style>
