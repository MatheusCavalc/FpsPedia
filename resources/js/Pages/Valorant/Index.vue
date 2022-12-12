<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';

    const props = defineProps(['id', 'players', 'teams'])

</script>

<template>
  <MainLayout :game="id" :trendings="players">
    <div class="py-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-3">
                <p class="text-2xl">Welcome to FPSpedia Valorant</p>
            </div>

            <div>
                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <Link :href="route('home.valorant.teams')" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">Teams</Link>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        Here you will find the main teams in competitive Valorant.
                    </p>

                    <div class="pt-5">
                        <p class="text-center text-lg text-gray-900 dark:text-white">
                            Last Updates
                        </p>
                        <ul class="list-none" v-for="team in teams">
                        <Link :href="route('home.valorant.team', team.id)" class="mb-3 text-gray-900 dark:text-white hover:underline">{{ team.name }}</Link>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <Link :href="route('home.valorant.players')" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">Players</Link>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        Here you will find the main players who play or have played in competitive Valorant.
                    </p>

                    <div class="pt-5">
                        <p class="text-center text-lg text-gray-900 dark:text-white">
                            Last updates
                        </p>
                        <ul class="list-none" v-for="player in players">
                        <Link :href="route('home.valorant.player', player.id)" class="mb-3 text-gray-900 dark:text-white hover:underline">{{ player.nickname }}</Link>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <Link class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        Tournaments <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">Soon</span>
                    </h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">
                        All major tournaments in different tiers.
                    </p>
                </Link>
            </div>
        </div>
    </div>
  </MainLayout>
</template>
