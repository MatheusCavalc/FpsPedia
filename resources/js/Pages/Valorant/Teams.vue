<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import PlayersTable from '@/Components/PlayersTable.vue';
    import THead from '@/Components/THead.vue';
    import TData from '@/Components/TData.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';

    const { filters } = defineProps(['teams'])

</script>

<template>
  <MainLayout>
    <div class="py-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">
                <PlayersTable>
                    <template #headColumns>
                            <THead type="first" label="Name"/>
                            <THead type="first" label="Region"/>
                            <THead type="normal" label="Sub Region"/>
                            <THead type="normal" label="Status"/>
                    </template>
                    <template #tableRows>
                        <tr v-for="team in teams" :key="team.id">
                            <TData type="first">
                                <Link :href="route('home.valorant.team', team.id)" class="hover:underline">{{ team.name }}</Link>
                            </TData>
                            <TData type="first">
                                {{ team.region }}
                            </TData>

                            <TData type="normal">
                                {{ team.sub_region }}
                            </TData>

                            <TData type="normal">
                                <p class="capitalize">{{ team.status }}</p>
                            </TData>
                        </tr>
                    </template>
                </PlayersTable>
            </div>
        </div>
    </div>
  </MainLayout>
</template>
