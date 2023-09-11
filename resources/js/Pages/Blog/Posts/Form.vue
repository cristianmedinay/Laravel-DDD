<script setup>
import { onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    errors: Object,
    model: Object,
    title: {
        type: String,
        default: 'Crear un nuevo post',
    },
    actionText: {
        type: String,
        default: 'Crear',
    }
});

const form = useForm({
    id: null,
    title: "",
    body: "",
    category_id: "",
    tags: [],
});

onMounted(() => {
    /* console.log('hola');
    console.log(props.model) */
    const post = props.model.post;
    if (post) {
        form.id = post.data.id;
        form.title = post.data.title;
        form.body = post.data.body;
        form.category_id = post.data.category.id;
        form.tags = post.data.tags.map(t => t.id);
    }
});

const submit = () => {
    if (form.id) {
        form.patch(window.route('posts.update', {id: form.id}));
    } else {
        form.post(window.route('posts.store'));
    }
}
/* const submit = () => {
    if (form.id) {
        form.patch(window.route('posts.update', {id: form.id}));
    } else {
        form.post(window.route('posts.store'));
    }
} */
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ title }}
            </h2>
        </template>

        <div class="py-8">
            <div>
                <form @submit.prevent="submit">
                    <div>
                        <div class="w-full">
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="flex rounded-md shadow-sm">
                                    <input
                                        v-model="form.title"
                                        type="text"
                                        placeholder="Título"
                                    />
                                </div>
                                <div
                                    v-if="errors.title"
                                    class="bg-red-500 text-white p-1 rounded-lg"
                                >
                                    {{ errors.title }}
                                </div>
                            </div>
                        </div>

                        <div class="w-full">
                            <select
                                v-model="form.category_id"
                            >
                                <option value="">Selecciona una categoría</option>
                                <option
                                    v-for="category in model.categories.data"
                                    :value="category.id" v-bind:key="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                            <div class="bg-red-500 text-white p-1 rounded-lg" v-if="errors.category_id">
                                {{ errors.category_id }}
                            </div>
                        </div>
                        <div class="w-full">
                            <select
                                multiple
                                v-model="form.tags"
                            >
                                <option value="">Selecciona etiquetas</option>
                                <option
                                    v-for="tag in model.tags.data"
                                    :value="tag.id"  v-bind:key="tag.id"
                                >
                                    {{ tag.name }}
                                </option>
                            </select>
                            <div class="bg-red-500 text-white p-1 rounded-lg" v-if="errors.tags">
                                {{ errors.tags }}
                            </div>
                        </div>

                        <div class="w-full">
                            <div class="mt-1 sm:mt-0">
                                <textarea
                                    v-model="form.body"
                                    rows="3"
                                />
                            </div>
                            <div
                                v-if="errors.body"
                                class="bg-red-500 text-white p-1 rounded-lg"
                            >
                                {{ errors.body }}
                            </div>
                        </div>
                    </div>

                    <button type="submit">
                        {{ actionText }}
                    </button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
