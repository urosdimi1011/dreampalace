<template>
    <AppLayout>
        <div class="img-background">
            <div class="banner">
                <div class="content bg-image text-center text-xl md:text-4xl bg-size-[100%]">
                    <h1 class="!w-[80%] md:!w-1/2 mx-auto relative !top-[40%] md:!top-[40%] text-shadow-lg/20 animate-fade-up text-gray-50">Šta posetiti u Beogradu?</h1>
                </div>
            </div>
        <section class="w-4/5 mx-auto py-10 text-gray-950">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="attraction in attractions" :key="attraction.name" class="bg-white rounded-lg shadow-md overflow-hidden transition-transform transform hover:scale-105">
                    <img :src="attraction.image" :alt="attraction.name" class="w-full h-90 object-cover">
                    <div class="p-4">
                        <h3 class="text-xl font-semibold mb-2">{{ attraction.name }}</h3>
                        <p class="text-gray-600">{{ attraction.description }}</p>
                        <ul class="flex items-center gap-2 mt-4 text-gray-700 text-sm">
                            <li class="flex items-center gap-1">
                                <PhPersonSimpleWalk :size="20" class="text-blue-600" />
                                <span>{{ attraction.walkingTime }} hoda</span>
                            </li>
                            <li>
                                <a :href="attraction.mapLink" target="_blank" class="text-blue-600 hover:underline flex items-center gap-1">
                                    <PhMapTrifold :size="20" /> Pogledaj na mapi
                                </a>
                            </li>
                        </ul>

                        <p v-if="attraction.type" class="text-gray-500 text-sm mt-1 italic">
                            {{ attraction.type }} • {{ attraction.distance }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/layouts/AppLayout.vue";
import {PhMapTrifold, PhPersonSimpleWalk} from "@phosphor-icons/vue";

const attractions = [
    {
        name: 'Kalemegdanska tvrđava',
        image: '/assets/img/kalemegdan.jpg',
        description: 'Istorijska tvrđava sa pogledom na ušće Save u Dunav.',
        walkingTime: '10 min',
        type: 'Istorijska lokacija',
        distance: '1.2 km',
        mapLink: 'https://www.google.com/maps/dir/Your+Apartment+Address/Kalemegdan+Fortress'

    },
    {
        name: 'Knez Mihailova ulica',
        image: '/assets/img/knez_mihailova.jpg',
        description: 'Glavna pešačka zona sa brojnim prodavnicama i kafićima.',
        walkingTime: '10 min',
        type: 'Istorijska lokacija',
        distance: '1.2 km',
        mapLink: 'https://www.google.com/maps/dir/Your+Apartment+Address/Knez+Mihailova+Street'
    },
    {
        name: 'Skadarlija',
        image: '/assets/img/skadarlija.jpg',
        description: 'Boemska četvrt sa tradicionalnim restoranima i živom muzikom.',
        walkingTime: '10 min',
        type: 'Istorijska lokacija',
        distance: '1.2 km',
        mapLink: 'https://www.google.com/maps/dir/Your+Apartment+Address/Knez+Mihailova+Street'

    },
    {
        name: 'Hram Svetog Save',
        image: '/assets/img/hram_svetog_save.jpg',
        description: 'Jedan od najvećih pravoslavnih hramova na Balkanu, impresivne arhitekture.',
        walkingTime: '10 min',
        type: 'Istorijska lokacija',
        distance: '1.2 km',
        mapLink: 'https://www.google.com/maps/dir/Your+Apartment+Address/Knez+Mihailova+Street'
    }
    // Dodaj ostale atrakcije
];
</script>
<style scoped>
.img-background{
    background-image: linear-gradient(to top,rgba(255,255,255,0.86),rgba(255,255,255,0.86)),url("/assets/img/backgroundWallpapers.jpg");
}
.bg-image{
    background-image: linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.5),rgba(0,0,0,0.5))
    ,url("/assets/img/belgradeWallpaper.jpg");
    height: 28vh;
    background-position: center ;
    background-repeat: no-repeat;
    //background-size: 100% 400%;
//background-size: cover;
//background-attachment: fixed;
}
</style>
