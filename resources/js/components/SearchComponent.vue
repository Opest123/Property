<template>
    <div id="app" class="mt-6">
        <h1 class="text-center py-6 font-sans font-semibold text-4xl">Property Search</h1>
        <el-input
            type="text"
            v-model="keywords"
            placeholder="Search Properties..."
            class="mb-4 w-1/2">
        </el-input>
        <div v-if="loading" v-cloak>
            <p>Searching...</p>
        </div>
        <table v-if="results.length > 0 && keywords !== null"
               class="table-auto">
            <thead>
            <tr class="text-center">
                <th class="border w-1/4 px-4 py-2">ID</th>
                <th class="border w-1/4 px-4 py-2">Name</th>
                <th class="border w-1/4 px-4 py-2">Price</th>
                <th class="border w-1/4 px-4 py-2">Bedrooms</th>
                <th class="border w-1/4 px-4 py-2">Bathrooms</th>
                <th class="border w-1/4 px-4 py-2">Storeys</th>
                <th class="border w-1/4 px-4 py-2">Garages</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="result in results" :key="result.id" class="text-center">
                <td class="px-4 py-2" v-text="result.id"></td>
                <td class="px-4 py-2" v-text="result.name"></td>
                <td class="px-4 py-2" v-text="result.price"></td>
                <td class="px-4 py-2" v-text="result.bedrooms"></td>
                <td class="px-4 py-2" v-text="result.bathrooms"></td>
                <td class="px-4 py-2" v-text="result.storeys"></td>
                <td class="px-4 py-2" v-text="result.garages"></td>
            </tr>
            </tbody>
        </table>
        <div v-else>
            <el-alert
                v-if="results.length === 0 && keywords !== null"
                title="No Matching Property Found!!!"
                type="info"
                @close="">
            </el-alert>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                keywords: null,
                results: [],
                loading: false,
            };
        },

        watch: {
            keywords(after, before) {
                this.fetch();
            }
        },

        methods: {
            fetch() {
                this.loading = true
                axios.get('/api/search', {
                    params: {
                        keywords: this.keywords
                    }
                })
                    .then(response => {
                        this.results = response.data
                        this.loading = false
                    }).catch(error => {
                });
            }
        }
    }
</script>
