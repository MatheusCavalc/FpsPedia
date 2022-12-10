<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import PlayersTable from '@/Components/PlayersTable.vue';
    import THead from '@/Components/THead.vue';
    import TData from '@/Components/TData.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';

    const { filters } = defineProps(['players'])

</script>

<template>
  <MainLayout>
    <div class="py-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <PlayersTable>
                    <template #headColumns>
                            <THead type="first" label="ID"/>
                            <THead type="first" label="Real Name"/>
                            <THead type="normal" label="Team"/>
                            <THead type="normal" label="Links"/>
                    </template>
                    <template #tableRows>
                        <tr v-for="(player, index) in players" :key="player.id">
                            <TData type="first">
                                <Link :href="route('home.valorant.player', player.id)" class="hover:underline">{{ player.nickname }}</Link>
                            </TData>
                            <TData type="first">
                                {{ player.name }}
                            </TData>

                            <TData type="normal">
                                <Link :href="route('home.valorant.team', player.team.id)" class="hover:underline">
                                    {{ player.team.name }}
                                </Link>
                            </TData>

                            <TData type="normal">
                                {{ player.name }}
                            </TData>
                        </tr>
                    </template>
                </PlayersTable>
            </div>
        </div>
    </div>
  </MainLayout>
</template>
