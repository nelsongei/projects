<template>
    <div>
        <div class="card card-outline card-warning">
            <div class="card-body">
                <button class="btn btn-sm btn-primary" @click="addCards">
                    <i class="fa fa-plus"></i> Add Card
                </button>
                <draggable element="div" class="row mt-2 mr-3" v-model="cards">
                    <div class="col-md-3" v-for="card in project.card" :key="card.id">
                        <div class="card p-lg-2">
                            <div class="card-header">
                                <h3 class="card-title text-bold">{{card.name}}</h3>
                                <div class=dropright>
                                    <button
                                        class="btn btn-sm float-right dropdown"
                                        data-toggle="dropdown"
                                    >
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <span class="dropdown-item dropdown-header text-center text-bold text-dark">Card Action</span>
                                        <a @click="openTaskForm(card.id)" class="dropdown-item">
                                            <i class="fa fa-plus"></i>&nbsp;Add Task
                                        </a>
                                        <a class="dropdown-item">
                                            <i class="fa fa-check"></i>&nbsp;Move Card
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item">
                                            <i class="fa fa-tasks"></i>&nbsp;Move All Task Here
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ProjectsTable
                                    v-if="newTaskForStatus===card.id"
                                    :card-id="card.id"
                                    :project-id="project.id"
                                    v-on:task-added="handleTaskAdded"
                                    v-on:task-canceled="closeAddTaskForm"
                                ></ProjectsTable>
                            </div>
                        </div>
                    </div>
                </draggable>
            </div>
        </div>
        <div class="modal fade" id="addCard">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Card</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <form @submit.prevent="submitCard">
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="project_id" value="this.project.id" v-model="project_id">
                                <div class="col-md-12 form-group">
                                    <label for="name" class="col-form-label">Card Name</label>
                                    <input type="text" name="name" class="form-control" id="name" v-model="name">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary btn-sm">
                                Add Card
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
import ProjectsTable from './ProjectsTable'
import draggable from 'vuedraggable';
    export default {
        props:[
            'project',
        ],
        components:{
            draggable,
            ProjectsTable,
        },
        data(){
            return{
                cards:[],
                name:'',
                project_id:'',
                newTaskForStatus:0,
                baseURL:'',
                projectId:this.project.id,
            }
        },
        created() {
            this.getBaseURL();
        },
        mounted(){
            this.getCards()
        },
        methods:{
            getBaseURL: function(){
                var getUrl = window.location
                this.baseURL= getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/public/";
            },
            addCards(){
                this.project_id=this.project.id;
                this.name='';
                $('#addCard').modal('show')
            },
            openTaskForm(cardId) {
                this.newTaskForStatus=cardId
            },
            handleTaskAdded(){
            },
            closeAddTaskForm(){
                this.newTaskForStatus=0;
            },
            getCards(){
                axios.get(`${this.baseURL}api/cards/${this.projectId}`)
                .then(response=>{
                    this.cards=response.data;
                })
                .catch(error=>{
                    console.log(error)
                })
            },
            submitCard(){
                if(this.name===''){
                    Vue.$toast.error('Card name is required',{position:'top-right'})
                }
                else{
                    fetch(`${this.baseURL}api/card/store`,
                        {
                            method:'POST',
                            body:JSON.stringify({
                                "name":this.name,"project_id":this.project_id
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
                                this.anyError=true;
                                this.errors = response.errors
                            }
                            if(response.status===0){
                                this.anyError=false;
                                $('#addCard').modal('hide');
                                this.getCards();
                                window.location.reload();
                                Vue.$toast.success('Card has been added successfully',{position:'top-right'})
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
