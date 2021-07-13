import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    calendarDate: new Date(),
    newEvent: null
  },
  getters: {
    getUserDate(state){
        return state.calendarDate;
    },
    getNewEvent(state){
      return state.newTask;
    },
    getMonthNames(state){
        return state.calendarDate.toLocaleDateString('en-EN', {month: 'long'});
    },
    getYear(state){
        return state.calendarDate.getFullYear();
    }
  },
  actions: {},
  mutations: {
    updateDate (state, date) {
      state.calendarDate = date;
    },
    event(state){
      state.newEvent = {}
    }
  },
  
})