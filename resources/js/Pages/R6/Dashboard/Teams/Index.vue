<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['teams']);

</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="flex justify-between mb-6">

                            <div class="flex items-center">
                                <h1 class="text-3xl">Rainbow Six Teams</h1>

                                <Link :href="route('dashboard.rainbowsix.teams.create')" class="text-blue-500 text-sm ml-2">New Team</Link>
                            </div>

                            <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg">
                        </div>

                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Region
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Sub Region
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Status
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="team in teams.data" :key="team.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ team.name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{team.region}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{team.sub_region}}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{team.status}}
                                        </td>
                                        <td class="py-4 px-6 text-right">
                                            <Link :href="route('dashboard.rainbowsix.teams.edit', team.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <Pagination :paginator="teams" />
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
