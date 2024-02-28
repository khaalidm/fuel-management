<template>
    <div>
        <button @click="openModal">Open Modal</button>
        <OrderModal :is-open="isModalOpen" @close="closeModal">
            <!-- Modal content goes here -->
            <h2>Modal Title</h2>
            <p>This is a blank modal.</p>
            <button @click="closeModal">Close Modal</button>
        </OrderModal>
    </div>
</template>

<script>
import Modal from './Modal.vue';
import OrderModal from "@/Components/OrderModal.vue";

export default {
    components: {
        OrderModal,
        Modal
    },
    data() {
        return {
            isModalOpen: false
        };
    },
    methods: {
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        }
    }
};
</script>
