<template>
    <div>
        <div class="card card-tabs">
            <div class="card-header p-0 pt-0">
                <ul class="nav nav-tabs" role="tablist" id="custom-tabs-one-tab">
                    <li class="nav-item">
                        <a class="nav-link text-warning active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                            Move Details
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" role="tabpanel" id="custom-tabs-one-home" aria-labelledby="custom-tabs-one-home">
                        <div class="ard">
                            <div class="card-header">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" @click="addMoved">
                                    <i class="fa fa-arrow-alt-circle-right"></i>Move Asset
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Asset Name</th>
                                            <th>Department</th>
                                            <th>Custodian</th>
                                            <th>Date Moved</th>
                                            <th>Asset Maintenance</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(move,index) in data" :key="move.id">
                                            <td>{{index+=1}}</td>
                                            <td>{{move.asset.asset_name}}</td>
                                            <td>{{ move.department.name }}</td>
                                            <td>{{ move.user.name+' '+move.user.lastName }}</td>
                                            <td>{{move.created_at}}</td>
                                            <td v-if="move.maintenance===0">No</td>
                                            <td v-else>Yes</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cogs"></i>Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item text-danger" @click="destroy(move.id)">
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
                        <div class="modal fade" id="moveAsset">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Move Asset</h5>
                                        <button class="close" type="button" data-toggle="modal" aria-labelledby="Close" data-dismiss="modal">
                                            &times;
                                        </button>
                                    </div>
                                    <form @submit.prevent="storeAssetMoved">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label" for="asset_id">Asset Name</label>
                                                    <select v-model="asset_id" id="asset_id" name="asset_id" class="form-control">
                                                        <option disabled value="">Select</option>
                                                        <option v-for="asset in assets" :key="asset.id" :value="asset.id">{{asset.asset_name}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label class="col-form-label" for="user_id">Custodian</label>
                                                    <select v-model="user_id" id="user_id" name="user_id" class="form-control">
                                                        <option disabled value="">Select</option>
                                                        <option v-for="user in users" :key="user.id" :value="user.id">{{user.name+' '+user.lastName}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label class="col-form-label" for="department_id">Department</label>
                                                    <select v-model="department_id" id="department_id" name="department_id" class="form-control">
                                                        <option disabled value="">Select</option>
                                                        <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label class="col-form-label" for="notes">Note</label>
                                                    <textarea class="form-control" v-model="notes" name="notes" id="notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                                &times;Close
                                            </button>
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
export default{
    props:[
        'users',
        'departments',
        'assets'
    ],
    data(){
        return{
            data:{},
            user_id:'',
            department_id:'',
            asset_id:'',
            maintenance:'',
            created_at:'',
            notes:'',

        }
    },
    created(){
        this.getMovedAssets();
    },
    methods:{
        getMovedAssets(){
            axios.get(`api/moves`)
            .then(response=>{
                this.data = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        storeAssetMoved(){
            if(this.user_id===''||this.department_id===''||this.asset_id===''||this.notes===''){
                Vue.$toast.error('All Input fields are required',{position:'top-right'});
            }
            else{
                fetch(`api/move/store`,{
                    method:'post',
                    body:JSON.stringify({
                        "user_id":this.user_id,"department_id":this.department_id,"asset_id":this.asset_id,"notes":this.notes
                    }),
                    headers: {
                        'Accept':'application/json',
                        'Content-Type':'application/json',
                        'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                    }
                })
                .then(response=>response.json())
                .then(response=>{
                    if (response.status===0){
                        this.getMovedAssets();
                        Vue.$toast.success('Asset has Been Moved',{position:'top-right'});
                        $('#moveAsset').modal('hide')
                    }
                })
            }
        },
        addMoved(){
            this.user_id='';
            this.department_id='';
            this.asset_id='';
            this.notes='';
            $('#moveAsset').modal('show')
        },
        destroy(id){
            if(confirm('Are you sure')){
                fetch(`api/move/${id}`,{
                    method:'delete',
                    headers: {
                        'Accept':'application/json',
                        'Content-Type':'application/json',
                        'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                    }
                })
                    .then(response=>response.json())
                    .then(response=>{
                        if (response.status===0){
                            this.getMovedAssets();
                            Vue.$toast.info('You have deleted successfully',{position:'top-right'})
                        }
                    })
                    .catch(error=>{
                        console.log(error)
                    })
            }
        }
    },
}
</script>
