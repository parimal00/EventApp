<template>
  <div>
    <!-- <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
  Toggle modal
</button> -->

    <!-- Main modal -->
    <div
      id="defaultModal"
      tabindex="-1"
      aria-hidden="true"
      class="
        overflow-y-auto
        fixed
        top-0
        right-0
        left-0
        z-50
        p-4
        w-full
        md:inset-0
        h-modal
        md:h-full
        bg-black bg-opacity-60
        flex
        justify-center
      "
    >
      <div class="relative w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div
            class="
              flex
              justify-between
              items-start
              p-4
              rounded-t
              border-b
              dark:border-gray-600
            "
          >
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
              Show
            </h3>
            <button
              type="button"
              @click="closeModal"
              class="
                text-gray-400
                bg-transparent
                hover:bg-gray-200 hover:text-gray-900
                rounded-lg
                text-sm
                p-1.5
                ml-auto
                inline-flex
                items-center
                dark:hover:bg-gray-600 dark:hover:text-white
              "
              data-modal-toggle="defaultModal"
            >
              <svg
                aria-hidden="true"
                class="w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <!-- <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                </p>
            </div> -->

          <div class="w-full max-w-lg p-5">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-password"
                >
                  Title
                </label>
                <div
                  required
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    mb-3
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="grid-password"
                  type="text"
                  placeholder="Enter Title"
                >
                  {{ form.title }}
                </div>
                <p v-if="errors.title" class="text-red-600 text-xs italic">
                  {{ this.errors.title }}
                </p>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-password"
                >
                  Event Description
                </label>
                <div
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    mb-3
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="grid-password"
                  type="text"
                  placeholder="Enter Description"
                >{{ form.description }}</div>
              
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-password"
                >
                  Event Start Date
                </label>
                <div
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    mb-3
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="grid-password"
                  type="date"
                >{{ form.start_date }}</div>
              
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label
                  class="
                    block
                    uppercase
                    tracking-wide
                    text-gray-700 text-xs
                    font-bold
                    mb-2
                  "
                  for="grid-password"
                >
                  Event Ending Date
                </label>
                <div
                  class="
                    appearance-none
                    block
                    w-full
                    bg-gray-200
                    text-gray-700
                    border border-gray-200
                    rounded
                    py-3
                    px-4
                    mb-3
                    leading-tight
                    focus:outline-none focus:bg-white focus:border-gray-500
                  "
                  id="grid-password"
                  type="date"
                >{{ form.end_date }}</div>
               
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div
            class="
              flex
              items-center
              p-6
              space-x-2
              rounded-b
              border-t border-gray-200
              dark:border-gray-600
            "
          >
            <button
              @click="closeModal"
              data-modal-toggle="defaultModal"
              type="button"
              class="
                text-white
                bg-green-500
                focus:ring-4 focus:outline-none focus:ring-blue-300
                font-medium
                rounded-lg
                text-sm
                px-5
                py-2.5
                text-center
              "
            >
              Close
            </button>
         
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Field, Form, ErrorMessage } from "vee-validate";
export default {
  props: ["event_id"],
  components: { Field, Form, ErrorMessage },
  data() {
    return {
      validatedResult: "",
      errors: {
        title: "",
        description: "",
        start_date: "",
        end_date: "",
      },
      form: {
        title: "",
        description: "",
        start_date: "",
        end_date: "",
      },
    };
  },
  methods: {
    closeModal() {
      this.$emit("closeShowEvent");
    },
    getEvent() {
      axios.get("/api/v1/events/" + this.event_id).then((response) => {
        this.form = response.data.data;
      });
    },
  },
  mounted() {
    console.log(this.event_id);
    this.getEvent();
  },
};
</script>

<style>
</style>