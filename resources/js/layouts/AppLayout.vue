<script setup lang="ts">
import Header from "@/layouts/app/Header.vue";
import Footer from "@/layouts/app/Footer.vue";
import { usePage } from '@inertiajs/vue3'; // Uvezi usePage hook
const page = usePage(); // Koristi usePage za pristup podacima stranice
import { initFlowbite } from 'flowbite'
import {onMounted} from "vue";

onMounted(()=>{
    initFlowbite();
})

</script>

<template>
    <div>
        <Header/>
            <main>
                <transition name="page" mode="out-in">
                    <slot :key="page.url"></slot>
                </transition>
            </main>
        <Footer/>
    </div>
</template>
<style>
 a{
     transition: all 300ms;
 }
 .page-enter-active, .page-leave-active {
     transition: opacity 0.5s;
 }
 .page-enter-from, .page-leave-to {
     opacity: 0;
 }
 .page-enter-to, .page-leave-from {
     opacity: 1;
 }
 body:not(:has([data-slot="dialog-content"])) {
     overflow-y: auto !important;
 }
 *, *::before, *::after{
     box-sizing: border-box;
 }
 @layer base {
     body{
         background-color: #fff !important;
     }
 }

 @keyframes fade-up {
     0% {
         opacity: 0;
         transform: translateY(1rem);
     }
     100% {
         opacity: 1;
         transform: translateY(0);
     }
 }

 .animate-fade-up {
     animation: fade-up 0.8s ease-out forwards;
 }
</style>
