<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref } from "vue";
import { register } from "swiper/element/bundle";

register();

const bannerCount = ref(1);
const length = ref(7);

const next = () => {
    bannerCount.value =
        bannerCount.value + 1 > length.value ? 1 : bannerCount.value + 1;
};

const prev = () => {
    bannerCount.value =
        bannerCount.value - 1 <= length.value ? 1 : bannerCount.value - 1;
};

defineProps({
    newestProduct: {
        type: Array,
    },
    summaryProduct: {
        type: Array,
    },
});

const makeCurrency = (number) => Math.round(number).toLocaleString("id");
</script>

<template>
    <Head title="Home" />

    <AppLayout>
        <v-container>
            <div>
                <v-window v-model="bannerCount">
                    <v-window-item
                        v-for="n in length"
                        :key="`card-${n}`"
                        :value="n"
                    >
                        <img src="/images/sample/banner-1.png" />
                    </v-window-item>
                </v-window>

                <div class="tw-flex tw-gap-2 tw-py-2">
                    <v-btn
                        variant="plain"
                        icon="mdi-chevron-left"
                        @click="prev"
                    ></v-btn>

                    <div class="tw-flex tw-items-center tw-gap-2">
                        <div
                            v-for="n in length"
                            :key="n"
                            :class="{
                                'tw-w-[10px] tw-h-[10px] tw-rounded-full tw-cursor-pointer': true,
                                'tw-bg-[#F9F9F9]': n !== bannerCount,
                                'tw-bg-[#302d28]': n === bannerCount,
                            }"
                            @click="bannerCount = n"
                        ></div>
                    </div>

                    <v-btn
                        variant="plain"
                        icon="mdi-chevron-right"
                        @click="next"
                    ></v-btn>
                </div>
            </div>

            <div class="tw-py-4">
                <div class="tw-text-2xl tw-mb-4 tw-font-semibold">Terbaru</div>

                <div>
                    <swiper-container
                        :slides-per-view="5"
                        :space-between="20"
                        :navigation="true"
                        class="product-swiper tw-relative"
                    >
                        <swiper-slide
                            v-for="(item, n) in newestProduct"
                            :key="n"
                            class="tw-h-auto"
                        >
                            <div
                                class="hover:tw-border hover:tw-border-gray-500 hover:tw-shadow-2xl tw-px-4 tw-py-8 tw-h-full tw-cursor-pointer"
                            >
                                <div
                                    class="tw-flex tw-justify-center tw-items-center"
                                >
                                    <img
                                        :src="item.image"
                                        class="tw-w-[150px] tw-h-[150px] tw-object-cover"
                                    />
                                </div>
                                <div class="tw-mt-8">
                                    <div>{{ item.name }}</div>
                                    <div
                                        class="tw-text-primary tw-font-semibold"
                                    >
                                        IDR {{ makeCurrency(item.price) }}
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper-container>
                </div>
            </div>

            <div class="tw-py-4 tw-mb-10">
                <div class="tw-text-2xl tw-mb-4 tw-font-semibold">
                    Produk Tersedia
                </div>

                <div class="tw-grid tw-grid-cols-5 tw-gap-4">
                    <div
                        v-for="(item, n) in summaryProduct"
                        :key="n"
                        class="hover:tw-border hover:tw-border-gray-500 hover:tw-shadow-2xl tw-px-4 tw-py-8 tw-h-full tw-cursor-pointer"
                    >
                        <div class="tw-flex tw-justify-center tw-items-center">
                            <img
                                :src="item.image"
                                class="tw-w-[150px] tw-h-[150px] tw-object-cover"
                            />
                        </div>
                        <div class="tw-mt-8">
                            <div>{{ item.name }}</div>
                            <div class="tw-text-primary tw-font-semibold">
                                IDR {{ makeCurrency(item.price) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="tw-w-full tw-flex tw-items-center tw-justify-center tw-mt-8"
                >
                    <v-btn variant="outlined" color="primary"
                        >Lihat lebih banyak</v-btn
                    >
                </div>
            </div>
        </v-container>
    </AppLayout>
</template>

<style scoped>
.swiper-button-next {
    color: black !important;
}

.swiper-button-prev {
}
</style>
