<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div
            class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-p-32 tw-h-full"
        >
            <div class="tw-mb-12">
                <div class="tw-text-3xl tw-font-semibold tw-mb-4">
                    Selamat Datang Admin
                </div>
                <div class="tw-text-gray-500">
                    Silahkan masukkan email atau nomor telepon dan password Anda
                    untuk mulai menggunakan aplikasi.
                </div>
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <v-alert
                v-if="$page.props.flash.notification"
                title="Berhasil"
                :text="$page.props.flash.notification.message"
                class="tw-mb-8"
                color="success"
                closable
            ></v-alert>

            <v-form class="tw-w-full" @submit.prevent="submit">
                <div>
                    <div class="tw-mb-2">Email / Nomer Telepon</div>
                    <v-text-field
                        v-model="form.email"
                        variant="outlined"
                        placeholder="Contoh: admin@gmail.com"
                        :error-messages="form.errors.email"
                    ></v-text-field>
                </div>

                <div>
                    <div class="tw-mb-2">Password</div>
                    <v-text-field
                        v-model="form.password"
                        type="password"
                        variant="outlined"
                        placeholder="Masukkan password"
                        :error-messages="form.errors.password"
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
                    >MASUK</v-btn
                >
            </v-form>
        </div>
    </GuestLayout>
</template>
