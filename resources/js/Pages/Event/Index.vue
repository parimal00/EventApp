<template>
  <div>
    <div v-if="toast">
      <Toast :message="toast_message" />
    </div>
    <div class="p-5" v-if="indexPageStatus">
      <div>
        <div class="flex">
          <button @click="goToCreate" class="mr-3 bg-green-400 text-white rounded-md py-2 px-3">
            Create Event
          </button>
          <select @change="getEvents" v-model="filter" class="bg-green-400 text-white rounded-md py-2 px-3">
            <option value="all">All</option>
            <option v-for="status in eventStatus" :key="status" :value="status">
              {{ status }}
            </option>
          </select>
        </div>
      </div>
      <div v-if="createEventStatus">
        <Create @closeCreateEvent="closeCreateEvent" />
      </div>
      <div v-if="editEventStatus">
        <Edit @closeEditEvent="closeEditEvent" :event_id="event_id" />
      </div>
      <div v-if="showEventStatus">
        <Show @closeShowEvent="closeShowEvent" :event_id="event_id" />
      </div>
      <div v-if="events.length > 0">
        <table class="w-full">
          <thead class="bg-gray-50 border-b-2 border-gray-200">
            <tr>
              <th class="text-left p-3 font-semibold tracking-wide">ID</th>
              <th class="text-left p-3 font-semibold tracking-wide">
                Event Title
              </th>
              <th class="text-left p-3 font-semibold tracking-wide">
                Description
              </th>
              <th class="text-left p-3 font-semibold tracking-wide">
                Start Date
              </th>
              <th class="text-left p-3 font-semibold tracking-wide">
                End Date
              </th>
              <th class="text-left w-1/6 p-3 font-semibold tracking-wide">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="event in events" :key="event.id" class="bg-white">
              <td class="text-sm w-24 font-bold hover:underline p-3 text-blue-700">
                {{ event.id }}
              </td>
              <td class="text-sm p-3 w-1/3 text-gray-700">{{ event.title }}</td>
              <td class="text-sm p-3 text-gray-700">{{ event.description }}</td>

              <td class="text-sm p-3 text-gray-700">
                {{ event.start_date }} <br />
                {{ event.readable_start_date }}
              </td>
              <td class="text-sm p-3 text-gray-700">
                {{ event.end_date }} <br />
                {{ event.readable_end_date }}
              </td>

              <td class="text-sm p-3 text-gray-700">
                <button @click="goToEdit(event.id)" class="mr-2 bg-green-400 text-white rounded-md py-2 px-3">
                  Edit
                </button>
                <button @click="goToShow(event.id)" class="mr-2 bg-green-400 text-white rounded-md py-2 px-3">
                  Show
                </button>
                <button @click="deleteEvent(event.id)" class="bg-red-400 text-white rounded-md py-2 px-3">
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else>
        <div class="
            w-full
            border-2 border-red-500
            py-3
            text-center
            mt-10
            text-red-500
          ">
          No Events
        </div>
      </div>
    </div>
    <!-- <router-view></router-view> -->
  </div>
</template>

<script>
import Toast from "../../Components/Toast.vue";
import Create from "../../Pages/Event/Create.vue";
import Edit from "../../Pages/Event/Edit.vue";
import Show from "../../Pages/Event/Show.vue";

export default {
  components: { Create, Edit, Show, Toast },
  data() {
    return {
      event_id: "",
      createEventStatus: false,
      editEventStatus: false,
      showEventStatus: false,
      events: [],
      indexPageStatus: true,
      eventStatus: [],
      filter: "all",
      toast_message: "",
      toast: "",
    };
  },
  mounted() {
    this.getEvents();
  },
  methods: {
    getEvents() {
      axios.get("/api/v1/events/?status=" + this.filter).then((response) => {
        this.eventStatus = response.data.event_status;
        this.events = response.data.data;
      });
    },

    hideIndexPage() {
      this.indexPageStatus = false;
    },

    goToCreate() {
      this.createEventStatus = true;
    },

    goToEdit(event_id) {
      this.event_id = event_id;
      this.editEventStatus = true;
    },

    goToShow(event_id) {
      this.event_id = event_id;
      this.showEventStatus = true;
    },

    closeCreateEvent() {
      this.createEventStatus = false;
      this.getEvents();
    },

    closeEditEvent() {
      this.editEventStatus = false;
      this.getEvents();
    },

    closeShowEvent() {
      this.showEventStatus = false;
    },

    deleteEvent(event_id) {
      axios.delete("/api/v1/events/" + event_id).then((response) => {
        if (response.status == 202) {
          this.getEvents();
        }
      });
    },
  },
};
</script>

<style>

</style>