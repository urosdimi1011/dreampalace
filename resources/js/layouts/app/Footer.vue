<template>
    <footer class="py-12">
        <!-- Ovde ide sadržaj za Footer -->
        <div class="w-[80%] mx-auto flex flex-wrap justify-between text-md text-gray-50">
            <div class="!w-full sm:!w-1/4">
                <ul>
                    <li class="first:underline my-5 pb-5">ADDRESS</li>
                    <li class="flex gap-2"><PhMapPinSimpleArea :size="22" />Nušićeva, Beograd</li>
                </ul>
            </div>
            <div class="!w-full sm:!w-1/4">
                <ul>
                    <li class="first:underline my-5 pb-5">CONTACT</li>
                    <li><a class="flex gap-2" href="mailto:dreampalacebg@gmail.com"><PhEnvelope :size="22" /> dreampalacebg@gmail.com</a></li>
                    <li class="flex gap-2"><PhPhoneCall  :size="22" /> +3816051051</li>
                </ul>
            </div>
            <div class="!w-full sm:!w-1/4">
                <ul>
                    <li class="first:underline my-5 pb-5">FEEL LIKE A LOCAL</li>
                    <li>© 2025 by Dream Place Suites</li>
                </ul>
            </div>
            <div class="!w-full sm:!w-1/4">
                <ul>
                    <li class="first:underline my-5 pb-5">SOCIAL</li>
                    <li><a class="flex gap-2" href="#"><PhInstagramLogo :size="22" /> dreamplace.belgrade</a></li>
                    <li><a class="flex gap-2" href="mailto:dreampalacebg@gmail.com"><PhEnvelope :size="22" /> dreampalacebg@gmail.com</a></li>
                </ul>
            </div>
        </div>
    </footer>
</template>
<style scoped>
footer{
    background-color: #000000;
}
</style>
<script setup>
import {
    PhAddressBook,
    PhEnvelope,
    PhEnvelopeSimple,
    PhFacebookLogo,
    PhInstagramLogo, PhMapPinSimpleArea,
    PhPhoneCall
} from "@phosphor-icons/vue";
</script>
