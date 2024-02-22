<script setup>
import CountrySearch from "@/components/CountrySearch.vue"
</script>

<template>
  <header>
    <img id="globe-icon" src="./assets/globe.png" />
    <h2>
      Country Lookup
    </h2>
  </header>

  <main>
    <CountrySearch />
  </main>
</template>

<style scoped>
header {
  font-weight: bold;
  grid-area: header;
  width: 100%;
  height: 100%;
  box-sizing: border-box;

  margin: 0px;
  display: flex;
  justify-content: flex-start;
  align-items: center;

  color: white;
  /* box-shadow: 0px 0px 10px gray; */
  border-bottom: solid 1px rgba(84, 84, 84, 0.48);

}

header>* {
  margin-left: 20px;
}

header>h1 {
  font-weight: bold;
}

header>#globe-icon {
  height: 75%;
  width: auto;
  filter: saturate(0) invert(1);
}


main {
  grid-area: main;
  height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
