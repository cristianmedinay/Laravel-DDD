<script setup>
import { onMounted, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link,router  } from "@inertiajs/vue3";
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from "@/Components/App/Pagination.vue";
import Post from "@/Components/App/Posts/Post.vue";

const props = defineProps({
    model: {
        type: Object,
        default: {
            posts: [],
            categories: {},
            tags: {},
            filters: {},
            initial_filters: {},
            targss:{}
        },
    },
})

const input = ref(null);
const filters = ref(props.model.filters);

onMounted(() => input.value.focus());

const exportToExcel = () => {
    let queryString = [];
    Object.keys(filters.value).forEach(key => {
        if (Array.isArray(filters.value[key])) {
            filters.value[key].forEach((value) => {
                queryString.push(`${key}[]=${value}`);
            });
        }
        if (typeof filters.value[key] === 'string') {
            if (filters.value[key]) {
                queryString.push(`${key}=${filters.value[key]}`);
            }
        }
    })
    window.location.href = `${window.route('posts.export-to-excel')}?${queryString.join('&')}`;
};

const paginate = page => {
    filters.value.page = page;
    Inertia.get(route('posts.index'), filters.value, {
        preserveScroll: true,
    });
}

const filterData = () => {
    paginate();
}

const resetFilters = () => {
    filters.value = props.model.initial_filters;
    filterData();
}

/* console.log( props.model) */
</script>

<template>
    <AppLayout title="Posts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>

            <Link :href="route('posts.create')"
            >
                Crear nuevo post
            </Link>

            <a
                @click.prevent="exportToExcel"
            >
                Exportar a Excel
            </a>
        </template>

        <div class="py-8">
            <div >
                <div>
                    <div class="col-span-1">
                        <input
                            ref="input"
                            placeholder="Búsqueda por título"
                            v-model="filters.query"
                            @input="filterData"
                            type="text"
                        />
                    </div>
                    <div class="col-span-1">
                        <select
                            v-if="model.categories"
                            multiple
                            v-model="filters.categories"
                            @change="filterData"
                        >
                            <option v-for="category in model.categories.data" :value="category.id" v-bind:key="category.id">
                                {{ category.name }}
                            </option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <select
                            v-if="model.tags"
                            multiple
                            v-model="filters.tags"
                            @change="filterData"
                        >
                            <option v-for="tag in model.tags.data" :value="tag.id" v-bind:key="tag.id">
                                {{ tag.name }}
                            </option>
                        </select>
                    </div>

                    <div class="col-span-1 mx-auto my-auto">
                        <button
                            @click="resetFilters"
                            type="button"
                        >
                            Restablecer filtros
                        </button>
                    </div>
                </div>

                <div>
                    <div v-if="model.posts.data.length">
                        <Post
                            v-for="post in model.posts.data"
                            :key="post.id"
                            :post="post"
                        />
                    </div>
                    <div class="text-center py-4" v-else>
                        <h3>No hay posts</h3>
                        <p>Crea el primer post.</p>
                        <div class="mt-6">
                            <Link
                                :href="route('posts.create')"
                            >
                                Nuevo Post
                            </Link>
                        </div>
                    </div>
                </div>

                <Pagination
                    v-if="model.posts.data.length"
                    :pagination="model.posts.meta"
                    @paginate="paginate"
                />
            </div>
        </div>
    </AppLayout>
</template>
