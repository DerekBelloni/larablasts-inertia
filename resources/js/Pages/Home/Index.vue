<template>
  <div class="flex flex-col">
    <div class="mt-6 flex justify-center">
      <h1 id="marquee" class="text-green-500 font-semibold ml-4">{{message}}</h1>
    </div>
    <div class="flex justify-center mt-4 ml-4">
      <a href="/Spotify">
        <button class="rounded-xl p-2 font-semibold border border-green-500 text-green-500">
        Login with Spotify
        </button>
      </a>
    </div>
  </div>
</template>
     
      
<script>

import { defineComponent, reactive } from 'vue';

export default defineComponent({
  setup() {
    const state = reactive({
      message: 'Larablasts!',
    });

    return {
      message: state.message,
    };
  },
});
</script>

<style>
    #marquee {
        font-family: "Lobster";
        font-size: 40px
    }
</style>




