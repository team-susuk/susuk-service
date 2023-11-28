<template>
    <Swiper :navigation="true" :pagination="true" :modules="modules" class="mySwiper">
        <template v-for="image in images">
            <SwiperSlide>
                <img class="swiper-image" :src="image" alt="">
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

    const modules = [Navigation, Pagination];

</script>
