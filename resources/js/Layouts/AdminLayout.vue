<script setup>
    import Dropdown from '@/Components/Dropdown.vue';
    import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>

<!-- component -->
<div class="flex h-screen bg-white">
  <div class="flex-1 flex flex-col overflow-hidden">
    <div class="flex h-full">

      <nav class="flex w-72 h-full">
        <div class="w-full flex mx-auto px-6 py-8">

        <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900">
        <div class="text-gray-100 text-xl">
            <div class="p-2.5 mt-1 flex items-center">
            <h1 class="font-bold text-gray-200 text-[15px] ml-3">FPSpedia Admin</h1>
            </div>
        </div>
        <div class="my-4 bg-gray-600 h-[1px]"></div>

        <template v-if="$page.props.auth.user.editor == 'valorant' || $page.props.auth.user.admin">
        <Dropdown>
        <template #trigger>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Valorant</span>
            <span class="text-sm rotate-180" id="arrow">
            </span>
            </div>
        </div>
        </template>

        <template #content>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
            <Link :href="route('dashboard.valorant.teams.index')">
              <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Teams</h1>
            </Link>
            <Link :href="route('dashboard.valorant.players.index')">
              <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Players</h1>
            </Link>
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Tournaments
            </h1>
        </div>
        </template>
        </Dropdown>
        </template>

        <template v-if="$page.props.auth.user.editor == 'csgo' || $page.props.auth.user.admin">
        <Dropdown>
        <template #trigger>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-gray-200 font-bold">CSGO</span>
            <span class="text-sm rotate-180" id="arrow">
            </span>
            </div>
        </div>
        </template>

        <template #content>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
            <Link :href="route('dashboard.csgo.teams.index')">
              <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Teams</h1>
            </Link>
            <Link :href="route('dashboard.csgo.players.index')">
              <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Players</h1>
            </Link>
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Tournaments
            </h1>
        </div>
        </template>
        </Dropdown>
        </template>

        <template v-if="$page.props.auth.user.editor == 'rainbowsix' || $page.props.auth.user.admin">
        <Dropdown>
        <template #trigger>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <div class="flex justify-between w-full items-center">
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Rainbow Six</span>
            <span class="text-sm rotate-180" id="arrow">
            </span>
            </div>
        </div>
        </template>

        <template #content>
        <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Teams
            </h1>
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Players
            </h1>
            <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
            Tournaments
            </h1>
        </div>
        </template>
        </Dropdown>
        </template>

        <template v-if="$page.props.auth.user.admin">
            <Dropdown>
            <template #trigger>
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
                <div class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">All Contributes</span>
                <span class="text-sm rotate-180" id="arrow">
                </span>
                </div>
            </div>
            </template>

            <template #content>
            <div class="text-left text-sm mt-2 w-4/5 mx-auto text-gray-200 font-bold" id="submenu">
                <Link :href="route('dashboard.contribute.valorant')">
                    <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">Valorant</h1>
                </Link>
                <Link :href="route('dashboard.contribute.csgo')">
                    <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">CSGO</h1>
                </Link>
                <h1 class="cursor-pointer p-2 hover:bg-blue-600 rounded-md mt-1">
                    Rainbow Six
                </h1>
            </div>
            </template>
            </Dropdown>
        </template>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <Link :href="route('logout')" method="post" class="text-[15px] ml-4 text-gray-200 font-bold">Logout</Link>
        </div>
        </div>

        </div>
    </nav>


      <main class="flex flex-col w-full bg-white overflow-x-hidden overflow-y-auto mb-14">
        <div class="flex w-full mx-auto px-6 py-8">
          <div class="flex flex-col w-full h-full text-gray-900 text-xl">

            <!-- Page Content -->
            <main class="m-2 p-8">
                <div v-if="$page.props.flash.message" class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Alert</span>
                    <div>
                        {{ $page.props.flash.message }}
                    </div>
                </div>

                <slot />
            </main>


          </div>
        </div>
      </main>


     </div>
  </div>
</div>
</template>
