<script setup>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';

    const props = defineProps(['id'])

</script>

<template>
  <MainLayout>
    <div class="py-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <p class="text-2xl">Welcome to FpsPedia {{props.id}}</p>
            </div>
            <div></div>

            <div>
                <Link :href="route('login')" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Teams</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </Link>
            </div>
            <div>
                <!-- route('valorant.players.index') -->
                <Link :href="route('login')" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Players</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </Link>
            </div>
            <div>
                <Link :href="route('login')" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tournaments</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </Link>
            </div>
        </div>
    </div>
  </MainLayout>
</template>
