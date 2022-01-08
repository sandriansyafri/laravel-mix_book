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
                                    v-model="book.title"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="">Author</label>
                                <input
                                    type="text"
                                    class="form-control rounded-0"
                                    v-model="book.author"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="">Genre</label>
                                <select
                                    v-model="book.genre"
                                    name=""
                                    id=""
                                    class="form-select rounded-0"
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
                                    v-model="book.page"
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
    props: ["id"],
    data() {
        return {
            book: {},
        };
    },
    created() {
        this.getBook();
    },
    methods: {
        getBook() {
            axios.get(`/api/books/${this.id}`).then((res) => {
                this.book = res.data.data;
            });
        },
        back() {
            this.$router.push({
                name: "books",
            });
        },
        submitForm() {
            axios.put(`/api/books/${this.id}`, this.book).then((res) => {
                this.$router.push({
                    name: "books",
                });
            });
        },
    },
};
</script>

<style></style>
