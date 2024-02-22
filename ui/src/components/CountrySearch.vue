<script setup>
import { ref } from 'vue';
import SearchHolder from "@/components/SearchHolder.vue"
import ResultHolder from "@/components/ResultHolder.vue"
import CountryLookupService from "@/services/CountryLookupService.js";

const countries = ref([])

const handleSearch = (searchData) => {
    let url

    for (let field in searchData) {
        if (searchData[field]) {
            url = `${field}/${searchData[field]}`
        }
    }

    CountryLookupService.Search(url).then((response) => {
        if (response.status == 200) {
            countries.value = response.data
        }
        else {
            console.warn("Something went wrong");
            //TODO: in a full scale project I would add toasts here to make it more user friendly
        }
    });
}

</script>


<template>
    <section class="country-search">
        <SearchHolder @search="handleSearch" />
        <ResultHolder :countries="countries" />
    </section>
</template>

<style scoped>
.country-search {
    display: grid;
    grid-template-columns: 20% 3fr;
    grid-template-rows: 1fr;
    grid-template-areas:
        "search results";
    height: inherit;
    max-height: 100%;
    width: 100%;
}

.search-holder {
    grid-area: search;
    min-width: 200px;
}

.result-holder {
    grid-area: results;
}
</style>