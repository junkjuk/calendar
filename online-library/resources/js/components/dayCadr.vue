<template>
    

    <div class="uk-card uk-card-small uk-card-hover  uk-margin-small-top day" :class="itemClasses">
        <div>
            Day <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['date'],
        computed:{
            itemClasses() {
                const isToday = this.getISODate(new Date()) === this.getISODate(this.date);
                if (isToday) {
                    return 'uk-card-primary';
                }
                return 'uk-card-default';
            }
        },
        methods:{
            getISODate(date){
                const d = new Date(date);
                d.setMinutes(d.getUTCMilliseconds() - d.getTimezoneOffset())
                
                return d.toISOString().split('T')[0];
            }
        }
    }
    
</script>

<style scoped>
    .day{
        width: 100%;
        height: 100%;
    }
</style>
