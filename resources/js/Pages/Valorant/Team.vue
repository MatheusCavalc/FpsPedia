<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';

const props = defineProps(['team'])

</script>

<template>
 <MainLayout :game="team.game">
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
                        <p class="text-gray-700 text-base mb-2">Location: {{team.location}}</p>
                        <p class="text-gray-700 text-base mb-2">Region: {{team.region}}</p>
                        <p class="text-gray-700 text-base mb-2">Sub Region: {{team.sub_region}}</p>
                        <p class="text-gray-700 text-base mb-2 capitalize">Status: {{team.status}}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
 </MainLayout>

</template>
