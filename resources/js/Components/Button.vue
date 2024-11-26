<script setup>

</script>


<template>
    <button class="inline-block px-6 py-2 rounded-lg transition ease-in-out duration-300 inline-block bg-slate-950 text-white disable:bg-slate-300 disabled:cursor-wait hover:bg-slate-700 dark:bg-slate-600 {{ class }}">
        <slot />
    </button>
</template>

