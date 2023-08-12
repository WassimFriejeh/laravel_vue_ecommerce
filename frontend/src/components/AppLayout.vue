<template>
  <div v-if="currentUser.id" class="flex min-h-full min-w-full">
    <!-- sidebar -->

    <sidebar :class="{ '-ml-[200px]': !sidebarOpened }" />

    <div class="flex-col flex-1 w-full">
      <!-- navbar -->

      <navbar @toggle-sidebar="toggleSidebar" />

      <!-- dashboard -->

      <main class="p-6 bg-gray-200">
        <div class="p-4 rounded bg-white">
          <router-view></router-view>
        </div>
      </main>
    </div>
  </div>
  <div v-else class="min-h-full bg-gray-200 flex items-center justify-center">
    <Spinner/>
  </div>
</template>

<script setup>
import { ref, computed, onMounted, onUnmounted } from "vue";
import Sidebar from "./Sidebar.vue";
import navbar from "./navbar.vue";
import store from "../store";

// const currentUser = computed(() => store.state.user.data);

const props = defineProps({
  title: {
    type: String,
    default: "haha",
  },
});

const currentUser = computed(() => store.state.user.data);

onMounted(() => {
  store.dispatch("getCurrentUser");
  window.removeEventListener("resize", handlesidebarOpened);
});

onMounted(() => {
  handlesidebarOpened();
  window.addEventListener("resize", handlesidebarOpened);
});

function handlesidebarOpened() {
  if (window.outerWidth <= 786) {
    sidebarOpened.value = false;
  } else {
    sidebarOpened.value = true;
  }
}
const sidebarOpened = ref(true);
function toggleSidebar() {
  sidebarOpened.value = !sidebarOpened.value;
}
</script>
<style ></style>
