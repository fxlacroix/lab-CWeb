<template>

  <div v-if="loader" class="loader-wrapper">
    <div class="loader"><div></div><div></div><div></div><div></div></div>
    <p>Veuillez patienter...</p>
  </div>

  <div v-if="success">
    <h3>
      En ce moment à {{timeline.location.name}},
      il fait {{timeline.current.tempC}}°c,
      avec des conditions météo: {{timeline.current.condition}}.
    </h3>
    <br />
      <table class="table table-striped mt-4">
        <thead>
        <tr>
          <th scope="col">Jour</th>
          <th scope="col">Température</th>
          <th scope="col">Condition</th>
          <th scope="col">Vent et direction</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="day in timeline.forecast">
          <th scope="row">{{ day.date }}</th>
          <td>{{ day.tempC }}°C</td>
          <td>{{ day.condition }}</td>
          <td>{{ day.wind }}km/h - {{ day.direction }}</td>
        </tr>
        </tbody>
      </table>
  </div>

  <div>
    <div class="alert alert-primary" role="alert">
      <div>
        {{ message }}
      </div>
    </div>
  </div>

</template>

<script>

export default {
  computed: {
    message: function() {
      return this.$store.state.message;
    },
    loader: function() {
      return this.$store.state.loader;
    },
    success: function() {
      return this.$store.state.success;
    },
    timeline: function () {
      return this.$store.state.timeline;
    }
  }
};
</script>
