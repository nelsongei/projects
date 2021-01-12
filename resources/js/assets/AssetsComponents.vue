<template>
    <div>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-sm btn-primary" :href="'assetForm'">
                    Add Asset
                </a>
                <div class="row mt-2 mr-2">
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Asset</th>
                            <th>Asset Category</th>
                            <th>Serial No</th>
                            <th>Department</th>
                            <th>Location</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <tr v-for="(asset, index) in data" :key="asset.id">
                            <td>{{index+=1}}</td>
                            <td>{{asset.asset_name}}</td>
                            <td>{{asset.categories.category}}</td>
                            <td>{{asset.asset_serial_no}}</td>
                            <td>{{asset.department}}</td>
                            <td>{{asset.location}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cogs"></i>Action
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
    export default {
    data() {
        return {
            data:{},
            baseURL:'',
            asset_name:'',
            asset_serial_no:'',
            department:'',
            location:'',
        }
    },
    created() {
        this.getBaseURL();
    },
    mounted(){
        this.getAssets();
    },
    methods: {
        getBaseURL: function(){
            var getUrl = window.location
            this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/public/";
        },
        getAssets(){
            axios.get(`${this.baseURL}api/assets`)
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
    }
}
</script>
