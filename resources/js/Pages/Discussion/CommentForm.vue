<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    threadId: {
        type: Number,
        required: true
    },
    categoryName: {
        type: String,
        required: true
    }
});

const form = useForm({
    thread_id: props.threadId,
    comment: ''
});

const submitComment = () => {
    form.post(`/t/${props.categoryName}/comment`, {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <form @submit.prevent="submitComment" class="mt-4 pl-8">
        <div class="border-2 border-black bg-slate-50 p-4">
            <textarea
                v-model="form.comment"
                class="w-full p-2 border border-black rounded-md text-xs focus:outline-none focus:ring-2 focus:ring-black"
                rows="3"
                placeholder="Write your comment..."
                required
            ></textarea>
            <div class="mt-2 flex justify-end">
                <button
                    type="submit"
                    class="text-xs px-4 py-2 text-black underline focus:outline-none focus:ring-2 focus:ring-black"
                    :disabled="form.processing"
                >
                    Post Comment
                </button>
            </div>
            <p v-if="form.errors.comment" class="mt-1 text-red-500 text-xs">
                {{ form.errors.comment }}
            </p>
        </div>
    </form>
</template>
