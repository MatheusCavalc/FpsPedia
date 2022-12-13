<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
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
        <div class="grid grid-cols-3 gap-4">
            <div></div>
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
                            <p class="text-gray-700 text-base mb-2">Team: {{player.team.name}}</p>
                            <p class="text-gray-700 text-base mb-2">Status: {{player.status}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div></div>
        </div>
 </MainLayout>

</template>
