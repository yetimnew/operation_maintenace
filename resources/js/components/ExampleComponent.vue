<template>
  <div>The distance comes here</div>
</template>

<script>
export default {
  mounted() {
    this.$http.get("/check/" + this.distance_id).then(resp => {
      console.log(resp);
    });
  },
  props: ["distance_id"]
};
</script>

<style>
</style>

