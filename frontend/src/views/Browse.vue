<template>
  <div class="container mx-auto py-10">
    <div class="w-full flex-none md:flex">
      <div class="px-5 md:px-0 w-full md:w-1/5">
        <p class="font-semibold text-lg mb-2">Job Title</p>
        <input
          v-model="job_title"
          type="text"
          placeholder="Software Engineer..."
          class="w-full bg-white border rounded-md py-2 px-2 focus:ring-1 focus:ring-blue-400 focus:outline-none"
        />
        <p class="font-semibold text-lg mb-2 mt-8">Location</p>
        <input
          v-model="job_location"
          type="text"
          placeholder="Remote, USA..."
          class="w-full bg-white border rounded-md py-2 px-2 focus:ring-1 focus:ring-blue-400 focus:outline-none"
        />
        <p class="font-semibold text-lg mb-2 mt-8">Level</p>
        <div class="mb-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="accountType" value="personal" />
            <span class="ml-2">Entry</span>
          </label>
        </div>
        <div class="mb-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="accountType" value="personal" />
            <span class="ml-2">Junior</span>
          </label>
        </div>
        <div class="mb-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="accountType" value="personal" />
            <span class="ml-2">Intermediate</span>
          </label>
        </div>
        <div class="mb-2">
          <label class="inline-flex items-center">
            <input type="radio" class="form-radio" name="accountType" value="personal" />
            <span class="ml-2">Senior</span>
          </label>
        </div>
      </div>
      <div class="w-full md:w-4/5 px-5 mt-10 md:mt-0">
        <p class="font-semibold text-lg mb-2">
          {{ filteredList.length }} Job{{ filteredList.length > 1 ? "s" : "" }}
        </p>
        <div
          class="py-4 border border-b-0 px-5 flex items-center rounded-sm"
          :class="{
            'bg-gray-100': index % 2 !== 0,
            'border-b': index + 1 == jobs.length,
          }"
          v-for="(job, index) in filteredList"
          :key="job.id"
        >
          <div class="flex items-center w-3/5 md:w-2/5">
            <img :src="job.company_logo" class="w-16 mr-5 hidden md:block" />
            <div>
              <p class="font-bold">{{ job.job_title }}</p>
              <span class="text-sm text-gray-500">
                {{ job.posted_at }} - {{ job.company_name }}</span
              >
            </div>
          </div>
          <div class="hidden md:block w-2/5">
            <span
              v-for="(tag, index) in job.tags"
              :key="index"
              class="border rounded-lg px-4 py-1 text-sm font-semibold mr-2"
              >{{ tag }}</span
            >
          </div>
          <div class="w-2/5 text-right">
            <span class="text-gray-500 font-thin"
              ><i class="fas fa-street-view"></i> {{ job.job_location }}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "Browse",
  created() {},
  data() {
    return {
      job_title: "",
      job_location: "",
      level: "",
    };
  },
  computed: {
    ...mapGetters({
      jobs: "jobs/GET_JOBS",
    }),
    filteredList() {
      let vm = this,
        list = vm.jobs;

      return list.filter(function (item) {
        let job_title = vm.job_title
            ? item.job_title.toLowerCase().includes(vm.job_title.toLowerCase())
            : true,
          job_location = vm.job_location
            ? item.job_location.toLowerCase().includes(vm.job_location.toLowerCase())
            : true;

        return job_title && job_location;
      });
    },
  },
};
</script>

<style lang="scss" scoped></style>
