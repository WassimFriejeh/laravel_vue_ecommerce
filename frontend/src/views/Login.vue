<template>
  <GuestLayout title="Sign in to your account">
    <form class="space-y-2" method="POST" @submit.prevent="login">
      <label
        for="email"
        class="block text-sm font-medium leading-6 text-gray-900 mb-2"
        >Email address</label
      >
      <div class="">
        <input
          id="email"
          name="email"
          type="email"
          autocomplete="email"
          required=""
          v-model="user.email"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        />
      </div>
      <div class="flex items-center justify-between">
        <label
          for="password"
          class="block text-sm font-medium leading-6 text-gray-900 my-2"
          >Password</label
        >
      </div>
      <div class="">
        <input
          id="password"
          name="password"
          type="password"
          autocomplete="current-password"
          required=""
          v-model="user.password"
          class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        />
      </div>
      <div class="flex items-center justify-between my-2">
        <div class="flex items-center">
          <input
            id="remember-me"
            name="remember-me"
            type="checkbox"
            v-model="user.remember"
          />
          <label
            for="remember-me"
            class="block text-sm font-medium leading-6 text-gray-900 ml-2"
            >Remember me</label
          >
        </div>
        <div class="text-sm">
          <router-link
            :to="{ name: 'requestPassword' }"
            class="font-semibold text-indigo-600 hover:text-indigo-500"
            >Forgot password?</router-link
          >
        </div>
      </div>
      <div>
        <button
          type="submit"
          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
        >
          Sign in
        </button>
      </div>
    </form>
  </GuestLayout>
</template>

<script setup>
import { ref } from "vue";
import GuestLayout from "../components/GuestLayout.vue";
import store from "../store";
import router from "../router";

let loading = ref(false);
let errorMsg = ref("");

const user = {
  email: "",
  password: "",
  remember: false
};

function login() {
  loading.value = true;
  store.dispatch('login', user)
    .then(() => {
      loading.value = false;
      router.push({name: 'app.dashboard'})
    })
    .catch(({response}) => {
      loading.value = false;
      errorMsg.value = response.data.message;
    })
}
</script>
<style scoped></style>
