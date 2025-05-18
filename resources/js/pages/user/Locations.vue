<script setup lang="ts">
import AppLayout from "@/layouts/AppLayout.vue";
import Room from "@/components/myComponent/ui/Room.vue";
import {onMounted, ref} from "vue";
import axios from "axios";
import { useHead } from '@vueuse/head';
import {PhAirplane, PhCar, PhCheckFat, PhForkKnife, PhMapPinArea, PhMoney, PhShoppingCart} from "@phosphor-icons/vue";

const rooms = ref([]);
const getRooms = async ()=>{
    const response =  await axios.get('/room');
    rooms.value = response.data.rooms;
}
onMounted(async ()=>{
    await getRooms();
})
useHead({
    title: 'Dream palace - Apartmans',
    meta: [
        { name: 'description', content: 'Book your stay at Dream Palace Apartments in Belgrade. Enjoy free parking, airport transfer, on-site supermarket, and exclusive benefits for direct reservations.' },
        { name: 'keywords', content: 'apartments Belgrade, Dream Palace apartments, accommodation Belgrade center, apartments with parking Belgrade, apartments near airport, luxury apartments Belgrade, direct booking benefits, transfer from airport, Belgrade stay' },
    ],
    link: [
        {
            rel: 'icon',
            type: 'image/png',
            href: '/assets/img/logo.png'
        }
    ]
});
</script>
<template>
    <AppLayout>
        <div>
            <div class="banner">
                <div class="content bg-image bg-size-[100%] bg-contain bg-no-repeat bg-center text-center text-xl md:text-4xl bg-pos-y-13">
                    <h1 class="!w-[80%] md:!w-1/2 mx-auto relative top-[40%] text-shadow-lg/20 animate-fade-up text-gray-50">Apartmans. </h1>
                </div>
            </div>
            <div class="img-background">
                <div class="w-[80%] mx-auto gap-y-10 mb-12 pt-12 about-apartmans justify-between flex flex-wrap text-gray-950">
                    <div class="about !w-1/2 md:!w-1/3 flex flex-wrap items-center gap-2">
                        <PhAirplane class="!w-full md:!w-max"  :size="32" />
                        <div class="text-contet !w-full lg:!w-[82%]">
                            <h4 class="font-bold">Transfer</h4>
                            <p class="text-gray-500">Nikola Tesla Airport - 18km
                                20 - 30 Minutes  </p>
                        </div>
                    </div>
                    <div class="about !w-1/2 md:!w-1/3 flex flex-wrap items-center gap-2">
                        <PhCar class="!w-full md:!w-max"  :size="32" />
                        <div class="text-contet !w-full lg:!w-[82%]">
                            <h4 class="font-bold">Parking</h4>
                            <p class="text-gray-500">Nikola Tesla Airport - 18km
                                20 - 30 Minutes  </p>
                        </div>
                    </div>
                    <div class="about !w-1/2 md:!w-1/3 flex flex-wrap items-center gap-2">
                        <PhMoney class="!w-full md:!w-max"  :size="32" />
                        <div class="text-contet !w-full lg:!w-[82%]">
                            <h4 class="font-bold">Exchange office & ATM Bankomat</h4>
                            <p class="text-gray-500">Exchange office in the same buildings - 0 m , ATM - 5 m</p>
                        </div>
                    </div>
                    <div class="about !w-1/2 md:!w-1/3 flex flex-wrap items-center gap-2">
                        <PhShoppingCart class="!w-full md:!w-max"  :size="32" />
                        <div class="text-contet !w-full lg:!w-[82%]">
                            <h4 class="font-bold">Supermarket</h4>
                            <p class="text-gray-500">Nikola Tesla Airport - 18km
                                20 - 30 Minutes  </p>
                        </div>
                    </div>
                    <div class="about !w-1/2 md:!w-1/3 flex flex-wrap items-center gap-2">
                        <PhForkKnife class="!w-full md:!w-max"  :size="32" />
                        <div class="text-contet !w-full lg:!w-[82%]">
                            <h4 class="font-bold">Food & Drink</h4>
                            <p class="text-gray-500">Nikola Tesla Airport - 18km
                                20 - 30 Minutes  </p>
                        </div>
                    </div>
                    <div class="about !w-1/2 md:!w-1/3 flex flex-wrap items-center gap-2">
                        <PhMapPinArea class="!w-full md:!w-max" :size="32" />
                        <div class="text-contet !w-full lg:!w-[82%]">
                            <h4 class="font-bold">Dominic locations distance</h4>
                            <p class="text-gray-500">Nikola Tesla Airport - 18km
                                20 - 30 Minutes  </p>
                        </div>
                    </div>
                </div>
                <div class="rooms-block flex justify-start w-[80%]  mx-auto flex-wrap gap-y-5 gap-x-4 my-5">
                    <template v-if="rooms && rooms.length">
                        <Room class="!w-full sm:!w-full md:!w-[calc(50%-0.5rem)] xl:!w-full shadow-lg" v-for="room in rooms" :room="room"></Room>
                    </template>
                    <template v-else>
                        <div class="w-1/3 mx-auto text-center" role="status">
                            <svg aria-hidden="true" class="inline w-15 h-15 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </template>
                </div>
                <div class="exclusive-benefits-block my-10 text-gray-950">
                    <div class="header-content text-2xl text-center">
                        <h3 class="font-bold">Exclusive benefits</h3>
                        <h4 class="italic">For Direct Reservation</h4>
                    </div>
                    <div class="benefits w-[80%] mx-auto my-12">
                        <ul class="flex flex-wrap text-xl justify-between text-center gap-y-4 md:gap-y-0">
                            <li class="text-center !w-1/2 md:!w-1/4">
                                <PhCheckFat :size="32" class="mx-auto"/>
                                <span class="font-bold text-lg md:text-xl mt-2 block">Free 0.7l water</span>
                            </li>
                            <li class="text-center !w-1/2 md:!w-1/4">
                                <PhCheckFat :size="32" class="mx-auto"/>
                                <span class="font-bold text-lg md:text-xl mt-2 block">FREE TEA & COFFEE</span>
                            </li>
                            <li class="text-center !w-1/2 md:!w-1/4">
                                <PhCheckFat :size="32" class="mx-auto"/>
                                <span class="font-bold text-lg md:text-xl mt-2 block">UPGRADE ROOMS <span class="text-gray-500 block text-md italic w-full">(upon availability)</span></span>
                            </li>
                            <li class="text-center !w-1/2 md:!w-1/4">
                                <PhCheckFat :size="32" class="mx-auto"/>
                                <span class="font-bold text-lg md:text-xl mt-2 block">STAY LATE <span class="text-gray-500 block italic w-full">(upon availability)</span></span>
                            </li>
                        </ul>
                        <div class="info text-center my-7">
                            <p class="italic text-xl text-yellow-500 text-shadow-xs">( save up to 30 eur per day )</p>
                            <button class="cursor-pointer bg-yellow-500 color-gray-950 p-3 my-6">Book now</button>
                        </div>
                    </div>
                </div>
                <div class="about-maps">
                <div class="header-content text-center my-10">
                    <h3 class="text-3xl text-gray-950">Maps</h3>
                </div>
                <div class="maps w-full">
                    <iframe class="w-full h-120" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Terazije%20Beograd+(DreamPlace)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
            </div>
        </div>
    </AppLayout>
</template>
<style scoped>
.bg-image{
    background-image: linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.5),rgba(0,0,0,0.5))
    ,url("/assets/img/slikaBanner.JPG");
    height: 30vh;
}
.img-background{
    background-image: linear-gradient(to top,rgba(255,255,255,0.9),rgba(255,255,255,0.9)),url("/assets/img/backgroundWallpapers.jpg");
}

@layer utilities {
    @media (max-width: 640px) {
        .bg-pos-y-13 {
            background-position-y: 13%;
        }
    }
}
</style>
