<template>
  <form  class="col-3" ref="form">
    <div class="input-group">
      <input v-on:keydown.enter.prevent='submit' type="search" id="search-input" class="form-control rounded" placeholder="Recherche" aria-label="Search" aria-describedby="search-addon" />
      <button v-on:click="submit" type="button" class="btn btn-outline-primary">rechercher</button>
    </div>
  </form>
</template>

<script>
export default {
  methods: {
    submit: function (e) {
      let $input = $("#search-input"),
          search = $input.val();

      this.$store.commit('setSearch', search);
      this.$store.dispatch('find', search).then((searchParams) => {
        this.$store.commit('setSearchResults', searchParams)
      });
      input.preventDefault();
    }
  }
};
</script>
