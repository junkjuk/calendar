<template>
  
   <form id="task-form" uk-modal>
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
                            <label class="uk-form-label" for="task-description">Description</label>
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea" id="task-description" v-model="formModel.description"></textarea>
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

                        <div class="uk-margin">
                            <label class="uk-form-label">Finished</label>
                            <div class="uk-form-controls uk-form-controls-text">
                                <label><input type="radio" class="uk-radio" name="finished" v-model="formModel.finished" :value="true"> Yes</label>
                                <br>
                                <label><input type="radio" class="uk-radio" name="finished" v-model="formModel.finished" :value="false"> No</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-default uk-modal-close" type="button">Отмена</button>
                    <button class="uk-button uk-button-primary" type="submit">Сохранить</button>
                </div>
            </div>
    </form>
</template>

<script>


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
        }
    }
</script>

<style scoped>

</style>
