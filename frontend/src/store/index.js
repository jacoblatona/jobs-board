import Vue from 'vue'
import Vuex from 'vuex'
import jobs from '../store/modules/jobs'


Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    jobs
  },
});

export default store;