Vue.use(VueRouter);
import Vue from "vue";
import VueRouter from "vue-router";
import Books from "../page/Books/Books.vue";
import Book from "../page/Books/Book.vue";
import Upload from "../page/Books/Upload.vue";
import Create from "../page/Books/Create.vue";
import Edit from "../page/Books/Edit.vue";

const routes = [
    { path: "/", redirect: "/books" },
    { path: "/books", name: "books", component: Books },
    { path: "/books/create", name: "books.create", component: Create },
    { path: "/books/:id", name: "books.show", component: Book, props: true },
    {
        path: "/books/upload/:id",
        name: "books.upload",
        component: Upload,
        props: true,
    },
    {
        path: "/books/:id/edit",
        name: "books.edit",
        component: Edit,
        props: true,
    },
];

const router = new VueRouter({
    mode: "history",
    routes,
});

export default router;
