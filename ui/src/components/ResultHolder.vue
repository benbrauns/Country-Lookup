<script setup>

const props = defineProps({
    countries: {
        type: Array
    }
})

const test = (flags) => {
    return `url("${flags.png}")`;
}

</script>

<template>
    <div class="table-holder">
        <table class="country-table">
            <tr>
                <th>Name</th>
                <th>Population</th>
                <th>Region</th>
                <th>SubRegion</th>
                <th>Currencies</th>
                <th>Flag</th>
            </tr>
            <tr class="country-row" v-for="country in countries" :key="country.cca2">
                <td>{{ country.name.common }}</td>
                <td>{{ country.population }}</td>
                <td>{{ country.region }}</td>
                <td>{{ country.subregion }}</td>
                <td class="currencies">
                    <div class="currencies-holder">
                        <span class="currency" v-for="currency in country.currencies"
                            :style="{ width: (1 / Object.keys(country.currencies).length * 100).toString() + '%' }">
                            <div class="currency-name">
                                {{ currency.name }}
                            </div>
                            <div class="currency-symbol">
                                {{ currency.symbol }}
                            </div>
                        </span>
                    </div>

                </td>
                <td>
                    <div class="flag" :style="{ 'background-image': test(country.flags) }">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</template>

<style scoped>
.table-holder {
    height: 100%;
    overflow: auto;
}

.country-table {
    color: white;
    width: 100%;
    border-spacing: 0px;
    min-width: 700px;
}

.country-table>tr {
    height: 50px;
}

.country-table td,
.country-table th {
    border-bottom: solid 1px rgba(84, 84, 84, 0.48);
    border-left: solid 1px rgba(84, 84, 84, 0.48);
}

.country-row>td {
    min-width: 16.66666%;
    width: 16.66666%;
    text-align: center;
}

.currencies {
    min-width: 100%;
    width: 100%;
    max-width: 100%;
    height: 50px;
}

.currencies-holder {
    display: flex;
}

.currency {
    display: flex;
    flex-direction: column;
}

.flag {
    height: 50px;
    width: 100%;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    margin-left: auto;
    margin-right: auto;
}
</style>