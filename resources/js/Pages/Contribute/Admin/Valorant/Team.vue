<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['team'])
</script>

<template>
    <AdminLayout>
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-xl mb-3 dark:text-white">{{team.name}}</p>
                    <p class="text-base dark:text-white">{{team.overview}}</p>
                </div>
            </div>
            <div>
                <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/182.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{team.name}}</h5>
                    <p class="text-gray-700 text-base mb-2">Status: {{team.location}}</p>
                    <p class="text-gray-700 text-base mb-2">Name: {{team.region}}</p>
                    <p class="text-gray-700 text-base mb-2">Nationality: {{team.sub_region}}</p>
                    <p class="text-gray-700 text-base mb-2">Born: {{team.status}}</p>

                    <Link method="put" :href="route('dashboard.contribute.valorant.team.approve', team.id)" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Approve</Link>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
