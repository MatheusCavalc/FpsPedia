<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    status: '',
    tier: '',
    name: '',
    prize: '',
    participants_number: '',
    location: '',
    winner: '',
    runner_up: '',
    game: 'csgo',
    view: true
})

const submit = () => {
    form.post(route('dashboard.csgo.tournaments.store'));
}

</script>

<template>
    <Head title="Create Tournament" />

    <AdminLayout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h1 class="text-3xl">Create New Tournament</h1>

                        <form @submit.prevent="submit">

                            <div class="mb-3">
                                <InputLabel for="status" value="Status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <select id="status" v-model="form.status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>Choose a status</option>
                                    <option value="Upcoming">Upcoming</option>
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.status" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="tier" value="Tier"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <select id="tier" v-model="form.tier"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>Choose a tier</option>
                                    <option value="S-Tier">Tier-S</option>
                                    <option value="A-Tier">Tier-A</option>
                                    <option value="B-Tier">Tier-B</option>
                                    <option value="C-Tier">Tier-C</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.tier" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="name" value="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="name" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.name" required />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="prize" value="Prize Pool"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="prize" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.prize" required />
                                <InputError class="mt-2" :message="form.errors.prize" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="participants_number" value="Participants Number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="participants_number" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.participants_number" required />
                                <InputError class="mt-2" :message="form.errors.participants_number" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="location" value="Location"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="location" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.location" required />
                                <InputError class="mt-2" :message="form.errors.location" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="winner" value="Winner"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="winner" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.winner" />
                                <InputError class="mt-2" :message="form.errors.winner" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="runner_up" value="Runner Up"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="runner_up" type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.runner_up" />
                                <InputError class="mt-2" :message="form.errors.runner_up" />
                            </div>

                        <PrimaryButton
                            class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Submit
                        </PrimaryButton>
                    </form>

                </div>
            </div>
        </div>
    </div>
</AdminLayout></template>
