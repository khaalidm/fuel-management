<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import TruckDetails from "@/Components/TruckDetails.vue";
import RetailerDetails from "@/Components/RetailerDetails.vue";
</script>

<template>
    <Head title="orders" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Orders</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!--                    <div class="p-6 text-gray-900">You're logged in!</div>-->
                    <div v-for="order in orders.orders" :key="order.id">
                        <button class="collapsible" @click="toggleCollapse(order)">
                            <h3>Order ID: {{ order.id }}</h3>
                            <p>Order placed at: {{ order.created_at  }}</p>
                            <p>Delivery At:     {{ order.delivery_date  }}</p>
                            <p>Order Status:     {{ order.status  }}</p>
                        </button>

                        <div class="content" v-show="order.collapsed">
                            <h4>Compartments:</h4>
                            <div v-for="compartment in order.compartments" :key="compartment.id">
                                <div class="compartment">
                                    <div>
                                        <p>Compartment ID: {{ compartment.id }}</p>
                                        <p>Fuel: {{ compartment.fuel }}</p>
                                        <p>Status: {{ compartment.status }}</p>
                                        <p>Capacity: {{ compartment.capacity }} liters</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
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
            orders: [],
            trucks: [],
            retailers: [],
            loading: false,
            selectedOrder: null,
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
                axios.get('api/retailers'),
                axios.get('api/orders')
            ])
                .then(axios.spread((trucksResponse, retailersResponse, ordersResponse) => {
                    this.trucks = trucksResponse.data.trucks.map(truck => {
                        return { ...truck, collapsed: false };
                    });
                    this.retailers = retailersResponse.data;
                    this.orders = ordersResponse.data;
                    this.loading = false;
                }))
                .catch(error => {
                    console.error('Error fetching data:', error);
                    this.loading = false;
                });
        },
        toggleCollapse(clickedOrder) {
            clickedOrder.collapsed = !clickedOrder.collapsed;
            this.selectedOrder = clickedOrder.id;
        },
    }
};
</script>

<style scoped>
.collapsible {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
}

.active {
    background-color: #ccc;
}

.content {
    overflow: hidden;
}

.compartment {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
}

.bar-container {
    width: 100%;
    height: 20px;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    position: relative;
}

.capacity-bar {
    height: 100%;
    background-color: purple;
}

.fuel-level {
    height: 100%;
    background-color: #dc3545;
    position: absolute;
    top: 0;
    left: 0;
}

.custom-button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 7px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px;
    border: 2px solid #4CAF50;
}

.fuel-drop-down {
    margin-top: 10px;
}

.custom-button:hover {
    background-color: white; /* Change the background color on hover */
    color: #4CAF50;
}
</style>
