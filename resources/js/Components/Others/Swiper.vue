<template>
    <Swiper :navigation="true" :pagination="true" :modules="modules" class="mySwiper">
        <template v-for="image in images">
            <SwiperSlide>
                <Link :href="route('guide.merchants.detail', image.user_id)" v-if="image.user_id">
                    <img class="swiper-image" :src="image.image" alt="">
                </Link>
                <img class="swiper-image" :src="image.image" alt="" v-else>
            </SwiperSlide>
        </template>
    </Swiper>
</template>
<script setup lang="ts">
    // Import Swiper Vue.js components
    import { Swiper, SwiperSlide } from 'swiper/vue';

    defineProps<{
        images: Array<any>
    }>()

    // Import Swiper styles
    import 'swiper/css';
    import 'swiper/css/navigation';
    import 'swiper/css/pagination';


    // import required modules
    import { Navigation, Pagination } from 'swiper/modules';
    import { Link } from '@inertiajs/vue3';

    const modules = [Navigation, Pagination];

</script>
