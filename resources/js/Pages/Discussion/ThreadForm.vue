<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    categoryName: {
        type: String,
        required: true
    }
});

const form = useForm({
    title: '',
    description: '',
    category_id: 1
});

const submit = () => {
    form.post(`/t/${props.categoryName}/thread`, {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <div class="w-full max-w-2xl mx-auto bg-white p-6">
        <form @submit.prevent="submit" class="space-y-6">
            <!-- Title Input -->
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-black">Thread Title</span>
                </div>
                <input
                    v-model="form.title"
                    type="text"
                    placeholder="Type your title here"
                    class="input input-ghost input-bordered w-full bg-white text-black"
                />
                <div v-if="form.errors.title" class="label text-error">
                    {{ form.errors.title }}
                </div>
            </label>

            <!-- Description Input -->
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-black">Description</span>
                </div>
                <textarea
                    v-model="form.description"
                    class="textarea textarea-ghost textarea-bordered h-32 bg-white text-black"
                    placeholder="Type your description here"
                ></textarea>
                <div v-if="form.errors.description" class="label text-error">
                    {{ form.errors.description }}
                </div>
            </label>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button
                    type="submit"
                    class="btn btn-ghost underline text-black"
                    :disabled="form.processing"
                >
                    Create Thread
                </button>
            </div>
        </form>
    </div>
</template>
