<script setup>
import Container from '../Components/Container.vue';
</script>

<template>
    <Container>
        <h1 class="text-3xl font-bold text-center">Welcome back {{ $page.props.auth.user.name }}</h1>
    </Container>
</template>