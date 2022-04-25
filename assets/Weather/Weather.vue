<template>
  <h1>> Recherche de météo par ville.</h1>
  <div class="p-5">
    <SearchForm />
    <hr />
    <Timeline />
  </div>
</template>

<script>

import SearchForm from "./SearchForm";
import Timeline from "./Timeline";

export default {
  components: {
    SearchForm,
    Timeline
  }
};
</script>
