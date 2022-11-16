<template>
  <div>
    <Home />
  </div>
</template>

<script>
import Create from "./Components/Create.vue";
import Home from "./Components/Home.vue";
export default {
  components: { Create, Home },
  mounted() {
    axios.get("/api/test").then((response) => console.log(response));
  },
};
</script>

<style>
</style>