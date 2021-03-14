<template>
  <div>
    <div class="w-full py-5 px-10 bg-blue-400 text-center text-white font-semibold">
      Laravel + Vue.js + TailwindCSS
    </div>
    <nav class="w-full py-5 px-5 md:px-0 bg-blue-500 border-b border-blue-400">
      <div class="container mx-auto flex justify-between items-center">
        <span class="font-bold text-lg text-white">CODE SAMPLE</span>
        <div class="hidden md:block">
          <router-link to="/" class="font-semibold text-white">Home</router-link>
          <router-link to="/browse" class="font-semibold text-white ml-7"
            >Browse Jobs</router-link
          >
          <router-link to="/post-job" class="font-semibold text-white ml-7"
            >Post a Job</router-link
          >
          <a href="#!" class="font-semibold text-white ml-7"
            ><i class="fab fa-github"></i
          ></a>
        </div>
        <a href="#!" class="font-semibold text-white block md:hidden"
          ><i class="fas fa-bars"></i
        ></a>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "Nav",
  created() {},
  data() {
    return {};
  },
  props: {},
  methods: {},
};
</script>

<style lang="scss" scoped></style>
