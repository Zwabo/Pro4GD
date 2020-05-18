<template>
  <div>
    <h2 class="center">My Application</h2>
    <h2>foo</h2>
    <div v-text="message"></div>
    {{ message }}
   <h2>foo</h2>
    <ul>
      <li :key="word.id" v-for="word in words">{{ word }}</li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "A list of words test test",
      words: []
    };
  },
  mounted() {

    let el = document.querySelector("div[data-words]");
    let mywords = el.dataset.words.split(",");

    this.words.push.apply(this.words, mywords);
  }
};
</script>

<style>
.center {
  text-align: center;
}
</style>