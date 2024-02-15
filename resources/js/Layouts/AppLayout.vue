<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';

const menu = ref(false);
</script>

<template>
    <v-app>
        <v-app-bar app>
            <div
                class="tw-flex tw-justify-between tw-items-center tw-w-full tw-p-8"
            >
                <div>
                    <Link href="/">
                        <img src="/images/logo.png" />
                    </Link>
                </div>
                <div class="tw-w-[50%]">
                    <v-text-field
                        density="compact"
                        variant="solo"
                        placeholder="Cari parfum kesukaanmu"
                        append-inner-icon="mdi-magnify"
                        hide-details
                    ></v-text-field>
                </div>
                <div class="tw-flex tw-gap-2">
                    <v-menu
                        v-if="$page.props.auth.user"
                        v-model="menu"
                        :close-on-content-click="true"
                    >
                        <template v-slot:activator="{ props }">
                            <div class="tw-text-right tw-cursor-pointer" v-bind="props">
                                <div class="tw-font-semibold">
                                    {{ $page.props.auth.user.name }}
                                </div>
                                <div class="tw-text-xs tw-text-primary">
                                    {{ $page.props.auth.user.email }}
                                </div>
                            </div>
                        </template>

                        <v-card>
                            <v-card-item>
                                <div class="tw-flex tw-justify-center tw-items-center tw-flex-col tw-p-10">
                                    <div class="tw-w-[80px] tw-h-[80px] tw-rounded-full tw-bg-gray-500 tw-mb-4"></div>
                                    <div class="tw-font-semibold">{{ $page.props.auth.user.name }}</div>
                                    <div class="tw-text-xs">{{ $page.props.auth.user.email }}</div>

                                    <Link :href="route('logout')" method="post" as="button">
                                        <v-btn variant="text" color="error" class="tw-mt-8">
                                            <v-icon icon="mdi-power"></v-icon>
                                            Logout
                                        </v-btn>
                                    </Link>
                                </div>
                            </v-card-item>
                        </v-card>
                    </v-menu>

                    <Link v-if="!$page.props.auth.user" :href="route('login')">
                        <v-btn variant="outlined" color="primary">Masuk</v-btn>
                    </Link>

                    <Link
                        v-if="!$page.props.auth.user"
                        :href="route('register')"
                    >
                        <v-btn variant="flat" color="primary">Daftar</v-btn>
                    </Link>
                </div>
            </div>
        </v-app-bar>

        <v-main app>
            <slot />

            <hr />

            <v-container>
                <div class="tw-flex tw-gap-16 tw-py-16">
                    <div
                        class="tw-flex tw-flex-col tw-justify-between tw-items-center tw-w-[35%]"
                    >
                        <img src="/images/logo.png" />

                        <div class="tw-text-center tw-text-sm tw-font-normal">
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Ut commodo in vestibulum, sed dapibus
                            tristique nullam.
                        </div>

                        <div
                            class="tw-flex tw-items-center tw-justify-center tw-gap-8"
                        >
                            <div class="tw-cursor-pointer">
                                <img src="/images/sample/facebook.png" />
                            </div>
                            <div class="tw-cursor-pointer">
                                <img src="/images/sample/twitter.png" />
                            </div>
                            <div class="tw-cursor-pointer">
                                <img src="/images/sample/instagram.png" />
                            </div>
                        </div>
                    </div>

                    <div class="tw-w-[15%]">
                        <div class="tw-mb-8 tw-font-semibold">Layanan</div>

                        <div class="tw-flex tw-flex-col tw-gap-4">
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                BANTUAN
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                TANYA JAWAB
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                HUBUNGI KAMI
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                CARA BERJUALAN
                            </div>
                        </div>
                    </div>

                    <div class="tw-w-[15%]">
                        <div class="tw-mb-8 tw-font-semibold">Tentang Kami</div>

                        <div class="tw-flex tw-flex-col tw-gap-4">
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                ABOUT US
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                KARIR
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                BLOG
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                KEBIJAKAN PRIVASI
                            </div>
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                SYARAT DAN KETENTUAN
                            </div>
                        </div>
                    </div>

                    <div class="tw-w-[35%]">
                        <div class="tw-mb-8 tw-font-semibold">Mitra</div>

                        <div class="tw-flex tw-flex-col tw-gap-4">
                            <div
                                class="tw-cursor-pointer hover:tw-text-primary"
                            >
                                SUPPLIER
                            </div>
                        </div>
                    </div>
                </div>
            </v-container>

            <div class="tw-h-[24px] tw-bg-[#E4FDFF]"></div>
        </v-main>
    </v-app>
</template>
