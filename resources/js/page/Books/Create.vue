<template>
    <div>
        <div class="row mb-3 justify-content-center">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <h1>{{ id ? "Update" : "Create" }}</h1>
                    </div>
                    <div class="col text-end">
                        <button
                            @click.prevent="back()"
                            class="btn btn-primary rounded-0 px-5"
                        >
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card shadow-sm bg-body">
                    <div class="card-body p-3">
                        <form @submit.prevent="submitForm()">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input
                                    type="text"
                                    class="form-control rounded-0"
                                    v-model="books.title"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="">Author</label>
                                <input
                                    type="text"
                                    class="form-control rounded-0"
                                    v-model="books.author"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="">Genre</label>
                                <select
                                    name=""
                                    id=""
                                    class="form-select rounded-0"
                                    v-model="books.genre"
                                >
                                    <option value="">Select</option>
                                    <option value="action">Action</option>
                                    <option value="drama">Drama</option>
                                    <option value="comedy">Comedy</option>
                                    <option value="romance">Romance</option>
                                    <option value="horror">Horror</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Page</label>
                                <input
                                    type="number"
                                    class="form-control rounded-0"
                                    v-model="books.page"
                                />
                            </div>
                            <div>
                                <button
                                    type="submit"
                                    class="btn btn-primary rounded-0 px-5"
                                >
                                    {{ id ? "Update" : "Submit" }}
                                </button>
                            </div>
                        </form>
                    </div>
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
            books: {
                title: "",
                author: "",
                genre: "",
                page: "",
            },
        };
    },
    methods: {
        back() {
            this.$router.push({
                name: "books",
            });
        },
        submitForm() {
            axios.post(`/api/books/create`, this.books).then((res) => {
                this.$router.push({
                    name: "books",
                });
            });
        },
    },
};
</script>

<style></style>
