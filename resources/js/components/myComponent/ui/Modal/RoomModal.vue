<template>
    <div class="flex justify-around !w-full md:!w-full flex-wrap gap-4 box-border">
        <!-- Omotač slajdera -->
        <div id="default-carousel" class="relative self-center !w-full md:!w-1/2" data-carousel="static">
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <template v-for="(image, index) in room.images" :key="image.id">
                    <div :class="index === 0 ? 'block duration-700 ease-in-out' : 'hidden duration-700 ease-in-out'" :data-carousel-item="index === 0 ? 'active' : ''">
                        <img
                            :src="'/storage/my/' + image.path"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10 cursor-pointer pointer-events-auto"
                            :alt="image.path"
                            @click="openGallery(index)"
                        />
                    </div>
                </template>
            </div>
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <template v-for="(image, index) in room.images" :key="index">
                    <button :type="'button'" class="w-3 h-3 rounded-full" :data-carousel-slide-to="index" :aria-label="'Slajd ' + (index + 1)" :aria-current="index === 0 ? 'true' : 'false'"></button>
                </template>
            </div>
            <!-- Kontrole slajdera -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"></path>
          </svg>
          <span class="sr-only">Prethodni</span>
        </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
          </svg>
          <span class="sr-only">Sledeći</span>
        </span>
            </button>
        </div>
<!--        <Teleport to="body">-->
        <Teleport to="body">
                <VueEasyLightbox
                    :visible="visible"
                    :imgs="images"
                    :index="index"
                    @hide="changeVisible"
                    :style="{ zIndex: 9999,pointerEvents:'auto' }"

                />
        </Teleport>

        <div class="content !w-full md:!w-1/3">
            <p class="flex gap-2 items-center text-xl mb-5 text-yellow-400"><PhHouse :size="32" /> Address: {{room.address}}</p>
            <p class="w-full break-words" v-html="room.description"></p>
            <div class="content mt-4">
                <p>Maximum occupancy: <strong class="text-yellow-400">{{room.max_adults + room.max_children}}</strong></p>
                <p>{{ room.room_type.name == "Soba" ? "Room" : "Suits" }} size: <strong class="text-yellow-400">{{room.sizem2}}m2</strong></p>
            </div>
        </div>

        <div class="room_faciliies w-full mt-5 md:mt-0">
            <div class="header-content mt-5">
                <h3 class="text-xl md:text-2xl">Room facilities</h3>
                <ul class="flex flex-wrap gap-2 mt-5">
                    <li class="relative pl-4" v-for="facility in room.facilities" :key="facility.id">
                        <span class="bg-yellow-500 text-gray-950 text-xs font-bold me-2 px-2.5 py-0.5 rounded-sm dark:bg-yellow-500 dark:text-gray-950">{{facility.name}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import {defineProps, watch} from "vue";
import { initFlowbite } from 'flowbite'
import {onMounted,ref,computed} from "vue";
import VueEasyLightbox from 'vue-easy-lightbox'
import {PhHouse} from "@phosphor-icons/vue";


const visible = ref(false)
const changeVisible = ()=>{
    visible.value = false
}
const index = ref(0)
const images = computed(()=>
    props.room.images.map((x)=>'/storage/my/'+x.path)
);

function openGallery(i) {
    index.value = i
    visible.value = true
}
onMounted(()=> {
    initFlowbite();
})

const props = defineProps({
    room: Object
})

const emit = defineEmits(['lightbox-state']);


watch(visible, (newVal) => {
    console.log(newVal);
    emit('lightbox-state', newVal)
    if (!newVal) {
        document.body.style.overflowY = 'auto'  // ručno vraćanje scroll-a
    }
});

</script>
<style scoped>
.wrap-break-word *{
    word-break: break-all;
}
</style>
