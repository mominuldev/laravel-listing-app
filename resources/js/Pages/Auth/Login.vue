<script setup>
import Container from '../../Components/Container.vue';
import Title from '../../Components/Title.vue';
import InputField from '../../Components/InputField.vue';
import Checkbox from '../../Components/Checkbox.vue';
import TextLink from '../../Components/TextLink.vue';
import Button from '../../Components/Button.vue';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import { useForm } from '@inertiajs/vue3';

const $toast = useToast();


const form = useForm({
    email: '',
    password: '',
    remember: null,
});

const submit = () => {
    form.post(route('authenticate'), {
        // onStart: () => {
        //     $toast.info('Logging in...');
        // },
        onSuccess: () => {
            $toast.open({
                message: 'Login successful',
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
                message: 'Login failed',
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
    <Head title=" - Login" />
    <Container class="w-1/3">
        <div class="mb-8">
            <Title class="text-center mb-10">Login to your account</Title>
        
            <form @submit.prevent="submit">
                <InputField
                    label="Email"
                    type="email"
                    icon="envelope"
                    v-model="form.email"
                    :error="form.errors.email"
                />

                <InputField
                    label="Password"
                    type="password"
                    icon="key"
                    v-model="form.password"
                    :error="form.errors.password"
                />
                <div class="flex justify-between items-center mb-4">
                    <Checkbox v-model="form.remember" name="remember">Remember me</Checkbox>
                    <!-- <input type="checkbox" id="remember" v-model="form.remember" class="mr-2"> -->
                    <!-- <TextLink routeName="password.request" label="Forgot password?" /> -->
                    <TextLink routeName="login" label="Forgot password?" />
                </div>
                

                <Button :disabled="form.processing">Login</Button>
                <p class="mt-3">Don't have an account? <TextLink routeName="register" label="Register"/></p>
            </form>
        </div>
    </Container>
</template>


