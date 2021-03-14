<template>
  <div>
    <header class="py-20 bg-blue-500 text-center">
      <div class="container mx-auto">
        <h1
          class="text-4xl sm:text-6xl lg:text-7xl leading-none font-extrabold tracking-tight text-white mt-14 mb-10"
        >
          Jobs Board
        </h1>
        <p
          class="max-w-screen-lg mx-auto text-lg sm:text-2xl sm:leading-10 font-medium mb-10 sm:mb-11 text-white"
        >
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
          Ipsum has been the industry's standard dummy text ever since the 1500s.
        </p>
        <div class="w-full mb-20">
          <button class="text-white bg-black px-6 py-3 font-semibold rounded-xl text-lg">
            Browse Jobs <i class="fas fa-search ml-5"></i>
          </button>
          <button
            class="bg-gray-50 border px-6 py-3 font-semibold rounded-xl text-lg ml-5"
          >
            Post a Job <i class="fas fa-sign-in-alt text-gray-400 ml-5"></i>
          </button>
        </div>
        <div class="hidden md:block">
          <p class="text-gray-200 font-semibold">Trusted by the Best</p>
          <div class="w-full flex justify-around pt-10">
            <img src="/images/amazon.svg" class="w-32" />
            <img src="/images/esl.svg" class="w-32" />
            <img src="/images/logitech.svg" class="w-32" />
            <img src="/images/amazon.svg" class="w-32" />
            <img src="/images/esl.svg" class="w-32" />
          </div>
        </div>
      </div>
    </header>

    <section class="py-20">
      <div class="container mx-auto">
        <h1 class="text-center md:text-left font-semibold text-3xl mb-5">
          Featured Jobs
        </h1>

        <div
          class="py-4 border border-b-0 px-5 flex items-center rounded-sm"
          :class="{
            'bg-gray-100': index % 2 !== 0,
            'border-b': index + 1 == jobs.length,
          }"
          v-for="(job, index) in jobs"
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
    </section>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "Home",
  components: {},
  data() {
    return {
      toggle: true,
    };
  },
  computed: {
    ...mapGetters({
      jobs: "jobs/GET_JOBS",
    }),
  },
};
</script>
