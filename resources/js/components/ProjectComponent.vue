<template>
    <div class="card card-outline card-warning">
        <div class="card-body">
            <button class="btn btn-primary btn-sm" @click="addProject">
                Add Project
            </button>
            <div class="row mt-3 mr-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Users</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(project, index) in projects">
                            <td>{{index +1}}</td>
                            <td>
                                <a :href="'project/'+project.id">
                                    {{project.project}}
                                </a>
                            </td>
                            <td>
                                {{project.user.name+' '+project.user.lastName}}
                            </td>
                            <td>{{project.description}}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cogs"></i>Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li class=" dropdown-item text-info">
                                        <a :href="'project/'+project.id">
                                            <i class="fa fa-eye"></i>
                                            View Project
                                        </a>
                                    </li>
                                    <li class=" dropdown-item text-warning">
                                        <i class="fa fa-user-plus"></i>
                                        Invite User
                                    </li>
                                    <a class="dropdown-item text-success" @click="editProject(project)" href="#">
                                        <i class="fa fa-edit"></i>
                                        Edit Project
                                    </a>
                                    <a class=" dropdown-item text-danger" @click="destroy(project.id)">
                                        <i class="fa fa-trash"></i>
                                        Delete Project
                                    </a>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li :class="[{disabled:!pagination.prev_page_url}]" class="page-item">
                            <a class="page-link" @click="getStudents(pagination.prev_page_url)" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">{{pagination.current_page}} of {{pagination.last_page}}</a></li>
                        <li :class="[{disabled: !pagination.next_page_url}]" class="page-item">
                            <a class="page-link" @click="getStudents(pagination.next_page_url)" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
                <div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    <i class="fa fa-pen"></i>
                                    Project
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    &times;
                                </button>
                            </div>
                            <form @submit.prevent="submitProject">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="project" class="col-form-label">Project Name</label>
                                            <input type="text" name="project" class="form-control" id="project" v-model="project">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="user_id" class="col-form-label">User</label>
                                            <select class="form-control" name="user_id" id="user_id" v-model="user_id">
                                                <option disabled value="">Select User</option>
                                                <option v-for="user in users" :value="user.id">{{user.name+' '+user.lastName}}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea id="description" name="description" class="form-control" rows="2" v-model="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Save Project
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from "vue";

    export default {
        props:[
            'users'
        ],
        data(){
            return {
                projects: [],
                project: "",
                user_id:"",
                description: "",
                projectId:"",
                edit:false,
                anyError:false,
                errors:'',
                pagination:{}
            }
        },
        created(){
            this.getProjects();
        },
        methods: {
            getProjects(){
                axios.get('http://127.0.0.1/MyProject/public/api/projects')
                .then(response =>{
                    this.projects = response.data
                    this.pagination={
                        current_page:response.current_page,
                        last_page:response.last_page,
                        next_page_url:response.next_page_url,
                        prev_page_url:response.prev_page_url
                    };
                })
                .catch(error=>{
                    console.log(error)
                })
            },
            addProject(){
                this.edit = false;
                this.project = '';
                this.user_id = '';
                this.description = '';
                $('#addProject').modal('show')
            },
            editProject(project){
                this.projectId = project.id;
                this.project = project.project;
                this.user_id = project.user;
                this.description = project.description;
                this.edit = true;
                $('#addProject').modal('show')
            },
            submitProject(){
                if(this.project===''||this.user_id===''||this.description===''){
                    Vue.$toast.warning('All Fields Are required',{position:'top-right'})
                }
                else{
                    if(this.edit === false){
                        fetch('http://127.0.0.1/MyProject/public/api/project/store',{
                            method:'post',
                            body:JSON.stringify({
                                "project":this.project,"user_id":this.user_id,"description":this.description
                            }),
                            headers:{
                                'Accept':'application/json',
                                'Content-Type':'application/json',
                                'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                            }
                        })
                        .then(response=>response.json())
                        .then(response=>{
                            if(response.errors){
                                this.anyError = true;
                                this.errors = response.errors;
                            }
                            if (response.status === 0){
                                this.anyError=false;
                                $('#addProject').modal('hide')
                                this.getProjects();
                                Vue.$toast.success('Project added successfully',{position:'top-right'})
                            }
                        })
                    }
                    else{
                        fetch(`http://127.0.0.1/MyProject/public/api/project/${this.projectId}`,{
                            method:'put',
                            body:JSON.stringify({
                                "project":this.project,"user_id":this.user_id,"description":this.description
                            }),
                            headers:{
                                'Accept':'application/json',
                                'Content-Type':'application/json',
                                'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                            }
                        })
                        .then(response=>response.json())
                        .then(response=>{
                            if(response.errors){
                                this.anyError = true;
                                this.errors = response.errors;
                            }
                            if(response.status ===0){
                                this.anyError=false;
                                $('#addProject').modal('hide')
                                this.getProjects();
                                Vue.$toast.success('Project updated succesfully',{position:'top-right'})
                            }
                        })
                    }
                }
            },
            destroy(id){
                if(confirm('Are you sure')){
                    fetch(`http://127.0.0.1/MyProject/public/api/project/${id}`,{
                        method:'delete',
                        headers:{
                            'Accept':'application/json',
                            'Content-Type':'application/json',
                            'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                        }
                    })
                    .then(response=>response.json())
                    .then(response=>{
                        if(response.status ===0){
                            this.getProjects();
                            Vue.$toast.warning('Project Deleted Successfully',{position:'top-right'})
                        }
                    })
                }
            }
        },
        }
</script>
