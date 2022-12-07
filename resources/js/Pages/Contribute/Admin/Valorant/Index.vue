<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['players', 'teams'])
</script>

<template>
    <AdminLayout>
      <div class="ml-2">
        <div class="grid grid-cols-2 gap-4">
            <div class="text-center">
                <h1 class="mb-3">Players</h1>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="player in players.data" :key="player.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <Link :href="route('dashboard.contribute.valorant.player', player.id)">
                                        {{player.name}}
                                    </Link>
                                </th>
                                <td class="py-4 px-6">
                                    <Link :href="route('dashboard.contribute.valorant.player.destroy', player.id)" method="delete" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" as="button">
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center">
                <h1 class="mb-3">Teams</h1>
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="team in teams.data" :key="team.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{team.name}}
                                </th>
                                <td class="py-4 px-6">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
     </div>
    </AdminLayout>
</template>
