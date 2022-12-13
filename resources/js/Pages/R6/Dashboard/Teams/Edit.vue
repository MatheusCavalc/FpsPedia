<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps(['team', 'image']);

let sub = []

function onChange(event) {
    if (event.target.value == 'America') {
        sub = ['North America', 'Brazil', 'Latin America North', 'Latin America South'];
    } else if (event.target.value == 'EMEA') {
        sub = ['Europe', 'CIS', 'Turkey', 'Middle East & Africa'];
    } else if (event.target.value == 'Asia Pacific') {
        sub = ['Korea', 'Japan', 'Southeast Asia', 'South Asia', 'China', 'Oceania'];
    }
    return sub;
}

const form = useForm({
    name: props.team.name,
    region: props.team.region,
    sub_region: props.team.sub_region,
    status: props.team.status,
    media: props.team.media,
    location: props.team.location,
    overview: props.team.overview,
    game: 'rainbowsix',
    view: true
})

const submit = () => {
    Inertia.post(`/dashboard/rainbowsix/teams/update/${props.team.id}`, {
        _method: 'put',
        name: form.name,
        region: form.region,
        sub_region: form.sub_region,
        status: form.status,
        media: form.media,
        location: form.location,
        overview: form.overview,
        game: 'rainbowsix',
        view: true
    })
}

</script>

<template>
    <Head title="Create Player" />

    <AdminLayout>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h1 class="text-3xl">Edit Team</h1>

                        <form @submit.prevent="submit">

                                <div class="mb-3">
                                    <InputLabel for="name" value="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <TextInput id="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="form.name" required />
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="region" value="Region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <select id="region" @change="onChange($event)" v-model="form.region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected disabled>Choose a region</option>
                                        <option value="America">America</option>
                                        <option value="EMEA">EMEA</option>
                                        <option value="Asia Pacific">Asia Pacific</option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.region" />
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="sub_region" value="Sub Region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <select id="sub_region" v-model="form.sub_region" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected disabled>Choose a Sub Region</option>
                                        <option v-for="sub_region in sub" :value="sub_region">{{ sub_region }}</option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.sub_region" />
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="status" value="Status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <select id="status" v-model="form.status" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="" selected disabled>Choose a status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <InputError class="mt-2" :message="form.errors.status" />
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="media" value="Media" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <div class="m-2 p-2">
                                        <img :src="image" class="w-32 h-32">
                                    </div>
                                    <TextInput  id="media"
                                                type="file"
                                                @input="form.media = $event.target.files[0]"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                required />
                                    <InputError class="mt-2" :message="form.errors.media" />
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="location" value="Location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <TextInput id="location" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                v-model="form.location" required />
                                    <InputError class="mt-2" :message="form.errors.location" />
                                </div>

                                <div class="mb-3">
                                    <InputLabel for="overview" value="Overview" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                                    <TextInput id="overview" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                v-model="form.overview" required />
                                    <InputError class="mt-2" :message="form.errors.overview" />
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
