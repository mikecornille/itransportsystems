<template>
    <div class="container">
        <div class="row">
            <v-client-table :data="tableData" :columns="columns" :options="options"></v-client-table>
        </div>
    </div>
</template>

<script>
    export default {
        data:
            function() {
                return {
                    columns: ['id', 'pick_city', 'pick_state'],
                    tableData: window.data,
                    options: {
                        filterByColumn:true
                            }
                        }
                        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script> 
