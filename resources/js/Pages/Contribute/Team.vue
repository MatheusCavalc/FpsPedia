<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps(['game'])

const form = useForm({
    name: '',
    region: '',
    sub_region: '',
    status: '',
    media: '',
    location: '',
    overview: '',
    founders: '',
    ceo: '',
    earnings: '',
    game: props.game,
    view: false
})

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

const submit = () => {
    form.post(route('contribute.team.store'));
}

</script>

<template>
    <MainLayout :game="game">
    <div class="py-6">
        <div class="grid grid-cols-3 gap-4">
            <div class="col-span-2">
                <p class="text-2xl">Contribute with {{props.game}} team</p>
            </div>
            <div></div>

            <div class="col-span-2">

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
                        <TextInput  id="media"
                                    type="file"
                                    @input="form.media = $event.target.files[0]"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    />
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

                    <div class="mb-3">
                        <InputLabel for="founders" value="Founders" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <TextInput id="founders" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.founders" />
                        <InputError class="mt-2" :message="form.errors.founders" />
                    </div>

                    <div class="mb-3">
                        <InputLabel for="ceo" value="CEO" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <TextInput id="ceo" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.ceo" />
                        <InputError class="mt-2" :message="form.errors.ceo" />
                    </div>

                    <div class="mb-3">
                        <InputLabel for="earnings" value="Earnings" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black" />
                        <TextInput id="earnings" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    v-model="form.earnings" />
                        <InputError class="mt-2" :message="form.errors.earnings" />
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

