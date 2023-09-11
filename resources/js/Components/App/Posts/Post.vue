<script setup>
import { Link,router  } from "@inertiajs/vue3";
import Badge from "@/Components/App/Badge.vue";

/* 
const objeto = {
    posts: [],
            categories: {},
            tags: {},
            filters: {},
            initial_filters: {},
} */
/* defineProps({
    post: Object
}) */

const props = defineProps({
    post: {
        type: Object,
 
    },
    tag:{
        type:Object
    }
})
console.log(props)

</script>

<template>
    <div>
        <div class="mt-8">
            <h2 class="text-xl font-medium text-indigo-500 underline">
                <Link :href="route('posts.edit', props.post)" class="focus:outline-none">
                    {{ props.post.title }}
                </Link>
            </h2>
            <br />
            <small>({{ props.post.created_at }})</small>
            <h3 class="text-lg font-medium">
                {{ props.post.user.name }}
            </h3>
            <p class="mt-2 text-sm text-gray-500">
                Categorías:
                <Badge :text="props.post.category.name" />
            </p>
            <p class="mt-2 text-sm text-gray-500">
                Etiquetas:
                {{  }}
                <Badge
                    v-for="tag in post.tags"
                    :key="tag.id"
                    :text="tag.name"
                />
            </p>
        </div>
    </div>
</template>
