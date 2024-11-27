<script setup>
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import TextLink from '../../Components/TextLink.vue';
import InputField from '../../Components/InputField.vue';
import Button from '../../Components/Button.vue';
import { useForm } from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';

const $toast = useToast();

const props = defineProps({
    token: String,
    email: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
   
    form.post(route('password.update'), {
        onSuccess: () => {
            $toast.open({
                message: 'Password reset successful',
                type: 'success',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                }
            });
        },
        onError: (errors) => {
            form.reset('password', 'password_confirmation')
            $toast.open({
                message: 'Password reset failed',
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
    <Head title=" - Reset Password" />
    <Container class="w-1/3">
        <div class="mb-8">
            <Title class="text-center">Reset Password</Title>
            <p class="text-center mb-5">Already have an account? <TextLink routeName="login" label="login"/></p>

            <form @submit.prevent="submit">
                <InputField label="Email" v-model="form.email" :error="form.errors.email" type="email" icon="at" />
                <InputField label="Password" v-model="form.password" :error="form.errors.password" type="password" placeholder="Enter your new password" icon="key" />
                <InputField label="Confirm Password" v-model="form.password_confirmation" type="password" placeholder="Enter confirm password" icon="key" />
                
                <Button :disabled="form.processing">Reset Password</Button>
            </form>
                
        </div>

    </Container>
</template>