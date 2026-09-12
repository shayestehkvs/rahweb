<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { Head,useForm } from '@inertiajs/vue3';



const form = useForm({

    title:'',

    description:'',

    attachment:null

});



function submit(){

    form.post('/tickets');

}


</script>



<template>


    <Head title="Create Ticket"/>


    <AuthenticatedLayout>


        <div class="p-6">


            <h1 class="text-xl">
                Create Ticket
            </h1>



            <form
                @submit.prevent="submit"
            >


                <input
                    v-model="form.title"
                    placeholder="Title"
                    class="border p-2"
                />



                <textarea
                    v-model="form.description"
                    placeholder="Description"
                    class="border p-2 block mt-3"
                />



                <input type="file" @input="form.attachment=$event.target.files[0]" class="mt-3"/>

                <button class="bg-green-600 text-white px-4 py-2 mt-3">
                    Submit
                </button>
            </form>


        </div>


    </AuthenticatedLayout>


</template>
