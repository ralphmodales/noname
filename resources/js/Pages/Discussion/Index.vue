<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    threads: Object,
    categoryName: String,
});
</script>

<template>
    <AuthenticatedLayout>
        <div class="min-h-screen bg-white text-black p-4">
            <div class="max-w-4xl mx-auto bg-white">
                <!-- Thread Header -->
                <div class="flex justify-center p-2">
                    <img src="https://fictionhorizon.com/wp-content/uploads/2023/09/GojoCB.jpg"
                    alt="Thread Header Image"
                    class="w-full max-w-md h-40 object-cover border-4 border-black" />
                </div>
                <div class="text-center p-2">
                    <h1 class="text-xl font-bold">/{{ categoryName }}/</h1>
                </div>

                <!-- New Discussion Button -->
                <div>
                    <button @click="openNewThreadForm"
                    class="w-full underline text-sm text-black">
                        Create New Thread
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
