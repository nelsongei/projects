<template>
    <div>
        <div class="card">
            <form class="form-horizontal" @submit.prevent="submitAsset">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="col-form-label" for="asset_name">Asset Name</label>
                            <input type="text" class="form-control" name="asset_name" id="asset_name" v-model="asset_name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label" for="category_id">Category</label>
                            <select name="category_id" class="form-control" id="category_id" v-model="category_id">
                                <option disabled value="">Select</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{category.category}}</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label" for="asset_serial_no">Serial No</label>
                            <input type="text" class="form-control" name="asset_serial_no" id="asset_serial_no" v-model="asset_serial_no">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label" for="department">Department</label>
                            <input type="text" class="form-control" id="department" name="department" v-model="department">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label" for="location">Location</label>
                            <input type="text" class="form-control" id="location" name="location" v-model="location">
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import Vue from 'vue'
    export default {
    props:[
        'categories',
    ],
        data () {
            return{
                asset_name:'',
                category_id:'',
                asset_serial_no:'',
                department:'',
                location:'',
                baseURL:'',
            }
        },
        created () {
            this.getBaseURL();
        },
        methods:{
            getBaseURL: function(){
                var getUrl = window.location
                this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/public/";
            },
            submitAsset(){
                if(this.asset_name===''||this.category_id===''||this.asset_serial_no===''||this.department===''||this.location===''){
                    Vue.$toast.warning('All form inputs are required',{position:'top-right'});
                }
                else{
                    fetch(`${this.baseURL}api/asset/store`,{
                        method:'post',
                        body:JSON.stringify({
                            "asset_name":this.asset_name,"category_id":this.category_id,"asset_serial_no":this.asset_serial_no,"department":this.department,"location":this.location
                        }),
                        headers:{
                            'Accept':'application/json',
                            'Content-Type':'application/json',
                            'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                        }
                    })
                    .then(response=>response.json())
                    .then(response=>{
                        if(response.status===0){
                            Vue.$toast.success('Asset added successfully',{position:'top-right'})
                            window.location.reload();
                        }
                    })
                }
            }
        }
    }
</script>
