<script setup>
import { ref } from 'vue';
import { formatDistanceToNow } from 'date-fns';
import CommentForm from './CommentForm.vue';

const props = defineProps({
    thread: {
        type: Object,
        required: true,
    }
});

const newComment = ref('');

const emit = defineEmits(['submit-comment']);

const submitComment = () => {
    if (newComment.value.trim()) {
        emit('submit-comment', {
            threadId: props.thread.id,
            comment: newComment.value
        });
        newComment.value = '';
    }
};
</script>

<template>
    <div class="mb-8 mt-4">
        <!-- Thread Container -->
        <div class="border-2 border-black bg-slate-50 p-4 mb-2">
            <!-- Thread Header -->
            <div class="flex items-center gap-2 mb-2">
                <span class="font-bold text-black text-sm">{{ thread.user.username }}</span>
                <span class="text-gray-600 text-xs">
                    {{ formatDistanceToNow(new Date(thread.created_at)) }} ago
                </span>
            </div>

            <!-- Thread Title -->
            <h2 class="font-bold text-md mb-2">{{ thread.title }}</h2>

            <!-- Thread Content -->
            <div class="mb-4 whitespace-pre-wrap text-xs">{{ thread.description }}</div>

            <!-- Comment Count -->
            <div class="text-xs text-gray-600">
                {{ thread.comments?.length || 0 }} replies
            </div>
        </div>

        <!-- Comments Container -->
        <div class="pl-8">
            <div v-for="comment in thread.comments"
                 :key="comment.id"
                 class="border-2 border-black bg-slate-50 p-4 mb-2">
                <!-- Comment Header -->
                <div class="flex items-center gap-2 mb-2">
                    <span class="font-bold text-black text-sm">{{ comment.user.username }}</span>
                    <span class="text-gray-600 text-xs">
                        {{ formatDistanceToNow(new Date(comment.created_at)) }} ago
                    </span>
                </div>

                <!-- Comment Content -->
                <div class="whitespace-pre-wrap text-xs">{{ comment.comment }}</div>
            </div>
            <CommentForm :thread-id="thread.id" :category-name="$page.props.category" />
        </div>
    </div>
</template>
