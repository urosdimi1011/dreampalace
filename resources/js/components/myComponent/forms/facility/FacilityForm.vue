<template>
    <Form :key="formKey" :enableReinitialize="true" @submit="submit" class="max-w-max w-full gap-y-5 flex flex-col" :validation-schema="schema" :initial-values="initialValues">
        <div class="flex items-center gap-1 form-group flex-wrap">
            <Label class="w-40" for="name">Unesite ime</Label>
            <Field class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name"/>
            <ErrorMessage class="w-full flex items-start mt-2 text-xs text-slate-400" name="name" />
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
    name: yup.string().required('Ime je obavezeno polje')
});
const formKey = ref(0);
const $toast = useToast();
//Ovo mi je prazno sad posto treba da dohvatim putem axiox-a sobu na koju smo kliknuli
const formValues = ref({
    name: ''
});
const submit = async (values)=>{
    //DODAVANJE Facility!
    const formData = getFormData(values);
    try {
        let response = null;
        if(props.type == 'add'){
            response = await axios.post('/admin/facility', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            });
        }
        else if(props.type == 'edit'){
            response = await axios.post(`/admin/facility/${props.id}`, formData, {
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
    if(props.type == 'edit'){
        formData.append('_method', 'PATCH');
    }

    return formData;
}
const getOneFacility = async (id)=>{
    const response = await axios.get(`/facility/${id}`);
    const facility = response.data.facility;
    formValues.value = {
        name: facility.name || ''
    };
    formKey.value++;
}
onBeforeMount(async ()=>{
    if(props.id){
        await getOneFacility(props.id);
    }
})

const initialValues = computed(() => formValues.value);

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
