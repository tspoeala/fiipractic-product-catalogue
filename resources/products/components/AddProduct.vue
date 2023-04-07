<template>
    <div class="container my-24 px-6 mx-auto">

        <section class="mb-32 text-gray-800">
            <div class="max-w-[700px] mx-auto px-3 lg:px-6">
                <h2 class="text-3xl font-bold mb-12">Add product</h2>
                <form>
                    <div class="form-group mb-6">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900
                        text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                        dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500" placeholder="* Title" v-model='product.title'>
                        <span v-if="errors.title" class="error">{{ errors.title[0] }}</span>
                    </div>
                    <div class="form-group mb-6">
                        <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="categories" v-model='product.category_id' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=''>Choose one...</option>
                            <option v-for="category in categories" :value='category.id'>{{ category.name }}</option>
                            <span v-if="errors.category_id" class="error">{{ errors.category_id[0] }}</span>
                        </select>
                    </div>
                    <div class="form-group mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" rows="4" v-model="product.description" class="block p-2.5 w-full text-sm
                        text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500" placeholder="Write your description here...">
                        </textarea>
                        <span v-if="errors.description" class="error">{{ errors.description[0] }}</span>
                    </div>
                    <div class="form-group mb-6">
                        <label for="cover_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cover URL</label>
                        <textarea id="cover_url" rows="2" v-model="product.cover_url" class="block p-2.5 w-full text-sm
                        text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500" placeholder="Write your cover url here...">
                        </textarea>
                    </div>
                    <div class="form-group mb-6">
                        <label for="purchase_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purchase URL</label>
                        <textarea id="purchase_url" rows="2" v-model="product.purchase_url" class="block p-2.5 w-full text-sm
                        text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500
                        dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                        dark:focus:border-blue-500" placeholder="Write your purchase url here...">
                        </textarea>
                    </div>
                    <button @click="submitForm" type="button" class="
          w-30
          px-6
          py-2.5
          bg-blue-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-blue-700 hover:shadow-lg
          focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-blue-800 active:shadow-lg
          transition
          duration-150
          ease-in-out">Add</button>
                </form>
                <div v-if="formError" class='text-red-700'>{{ formError }}</div>
            </div>

        </section>
    </div>
</template>
<script>
import axios from 'axios'

export default {
    name: 'AddProduct',

    data() {
        return {
            product: {
                title: '',
                description: '',
                category_id: '',
                cover_url: '',
                purchase_url: '',
            },
            errors: {},
            formError: '',
            categories: []
        }
    },
    mounted() {
        this.loading=true;
        axios
            .get("http://127.0.0.1:8000/api/categories")
            .then((response) => {
                this.categories = response.data.categories;
                this.loading=false;
            })
            .catch((error) => {
                console.log(error);
            });
    },

    methods: {
        submitForm() {
            axios.post('http://127.0.0.1:8000/api/products', this.product
            )
                .then(response => {
                    this.$router.push({name: 'home'});
                })
                .catch(error => {
                    this.formError = 'Something went wrong. Please try again later.'
                    if (error.response.data.message) {
                        this.formError = error.response.data.message;
                    }
                })
        }
    }
}
</script>

<style>
.error {
    color: red;
}
</style>
