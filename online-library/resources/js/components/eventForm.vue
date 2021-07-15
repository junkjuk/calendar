<template>
  
   <form id="task-form" uk-modal ref="form" @submit.prevent="addEvent()">
            <div class="uk-modal-dialog" uk-overflow-auto>
                <div class="uk-modal-header">
                    <h2 class="uk-modal-title">Add event</h2>
                </div>
                <div class="uk-modal-body">
                    <div class="uk-form-horizontal uk-margin-small">
                        <div class="uk-margin">
                            <label class="uk-form-label" for="task-title">Name</label>
                            <div class="uk-form-controls">
                                <input type="text" class="uk-input" id="task-title" required v-model="formModel.title">
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label class="uk-form-label" for="task-date">Date</label>
                            <div class="uk-form-controls">
                                <input type="date" class="uk-input uk-width-1-2" id="task-date" required v-model="formModel.date">
                                <input type="number" min="0" max="23" class="uk-input uk-width-1-4" required v-model="formModel.hours">
                                <input type="number" min="0" max="59" class="uk-input uk-width-1-4" required v-model="formModel.minutes">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">no</button>
                    <button class="uk-button uk-button-primary" type="submit" >Save</button>
                </div>
            </div>
    </form>
</template>

<script>

import { mapActions } from 'vuex'

    export default {
        props: ['newEvent'],
        data() {
            return {
                formModel: {},
            }
        },
        watch: {
            newEvent() {
                this.form.show()
            }
        },
        mounted() {
            this.form = UIkit.modal('#task-form')
        },
        methods:{
            ...mapActions(['ajaxEventsAdd']),
            addEvent(){

               
                const content = this.formModel.title;
                
                const ev = {
                    date: this.formModel.date,
                    time:this.formModel.hours+":"+this.formModel.minutes+":00",
                    content: content
                }
        
                this.ajaxEventsAdd(ev)
                this.form.hide()
            }
        }
    }
</script>

<style scoped>

</style>
