<template>
    <div>
        <div class="row mb-3 justify-content-center">
            <div class="col-6">
                <div class="row">
                    <div class="col">
                        <h1>Book</h1>
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
                <div class="card shadow-sm bg-white border-0">
                    <div class="card-body p-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span class="fw-bold">Title</span>
                                    </div>
                                    <div class="col">: {{ book.title }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span class="fw-bold">Author</span>
                                    </div>
                                    <div class="col">: {{ book.author }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span class="fw-bold">Genre</span>
                                    </div>
                                    <div class="col">: {{ book.genre }}</div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <span class="fw-bold">Page</span>
                                    </div>
                                    <div class="col">: {{ book.page }}</div>
                                </div>
                            </li>
                            <li class="list-group-item" v-if="book.image">
                                <div class="row">
                                    <div class="col">
                                        <span class="fw-bold">Image</span>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <img
                                                class="img fluid"
                                                :src="'/images/' + book.image"
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <template v-if="!book.image">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col">
                                            <span class="fw-bold">Image</span>
                                        </div>
                                        <div class="col">: -</div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
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
    },
};
</script>

<style></style>
