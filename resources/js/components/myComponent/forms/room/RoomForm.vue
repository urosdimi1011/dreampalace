<template>
    <Form :key="formKey" :enableReinitialize="true" @submit="submit" class="max-w-max w-full gap-y-5 flex flex-col" :validation-schema="schema" :initial-values="initialValues">
        <div class="flex items-center gap-1 form-group flex-wrap">
            <Label class="w-40" for="name">Unesite ime</Label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="name" />
        </div>
        <div class="flex items-center gap-1 form-group flex-wrap">
            <Label class="w-40" for="mainImg">Unesite glavnu sliku:</Label>
            <Field id="mainImg" name="mainImg" type="file"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="mainImg" />
            <template v-if="image != ''">
                <div class="w-full">
                    <img class="w-20" :src="'/storage/my/'+image" :alt="image"/>
                </div>
            </template>
        </div>
        <div class="flex items-center gap-1 form-group flex-wrap">
            <Label class="w-40" for="othersImg">Unesite ostale slike sliku:</Label>
            <Field id="othersImg" name="othersImg" multiple type="file"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="othersImg" />
            <template v-if="images && images.length">
                <div class="w-full gap-x-4 image-container flex">
                    <img v-for="img in images" :key="img" class="w-20" :src="'/storage/my/'+img.path" :alt="img.path"/>
                </div>
            </template>
        </div>
        <div class="flex form-group flex-wrap">
            <Label class="w-40" for="address">Unesite adresu:</Label>
            <Field id="address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="address"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="address" />

        </div>
        <div class="mb-12">
            <Label class="w-40" for="description">Unesite opis sobe:</Label>
            <QuillEditor v-model:content="editorData" contentType="html" name="description" theme="snow" />
        </div>
        <div class="flex flex-wrap gap-3">
            <Label class="mt-5">Odaberite tip sobe:</Label>
            <div class="flex w-full gap-3">
                <Label for="apartman">Apartman:</Label>
                <Field id="apartman" name="typeRoom" type="radio" value="1" />
            </div>
            <div class="flex gap-3">
                <Label for="soba">Sobe:</Label>
                <Field id="soba" name="typeRoom" type="radio" value="2" />
            </div>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="typeRoom" />
        </div>
        <div class="flex flex-wrap gap-3">
            <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover" class="text-white bg-blue-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Odaberite sta soba ima <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            <div id="dropdownBgHover" class="z-10 hidden w-48 bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBgHoverButton">
                    <template v-if="facilities.length">
                        <li v-for="(fac, index) in facilities" :key="fac.id">
                            <Field
                                :id="'checkbox-item-' + fac.id"
                                type="checkbox"
                                name="facilities"
                                :value="fac.id"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                            />
                            <label
                                :for="'checkbox-item-' + fac.id"
                                class="w-full ms-2 text-sm font-medium text-gray-900 rounded-sm dark:text-gray-300 !m-0 !ml-3"
                            >
                                {{ fac.name }}
                            </label>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
        <div class="flex flex-wrap">
            <Label for="sizem2">Unesite kvadraturu:</Label>
            <Field class="shadow appearance-none bg-zinc-950 border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="sizem2" type="number"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="sizem2" />
        </div>
        <div class="form-group flex-wrap">
            <Label for="max_adults">Unesite broj odraslih:</Label>
            <Field class="shadow appearance-none border bg-zinc-950 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="max_adults" type="number"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="max_adults" />
        </div>
        <div class="form-group flex-wrap">
            <Label for="max_child">Unesite broj dece:</Label>
            <Field class="shadow appearance-none border bg-zinc-950 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="max_children" type="number"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="max_children" />
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ type == 'add' ? 'Dodaj' : 'Izmeni' }}</button>
    </Form>
</template>
<script setup lang="ts">
import {Form,Field,ErrorMessage} from 'vee-validate';
import * as yup from 'yup';
import Label from "@/components/ui/label/Label.vue";
import Button from "@/components/ui/button/Button.vue";
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import { initFlowbite } from 'flowbite'


import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

import axios from 'axios';
import {ref, defineProps, computed, onBeforeMount} from 'vue';
const props = defineProps({
    formsData : Object,
    id : Number,
    type : {
        required : false,
        default : 'add'
    }
})
const emit = defineEmits(['closeModal','refreshRooms']);
const schema = yup.object({
    name: yup.string().required('Ime je obavezeno polje'),
    mainImg: props.type === 'add'
        ? yup.mixed().required('Glavna slika je obavezna')
        : yup.mixed().nullable(),
    othersImg: props.type === 'add'
        ? yup.array().required('Dodatne slike su obavezne')
        : yup.array().nullable(),
    address: yup.string().required('Adresa je obavezno polje'),
    sizem2: yup.string().required('Velicina u m2 je obavezno polje'),
    typeRoom : yup.string().required('Tip sobe je obavezno polje'),
    max_adults: yup.string().required('Broj odraslih je obavezno polje'),
    max_children: yup.string().required('Broj dece je obavezno polje'),
    facilities: yup.array().of(yup.number()).nullable()
});
const formKey = ref(0);
const editorData = ref('');
const $toast = useToast();

const facilities = ref([]);
//Ovo mi je prazno sad posto treba da dohvatim putem axiox-a sobu na koju smo kliknuli
const formValues = ref({
    name: '',
    address: '',
    sizem2: '',
    typeRoom: '',
    max_adults: '',
    max_children: '',
    facilities: []
    // mainImg: null,
    // othersImg: []
});
const submit = async (values)=>{
    //DODAVANJE SOBE!
    const formData = getFormData({...values,'description':editorData.value});
    try {
        let response = null;
        if(props.type == 'add'){
            response = await axios.post('/admin/room', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
        }
        else if(props.type == 'edit'){
            response = await axios.post(`/admin/room/${props.id}`, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
        }
        $toast.success(response.data.message,{duration: 3000});
        emit('closeModal',false);
        emit('refreshRooms');
    } catch (error) {
        $toast.error(error.message,{duration: 3000});
    }

}
const getFormData =(values)=>{
    const formData = new FormData();

    // Dodaj ostale vrednosti iz forme
    formData.append('name', values.name);
    formData.append('address', values.address);
    formData.append('sizem2', values.sizem2);
    formData.append('max_adults', values.max_adults);
    formData.append('max_children', values.max_children);
    formData.append('id_room_type', values.typeRoom);
    if (values.mainImg) {
        formData.append('mainImg', values.mainImg);
    }
    if (values.facilities && values.facilities.length) {
        values.facilities.forEach((facilityId, index) => {
            formData.append(`facilities[${index}]`, facilityId);
        });
    }
    if(props.type == 'edit'){
        formData.append('_method', 'PATCH');
    }
    formData.append('description', values.description);

    if (values.othersImg && values.othersImg.length) {
        values.othersImg.forEach((image, index) => {
            formData.append(`otherImages[${index}]`, image);
        });
    }

    return formData;
}
const images = ref([]);
const image = ref('');
const getOneRoom = async (id)=>{
    const response = await axios.get(`/room/${id}`);
    const room = response.data.room;
    // formValues.name = room.name;
    formValues.value = {
        name: room.name || '',
        address: room.address || '',
        sizem2: room.sizem2 || '',
        typeRoom: room.room_type.id.toString(),
        max_adults: room.max_adults || '',
        max_children: room.max_children || '',
        facilities: room.facilities ? room.facilities.map(f => f.id) : []
    };
    images.value = room.images;
    image.value = room.main_img;
    editorData.value =  room.description || '';
    formKey.value++;
}
onBeforeMount(async ()=>{
    if(props.id){
        await getOneRoom(props.id);
    }
    await getFacilities();
    initFlowbite();
})
// onMounted(async ()=>{
// })
const initialValues = computed(() => formValues.value);
const getFacilities = async ()=>{
    const response = await axios.get(`/facility`);
    facilities.value = response.data.facility;
}
</script>
<style scoped>
    input {
        color: white !important;
    }
    [type=radio]{
        background-color: #000000 !important;
    }
    label{
        margin-bottom: 20px;
    }
</style>
