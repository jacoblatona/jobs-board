<template>
  <div id="app">
    <Nav />
    <router-view />
  </div>
</template>

<script>
import Nav from "./components/Nav";
import { mapActions } from "vuex";
export default {
  components: {
    Nav,
  },
  mounted() {
    this.loadJobs();
  },
  methods: {
    ...mapActions({
      loadJobs: "jobs/LOAD_JOBS",
    }),
  },
};
</script>
<style lang="scss"></style>
