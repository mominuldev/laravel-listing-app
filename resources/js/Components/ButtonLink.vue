<script setup>

defineProps({
    routeName: String,
    class: String,
    label: String,
})

</script>

<template>
    <Link :href="route(routeName)" class="px-3 py-2 rounded-lg transition ease-in-out duration-300 inline-block bg-slate-600 text-white hover:bg-slate-700 dark:bg-slate-600 {{ class }}">
        {{ label }}
    </Link>
</template>
