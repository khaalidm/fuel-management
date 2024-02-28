<template>
    <div v-for="retailer in retailers" :key="retailer.id">
    <div class="retailer-tank-status">
        <h3>{{ retailer[0].name }}</h3>
        <div class="tank">
            <div class="fuel-column">
                <div class="label">ULP 93</div>
                <div class="fuel-bar ulp-93" :style="{ width: (retailer[0].ulp_93 / retailer[0].ulp_93_tank * 100) + '%' }">
                    <span class="demand">{{ retailer[0].ulp_93  }}</span>
                </div>
                <span> {{ retailer[0].ulp_93_demand_per_day }} liters per day</span>
            </div>
            <div class="fuel-column">
                <div class="label">ULP 95</div>
                <div class="fuel-bar ulp-95" :style="{ width: (retailer[0].ulp_95 / retailer[0].ulp_95_tank * 100) + '%' }">
                    <span class="demand">{{ retailer[0].ulp_95 }}</span>
                </div>
                <span> {{ retailer[0].ulp_95_demand_per_day }} liters per day</span>
            </div>
            <div class="fuel-column">
                <div class="label">Diesel</div>
                <div class="fuel-bar diesel" :style="{ width: (retailer[0].diesel / retailer[0].diesel_tank * 100) + '%' }">
                    <span class="demand">{{ retailer[0].diesel }}</span>
                </div>
                <span> {{ retailer[0].diesel_demand_per_day }} liters per day</span>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
export default {
    props: {
        retailers: {
            type: Object,
            required: true
        }
    }
};
</script>

<style scoped>
.retailer-tank-status {
    margin-bottom: 20px;
}

.tank {
    display: flex;
    justify-content: space-between;
}

.fuel-column {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: #4b5563 1px solid;
}

.label {
    margin-bottom: 5px;
}

.fuel-bar {
    height: 30px;
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.demand {
    margin-left: 5px;
}

.ulp-93 {
    background-color: #ff4500;
}

.ulp-95 {
    background-color: #32cd32;
}

.diesel {
    background-color: #1e90ff;
}
</style>
