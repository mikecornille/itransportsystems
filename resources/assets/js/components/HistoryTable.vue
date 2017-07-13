<template>
    <div class="container-fluid">
        <div class="row">
            <v-server-table :url="url" :columns="columns" :options="options"></v-server-table>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            pick_city_filter: {
                default: null,
                required: false
            }
        },
        computed: {
            url: function() {
                return `/api/history`;
            }
        },
        data:
            function() {
                return {
                    columns: ['pick_city', 'pick_state', 'delivery_city', 'delivery_state', 'load_type', 'commodity', 'miles', 'length', 'width', 'height', 'weight', 'customer', 'urgency', 'billing_money', 'offer_money', 'created_at'],
                    options: {

                        filterByColumn:true,
                        initFilters: {
                            pick_city:this.pick_city_filter
                        },
                            }
                        }
                        },
    }
</script> 
