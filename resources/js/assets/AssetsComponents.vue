<template>
    <div>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-sm btn-primary" :href="'assetForm'">
                    Add Asset
                </a>
                <form class="form-inline ml-1 float-sm-right bg-warning" @submit.prevent="getSearch" style="border-radius: 5px">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" v-model="keywords">
                        <div class="input-group-append">
                            <button class="btn btn-navbar text-white" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <div class="row mt-2 mr-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Asset</th>
                                <th>Supplier</th>
                                <th>Asset Category</th>
                                <th>Serial No</th>
                                <th>Department</th>
                                <th>Location</th>
                                <th>Asset Value</th>
                                <th>Maintenance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(asset, index) in data" :key="asset.id">
                                <td>{{index+=1}}</td>
                                <td>
                                    <a :href="'asset/'+asset.id">
                                        {{asset.asset_name}}
                                    </a>
                                </td>
                                <td>{{asset.suppliers.name}}</td>
                                <td>{{asset.categories.category}}</td>
                                <td>{{asset.asset_serial_no}}</td>
                                <td>{{asset.department}}</td>
                                <td>{{asset.location}}</td>
                                <td>{{asset.purchase.total_amount}}</td>
                                <td v-if="asset.maintenance===0">No</td>
                                <td v-else>
                                    Yes
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-cogs"></i>Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item text-info">
                                            <a :href="'asset/'+asset.id">
                                                <i class="fa fa-eye"></i>
                                                More Info
                                            </a>
                                        </li>
                                        <li class="dropdown-item text-success" @click="editAsset(asset)">
                                            <i class="fa fa-edit"></i>
                                            Edit
                                        </li>
                                        <li class="dropdown-item text-danger" @click="destroy(asset.id)">
                                            <i class="fa fa-trash"></i>
                                            Delete
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="assetModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Asset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <form @submit.prevent="assetEdits">
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="asset_name">Asset Name</label>
                                    <input type="text" class="form-control" name="asset_name" v-model="asset_name" id="asset_name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="category_id">Asset Category</label>
                                    <select v-model="category_id" name="category_id" class="form-control" id="category_id">
                                        <option disabled value="">Select</option>
                                        <option v-for="category in categories" :value="category.id" :key="category.id">{{category.category}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="supplier_id">Supplier</label>
                                    <select v-model="supplier_id" name="category_id" class="form-control" id="supplier_id">
                                        <option disabled value="">Select</option>
                                        <option v-for="supplier in suppliers" :value="supplier.id" :key="supplier.id">{{supplier.name}}</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="asset_serial_no">Asset Serial No</label>
                                    <input type="text" class="form-control" name="asset_serial_no" v-model="asset_serial_no" id="asset_serial_no">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="department">Department</label>
                                    <input type="text" class="form-control" name="department" v-model="department" id="department">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="location">Location</label>
                                    <input type="text" class="form-control" name="location" v-model="location" id="location">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
    export default {
        props:[
            'categories',
            'suppliers'
        ],
    data() {
        return {
            data:{},
            baseURL:'',
            asset_name:'',
            asset_serial_no:'',
            department:'',
            location:'',
            supplier_id:'',
            category_id:'',
            maintenance:false,
            keywords:null,
        }
    },
    created() {
        this.getBaseURL();
    },
    mounted(){
        this.getAssets();
    },
    watch: {
        keywords(after,before){
            this.getSearch()
        }
    },
    methods: {
        getBaseURL: function(){
            let getUrl = window.location
            this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/";
        },
        getAssets(){
            axios.get(`api/assets`)
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        getSearch(){
            axios.get(`${this.baseURL}api/asset/search`,{
                params: {keywords: this.keywords}
            })
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        editAsset(asset){
            this.assetId = asset.id;
            this.asset_name = asset.asset_name;
            this.category_id = asset.category;
            this.supplier_id = asset.supplier_id;
            this.asset_serial_no = asset.asset_serial_no;
            this.department = asset.department;
            this.location = asset.location;
            $('#assetModal').modal('show')
        },
        assetEdits(){
            if(this.asset_name===''||this.category_id===''||this.supplier_id===''||this.asset_serial_no===''||this.department===''||this.location===''){
                Vue.$toast.warning('Check form inputs',{position:'top-right'})
            }
            else{
                fetch(`api/asset/${this.assetId}`,{
                    method:'put',
                    body:JSON.stringify({
                        "asset_name":this.asset_name,"category_id":this.category_id,"supplier_id":this.supplier_id,"asset_serial_no":this.asset_serial_no,"department":this.department,"location":this.location
                    }),
                    headers:{
                        'Accept':'application/json',
                        'Content-Type':'application/json',
                        'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                    }
                })
                .then(response=>response.json())
                .then(response=>{
                    if (response.status ===0){
                        this.getAssets();
                        Vue.$toast.success('Asset Updated successfully',{position:'top-right'})
                        $('#assetModal').modal('hide')
                    }
                })
            }
        },
        destroy(id){
            if(confirm('Are you sure you want to delete?')){
                fetch(`api/asset/${id}`,{
                    method:'delete',
                    headers:{
                        'Accept':'application/json',
                        'Content-Type':'application/json',
                        'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                    }
                })
                .then(response=>response.json())
                .then(response=>{
                    if (response.status ===0){
                        this.getAssets();
                        Vue.$toast.info('Asset Has been Deleted',{position:'top-right'});
                    }
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
