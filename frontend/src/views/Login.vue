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
      <div class="">
        <button
          :disabled="loading"
          type="submit"
          class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
          :class="{
            'cursor-not-allowed': loading,
            'hover:bg-indigo-500': loading,
          }"
        >
          <svg
            v-if="loading"
            class="animate-spin -ml-1 mr-3 h-4 w-4 text-white mt-1"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
          >
            <circle
              class="opacity-25"
              cx="12"
              cy="12"
              r="10"
              stroke="currentColor"
              stroke-width="4"
            ></circle>
            <path
              class="opacity-75"
              fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
          </svg>
          Sign in
        </button>
      </div>
      <div
        v-if="errorMsg"
        class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded"
      >
        {{ errorMsg }}
        <span @click="errorMsg = ''" class="">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="w-6 h-6 transition-colors hover:bg-neutral-600 rounded-full"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </span>
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
  remember: false,
};
function delay(milliseconds) {
  return new Promise((resolve) => setTimeout(resolve, milliseconds));
}
function login() {
  loading.value = true;
  delay(10000);
  store
    .dispatch("login", user)
    .then(() => {
      loading.value = false;
      router.push({ name: "app.dashboard" });
    })
    .catch(({ response }) => {
      loading.value = false;
      errorMsg.value = response.data.message;
    });
}
</script>
<style scoped></style>
