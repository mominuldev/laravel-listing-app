<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import InputField from '../../Components/InputField.vue';

import Button from '../../Components/Button.vue';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import { useForm } from '@inertiajs/vue3';

const $toast = useToast();

defineProps({
    status: String,
});


const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'), {
        // onStart: () => {
        //     $toast.info('Logging in...');
        // },
        onSuccess: () => {
            $toast.open({
                message: 'Password reset link sent',
                type: 'success',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                }
            });
        },
        
        onError: (errors) => {
            form.errors = errors;
            form.reset('password')
            $toast.open({
                message: 'Password reset link failed to send',
                type: 'error',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #ff416c, #ff4b2b)',
                }
            });
        },
    });
};


</script>
<template>
    <Head title=" - Forgot Password" />
    <Container class="w-1/3">
        <div class="mb-8">
        
            <Title class="text-center mb-10">Forgot Password</Title>
            <p class="text-center mb-5">Enter your email address to reset your password.</p>
        
            <form @submit.prevent="submit">
                <InputField
                    label="Email"
                    type="email"
                    icon="envelope"
                    v-model="form.email"
                    :error="form.errors.email"
                />
                <Button :disabled="form.processing">Send Password Reset Link</Button>
            </form>

            <p v-if="status" class="mt-3 text-green-500 text-center">{{ status }}</p>
        </div>
    </Container>
</template>


