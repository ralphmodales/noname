<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    categories: {
        type: Array,
    },
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="min-h-screen bg-white text-black">
            <div class="max-w-4xl mx-auto bg-white">
                <!-- Header Image -->
                <div class="p-2">
                    <img src="https://giffiles.alphacoders.com/221/221575.gif"
                         alt="Header Image"
                         class="w-full h-40 object-cover border-4 border-black">
                </div>

                <!-- Categories Bar -->
                <div class="bg-slate p-2 border border-black mt-4">
                    <h2 class="text-xs font-bold text-center mb-2">[Categories]</h2>
                    <div class="flex flex-wrap justify-center gap-2">
                        <Link v-for="category in categories"
                           :key="category"
                           :href="`/t/${category.name}`"
                           class="text-xs text-black underline cursor-pointer">
                            /{{ category.name.toLowerCase() }}/
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

