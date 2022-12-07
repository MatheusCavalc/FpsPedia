<script setup>
    import MainLayout from '@/Layouts/MainLayout.vue';
    import PlayersTable from '@/Components/PlayersTable.vue';
    import THead from '@/Components/THead.vue';
    import TData from '@/Components/TData.vue';

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
                                {{ player.nickname }}
                            </TData>
                            <TData type="first">
                                {{ player.name }}
                            </TData>

                            <TData type="normal">
                                {{ player.team.name }}
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
