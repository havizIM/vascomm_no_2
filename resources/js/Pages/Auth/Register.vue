<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    phone: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div
            class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-p-32 tw-h-full"
        >
            <div class="tw-mb-12">
                <div class="tw-text-3xl tw-font-semibold tw-mb-4">Pendaftaran</div>
                <div class="tw-text-gray-500">
                    Silahkan isi formulir dengan lengkap untuk melakukan pendaftaran. Admin kami akan mengirimkan kata sandi ke email anda setelah dilakukan approve.
                </div>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <v-form class="tw-w-full" @submit.prevent="submit">
                <div>
                    <div class="tw-mb-2">Nama</div>
                    <v-text-field
                        v-model="form.name"
                        variant="outlined"
                        placeholder="Contoh: John Doe"
                        :error-messages="form.errors.name"
                    ></v-text-field>
                </div>

                <div>
                    <div class="tw-mb-2">Email</div>
                    <v-text-field
                        v-model="form.email"
                        variant="outlined"
                        placeholder="Contoh: admin@gmail.com"
                        :error-messages="form.errors.email"
                    ></v-text-field>
                </div>

                <div>
                    <div class="tw-mb-2">No Telepon</div>
                    <v-text-field
                        v-model="form.phone"
                        variant="outlined"
                        placeholder="Contoh: 0851xxxxxxxx"
                        :error-messages="form.errors.phone"
                    ></v-text-field>
                </div>

                <v-btn
                    variant="flat"
                    block
                    color="primary"
                    size="large"
                    class="tw-mt-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    type="submit"
                    >DAFTAR</v-btn
                >
            </v-form>
        </div>
    </GuestLayout>
</template>
