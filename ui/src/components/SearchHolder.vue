<script setup>
import { ref } from 'vue';
let name = ref('');
let code = ref('');
let currency = ref('');

const emit = defineEmits(['search']);

const onSubmit = () => {
    if (!name.value && !code.value && !currency.value) {
        //TODO: In a bigger project I would impliment toasts her to give the user feedback about why it wasn't working
        console.warn("There was no value entered")
        return;
    }

    const searchData = {
        name: name.value,
        alpha: code.value,
        currency: currency.value
    }

    emit('search', searchData)
}


</script>


<template>
    <form class="search-holder" @submit.prevent="onSubmit">
        <div class="input-pair">
            <label for="country-name">
                Name:
            </label>
            <input :disabled="code != '' || currency != ''" type="text" id="country-name" v-model="name">
        </div>
        <div class="input-pair">
            <label for="country-code">
                Code:
            </label>
            <input :disabled="name != '' || currency != ''" type="text" id="country-code" v-model="code">
        </div>
        <div class="input-pair">
            <label for="country-currency">
                Currency:
            </label>
            <input :disabled="name != '' || code != ''" type="text" id="country-currency" v-model="currency">
        </div>



        <button @click="search">Search</button>
    </form>
</template>

<style scoped>
.search-holder {
    box-sizing: border-box;
    padding: 5px;
    border-right: solid 1px rgba(84, 84, 84, 0.48);
    display: flex;
    flex-direction: column;
    height: 100%;
    max-height: 100%;
    width: 100%;
    background-color: #1a1a1a;
    color: white;
}

.input-pair {
    width: 100%;
    height: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-around;
    margin-bottom: 10px;
}

label {
    font-weight: bold;
    float: left;
    width: 20%
}

input {
    background-color: #2f2f2f;
    border-radius: 5px;
    height: 100%;
    width: 65%;
    text-align: right;
    color: white;
    font-size: 1.5rem;
}
</style>