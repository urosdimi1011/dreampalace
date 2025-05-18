<template>
    <Form @submit="deleteRoom">
        <div class="flex flex-col items-center p-6">
            <div class="flex gap-4">
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-md shadow">Da</button>
                <button type="button" @click="emit('closeModal')" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md shadow">Ne</button>
            </div>
        </div>
    </Form>
</template>

<script setup lang="ts">
import { defineProps, defineEmits } from 'vue';
import axios from 'axios';
import {Form} from 'vee-validate';
import {useToast} from 'vue-toast-notification';
const $toast = useToast();


const props = defineProps({
    id: Number // ID sobe koji se šalje prilikom brisanja
});

const emit = defineEmits(['closeModal','refreshRooms']);

const deleteRoom = async () => {
    try {
        await axios.delete(`/admin/facility/${props.id}`);
        $toast.success("Uspesno ste obrisali faciliy",{duration : 3000});
        emit('closeModal');
        emit('refreshRooms');
    } catch (error) {
        $toast.error(error.message,{duration:3000});
    }
};
</script>
