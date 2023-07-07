<template>

  <header class="flex justify-between items-center h-16 p-4 shadow bg-white w-full">

    <button @click="emit('toggle-sidebar')" class=" flex items-center justify-center rounded transition-colors w-8 h-8  tex-gray-700 hover:bg-black/10">
      <Bars3Icon class="w-6" />
    </button>


    <Menu as="div" class="relative inline-block text-left">

        <MenuButton class="flex items-center">
          <img src="data:image/jpeg;base64,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" alt=""
           class="rounded-full w-8 h-8 mr-2"
          >
          <small>wassim friejeh</small>
          <ChevronDownIcon
            class="ml-2 -mr-1 h-5 w-5 text-violet-200 hover:text-violet-100"
            aria-hidden="true"
          />
        </MenuButton>


      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute right-0 mt-2 w-32 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        >
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
              >
                <UserCircleIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-violet-400"
                  aria-hidden="true"
                />
                Profile
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? 'bg-indigo-500 text-white' : 'text-gray-900',
                  'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                ]"
              >
                <ArrowLeftOnRectangleIcon
                  :active="active"
                  class="mr-2 h-5 w-5 text-violet-400"
                  aria-hidden="true"
                />
                Logout
              </button>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>

  </header>
</template>

<script setup>
import {
  Bars3Icon,
  HomeIcon,
  ListBulletIcon,
  UsersIcon,
  ChartBarIcon,
  UserCircleIcon,
  ArrowLeftOnRectangleIcon
} from "@heroicons/vue/24/outline";

import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";

const emit = defineEmits(['toggle-sidebar'])
</script>

<style scoped>
</style>
