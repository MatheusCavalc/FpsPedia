<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

import MainLayout from '@/Layouts/MainLayout.vue';
import Multiselect from 'vue-multiselect';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps(['game', 'teams'])

function teamName({ name, id }) {
    return `${name}`
}

const form = useForm({
    nickname: '',
    name: '',
    nationality: '',
    born: '',
    status: '',
    team_id: '',
    game: props.game,
    view: false
})

const submit = () => {
    form.post(route('contribute.player.store'));
}

</script>

<template>
    <MainLayout :game="game">
    <div class="py-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <p class="text-2xl">Contribute with {{props.game}} player</p>
            </div>
            <div></div>

            <div class="col-span-2">

                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <InputLabel for="nickname" value="Nickname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <TextInput id="nickname" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="form.nickname" required />
                        <InputError class="mt-2" :message="form.errors.nickname" />
                    </div>

                    <div class="mb-3">
                        <InputLabel for="name" value="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <TextInput id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.name" required />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mb-3">
                        <InputLabel for="nationality" value="Nationality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <TextInput id="nationality" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.nationality" required />
                        <InputError class="mt-2" :message="form.errors.nationality" />
                    </div>

                    <div class="mb-3">
                        <InputLabel for="born" value="Born" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <input
                            id="born"
                            v-model="form.born"
                            type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <InputError class="mt-2" :message="form.errors.born" />
                    </div>


                    <div class="mb-3">
                        <InputLabel for="status" value="Status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <select id="status" v-model="form.status" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected disabled>Choose a status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="retired">Retired</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.status" />
                    </div>

                    <div class="mb-3">
                        <InputLabel for="team_id" value="Team" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <Multiselect
                            v-model="form.team_id"
                            :options="teams"
                            placeholder="Select a team"
                            :custom-label="teamName"
                            label="name"
                            track-by="name"
                            @input="teamID"
                            >
                        </Multiselect>
                        <InputError class="mt-2" :message="form.errors.team_id" />
                    </div>

                    <PrimaryButton class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Submit
                    </PrimaryButton>
                </form>
            </div>
        </div>
    </div>
    </MainLayout>


</template>
