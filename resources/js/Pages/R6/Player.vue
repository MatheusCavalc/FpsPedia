<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import {computed} from "vue";

const props = defineProps(['player', 'trendings', 'image'])

const age = computed(() => {
    let currentDate = new Date();
    let birthDate = new Date(props.player.born);
    let difference = currentDate - birthDate;
    let age = Math.floor(difference/31557600000);
    return age
});

</script>

<template>
 <MainLayout :game="player.game" :trendings="trendings">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-2">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-xl mb-3 dark:text-white">{{player.nickname}}</p>
                    <p class="text-base dark:text-white">{{player.overview}}</p>
                </div>
            </div>
            <div>
                <div class="flex justify-center">
                    <div class="rounded-lg shadow-lg bg-white max-w-sm">
                        <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                        <img class="rounded-t-lg" :src="image" :alt="player.nickname"/>
                        </a>
                        <div class="p-6">
                            <h5 class="text-gray-900 text-xl font-medium mb-2">{{player.nickname}}</h5>
                            <p class="text-gray-700 text-base mb-2">Name: {{player.name}}</p>
                            <p class="text-gray-700 text-base mb-2">Nationality: {{player.nationality}}</p>
                            <p class="text-gray-700 text-base mb-2">Born: {{player.born}} (age {{age}})</p>
                            <p class="text-gray-700 text-base mb-2">Status: {{player.status}}</p>
                            <p v-if="player.team_id" class="text-gray-700 text-base mb-2">Team:
                                <Link :href="route('home.rainbowsix.team', player.team.id)" class="hover:underline hover:">{{player.team.name}}</Link>
                            </p>
                            <p v-if="player.alternate_nicks" class="text-gray-700 text-base mb-2">Alternate Nicks: {{player.alternate_nicks}}</p>
                            <p v-if="player.earnings" class="text-gray-700 text-base mb-2">Approx. Total Winnings: ${{player.earnings}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
 </MainLayout>

</template>
