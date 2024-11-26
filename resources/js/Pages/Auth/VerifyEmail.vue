<script setup>
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import Container from '../../Components/Container.vue';
import { useForm } from '@inertiajs/vue3';
import Button from '../../Components/Button.vue';

const form = useForm({});

defineProps({
    status: String,
});

const submit = () => {
    form.post(route('verification.send'), {
        onSuccess: () => {
            $toast.open({
                message: 'Verification email sent',
                type: 'success',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #00b09b, #96c93d)',
                }
            });
        },
        onError: (errors) => {
            $toast.open({
                message: 'Verification email failed to send',
                type: 'error',
                duration: 5000,
                style: {
                    background: 'linear-gradient(to right, #ff416c, #ff4b2b)',
                }
            });
        },
    });
}

</script>

<template>
    <Head title=" - Verify Email" />
    <Container class="w-1/2">
        <div class="mb-8">
            <Title class="text-center">Verify Email</Title>
            <p class="text-center mb-5">Before proceeding, please check your email for a verification link.</p>

            

            <form @submit.prevent="submit">

                <p class="text-center mb-5">If you did not receive the email, 
                    <Button>Click here to request another</Button>
                </p>
            </form>

            <p v-if="status" class="mt-3 text-green-500 text-center">{{ status }}</p>
        </div>
    </Container>
</template>


