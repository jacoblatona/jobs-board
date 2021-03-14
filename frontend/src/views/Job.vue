<template>
  <div class="container mx-auto pt-32">
    <div class="flex-none md:flex w-full">
      <div class="w-full md:w-1/2 text-center md:text-left">
        <img :src="job.company_logo" class="w-32 mb-5 mx-auto md:mx-0" />
        <p class="font-extrabold text-5xl mb-5">{{ job.job_title }}</p>
        <span
          v-for="(tag, index) in job.tags"
          :key="index"
          class="border rounded-lg px-4 py-1 text-sm font-semibold mr-2"
          >{{ tag }}</span
        >
        <p class="text-md text-gray-500 font-semibold mt-10 mb-5">
          {{ job.posted_at }} - {{ job.company_name }}
        </p>
        <span class="text-gray-500 font-thin"
          ><i class="fas fa-street-view"></i> {{ job.job_location }}
        </span>
      </div>
      <div class="w-full md:w-1/2 pb-10 pt-10 md:pt-0 px-5 md:px-0">
        <div class="border border-b-0 py-3 px-5 font-semibold">Job Information</div>
        <div class="border p-5 bg-gray-50" v-html="job.summary"></div>
      </div>
    </div>
  </div>
</template>

<script>
import { API } from "../config";
export default {
  name: "Job",
  created() {
    this.load();
  },
  data() {
    return {
      id: this.$route.params.id,
      job: {},
    };
  },
  methods: {
    load() {
      API.get(`/jobs/${this.id}`)
        .then((res) => {
          this.job = res.data.data;
        })
        .catch((e) => console.log(e));
    },
  },
};
</script>

<style lang="scss" scoped></style>
