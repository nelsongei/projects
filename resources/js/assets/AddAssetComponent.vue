<template>
    <div>
        <div class="card card-tabs">
            <div class="card-header p-0 pt-0">
                <ul class="nav nav-tabs" role="tablist" id="custom-tabs-one-tab">
                    <li class="nav-item">
                        <a class="nav-link text-warning active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">
                            Asset and Purchase Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#suppliers" class="nav-link text-warning" id="custom-supplier-tab" data-toggle="pill" role="tab" aria-controls="custom-supplier-tab" aria-selected="false">
                            Add Suppliers
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home">
                        <div class="card">
                            <form class="form-horizontal" @submit.prevent="submitAsset">
                                <div class="card-header">
                                    <button class="btn btn-primary btn-sm" type="submit">
                                        Save
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <h3 class="col-md-12 card-title text-bold">Asset Details</h3>
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
                                            <label class="col-form-label" for="supplier_id">Supplier</label>
                                            <select name="supplier_id" class="form-control" id="supplier_id" v-model="supplier_id">
                                                <option disabled value="">Select</option>
                                                <option v-for="supplier in suppliers" :key="supplier.id" :value="supplier.id">{{supplier.name}}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="asset_serial_no">Serial No</label>
                                            <input type="text" class="form-control" name="asset_serial_no" id="asset_serial_no" v-model="asset_serial_no">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="department">Department</label>
                                            <select name="department" class="form-control" v-model="department" id="department">
                                                <option disabled value="">Select</option>
                                                <option v-for="department in departments" :key="department.id">{{ department.name }}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="location">Location</label>
                                            <input type="text" class="form-control" id="location" name="location" v-model="location">
                                        </div>
                                        <h3 class="col-md-12 card-title text-bold">Purchase Details</h3>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="receipt_no">Receipt No</label>
                                            <input type="text" class="form-control" id="receipt_no" name="receipt_no" v-model="receipt_no">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="quantity">Quantity</label>
                                            <input type="number" min="1" class="form-control" id="quantity" name="quantity" v-model="quantity">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="amount">Amount Per Unit</label>
                                            <input type="number" min="1" class="form-control" id="amount" name="amount" v-model.number="amount">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="purchase_date">Purchase Date</label>
                                            <input type="date" class="form-control" id="purchase_date" name="purchase_date" v-model.number="purchase_date">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label class="col-form-label" for="total_amount">Total Amount</label>
                                            <input type="number" :value.number="total"  step="any" class="form-control" id="total_amount" name="total_amount" readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane show fade" id="suppliers" role="tabpanel" aria-labelledby="custom-supplier-tab">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-primary btn-sm" type="button" @click="addSupplierModal">
                                    <i class="fa fa-user-plus"></i>Add Supplier
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>Supplier Group</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(supplier,index) in data" :key="supplier.id">
                                            <td>{{index+=1}}</td>
                                            <td>{{supplier.name}}</td>
                                            <td>{{supplier.email}}</td>
                                            <td>{{supplier.phone_no}}</td>
                                            <td>{{supplier.address}}</td>
                                            <td>{{supplier.supplier_group}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-cogs"></i>Action
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item text-success" @click="editSupplier(supplier)">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </li>
                                                    <li class="dropdown-item text-danger" @click="destroy(supplier.id)">
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
                        <div class="modal fade" id="addSupplier">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Supplier</h3>
                                        <button class="close" data-dismiss="modal" aria-label="Close">
                                            &times;
                                        </button>
                                    </div>
                                    <form class="form-horizontal" @submit.prevent="addSupplier">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label class="col-form-label" for="name">Supplier Full Names</label>
                                                    <input type="text" class="form-control" name="name" id="name" v-model="name">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="col-form-label" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email" v-model="email">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="col-form-label" for="address">Address</label>
                                                    <input type="text" class="form-control" name="address" id="address" v-model="address">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="col-form-label" for="phone_no">Phone No</label>
                                                    <input type="text" class="form-control" name="phone_no" id="phone_no" v-model="phone_no">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label class="col-form-label" for="supplier_group">Supplier Group</label>
                                                    <select class="form-control" name="supplier_group" id="supplier_group" v-model="supplier_group">
                                                        <option disabled value="">Select</option>
                                                        <option>Electronics</option>
                                                        <option>Furniture</option>
                                                        <option>Office Stationery</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-sm btn-primary">
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
import Vue from 'vue'
    export default {
    props:[
        'categories',
        'suppliers',
        'departments'
    ],
        data () {
            return{
                data:{},
                asset_name:'',
                category_id:'',
                asset_serial_no:'',
                department:'',
                location:'',
                supplier_id:'',
                baseURL:'',
                name:'',
                email:'',
                address:'',
                phone_no:'',
                image:'',
                supplier_group:'',
                edit:false,
                supplierId:'',
                asset_id:'',
                receipt_no:'',
                purchase_date:'',
                total_amount:0,
                quantity:1,
                amount:1,
            }
        },
        created () {
            this.getBaseURL();
        },
        mounted(){
            this.getSuppliers();
        },
        computed:{
            total(){
                let calculated_amount = this.quantity * this.amount;
                this.total_amount = calculated_amount;
                return calculated_amount;
            }
        },
        methods:{
            getBaseURL: function(){
                var getUrl = window.location
                this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/public/";
            },
            addSupplierModal(){
                this.edit=false;
                this.name='';
                this.address='';
                this.phone_no='';
                this.email='';
                this.supplier_group='';
                $('#addSupplier').modal('show')
            },
            editSupplier(supplier){
                this.edit=true;
                this.supplierId=supplier.id;
                this.name=supplier.name;
                this.email=supplier.email;
                this.phone_no=supplier.phone_no;
                this.address=supplier.address;
                this.supplier_group = supplier.supplier_group;
                $('#addSupplier').modal('show')
            },
            getSuppliers(){
                axios.get(`${this.baseURL}api/suppliers`)
                .then(response=>{
                    this.data = response.data
                })
                .catch(error=>{
                    console.log(error)
                })
            },
            submitAsset(){
                if(this.asset_name===''||this.category_id===''||this.supplier_id===''||this.asset_serial_no===''||this.department===''||this.location===''||this.receipt_no===''||this.quantity===''||this.amount===''||this.purchase_date===''||this.total_amount===''){
                    Vue.$toast.warning('All form inputs are required',{position:'top-right'});
                }
                else{
                    fetch(`${this.baseURL}api/asset/store`,{
                        method:'post',
                        body:JSON.stringify({
                            "asset_name":this.asset_name,"category_id":this.category_id,"supplier_id":this.supplier_id,"asset_serial_no":this.asset_serial_no,"department":this.department,"location":this.location,"receipt_no":this.receipt_no,"quantity":this.quantity,"amount":this.amount,"purchase_date":this.purchase_date,"total_amount":this.total_amount
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
                            this.asset_name='';this.category_id='';this.supplier_id='';this.asset_serial_no='';this.department='';this.location='';this.receipt_no='';this.quantity='';this.amount='';this.purchase_date='';this.total_amount='';
                        }
                    })
                }
            },
            addSupplier(){
                if(this.name===''||this.email===''||this.address===''||this.phone_no===''||this.supplier_group===''){
                    Vue.$toast.warning('All Fields are required',{position:'top-right'})
                }
                else{
                    if(this.edit===false){
                        fetch(`${this.baseURL}api/supplier/store`,{
                            method:'post',
                            body:JSON.stringify({
                                "name":this.name,"email":this.email,"address":this.address,"phone_no":this.phone_no,"supplier_group":this.supplier_group
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
                                this.getSuppliers();
                                Vue.$toast.success('You have added supplier successfully',{position:'top-right'});
                                $('#addSupplier').modal('hide');

                            }
                        })
                    }
                    else{
                        fetch(`${this.baseURL}api/supplier/${this.supplierId}`,{
                            method:'put',
                            body:JSON.stringify({
                                "name":this.name,"email":this.email,"address":this.address,"phone_no":this.phone_no,"supplier_group":this.supplier_group
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
                                this.getSuppliers();
                                Vue.$toast.success('Supplier Updated successfully',{position:'top-right'});
                                $('#addSupplier').modal('hide');
                            }
                        })
                    }
                }
            },
            destroy(id){
                if(confirm('Are you sure?')){
                    fetch(`${this.baseURL}api/supplier/${id}`,{
                        method:'delete',
                        headers:{
                            'Accept':'application/json',
                            'Content-Type':'application/json',
                            'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                        }
                    })
                    .then(response=>response.json())
                    .then(response=>{
                        if(response.status===0){
                            this.getSuppliers();
                            Vue.$toast.info('Supplier has been removed successfully',{position:'top-right'});
                        }
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            },
        }
    }
</script>
