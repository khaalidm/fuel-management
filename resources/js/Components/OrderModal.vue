<template>
    <div class="modal" v-if="isOpen">
        <div class="modal-content">
            <span class="close" @click="closeModal">&times;</span>
            <h2>Modal Title</h2>
            <p>This is the content of the modal.</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false
        };
    },
    methods: {
        openModal() {
            this.isOpen = true;
        },
        closeModal() {
            this.isOpen = false;
        }
    }
};
</script>

<style scoped>
/* Modal styles here */
</style>
