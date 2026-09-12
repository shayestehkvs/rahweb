<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


defineProps({

    ticket:Object

});

</script>


<template>

    <Head title="Ticket Detail"/>


    <AuthenticatedLayout>


        <div class="p-6">


            <h1 class="text-2xl">
                {{ ticket.title }}
            </h1>


            <div class="mt-5">

                <p>
                    <strong>Description:</strong>
                </p>

                <p>
                    {{ ticket.description }}
                </p>


            </div>



            <div class="mt-5">

                <p>
                    <strong>Status:</strong>

                    {{ ticket.status }}

                </p>


            </div>



            <a
                :href="`/storage/${ticket.attachment}`"
                target="_blank"
                class="text-blue-600"
            >
                View Attachment
            </a>



        </div>


    </AuthenticatedLayout>


</template>
