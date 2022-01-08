<template>
    <div>
        <div class="row mb-3 justify-content-center">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <h1>Upload</h1>
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
                <div class="card bg-white shadow">
                    <div class="card-body p-3">
                        <form @submit.prevent="submitForm()">
                            <div class="mb-3">
                                <img
                                    :src="
                                        previewImage
                                            ? previewImage
                                            : `/images/${book.image}`
                                    "
                                    style="width: 200px; height: 200px"
                                    alt=""
                                    class="img-fluid border"
                                />
                            </div>
                            <div class="mb-3">
                                <label for="">Image</label>
                                <input
                                    @change="onUpload($event)"
                                    type="file"
                                    class="form-control rounded-0"
                                />
                            </div>
                            <button class="btn btn-primary rounded-0 w-100">
                                Upload
                            </button>
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
            previewImage: "",
            image: null,
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
        onUpload(e) {
            let files = e.target.files[0];
            this.previewImage = URL.createObjectURL(files);
            this.image = files;
        },
        submitForm() {
            let formData = new FormData();
            formData.append("image", this.image);

            axios.post(`/api/books/upload/${this.id}`, formData).then((res) => {
                this.$router.push({
                    name: "books.show",
                    params: { id: this.id },
                });
            });
        },
    },
};
</script>

<style></style>
