import Vue from 'vue';
import {API} from '../../config'

const jobs = {
    namespaced: true,
    state: {
        jobs: []
    },

    mutations: {
        MUTATE_JOBS(state,payload){
            Vue.set(state, 'jobs', [...payload])
        },
        ADD_JOB(state,payload){
            state.jobs.push(payload)
        }
    },

    getters: {
        GET_JOBS(state) {
            return state.jobs;
        }
    },

    actions: {
        LOAD_JOBS({commit}){
            return new Promise((resolve,reject) => {
                API 
                .get('/jobs')
                .then(res => {
                    commit("MUTATE_JOBS", res.data.data)
                    resolve(res)
                })
                .catch(e => {
                    reject(e)
                })
            })
        }
    }
}

export default jobs;