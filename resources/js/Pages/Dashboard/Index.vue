<template>
  <h1 class="text-green-500 font-semibold ml-8 mt-6 marquee">{{message}}</h1>
  <div class="grid grid-cols-12">
    <div class="bg-gray-900 col-span-3 ml-6 mt-2 py-2 rounded-xl">
      <div class="flex flex-col mx-4">
        <h6 class="text-green-500 font-semibold underline">Account Details</h6>
        <span class="text-green-500 font-semibold">Username: {{user_data?.display_name}}</span>
        <span class="text-green-500 font-semibold">Email: {{user_data?.email}}</span>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-12">
    <div class=""></div>
  </div>
</template>

<script>
import { onMounted } from "vue";

export default {
  props: {
    user_data: Object
  },
  setup(props) {
    return {
      message: "Larablasts!",
      // this is how to set props to the data object and make it available to methods/hooks (careful not to mutate props directly)
      // user: props.user_data
    };
  },

};

</script>

<style>
    .marquee {
        font-family: "Lobster";
        font-size: 28px
    }
</style>
