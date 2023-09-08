<script setup>
const props = defineProps({
    textModel: {
        type: String,
        default: 'posts',
    },
    pagination: Object,
})

defineEmits(['paginate'])

const from = props.pagination;
const to = props.pagination;
const total = props.pagination;
const current_page = props.pagination;
const last_page = props.pagination;
const links = props.pagination;

</script>

<template>
    <div :key="new Date().getTime()">
        <div>
            <div>
                <p>
                    Mostrando de {{ from }} a {{ to }} de {{ total }} {{ textModel }}
                </p>
            </div>
            <div>
                <nav aria-label="Pagination">
                    <a
                        v-for="link in links"
                        :key="link.label"
                        href="#"
                    >
                        <span
                            v-if="link.label === 'first'"
                            @click.prevent="$emit('paginate', 1)"
                        >
                            <span class="sr-only">Primera</span> &lt; &lt;
                        </span>

                        <span
                            v-if="link.label === 'prev'"
                            @click="$emit('paginate', current_page - 1)"
                        >
                            <span class="sr-only">Anterior</span> &lt;
                        </span>

                        <a
                            v-if="!isNaN(link.label)"
                            @click.prevent="$emit('paginate', link.label)"
                            :class="[link.active ? 'bg-indigo-600 text-white' : 'bg-white text-gray-500', 'border-gray-300']"
                        >
                            {{ link.label }}
                        </a>

                        <span
                            v-if="link.label === 'next'"
                            @click="$emit('paginate', current_page + 1)"
                        >
                            <span class="sr-only">Siguiente</span> &gt;
                        </span>

                        <span
                            v-if="link.label === 'last'"
                            @click="$emit('paginate', last_page)"
                        >
                            <span class="sr-only">Última</span> &gt; &gt;
                        </span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</template>
