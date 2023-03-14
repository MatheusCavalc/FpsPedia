<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import PlayersTable from '@/Components/PlayersTable.vue';
    import THead from '@/Components/THead.vue';
    import TData from '@/Components/TData.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';

    const { filters } = defineProps(['tournaments', 'trendings'])

</script>

<template>
  <MainLayout :game="tournaments[0].game" :trendings="trendings">
    <div class="py-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <PlayersTable>
                    <template #headColumns>
                            <THead type="first" label="Status"/>
                            <THead type="first" label="Tier"/>
                            <THead type="first" label="Name"/>
                            <THead type="first" label="Prize"/>
                            <THead type="first" label="P#"/>
                            <THead type="first" label="Location"/>
                            <THead type="first" label="Wiiner"/>
                            <THead type="first" label="Runner-up"/>
                    </template>
                    <template #tableRows>
                        <tr v-for="(tournament, index) in tournaments" :key="tournament.id">
                            <TData type="first">
                                {{ tournament.status }}
                            </TData>
                            <TData type="first">
                                {{ tournament.tier }}
                            </TData>
                            <TData type="first">
                                {{ tournament.name }}
                            </TData>
                            <TData type="first">
                                {{ tournament.prize }}
                            </TData>
                            <TData type="first">
                                {{ tournament.participants_number }}
                            </TData>
                            <TData type="first">
                                {{ tournament.location }}
                            </TData>
                            <TData type="first">
                                {{ tournament.winner }}
                            </TData>
                            <TData type="first">
                                {{ tournament.runner_up }}
                            </TData>
                        </tr>
                    </template>
                </PlayersTable>
            </div>
        </div>
    </div>
  </MainLayout>
</template>
