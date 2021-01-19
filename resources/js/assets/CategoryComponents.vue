<template xmlns="http://www.w3.org/1999/html">
  <div>
    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary btn-sm" @click="addCategory">
          <i class="fa fa-plus"></i>
          Add Category
        </button>
        <div class="row mt-2 mr-2">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Asset Category Name</th>
                <th>Asset Category Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(category,index) in data" :key="category.id">
                <td>{{index+=1}}</td>
                <td>
                    {{category.category}}
                </td>
                <td>{{category.asset_type}}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cogs"></i>Action
                  </button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item text-success" @click="editCategory(category)">
                      <i class="fa fa-edit"></i>
                      Edit
                    </li>
                    <li class="dropdown-item text-danger" @click="destroy(category.id)">
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
    <div class="modal fade" id="addCategory" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Asset Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              &times;
            </button>
          </div>
          <form @submit.prevent="submitCategory">
              <div v-if="anyError" class="alert alert-warning alert-dismissible fade show" role="alert">
                  <p class="text-center" v-for="error in errors" :key="error.id">{{error}}</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label" for="category">Category</label>
                <input type="text" name="category" class="form-control" v-model="category" id="category">
              </div>
                <div class="form-group">
                    <label class="col-form-label" for="asset_type">Category</label>
                    <select name="asset_type" class="form-control" v-model="asset_type" id="asset_type">
                        <option disabled value="">Select</option>
                        <option>Fixed Asset</option>
                        <option>Consumables</option>
                        <option>Services</option>
                        <option>Products</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button class="btn btn-default btn-sm" data-dismiss="modal">
                &times;Close
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
</template>
<script>
import Vue from 'vue'
export default {
  data(){
    return{
      data:{},
      category:'',
      asset_type:'',
      baseURL:'',
      edit:false,
      categoryId:'',
      anyError:false,
      errors:'',

    }
  },
  components:{

  },
  created() {
    this.getBaseURL()
  },
  mounted() {
    this.getCategories()
  },
  methods:{
    getBaseURL: function(){
      var getUrl = window.location
      this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/public/";
    },
    getCategories(){
      axios.get(`api/categories`)
      .then(response=>{
        this.data = response.data
      })
      .catch(error=>{
        console.log(error)
      })
    },
    submitCategory(){
      if(this.category===''||this.asset_type===''){
        Vue.$toast.warning('Category Field is required',{position:'top-right'})
      }
      else {
          if(this.edit ===false){
              fetch(`${this.baseURL}api/category/store`,{
                  method:'post',
                  body:JSON.stringify({
                      "category":this.category,"asset_type":this.asset_type
                  }),
                  headers:{
                      'Accept':'application/json',
                      'Content-Type':'application/json',
                      'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                  }
              })
              .then(response=>response.json())
              .then(response=>{
                  if (response.errors){
                      this.anyError = true;
                      this.errors = response.errors;
                  }
                  if (response.status===0){
                      this.anyError = false;
                      $('#addCategory').modal('hide')
                      this.getCategories();
                      Vue.$toast.success('Category has been added',{position:'top-right'})
                  }
              })
          }
          else{
              fetch(`${this.baseURL}api/category/${this.categoryId}`,{
                  method:'put',
                  body:JSON.stringify({
                      "category":this.category,"asset_type":this.asset_type
                  }),
                  headers:{
                      'Accept':'application/json',
                      'Content-Type':'application/json',
                      'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                  }
              })
              .then(response=>response.json())
              .then(response=>{
                  if (response.errors){
                      this.anyError = true;
                      this.anyError = response.errors
                  }
                  if (response.status===0){
                      this.anyError = false;
                      $('#addCategory').modal('hide')
                      this.getCategories();
                      Vue.$toast.success('Category has been updated',{position:'top-right'})
                  }
              })
          }
      }
    },
    destroy(id){
        if (confirm('Are you sure you want to delete')){
            fetch(`${this.baseURL}api/category/${id}`,{
                method:'delete',
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json',
                    'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                }
            })
            .then(response=>response.json())
            .then(response=>{
                if (response.status===0){
                    this.getCategories();
                    Vue.$toast.info('Category deleted',{position:'top-right'})
                }
            })
        }
    },
    addCategory(){
      this.edit=false;
      this.category='';
      this.asset_type='';
      $('#addCategory').modal('show')
    },
    editCategory(category){
        this.categoryId = category.id;
        this.category=category.category;
        this.asset_type=category.asset_type;
        this.edit = true;
        $('#addCategory').modal('show')
      }
  },
}
</script>
