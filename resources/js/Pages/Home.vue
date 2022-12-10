<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import HomeLayout from '@/Layouts/HomeLayout.vue';
</script>

<template>
<HomeLayout>
  <Head title="Home" />
  <div class="container mx-auto px-4 py-4">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <Link :href="route('index.valorant')">
                <img class="w-full" src="http://localhost/storage/logos/valorant-logo-image.jpg" alt="Valorant logo">
            </Link>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 hover:underline"><Link :href="route('index.valorant')">Valorant</Link></div>
                <ul class="list-none">
                    <p><Link :href="route('home.valorant.teams')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Teams</Link></p>
                    <p><Link :href="route('home.valorant.players')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Players</Link></p>
                    <p>
                        <Link class="text-gray-700 hover:text-sky-400 hover:underline text-base">
                        Tournaments <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">Soon</span>
                        </Link>
                    </p>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">FPS</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">5v5</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Agents</span>
            </div>
            </div>
        </div>
        <div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <Link :href="route('index.csgo')">
                <img class="w-full" src="http://localhost/storage/logos/csgo-logo-image.jpg" alt="CSGO logo">
            </Link>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 hover:underline"><Link :href="route('index.csgo')">CS:GO</Link></div>
                <ul class="list-none">
                    <p><Link :href="route('home.csgo.teams')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Teams</Link></p>
                    <p><Link :href="route('home.csgo.players')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Players</Link></p>
                    <p>
                        <Link class="text-gray-700 hover:text-sky-400 hover:underline text-base">
                        Tournaments <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">Soon</span>
                        </Link>
                    </p>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">FPS</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">5v5</span>
            </div>
            </div>
        </div>
        <div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <Link :href="route('index.rainbowsix')">
                <img class="w-full" src="http://localhost/storage/logos/rainbowsix-logo-image.jpg" alt="Rainbow Six logo">
            </Link>
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 hover:underline"><Link :href="route('index.rainbowsix')">Rainbow Six Siege</Link></div>
                <ul class="list-none">
                    <p><Link class="text-gray-700 hover:text-sky-400 hover:underline text-base">Teams</Link></p>
                    <p><Link class="text-gray-700 hover:text-sky-400 hover:underline text-base">Players</Link></p>
                    <p>
                        <Link class="text-gray-700 hover:text-sky-400 hover:underline text-base">
                        Tournaments <span class="bg-indigo-100 text-indigo-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-indigo-200 dark:text-indigo-900">Soon</span>
                        </Link>
                    </p>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">FPS</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">5v5</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Operators</span>
            </div>
            </div>
        </div>
    </div>
 </div>
</HomeLayout>
</template>
