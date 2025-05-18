<template>
    <admin-layout>
        <Table>
            <TableHeader :headers="headerOfTable">

            </TableHeader>
            <TableBody :headers="headerOfTable" :data="dataForBody" :number-of-column="headerOfTable.length">

            </TableBody>
        </Table>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="addNewFacility()">Dodaj novi facility</button>
        <DialogRoot v-model:open="dialog.isDialogOpen">
            <DialogContent class="!max-w-max !w-full !max-h-max !max-h-screen !md:max-h-[600px] !overflow-y-auto scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-gray-900">
                <DialogTitle><h2>{{dialog.dialogTitle}}</h2></DialogTitle>
                <component @refreshRooms="getAllData()" :is="dialog.dialogComponent" v-bind="dialog.dialogProps" @closeModal="dialog.isDialogOpen = false"></component>
                <DialogClose>
                    <button type="button">Zatvori</button>
                </DialogClose>
            </DialogContent>
        </DialogRoot>
    </admin-layout>
</template>
<script setup lang="ts">
import AdminLayout from "@/layouts/admin/adminLayout.vue";
import Table from "@/components/myComponent/Table.vue";
import TableHeader from "@/components/myComponent/tableHeader.vue";
import TableBody from "@/components/myComponent/tableBody.vue";
import {FacilityData, HeadersIntefrace} from "@/types/index.js";
import {onMounted, reactive, ref} from "vue";
import FacilityRoomConfirm from '@/components/myComponent/forms/facility/FacilityDeleteConfirm.vue';
import FacilityForm from "@/components/myComponent/forms/facility/FacilityForm.vue";
import axios from "axios";
import Button from "@/components/ui/button/Button.vue";
import DialogClose from "@/components/ui/dialog/DialogClose.vue";
import DialogTitle from "@/components/ui/dialog/DialogTitle.vue";
import {DialogRoot} from "reka-ui";
import DialogContent from "@/components/ui/dialog/DialogContent.vue";

const dialog = reactive({
    isDialogOpen : false,
    dialogTitle : '',
    dialogComponent : null,
    dialogProps : {}
})
const dataForBody = ref<FacilityData[]>([]);
const headerOfTable = ref<HeadersIntefrace[]>([
    {
        "name": "id",
        "label":"Id"
    },
    {
        "name" : "name",
        "label": "Naziv"
    },
    {
        "name":"edit",
        "label":"Izmeni",
        "actions": (row)=>{
            dialog.isDialogOpen = true;
            dialog.dialogTitle = "Izmeni";
            dialog.dialogProps = {'id':row.id,'type':'edit'};
            dialog.dialogComponent= FacilityForm;
        },
        "class":"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    },
    {
        "name":"delete",
        "label":"Obriši",
        "actions": (row)=>{
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Da li ste ?';
            dialog.dialogProps = {'id':row.id};
            dialog.dialogComponent= FacilityRoomConfirm;
        },
        "class":"bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"

    }
]);
onMounted(async ()=>{
    await getAllData();
})
const getAllData = async ()=>{
    const response = await axios.get('/facility');
    dataForBody.value = response.data.facility;
}
const addNewFacility = ()=>{
    dialog.isDialogOpen = true;
    dialog.dialogProps = null;
    dialog.dialogTitle = "Dodaj facility";
    dialog.dialogComponent = FacilityForm;
}
</script>
