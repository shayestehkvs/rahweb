<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    tickets:Array
});

</script>

<template>
    <Head title="Tickets"/>
    <AuthenticatedLayout>
        <div class="p-6">
            <h1 class="text-2xl mb-5">
                My Tickets
            </h1>

            <Link
                href="/tickets/create"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Create Ticket
            </Link>

            <table class="mt-5 w-full">
                <thead>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr
                    v-for="ticket in tickets"
                    :key="ticket.id"
                >
                    <td>
                        {{ticket.title}}
                    </td>
                    <td>
                        {{ticket.status}}
                    </td>
                    <td>
                        <Link
                            :href="`/tickets/${ticket.id}`"
                        >
                            View
                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
