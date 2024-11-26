<script setup>

const model = defineModel();

defineProps({
    label: String,
    icon: String,
    type: {
        type: String,
        default: 'text'
    },
    placeholder: {
        type: String,
        default: ''
    },
    error: {
        type: String,
        default: ''
    },
})
</script>


<template>
    <div class="mb-4 text-left">
        <label :for="label" class="block text-sm font-medium text-slate-700 dark:text-slate-300">
            {{ label }}
        </label>
        <div class="relative mt-1 rounded-md">
            <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center pl-3">
                <span class="grid place-content-center text-sm text-slate-400 dark:text-slate-500">
                    <i :class="`fa-solid fa-${icon}`"></i>
                </span>
            </div>

            <input :type="type" 
                :placeholder="placeholder" 
                :id="label" 
                v-model="model"
                class="block w-full pl-9 pr-3 text-sm border border-slate-300 rounded-md shadow-sm outline-0 transition ease-in-out duration-300 dark:text-white focus:ring-1 focus:ring-inset focus:ring-indigo-400 focus:border-indigo-400 placeholder:text-slate-400 dark:bg-slate-800 " 
            />

        </div>
        <div class="text-sm text-red-600 dark:text-red-400 mt-2" v-if="error">
            {{ error }}
        </div>
    </div>
</template>
