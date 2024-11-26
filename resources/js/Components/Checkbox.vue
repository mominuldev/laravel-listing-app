<script setup>

const model = defineModel();

defineProps({
    name: String,
});

</script>

<template>
    <div>
        <label class="text-sm dark:text-white flex items-center gap-2" for="name">
            <input type="checkbox" id="name" v-model="model" class="rounded-md border-1 outline-0 text-indigo-500 ring-indigo-500 border-slate-700"> 
            <slot />
        </label>
    </div>
</template>


