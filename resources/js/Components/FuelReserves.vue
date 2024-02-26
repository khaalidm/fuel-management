<template>
    <div class="fuel-reserves">
        <h2>Fuel Reserves</h2>
        <div class="fuel-bar">
            <div class="fuel-type">
                <span>Diesel:</span>
                <div class="bar-container">
                    <div class="bar green" :style="{ width: dieselPercentage + '%' }"></div>
                    <span class="percentage">{{ dieselPercentage }}%</span>
                </div>
            </div>
            <div class="fuel-type">
                <span>Petrol 93:</span>
                <div class="bar-container">
                    <div class="bar blue" :style="{ width: petrol93Percentage + '%' }"></div>
                    <span class="percentage">{{ petrol93Percentage }}%</span>
                </div>
            </div>
            <div class="fuel-type">
                <span>Petrol 95:</span>
                <div class="bar-container">
                    <div class="bar red" :style="{ width: petrol95Percentage + '%' }"></div>
                    <span class="percentage">{{ petrol95Percentage }}%</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        diesel: {
            type: Number,
            required: true
        },
        petrol93: {
            type: Number,
            required: true
        },
        petrol95: {
            type: Number,
            required: true
        },
        totalCapacity: {
            type: Number,
            required: true
        }
    },
    computed: {
        dieselPercentage() {
            return (this.diesel / this.totalCapacity) * 100;
        },
        petrol93Percentage() {
            return (this.petrol93 / this.totalCapacity) * 100;
        },
        petrol95Percentage() {
            return (this.petrol95 / this.totalCapacity) * 100;
        }
    }
};
</script>

<style scoped>
.fuel-reserves {
    margin-top: 20px;
}

.fuel-bar {
    display: flex;
    flex-direction: column;
}

.fuel-type {
    margin-bottom: 10px;
}

.bar-container {
    position: relative;
    height: 20px;
    border: 1px solid #ccc;
}

.bar {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
}

.green {
    background-color: green;
}

.blue {
    background-color: blue;
}

.red {
    background-color: red;
}

.percentage {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 5px;
}
</style>
