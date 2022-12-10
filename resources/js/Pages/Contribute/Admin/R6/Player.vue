<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['player'])
</script>

<template>
    <AdminLayout>
        <div class="grid grid-cols-3 gap-4">
            <div></div>
            <div>
                <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" src="https://mdbootstrap.com/img/new/standard/nature/182.jpg" alt=""/>
                    </a>
                    <div class="p-6">
                    <h5 class="text-gray-900 text-xl font-medium mb-2">{{player.nickname}}</h5>
                    <p class="text-gray-700 text-base mb-2">Name: {{player.name}}</p>
                    <p class="text-gray-700 text-base mb-2">Nationality: {{player.nationality}}</p>
                    <p class="text-gray-700 text-base mb-2">Born: {{player.born}}</p>
                    <p class="text-gray-700 text-base mb-2">Team: {{player.team.name}}</p>
                    <p class="text-gray-700 text-base mb-2">Status: {{player.status}}</p>

                    <Link method="put" :href="route('dashboard.contribute.valorant.player.approve', player.id)" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Approve</Link>
                    </div>
                </div>
                </div>
            </div>
            <div></div>
        </div>
    </AdminLayout>
</template>
