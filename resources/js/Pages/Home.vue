<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <Head title="Home" />
  <div class="container mx-auto px-4 py-4">
    <div class="grid grid-cols-3 gap-4">
        <div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://cdn.ome.lt/jBpgpDHUG2MtKr6bgrwcLRLNf9I=/1200x630/smart/extras/conteudos/valorant-riot-games.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 hover:underline"><Link :href="route('index.valorant')">Valorant</Link></div>
                <ul class="list-none">
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Teams</Link></p>
                    <p><Link :href="route('valorant.players.index')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Players</Link></p>
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Tournaments</Link></p>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
            </div>
        </div>
        <div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://cdn.ome.lt/XRQcAob6EvpzetaCZhpJ6APVjZo=/1200x630/smart/extras/conteudos/cs-go-001-1.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 hover:underline"><Link :href="route('index.csgo')">CS:GO</Link></div>
                <ul class="list-none">
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Teams</Link></p>
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Players</Link></p>
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Tournaments</Link></p>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
            </div>
        </div>
        <div>
            <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="https://cdn.ome.lt/mfXGWAfX34sLgrvDRUFOKMIvayw=/1200x630/smart/extras/conteudos/16110.jpg" alt="Sunset in the mountains">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2 hover:underline"><Link :href="route('index.rainbowsix')">Rainbow Six Siege</Link></div>
                <ul class="list-none">
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Teams</Link></p>
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Players</Link></p>
                    <p><Link :href="route('login')" class="text-gray-700 hover:text-sky-400 hover:underline text-base">Tournaments</Link></p>
                </ul>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
            </div>
            </div>
        </div>
    </div>
 </div>

</template>
