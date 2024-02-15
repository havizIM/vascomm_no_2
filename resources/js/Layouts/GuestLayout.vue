<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <v-app>
        <v-main app>
            <div class="tw-grid tw-grid-cols-2 tw-w-full tw-h-full">
                <div class="tw-bg-primary tw-flex tw-flex-col tw-justify-center tw-items-center tw-p-32">
                    <Link href="/" class="tw-text-5xl tw-mb-8 tw-font-semibold">NAMA APLIKASI</Link>

                    <div class="tw-text-center tw-font-medium">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </div>
                </div>
                <div>
                    <slot />
                </div>
            </div>
        </v-main>
    </v-app>
</template>
