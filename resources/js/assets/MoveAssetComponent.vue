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
                                <button class="btn btn-primary btn-sm" data-toggle="modal">
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
                                            <td>HP Laptop</td>
                                            <td>Finance</td>
                                            <td>Nelson Sammy</td>
                                            <td>9/1/2021</td>
                                            <td>No</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cogs"></i>Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item text-success">
                                                        <i class="fa fa-edit"></i>
                                                        Update
                                                    </li>
                                                    <li class="dropdown-item text-danger">
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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
export default{
    data(){
        return{
            data:{},
            user_id:'',
            department_id:'',
            asset_id:'',
            maintenance:'',
            created_at:''
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
            if(this.user_id===''||this.department_id===''||this.asset_id===''){
                Vue.$toast.error('All Input fields are required');
            }
            fetch(`api/move/store`,{
                method:'post',
                body:JSON.stringify({

                })
            })
        }
    },
}
</script>
