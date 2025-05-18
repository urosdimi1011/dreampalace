<template>
    <div class="room gap-5 flex flex-wrap bg-gray-100 rounded-md">
        <div class="!w-full sm:!w-full md:!w-full xl:!w-100 h-100 img-block rounded-l-lg overflow-hidden">
            <img class="w-full h-full object-cover rounded-l-lg" :src="'/storage/my/'+room.main_img" :alt="room.main_img"/>
        </div>
        <div class="content-block p-3 !w-full sm:!w-max">
            <div class="title-block">
                <h3 class="text-slate-950 text-3xl mb-3 font-[Open_Sans]">{{ room.name }} - {{room.address}}</h3>
                <ul class="text-slate-950 flex flex-col gap-1 mb-3">
                    <li class="text-[12px] relative pl-4 text-gray-800 " v-for="facility in room.facilities">
                        <span class="absolute left-0 top-1/2 -translate-y-1/2 h-0.5 w-2 bg-yellow-300"></span>
                        <span class="text-[17px]">{{ facility.name }}</span>
                    </li>
                </ul>
                <div class="text-[15px] content !text-slate-950 !w-full sm:!w-full md:!w-full xl:!w-150 max-h-96 overflow-y-auto break-words clamp-text" v-html="room.description"></div>
                <button @click="openRoomModal()" class="cursor-pointer mt-4 border border-gray-400 text-gray-700 text-sm font-serif px-4 py-2 rounded-none hover:text-stone-50 hover:bg-yellow-500 hover:border-stone-50 transition-all">
                    Read more
                </button>
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
</template>
<script lang="ts" setup>

import {defineProps} from 'vue';
    import Button from "@/components/ui/button/Button.vue";
    import DialogContent from "@/components/ui/dialog/DialogContent.vue";
    import RoomModal from "@/components/myComponent/ui/Modal/RoomModal.vue";
    import { useDialog } from "@/composables/useModal";
import {DialogRoot} from "reka-ui";
import DialogTitle from "@/components/ui/dialog/DialogTitle.vue";

const props = defineProps<{ room: any }>()

const {
    dialog,
    visible,
    openModal,
    handleDialogUpdate,
    updateLightboxState
} = useDialog()

function openRoomModal() {
    console.log("Uslii");
    openModal(RoomModal, 'Dodatne informacije', { room: props.room })
}
</script>
<style scoped>
.clamp-text {
    display: -webkit-box;
    -webkit-line-clamp: 4; /* broj linija */
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

