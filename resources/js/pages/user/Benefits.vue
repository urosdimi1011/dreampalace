<template>
    <AppLayout>
        <div>
            <div class="banner">
                <div class="content bg-image text-left md:text-center text-xl md:text-4xl">
                    <h1 class="!w-[80%] md:!w-1/2 mx-auto relative !top-[30%] md:!top-[40%] text-shadow-lg/20 animate-fade-up text-gray-50">DreamPlace – svaki detalj pažljivo osmišljen da vaš boravak bude san. </h1>
                </div>
            </div>
            <div class="img-background">
                <div class="why-me-block">
                    <div class="content text-gray-950 w-[80%] mx-auto text-left mb-15 pt-15">
                        <h2 class="font-bold !text-left md:!text-center  text-2xl md:text-3xl mb-15">Zašto baš naši apartmani?</h2>
                        <div class="shadow-[0px_0px_7px_1px_rgba(0,_0,_0,_0.1)] py-2 px-4 mb-4 rounded-sm">
                            <h3 class="font-bold !text-left md:!text-left text-gray-500 text-xl md:text-2xl my-3">Luksuzan enterijer</h3>
                            <p class="!text-left md:!text-left text-xl">Svaki apartman pažljivo je uređen sa akcentom na dizajn, kvalitet i detalje.
                                Prostrane i svetle sobe sa modernim enterijerom. Kombinacija modernih linija i toplih tonova pruža
                                maksimalan komfor i estetski ugođaj.</p>
                        </div>
                        <div class="shadow-[0px_0px_7px_1px_rgba(0,_0,_0,_0.1)] py-2 px-4 mb-4 rounded-sm">
                            <h3 class="font-bold !text-left md:!text-left text-gray-500 text-xl md:text-2xl my-3">Kompletno opremljeni apartmani.</h3>
                            <p class="!text-left md:!text-left text-xl">Kompletno opremljeni apartmani sadrže Wi-Fi, klima uređaj, SMART TV, aparat za kafu ,sef, luksuzno
                                kupatilo sa svim neophodnim sadržajima, kao i sve što vam je potrebno za kraći ili duži boravak.</p>
                        </div>
                        <div class="shadow-[0px_0px_7px_1px_rgba(0,_0,_0,_0.1)] py-2 px-4 mb-4 rounded-sm">
                            <h3 class="font-bold !text-left md:!text-left text-gray-500 text-xl md:text-2xl my-3">Idealna lokacija</h3>
                            <p class="!text-left md:!text-left text-xl">Nalazimo se na nekoliko koraka od Trga Republike, Terazija, Skadarlije i mnogih
                                drugih znamenitosti za obilazak I uživanje.</p>
                        </div>
                    </div>
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
                <div class="banner">
                    <div class="content bg-image2 !h-auto sm:!h-[25vh] text-center py-6 sm:py-0 !text-2xl sm:!text-4xl">
                        <h1 class="w-1/2 mx-auto relative top-[40%] text-yellow-500 text-shadow-lg">Osećajte se kao kod kuće.</h1>
                    </div>
                </div>
                <div class="concepts-block my-10">
                    <div class="header-content text-gray-950 text-center my-10">
                        <h3 class="font-bold text-2xl">New Smart Luxury Concept</h3>
                        <p class="text-gray-500 my-2">Created by new trends in city tourism, to cover 3 major things and bring unique value</p>
                    </div>
                    <div class="w-[80%] mx-auto">
                        <ul class="flex flex-wrap justify-center gap-12 md:gap-30 text-gray-950 text-center">
                            <li class="text-center text-gray-500">
                                <PhUserCircle class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Friend</span>
                                Personal Assistent 24/7
                            </li>
                            <li class="text-center text-gray-500">
                                <PhMapPinSimpleArea  class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Location</span>
                                City Center
                            </li>
                            <li class="text-center text-gray-500">
                                <PhHouse class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Design</span>
                                Modern Author Design
                            </li>
                        </ul>
                        <ul class="flex flex-wrap justify-center gap-12 md:gap-30 text-gray-950 text-center my-10">
                            <li class="text-center text-gray-500">
                                <PhMonitor  class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Friend</span>
                                Personal Assistent 24/7
                            </li>
                            <li class="text-center text-gray-500">
                                <PhBroom class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Location</span>
                                City Center
                            </li>
                            <li class="text-center text-gray-500">
                                <PhCoffee class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Design</span>
                                Modern Author Design
                            </li>
                            <li class="text-center text-gray-500">
                                <PhAirplaneTilt  class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Friend</span>
                                Personal Assistent 24/7
                            </li>
                            <li class="text-center text-gray-500">
                                <PhWifiHigh  class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Location</span>
                                City Center
                            </li>
                            <li class="text-center text-gray-500">
                                <PhHouse class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Design</span>
                                Modern Author Design
                            </li>
                            <li class="text-center text-gray-500">
                                <PhClock class="inline text-gray-950" :size="42" />
                                <span class="font-bold text-md block text-gray-950">Design</span>
                                Modern Author Design
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import AppLayout from "@/layouts/AppLayout.vue";
import {
    PhAirplaneTilt,
    PhBroom,
    PhCheckFat, PhClock,
    PhCoffee,
    PhHouse,
    PhMapPinSimpleArea,
    PhMonitor,
    PhUserCircle, PhWifiHigh
} from "@phosphor-icons/vue";
import { useHead } from '@vueuse/head';
useHead({
    title: 'Dream palace - Benefits',
    meta: [
        { name: 'description', content: 'Opis stranice' },
        { name: 'keywords', content: 'dream palace, luksuzni enterijer, Apartmans, Belgrade' },
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
<style scoped>
    .bg-image{
        background-image: linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.5),rgba(0,0,0,0.5))
        ,url("/assets/img/banner-benefits.avif");
        height: 30vh;
        //background-size: cover;
        //background-attachment: fixed;
    }
    .bg-image2{
        background-image: linear-gradient(to top,rgba(0,0,0,0.5),rgba(0,0,0,0.5),rgba(0,0,0,0.5))
        ,url("/assets/img/banner-benefits.avif");
        background-size: 100% 100%;
        //height: 22vh;

    }
    .img-background{
        background-image: linear-gradient(to top,rgba(255,255,255,0.9),rgba(255,255,255,0.9)),url("/assets/img/backgroundWallpapers.jpg");
    }
</style>
