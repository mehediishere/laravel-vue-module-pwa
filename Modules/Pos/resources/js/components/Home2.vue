<template>
    <div>
        <h1>Welcome to the POS System - 2</h1>

        <ul>
            <li><a href="/">Dashboard</a></li>
            <li><RouterLink to="/pos">Pos Home 1</RouterLink></li>
            <li><RouterLink to="/pos/2">Pos Home 2</RouterLink></li>
            <li><RouterLink to="/pos/3">Pos Home 3</RouterLink></li>
        </ul>
    </div>
</template>

<script setup>
// Vue 3 Composition API can be used here
</script>

<style scoped>
h1 {
    color: #333;
}
</style>
