<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import axios from "axios";
import {onMounted, ref} from "vue";
import { PhCheckFat } from "@phosphor-icons/vue";
import Button from "@/components/ui/button/Button.vue";
import { useHead } from '@vueuse/head';
import { Link } from '@inertiajs/vue3'
import { route } from 'ziggy-js'
import DialogContent from "@/components/ui/dialog/DialogContent.vue";
import {DialogRoot} from "reka-ui";
import DialogTitle from "@/components/ui/dialog/DialogTitle.vue";
import {useDialog} from "@/composables/useModal";
import RoomModal from "@/components/myComponent/ui/Modal/RoomModal.vue";

const rooms = ref([]);
const room = ref(null);
const getRooms = async ()=>{
    const response =  await axios.get('/room');
    rooms.value = response.data.rooms;
}
onMounted(async ()=>{
    await getRooms();
})

useHead({
    title: 'Dream Palace - Home page',
    meta: [
        { name: 'description', content: 'Opis stranice' },
        { name: 'keywords', content: 'vue, inertia, laravel' },
    ],
    link: [
        {
            rel: 'icon',
            type: 'image/png',
            href: '/assets/img/logo.png'
        }
    ]
});


const {
    dialog,
    visible,
    openModal,
    handleDialogUpdate,
    updateLightboxState
} = useDialog()

function openRoomModal(rooms) {
    room.value = rooms;
    openModal(RoomModal, 'Dodatne informacije', { room: room.value })
}

</script>
<template>
    <AppLayout>
    <!--Napravi za slider komponentu! -->
        <div>
            <div id="indicators-carousel" class="relative w-full !h-[60vh] md:!h-[70vh] z-10" data-carousel="slide" data-carousel-interval="5000">
                <div class="relative !h-full overflow-hidden md:h-96">
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <img src="/assets/img/sliderSlika1.JPG" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Spavaća soba u DreamPlace">
                        <div class="absolute flex-col top-0 left-0 w-full h-full flex items-center justify-center flex-wrap bg-black/40">
                            <h2 class="animate-fade-up w-[80%] mx-auto text-white text-xl sm:text-2xl md:text-4xl font-bold text-center px-4 text-shadow-md">
                                {{ $t('slider1.sliderTitle') }}
                            </h2>
                            <div class="animate-fade-up w-[40%] mx-auto text-center">
                                <button class="!text-sm sm:!text-lg bg-yellow-500 color-gray-950 px-3 py-2 mt-5 rounded text-gray-950 font-bold"><Link :href="route('locations')">{{$t('slider1.buttonText')}}</Link></button>
                            </div>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/assets/img/sliderSlika2.JPG" class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        <div class="absolute flex-col top-0 left-0 w-full h-full flex items-center justify-center flex-wrap bg-black/40">
                            <h2 class="animate-fade-up w-[80%] mx-auto text-white text-xl sm:text-2xl md:text-4xl font-bold text-center px-4 text-shadow-md">
                                {{ $t('slider2.sliderTitle') }}
                            </h2>
                            <div class="animate-fade-up w-[40%] mx-auto text-center">
                                <button class="!text-sm sm:!text-lg bg-yellow-500 color-gray-950 px-3 py-2 mt-5 rounded text-gray-950 font-bold">
                                    <Link :href="route('locations')">{{$t('slider2.buttonText')}}</Link>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-yellow-500/30 ">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-yellow-500/30">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
                </button>
            </div>
<!--            Sekcija sa specifikacijama-->
            <section class="bg-white bg-gray-900 dark:bg-gray-900 py-10">
                <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">

                        <div>
                            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">5</h2>
                            <p class="mt-2 text-lg font-medium text-gray-500 dark:text-gray-400">Apartmans</p>
                        </div>

                        <div>
                            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">1</h2>
                            <p class="mt-2 text-lg font-medium text-gray-500 dark:text-gray-400">Locations</p>
                        </div>

                        <div>
                            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">2025</h2>
                            <p class="mt-2 text-lg font-medium text-gray-500 dark:text-gray-400">Since</p>
                        </div>

                        <div>
                            <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white">12</h2>
                            <p class="mt-2 text-lg font-medium text-gray-500 dark:text-gray-400">Total beds</p>
                        </div>

                    </div>
                </div>
            </section>


            <div class="img-background">
                <!--            Ovo ce biti sekcija za probu, koja ce prikazati par soba-->
                <div class="dreamplace-edition">
                    <div class="flex w-[80%] mx-auto flex-wrap text-gray-950 py-9">
                        <div class="edition-about sm:w-full md:w-1/2 lg:w-1/2">
                            <div class="header-block mb-9">
                                <h2 class="text-2xl">Book Direct & Save</h2>
                                <span class="text-yellow-600">save up to 30 eur per day</span>
                            </div>
                            <ul>
                                <li class="flex flex-wrap mb-5 mt-5 md:mb-7 md:mt-7">
                                    <PhCheckFat :size="32" class="mr-5"/>
                                    <span class="font-bold">Free Wifi
                                        <span class="block italic font-normal">Guaranteed at all locations</span>
                                    </span>
                                </li>
                                <li class="flex flex-wrap mb-7 mt-7">
                                    <PhCheckFat :size="32" class="mr-5"/>
                                    <span class="font-bold">Free 0.7L Water, Tea & Coffee
                                        <span class="block italic font-normal">During your stay</span>
                                    </span>
                                </li>
                                <li class="flex flex-wrap mb-7 mt-7">
                                    <PhCheckFat :size="32" class="mr-5"/>
                                    <span class="font-bold">Upgrade Suites
                                        <span class="block italic font-normal">Upon Availability</span>
                                    </span>
                                </li>
                                <li class="flex flex-wrap mb-7 mt-7">
                                    <PhCheckFat :size="32" class="mr-5"/>
                                    <span class="font-bold">
                                        Stay Late
                                        <span class="block italic font-normal">Upon Availability</span>
                                    </span>
                                </li>
                                <li class="flex flex-wrap mb-7 mt-7">
                                    <PhCheckFat :size="32" class="mr-5"/>
                                    <span class="font-bold">
                                        Contribution in Dominic charity
                                        <span class="block italic font-normal">We Support Children Of All Ages With a Small Amount of All Direct Reservation.</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="edition-img bg-gray-50 text-gray-950 sm:w-full md:w-1/2 lg:w-1/2 p-4 md:p-8 shadow-md rounded-md">
                            <div class="text-center mb-4">
                                <h2 class="text-2xl">DreamPlace EDITION</h2>
                                <span class="italic text-gray-500">Our new fourth location is OPEN</span>
                            </div>
                            <div class="img-block w-[75%] mx-auto">
                                <img class="max-w-full" src="/assets/img/lobby.jpg" alt="proba"/>
                            </div>
                            <h3 class="text-center font-bold text-xl my-5">Apartmani Dream Palace</h3>
                            <div class="text-block !w-full md:!w-[75%] mx-auto !text-center md:!text-left">
                                <p>Dobrodošli u Apartmane Dream Palace, smeštaj koji pruža vrhunski komfor i savršenu lokaciju za vaš
                                    boravak u Beogradu.</p>
                                <p>Naša ponuda obuhvata pet moderno opremljenih apartmana, koji su idealni kako
                                    za turiste, tako i za poslovne goste.</p>
                                <button class="rounded bg-yellow-500 color-gray-950 p-3 mt-5">Book now</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="w-[80%] mx-auto mt-15 pb-15">
                    <div class="flex flex-wrap shadow-lg">
                        <div class="relative !w-full md:!w-1/2 h-[45vh] overflow-hidden
                                    rounded-tl-lg rounded-tr-lg
                                    md:rounded-tl-lg md:rounded-tr-none md:rounded-bl-lg
                                    shadow-lg">
                            <div class="absolute w-full h-full bg-[linear-gradient(to_top,rgba(0,0,0,0.4)),url('/assets/img/taxiDriver.jpg')] bg-cover bg-center">
                            </div>
                            <div class="absolute !top-[20%] md:!top-[40%] w-[80%] mx-auto h-max inset-0 text-white text-xl md:text-2xl font-bold text-center px-4">
                                <h4 class="text-shadow-md">Prevoz od aerodroma</h4>
                                <p class="w-full text-sm text-gray-300 text-shadow-md mt-5">Our fleet consists of Audi A6 / Skoda Superb / Pasat B8 limousines which are equipped
                                    with the latest technology,
                                    including free WIFI for our clients comfort and relaxation while being transported in luxury.</p>
                            </div>
                        </div>
                        <div class="relative !w-full md:!w-1/2 h-[45vh] overflow-hidden
                                    rounded-bl-lg rounded-br-lg
                                    md:rounded-tr-lg md:rounded-tl-none md:rounded-bl-none
                                    shadow">
                            <div class="absolute w-full h-full bg-[linear-gradient(to_top,rgba(0,0,0,0.3)),url('/assets/img/belgrade.jpg')] bg-cover bg-contain">
                            </div>
                            <div class="absolute !top-[34%] !left-[23%] md:!top-[45%] md:!left-[35%] w-max h-max inset-0 text-white text-xl md:text-2xl font-bold text-center px-4">
                                <h4 class="text-shadow-md">Prvi put ovde?</h4>
                                <button class="cursor-pointer text-base mt-5 border border-yellow-500 text-yellow-500 hover:bg-yellow-600 hover:text-gray-900 transition-colors duration-300 px-4 py-2 rounded-md font-semibold">
                                    <Link :href="route('community')">Saznaj više</Link>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            <div class="dreamplace-apartmans">
                <div class="header-content text-center bg-transparent text-gray-950 py-15 text-shadow-md">
                    <h3 class="font-bold text-xl sm:text-2xl">Naša ponuda Apartmana</h3>
                    <h4 class="italic text-lg sm:text-xl">Uživajte u udobnosti i stilu na vrhunskom nivou</h4>
                </div>
                <div class="block bg-transparent">
                    <div class="apartmans flex flex-wrap justify-center">
                        <template v-if="rooms && rooms.length">
                            <div v-for="room in rooms" :key="room.id"  class="apartman !w-full sm:!w-1/3 md:!w-1/3 xl:!w-1/5 relative">
                                <img class="max-w-full object-cover" :src="'/storage/my/'+room.main_img" :alt="room.main_img"/>
                                <div class="content absolute top-0 left-0 right-0 bottom-0 bg-stone-950/60 text-gray-50">
                                    <div class="text-center relative top-[30%] sm:top-[10%] md:top-[25%] xl:top-[30%]" >
                                        <h3 class="text-2xl sm:text-3xl md:text-2xl">{{room.name}}</h3>
                                        <p>Belgrade - {{room.address}}</p>
                                        <button @click="openRoomModal(room)" class="rounded border-2 border-gray-50 color-gray-950 py-2 px-3 mt-5 cursor-pointer">Learn more</button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <DialogRoot :open="dialog.isDialogOpen" @update:open="handleDialogUpdate">
                    <DialogContent class="!w-[85vw] !max-w-[1200px] !h-[90vh] md:!h-auto !overflow-y-auto scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-gray-900 z-100">
                        <DialogTitle><h2>{{dialog.dialogTitle}}</h2></DialogTitle>
                        <component :is="dialog.dialogComponent"
                                   v-bind="dialog.dialogProps"
                                   @lightbox-state="updateLightboxState">
                        </component>
                    </DialogContent>
                </DialogRoot>
            </div>
            </div>

        </div>
    </AppLayout>
</template>
<style scoped>
.img-background{
    background-image: linear-gradient(to top,rgba(255,255,255,0.86),rgba(255,255,255,0.86)),url("/assets/img/backgroundWallpapers.jpg");
}
</style>
