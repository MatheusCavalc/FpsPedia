<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Link } from '@inertiajs/inertia-vue3';
import TeamPlayersTable from '@/Components/TeamPlayersTable.vue';
import THead from '@/Components/THead.vue';
import TData from '@/Components/TData.vue';

const props = defineProps(['team', 'trendings', 'image', 'players'])

</script>

<template>
 <MainLayout :game="team.game" :trendings="trendings">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <p class="text-xl mb-3 dark:text-white">{{team.name}}</p>
                    <p class="text-base dark:text-white">{{team.overview}}</p>
                </div>

                <div class="mt-6">
                    <div>
                        <p class="text-xl">Players Active</p>
                        <hr class="h-px bg-white border-0 dark:bg-gray-800">

                        <div class="mt-4">
                            <TeamPlayersTable>
                                <template #headColumns>
                                    <THead type="normal" label="Nationality"/>
                                    <THead type="first" label="Nick"/>
                                    <THead type="normal" label="Name"/>
                                </template>
                                <template #tableRows>
                                <tr v-for="player in players" :key="player.id">
                                    <template v-if="player.status == 'active'">
                                    <TData type="first">
                                        {{player.nationality}}
                                    </TData>
                                    <TData type="first">
                                        <Link :href="route('home.valorant.player', player.id)" class="hover:underline">
                                            {{ player.nickname }}
                                        </Link>
                                    </TData>

                                    <TData type="normal">
                                        {{ player.name }}
                                    </TData>
                                    </template>
                                </tr>
                            </template>
                        </TeamPlayersTable>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p class="text-xl">Players Inactive</p>
                        <hr class="h-px bg-white border-0 dark:bg-gray-800">

                        <div class="mt-4">
                            <TeamPlayersTable>
                                <template #headColumns>
                                    <THead type="normal" label="Nationality"/>
                                    <THead type="first" label="Nick"/>
                                    <THead type="normal" label="Name"/>
                                </template>
                                <template #tableRows>
                                <tr v-for="player in players" :key="player.id">
                                    <template v-if="player.status == 'inactive'">
                                    <TData type="first">
                                        {{player.nationality}}
                                    </TData>
                                    <TData type="first">
                                        <Link :href="route('home.valorant.player', player.id)" class="hover:underline">
                                            {{ player.nickname }}
                                        </Link>
                                    </TData>

                                    <TData type="normal">
                                        {{ player.name }}
                                    </TData>
                                    </template>
                                </tr>
                            </template>
                        </TeamPlayersTable>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex justify-center">
                <div class="rounded-lg shadow-lg bg-white max-w-sm">
                    <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                    <img class="rounded-t-lg" :src="image" :alt="team.name"/>
                    </a>
                    <div class="p-6">
                        <h5 class="text-gray-900 text-xl font-medium mb-2">{{team.name}}</h5>
                        <p class="text-gray-700 text-base mb-2">Location: {{team.location}}</p>
                        <p class="text-gray-700 text-base mb-2">Region: {{team.region}}</p>
                        <p class="text-gray-700 text-base mb-2">Sub Region: {{team.sub_region}}</p>
                        <p class="text-gray-700 text-base mb-2 capitalize">Status: {{team.status}}</p>
                        <p v-if="team.founders" class="text-gray-700 text-base mb-2">Founders: {{team.founders}}</p>
                        <p v-if="team.ceo" class="text-gray-700 text-base mb-2">CEO: {{team.ceo}}</p>
                        <p v-if="team.earnings" class="text-gray-700 text-base mb-2">Approx. Total Winnings: ${{team.earnings}}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
 </MainLayout>

</template>
