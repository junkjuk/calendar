import Vue from 'vue'
import Vuex from 'vuex'


Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    events:[],
    calendarDate: new Date(),
    newEvent: null
  },
  getters: {
    getDaysEvents(state){
      const events = state.events;
      const eventIndex = {};
      for(let i = 0; i < events.length; i++){
          const event = events[i];
          const d = new Date(event.date)
          const key = d.toLocaleDateString();
          const eventForDay = eventIndex[key] || [];
          eventForDay.push(event);
          eventIndex[key] = eventForDay 
      }

      return eventIndex
  },
    getDayEvent(state){

      return state.events;
    },
    getEvents(state){
      return state.events;
    },
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
  actions: {
    ajaxEventsFromDB(context) {
      axios
      .get("api/event")
      .then(response => {
        console.log(response.data.event);
        context.commit('setEvents', response.data.event);
      })
      .catch( error => console.log('error' , error));
    },

    ajaxEventsAdd(context, event) {

      axios
      .post("api/event", {
        content : event.content,
        date: event.date, 
        time: event.time
      })
      .then(response => {
        console.log('error' , response.data);
        context.commit('setEvents', response.data);
      })
      .catch( error => console.log('error' , error));
    }
  },
  mutations: {
    updateDate (state, date) {
      state.calendarDate = date;
    },
    setEvents(state, data){
      state.events = data
    }
  },
  
})