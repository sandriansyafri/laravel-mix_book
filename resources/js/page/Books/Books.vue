<template>
    <div>
        <div class="row mb-3">
            <div class="col">
                <h1 class="mb-3">List Book</h1>
                <button
                    @click.prevent="create()"
                    class="btn btn-primary rounded-0"
                >
                    Create Book
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">
                                    #
                                </th>
                                <th class="text-center" style="width: 60%">
                                    Title
                                </th>
                                <th class="text-center" style="width: 30%">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="books.length">
                                <tr
                                    v-for="(book, index) in books"
                                    :key="book.id"
                                >
                                    <td class="text-center">{{ index + 1 }}</td>
                                    <td class="text-center">
                                        {{ book.title }}
                                    </td>
                                    <td class="text-center">
                                        <button
                                            @click.prevent="
                                                uploadImage(book.id)
                                            "
                                            class="btn btn-sm btn-info rounded-0"
                                        >
                                            Upload Image
                                        </button>
                                        <button
                                            @click="detailBook(book.id)"
                                            class="btn btn-sm btn-primary rounded-0"
                                        >
                                            Detail
                                        </button>
                                        <button
                                            @click.prevent="edit(book.id)"
                                            class="btn btn-sm btn-warning rounded-0"
                                        >
                                            Edit
                                        </button>
                                        <button
                                            @click="deleteBook(book.id)"
                                            class="btn btn-sm btn-danger rounded-0"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        Data Not Found
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            books: [],
        };
    },
    created() {
        this.getBooks();
    },
    methods: {
        getBooks() {
            axios.get(`/api/books`).then((res) => {
                this.books = res.data.data;
            });
        },
        create() {
            this.$router.push({
                name: "books.create",
            });
        },
        detailBook(id) {
            this.$router.push({
                name: "books.show",
                params: { id },
            });
        },
        uploadImage(id) {
            this.$router.push({
                name: "books.upload",
                params: { id },
            });
        },
        deleteBook(id) {
            axios.delete(`/api/books/${id}`).then((res) => {
                this.getBooks();
            });
        },
        edit(id) {
            this.$router.push({
                name: "books.edit",
                params: { id },
            });
        },
    },
};
</script>

<style></style>
