<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TruckDetails from "@/Components/TruckDetails.vue";
import RetailerDetails from "@/Components/RetailerDetails.vue";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
<!--                    <div class="p-6 text-gray-900">You're logged in!</div>-->
                    <div v-if="loading" class="text-gray-500">Loading...</div>
                    <div v-else>
                        <RetailerDetails :retailers="retailers" />
                    </div>
                </div>

                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Trucks Available</h2>
                        <div v-if="loading" class="text-gray-500">Loading...</div>
                        <div v-else>
<!--                            <pre>{{ trucks }}</pre>-->
                            <TruckDetails :trucks="trucks" />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            trucks: [],
            retailers: [],
            loading: false,
            maxCapacity: 0
        };
    },
    mounted() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.loading = true;
            axios.all([
                axios.get('api/trucks'),
                axios.get('api/retailers')
            ])
                .then(axios.spread((trucksResponse, retailersResponse) => {
                    this.trucks = trucksResponse.data.trucks.map(truck => {
                        return { ...truck, collapsed: false };
                    });
                    this.retailers = retailersResponse.data;
                    this.calculateMaxCapacity();
                    this.loading = false;
                }))
                .catch(error => {
                    console.error('Error fetching data:', error);
                    this.loading = false;
                });
        },
        calculateMaxCapacity() {
            // Calculate the maximum capacity among all compartments
            for (const truck of this.trucks) {
                for (const compartment of truck.compartments) {
                    if (compartment.capacity > this.maxCapacity) {
                        this.maxCapacity = compartment.capacity;
                    }
                }
            }
        }
    }
};
</script>
