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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(category,index) in data" :key="category.id">
                <td>{{index+=1}}</td>
                <td>{{category.category}}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cogs"></i>Action
                  </button>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item text-info">
                      <a :href="'category/'+category.id">
                        <i class="fa fa-eye"></i>
                        More
                      </a>
                    </li>
                    <li class="dropdown-item text-success">
                      <i class="fa fa-edit"></i>
                      Edit
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
    <div class="modal fade" id="addCategory">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Asset Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              &times;
            </button>
          </div>
          <form @submit.prevent="submitCategory">
            <div class="modal-body">
              <div class="form-group">
                <label class="col-form-label">Category</label>
                <input type="text" name="category" class="form-control" v-model="category">
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
import AddCategoryComponent from './AddCategoryComponent'
import Vue from 'vue'
export default {
  data(){
    return{
      data:{},
      category:'',
      baseURL:''
    }
  },
  components:{
    AddCategoryComponent
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
      axios.get(`${this.baseURL}api/categories`)
      .then(response=>{
        this.data = response.data
      })
      .catch(error=>{
        console.log(error)
      })
    },
    submitCategory(){
      if(this.category===''){
        Vue.$toast.warning('Category Field is required',{position:'top-right'})
      }
      else {
        fetch(`http://127.0.0.1/projects/public/api/category/store`,{
          method:'post',
          body:JSON.stringify({
            "category":this.category
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
            $('#addCategory').modal('hide')
            this.getCategories()
            Vue.$toast.success('Category has been added',{position:'top-right'})
          }
        })
      }
    },
    addCategory(){
      this.category='';
      $('#addCategory').modal('show')
    }
  },
}
</script>
