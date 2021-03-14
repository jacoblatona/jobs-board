<template>
  <div class="container mx-auto py-10">
    <div class="w-full md:w-1/2 mx-auto py-5 px-5 md:px-0">
      <div class="mb-5">
        <p class="font-semibold text-lg mb-2">Job Title</p>
        <input
          v-model="form.job_title"
          type="text"
          class="w-full bg-gray-100 border rounded-md py-2 px-2"
        />
      </div>
      <div class="mb-5">
        <p class="font-semibold text-lg mb-2">Job Location</p>
        <input
          v-model="form.job_location"
          type="text"
          class="w-full bg-gray-100 border rounded-md py-2 px-2"
        />
      </div>
      <div class="mb-5">
        <p class="font-semibold text-lg mb-2">URL Website/Application</p>
        <input
          v-model="form.url"
          type="text"
          class="w-full bg-gray-100 border rounded-md py-2 px-2"
        />
      </div>
      <div class="mb-5">
        <p class="font-semibold text-lg mb-2">Company Name</p>
        <input
          v-model="form.company_name"
          type="text"
          class="w-full bg-gray-100 border rounded-md py-2 px-2"
        />
      </div>
      <div class="mb-5">
        <p class="font-semibold text-lg mb-2">Company Logo</p>
        <input
          type="file"
          @change="updateFile"
          class="w-full bg-gray-100 border rounded-md py-2 px-2"
        />
      </div>
      <div class="mb-5">
        <p class="font-semibold text-lg mb-2">Tags</p>
        <div class="flex">
          <input
            type="text"
            placeholder="Add New Tag..."
            v-model="tag"
            class="bg-gray-100 border rounded-l-md py-2 px-2 w-11/12"
          />
          <button
            @click="addTag"
            :disabled="!tag"
            class="bg-blue-500 text-white font-semibold border border-blue-500 rounded-md rounded-l-none py-2 px-2 w-1/12 focus:outline-none"
          >
            <i class="fas fa-plus"></i>
          </button>
        </div>
        <div class="w-full mt-4">
          <span
            class="text-sm mr-1 bg-blue-400 px-5 py-1.5 rounded-full text-white font-bold border-l-none"
            v-for="(tag, index) in tags"
            :key="index"
            >{{ tag }}</span
          >
        </div>
        <hr class="my-10" />
        <div class="mb-10">
          <p class="font-semibold text-lg">Job Description</p>
          <p class="text-gray-500 mb-5 text-sm">
            Describe your company/job responsibilites/requirements/salary range/etc
          </p>
          <ckeditor v-model="form.summary"></ckeditor>
        </div>
        <button
          class="w-full py-5 text-white text-center font-bold bg-blue-500 rounded-md"
          @click="submit"
          :disabled="
            !this.form.job_title ||
            !this.form.job_location ||
            !this.form.url ||
            !this.form.company_name ||
            !this.tags.length ||
            !this.form.summary
          "
        >
          <span v-if="processing">Processing...</span>
          <span v-else>Submit Job</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import { API } from "../config";
import { mapActions } from "vuex";
export default {
  name: "PostJob",
  data() {
    return {
      tag: "",
      processing: false,
      tags: [],
      form: {
        job_title: "Full Stack Laravel Developer",
        job_location: "Remote, USA",
        url: "https://twitter.com",
        company_name: "Spawned GG",
        company_logo: null,
        summary: "",
      },
    };
  },
  components: {},
  methods: {
    addTag() {
      this.tags.push(this.tag);
      this.tag = "";
    },
    updateFile(e) {
      this.form.company_logo = e.target.files[0];
    },
    submit() {
      let data = new FormData();
      data.append("job_title", this.form.job_title);
      data.append("job_location", this.form.job_location);
      data.append("url", this.form.url);
      data.append("company_name", this.form.company_name);
      data.append("company_logo", this.form.company_logo);
      data.append("tags", JSON.stringify(this.tags));
      data.append("summary", this.form.summary);

      this.processing = !this.processing;
      API.post("/jobs", data, {
        headers: {
          "content-type": "multipart/form-data",
        },
      })
        .then((res) => {
          console.log(res.data);
          this.refreshJobs();
        })
        .catch((e) => console.log(e))
        .finally(() => (this.processing = !this.processing));
    },
    ...mapActions({
      refreshJobs: "jobs/LOAD_JOBS",
    }),
  },
};
</script>

<style lang="scss" scoped></style>
