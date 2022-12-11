<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const form = useForm({
    email: '',
    game: ''
})

const submit = () => {
    form.put(route('dashboard.new.editor'))
}

</script>

<template>
    <AdminLayout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h1 class="text-3xl">Change Editors Roles</h1>

                        <form @submit.prevent="submit">

                            <div class="my-3">
                                <InputLabel for="email" value="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <TextInput id="email" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="form.email" required />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="game" value="Game" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                <select id="game" v-model="form.game" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>Choose a game</option>
                                    <option value="none">None</option>
                                    <option value="valorant">Valorant</option>
                                    <option value="csgo">CSGO</option>
                                    <option value="rainbowsix">Rainbow Six</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.game" />
                            </div>

                            <PrimaryButton class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Submit
                            </PrimaryButton>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
