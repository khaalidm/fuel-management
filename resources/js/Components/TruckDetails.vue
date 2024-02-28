<template>
    <div>
<!--        <h2>Trucks Available</h2>-->
        <div v-if="loading">Loading...</div>
        <div v-else>
            <div v-for="truck in trucks" :key="truck.id">
                <button class="collapsible" @click="toggleCollapse(truck)">
                    <h3>Truck ID: {{ truck.id }}</h3>
                    <p>Registration: {{ truck.registration }}</p>
                    <p>Status: {{ truck.status }}</p>
                    <p>Total Capacity: {{ truck.total_capacity }} liters</p>
                </button>
                 <button class="custom-button" @click="submitTruckDetails(truck)">Order {{truck.registration}}</button>

                <div class="content" v-show="truck.collapsed">
                    <h4>Compartments:</h4>
                    <div v-for="compartment in truck.compartments" :key="compartment.id">
                        <div class="compartment">
                            <div>
                            <p>Compartment ID: {{ compartment.id }}</p>
                            <p>Fuel: {{ compartment.fuel }}</p>
                            <p>Status: {{ compartment.status }}</p>
                            <p>Capacity: {{ compartment.capacity }} liters</p>
                                <div class="fuel-drop-down">
                                    <label for="fuelType">Select Fuel Type:</label>
                                    <select id="fuelType" v-model="compartment.fuel"  @change="updateStatus(truck, compartment)">
                                        <option value="diesel">Diesel</option>
                                        <option value="petrol_93">Petrol 93</option>
                                        <option value="petrol_95">Petrol 95</option>
                                        <option value="empty">Empty</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</template>

<script>
import {router} from "@inertiajs/vue3";
import ButtonModal from "@/Components/OrderModal.vue";
import OrderModal from "@/Components/OrderModal.vue";

const today = new Date(); // Get today's date
const twoDaysFromNow = new Date(today.getTime() + 2 * 24 * 60 * 60 * 1000);


export default {
    name: 'TruckDetails',
    components: {OrderModal},
    props: {
        trucks: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            orderPlaced: false,
            loading: false,
            selectedFuelType: 'empty',
            selectedTruck: null,
            ulp_93: 0,
            ulp_95: 0,
            diesel: 0,
            compartments: [],
            status: 'pending',
            delivery_date: twoDaysFromNow.toISOString().split('T')[0],
            // maxCapacity: 0
        };
    },
    mounted() {
        // this.calculateMaxCapacity();
    },
    methods: {
        toggleCollapse(clickedTruck) {
            clickedTruck.collapsed = !clickedTruck.collapsed;
            this.selectedTruck = clickedTruck.id;
        },
        openOrder(truck) {
            // this.$inertia.visit(route('order', { truckOrder: truck }))
        },
        submitTruckDetails(truck) {
            // Prepare the data to be sent
            const data = {
                "id": 1,
                "truck_id": this.selectedTruck,
                "retailer_id": null,
                "ulp_93": this.ulp_93,
                "ulp_95": this.ulp_95,
                "diesel": this.diesel,
                "compartments": truck.compartments,
                "status": "pending",
                "delivery_date": this.delivery_date,
                "delivered_at": null,
            };

            // Send the POST request using Axios
            axios.post('api/orders', data)
                .then(response => {
                    // Handle success
                    console.log('Truck details and compartment details submitted successfully');
                    this.orderPlaced = true;
                    setTimeout(() => {
                        this.orderPlaced = false;
                    }, 3000);
                })
                .catch(error => {
                    // Handle error
                    console.error('Error submitting truck details and compartment details:', error);
                });
        },
        updateStatus(truck, compartment) {
            // Update status to 'loaded' when a fuel type is selected
            this.trucks[truck.id].compartments[compartment.id] = 'loaded';
        }

        // openModal() {
        //     this.$refs.modal.openModal();
        // }
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

