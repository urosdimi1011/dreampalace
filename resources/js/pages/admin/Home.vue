<template>
    <admin-layout>
        <Table>
            <TableHeader :headers="headersOfTable"></TableHeader>
            <TableBody :data="dataForBody" :headers="headersOfTable" :number-of-column="headersOfTable.length"></TableBody>
        </Table>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5" @click="addNewRooms()">Dodaj novu sobu</button>
        <DialogRoot v-model:open="dialog.isDialogOpen">
                <DialogContent class="!max-w-max !w-full !max-h-max !max-h-screen !md:max-h-[600px] !overflow-y-auto scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-gray-900">
                    <DialogTitle><h2>{{dialog.dialogTitle}}</h2></DialogTitle>
                    <component @refreshRooms="getAllData()" :is="dialog.dialogComponent" v-bind="dialog.dialogProps" @closeModal="dialog.isDialogOpen = false"></component>
                    <DialogClose>
                        <button type="button">Zatvori</button>
                    </DialogClose>
                </DialogContent>
<!--            </Dialog>-->
        </DialogRoot>
    </admin-layout>
</template>
<script setup lang="ts">
// import { useStore } from 'vuex';
import AdminLayout from "@/layouts/admin/adminLayout.vue";
import Table from "@/components/myComponent/Table.vue";
import TableHeader from "@/components/myComponent/tableHeader.vue";
import TableBody from "@/components/myComponent/tableBody.vue";
import {reactive, ref,onMounted} from "vue";
import {HeadersIntefrace, RoomData} from '@/types';
import DialogContent from "@/components/ui/dialog/DialogContent.vue";
import DialogTitle from "@/components/ui/dialog/DialogTitle.vue";
import DialogClose from "@/components/ui/dialog/DialogClose.vue";
import RoomForm from "@/components/myComponent/forms/room/RoomForm.vue";
import RoomDeleteConfirm from "@/components/myComponent/forms/room/RoomDeleteConfirm.vue";
import {DialogRoot} from "reka-ui";
import Button from "@/components/ui/button/Button.vue";
import axios from "axios";
// const store = useStore();
const dialog = reactive({
    isDialogOpen : false,
    dialogTitle : '',
    dialogComponent : null,
    dialogProps : {}
})
onMounted(async ()=>{
    await getAllData();
})
const getAllData = async ()=>{
    const response = await axios.get('/room');
    dataForBody.value = response.data.rooms;
}
// Ovo mora svaka tabela da prosledi !!!
const headersOfTable = ref<HeadersIntefrace[]>([
    {
        "name": "id",
        'label': "Id"
    },
    {
        "name": "name",
        'label': "Naziv"
    },
    {
        "name": "main_img",
        'label': "Slika",
        'type' : "img"
    },
    {
        "name": "description",
        'label': "Opis",
        "type":'html'
    },
    {
        "name": "address",
        'label': "Adresa sobe"
    },
    {
        "name": "sizem2",
        'label': "Velicina"
    },
    {
        "name": "max_adults",
        'label': "Broj odraslih"
    },
    {
        "name": "max_children",
        'label': "Broj dece"
    },
    {
        "name": "edit",
        'label': "Izmeni sobu",
        'actions' : (row)=>{
            if(!row) return;
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Izmeni sobu';
            dialog.dialogComponent= RoomForm;
            dialog.dialogProps = {'id':row.id,'type':'edit'};
        },
        "class":"bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    },
    {
        "name": "delete",
        'label': "Obrisi sobu",
        'actions' : (row)=>{
            dialog.isDialogOpen = true;
            dialog.dialogTitle = 'Da li ste sigurni da zelite da obrisete sobu?';
            dialog.dialogProps = {'id':row.id};
            dialog.dialogComponent= RoomDeleteConfirm;

            //Ovde sada treba da se otvori modal za izmenu sobe i da prikaze sve podateke vec u formi za izmenu
            //samo da vidim kako to sad mogu da odradim
        },
        "class":"bg-pink-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
    },
]);

const dataForBody = ref<RoomData[]>([]);
const closeModal = ref(false);
//Ovo su realni podaci sa apija!
// const dataForBody = ref<RoomData[]>([
//     {
//         id: 1,
//         name : 'Proba sobe',
//         img : "nema putanja koja ne postoji sada",
//         description : "Opis sobe",
//         address : "Adresa sobe",
//         size : "23",
//         max_adults : 3,
//         max_children : 2
//     },
//     {
//         id: 1,
//         name : 'Proba sobe 2',
//         img : "nema putanja koja ne postoji sada",
//         description : "Opis sobe",
//         address : "Adresa sobe",
//         size : "23",
//         max_adults : 3,
//         max_children : 2
//     },
//     {
//         id: 1,
//         name : 'Proba sobe 3',
//         img : "nema putanja koja ne postoji sada",
//         description : "Opis sobe",
//         address : "Adresa sobe",
//         size : "23",
//         max_adults : 3,
//         max_children : 2
//     },
//     {
//         id: 1,
//         name : 'Proba sobe 4',
//         img : "nema putanja koja ne postoji sada",
//         description : "Opis sobe",
//         address : "Adresa sobe",
//         size : "23",
//         max_adults : 3,
//         max_children : 2
//     }
// ]);

const addNewRooms = ()=>{
    dialog.isDialogOpen = true;
    dialog.dialogProps = null;
    dialog.dialogTitle = "Dodaj sobu";
    dialog.dialogComponent = RoomForm;
}
</script>
<style scoped>
div[data-state="open"]{
    width: 100% !important;
    max-width: max-content !important;
}
</style>
