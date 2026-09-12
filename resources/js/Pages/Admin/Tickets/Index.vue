<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
defineProps({
    tickets:Array
});

function approve(id)
{
    router.post(
        `/admin/tickets/${id}/approve`
    );
}
function reject(id)
{
    router.post(
        `/admin/tickets/${id}/reject`,
        {
            reason:'Rejected by admin'
        }
    );
}

</script>
<template>
    <Head title="Admin Tickets"/>
    <AuthenticatedLayout>
        <div class="p-6">
            <h1 class="text-2xl mb-5">
                Admin Tickets
            </h1>

            <table class="w-full">
                <tr v-for="ticket in tickets" :key="ticket.id">
                    <td>
                        {{ticket.title}}
                    </td>
                    <td>
                        {{ticket.status}}
                    </td>
                    <td>

                        <form method="post" :action="`/admin/tickets/${ticket.id}/approve`">

                            <td>
                                <button @click="approve(ticket.id)" class="bg-green-500 text-white px-3 py-1 rounded">Approve</button>

                                <button @click="reject(ticket.id)" class="bg-red-500 text-white px-3 py-1 rounded ml-2">Reject
                                </button>

                            </td>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </AuthenticatedLayout>

</template>
