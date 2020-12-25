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
                            <td>{{project.id}}</td>
                            <td>
                                <a :href="'project/'+project.id">
                                    {{project.project}}
                                </a>
                            </td>
                            <td>
                                {{project.project}}
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
                                    <li class=" dropdown-item text-primary">
                                        <i class="fa fa-user-plus"></i>
                                        Invite User
                                    </li>
                                    <li class=" dropdown-item text-success">
                                        <i class="fa fa-edit"></i>
                                        Edit Project
                                    </li>
                                    <li class=" dropdown-item text-danger">
                                        <i class="fa fa-trash"></i>
                                        Delete Project
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="modal fade" id="addProject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    &times;
                                </button>
                            </div>
                            <form @submit.prevent="submitProject">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="project" class="col-form-label">Project Name</label>
                                            <input type="text" name="project" class="form-control" id="project">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="user_id" class="col-form-label">User</label>
                                            <select class="form-control" name="user_id" id="user_id">
                                                <option v-for="user in users" :value="user.id">{{user.name+' '+user.lastName}}</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea id="description" name="description" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Add Project
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
    export default {
        props:[
            'users'
        ],
        data(){
            return {
                projects: [],
                project:{
                    project:'',
                    user_id:'',
                    description:'',
                }
            }
        },
        methods: {
            getProject(){
                axios.get('http://127.0.0.1/MyProject/public/api/projects')
                .then(response =>{
                    this.projects = response.data
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
            submitProject(){
                // if(this.project===''||this.user_id===''||this.description===''){
                //     Vue.$toast.info('All Fields Are Required',{position:'top-right'})
                // }
                axios.post('api/project/store',{
                    project:[
                        this.project,
                        this.user_id,
                        this.description,
                    ]
                })
            },
        },
        created(){
            this.getProject();
        }
        }
</script>
