<template>
    <admin-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                genres Index
            </h2>
        </template>

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2 justify-end">
                        <form
                            class="flex space-x-4 shadow bg-white rounded-md m-2 p-2"
                        >
                            <div class="p-1">
                                <button
                                    type="button"
                                    @click="generateGenres"
                                    class="inline-flex items-center justify-center py-2 px-4 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-green-600 hover:bg-green-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-green-700 transition duration-150 ease-in-out disabled:opacity-50"
                                >
                                    <svg
                                        v-if="showSpinner"
                                        role="status"
                                        class="inline mr-3 w-4 h-4 text-white animate-spin"
                                        viewBox="0 0 100 101"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB"
                                        />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor"
                                        />
                                    </svg>
                                    <span>Generate</span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <div
                        class="w-full mb-8 overflow-hidden rounded-lg shadow-lg bg-white"
                    >
                        <div class="p-2 m-2">
                            <div class="flex justify-between">
                                <div class="flex-1">
                                    <div class="relative">
                                        <div
                                            class="absolute flex items-center ml-2 h-full"
                                        >
                                            <svg
                                                class="w-4 h-4 fill-current text-primary-gray-dark"
                                                viewBox="0 0 16 16"
                                                fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"
                                                ></path>
                                            </svg>
                                        </div>

                                        <input
                                            v-model="search"
                                            type="text"
                                            placeholder="Search by title"
                                            class="px-8 py-3 w-full md:w-2/6 rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <select
                                        v-model="perPage"
                                        @change="getGenres"
                                        class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm"
                                    >
                                        <option value="5">5 Per Page</option>
                                        <option value="10">10 Per Page</option>
                                        <option value="15">15 Per Page</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="w-full overflow-x-auto">
                            <Table>
                                <template #tableHead>
                                    <TableHead>Title</TableHead>
                                    <TableHead>Slug</TableHead>
                                    <TableHead>Manager</TableHead>
                                </template>
                                <TableRow
                                    v-for="genre in genres.data"
                                    :key="genre.id"
                                >
                                    <TableData>{{ genre.title }}</TableData>
                                    <TableData>{{ genre.slug }}</TableData>

                                    <TableData>
                                        <div class="flex justify-around">
                                            <ButtonLink
                                                :link="
                                                    route(
                                                        'admin.genres.edit',
                                                        genre.id
                                                    )
                                                "
                                                >Edit
                                            </ButtonLink>
                                            <ButtonLink
                                                class="bg-red-500 hover:bg-red-700"
                                                method="delete"
                                                as="button"
                                                type="button"
                                                :link="
                                                    route(
                                                        'admin.genres.destroy',
                                                        genre.id
                                                    )
                                                "
                                                >Delete
                                            </ButtonLink>
                                        </div>
                                    </TableData>
                                </TableRow>
                            </Table>
                            <div class="m-2 p-2">
                                <Pagination :links="genres.links" />
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </admin-layout>
</template>

<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "../../Components/Pagination.vue";
import { ref, watch, defineProps } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Table from "@/Components/Table.vue";
import TableData from "@/Components/TableData.vue";
import TableHead from "@/Components/TableHead.vue";
import TableRow from "@/Components/TableRow.vue";
import ButtonLink from "@/Components/ButtonLink.vue";

const props = defineProps({
    genres: Object,
    filters: Object,
});

const search = ref(props.filters.search);
const perPage = ref(props.filters.perPage);
const showSpinner = ref(false);

watch(search, (value) => {
    Inertia.get(
        "/admin/genres",
        { search: value, perPage: perPage.value },
        { preserveState: true, replace: true }
    );
});

function getGenres() {
    Inertia.get(
        "/admin/genres",
        { perPage: perPage.value, search: search.value },
        { preserveState: true, replace: true }
    );
}

function generateGenres() {
    Inertia.post(
        "/admin/genres",
        {},
        {
            onStart: () => (showSpinner.value = true),
            onFinish: () => (showSpinner.value = false),
        }
    );
}
</script>

<style></style>
