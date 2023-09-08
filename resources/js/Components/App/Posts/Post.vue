<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import Badge from "@/Components/App/Badge.vue";

defineProps({
    post: Object,
})
</script>

<template>
    <div>
        <div class="mt-8">
            <h2 class="text-xl font-medium text-indigo-500 underline">
                <Link :href="route('posts.edit', post)" class="focus:outline-none">
                    {{ post.title }}
                </Link>
            </h2>
            <br />
            <small>({{ post.created_at }})</small>
            <h3 class="text-lg font-medium">
                {{ post.user.name }}
            </h3>
            <p class="mt-2 text-sm text-gray-500">
                Categorías:
                <Badge :text="post.category.name" />
            </p>
            <p class="mt-2 text-sm text-gray-500">
                Etiquetas:
                <Badge
                    v-for="tag in post.tags"
                    :key="tag.id"
                    :text="tag.name"
                />
            </p>
        </div>
    </div>
</template>
