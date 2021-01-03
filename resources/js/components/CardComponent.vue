<template>
    <div>
        <div class="card card-outline card-warning">
            <div class="card-body">
                <button href="#" class="btn btn-primary btn-sm" @click="addCards">
                    <i class="fa fa-plus"></i>Add Card
                </button>
                <div class="row mt-2 mr-3">
                    <div class="col-md-3" v-for="card in project.card" :key="card.id">
                        <div class="card p-lg-2">
                            <div class="card-header bg-white">
                                <h3 class="card-title text-bold text-warning">{{ card.name }}</h3>
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
                                <draggable v-bind="dragOptions" @change="update" @start="drag = true" @end="drag = false" v-model="cards">
                                    <transition-group>
                                        <div v-for="task in card.tasks" class="mb-2" :key="task.id">
                                            <div class="list-group">
                                                <div class="list-group-item" @click="addFeedbackModal(task)">
                                                    {{task.task_name}}
                                                </div>
                                            </div>
                                            <div class="modal fade" id="addFeedbackModal">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label class="col-form-group" for="task_description">Task Description</label>
                                                                        <textarea class="form-control" rows="2" id="task_description" name="task_description" v-model="task_description" readonly></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Task Actions</label>
                                                                    <button class="btn btn-block btn-sm bg-warning">
                                                                        <i class="fa fa-user"></i>Add User
                                                                    </button>
                                                                    <button class="btn btn-block btn-sm bg-primary">
                                                                        <i class="fa fa-bars"></i>Add Comments
                                                                    </button>
                                                                    <button class="btn btn-block btn-sm bg-info">
                                                                        <i class="fa fa-check"></i>Add Checklist
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </transition-group>
                                </draggable>
                            </div>
                            <div class="card-footer bg-white">
                                <button class="btn btn-sm" @click="openTaskForm(card.id)">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
import Vue from 'vue'
import ProjectsTable from "./ProjectsTable";
import draggable from 'vuedraggable'
export default{
    props:[
        'project',
    ],
    data(){
        return{
            cards: [],
            name: '',
            project_id:"",
            newTaskForStatus:0,
            anyError:false,
            errors:'',
            taskId:"",
            task_name:'',
            task_description:''
        }
    },
    components:{
        ProjectsTable,
        draggable
    },
    computed:{
        dragOptions(){
            return{
                animation: 1,
            }
        }
    },
    created() {
        this.getCards();
    },
    methods: {
        getCards(){
            axios.get('http://127.0.0.1/projects/public/api/cards')
            .then(response=>{
                this.cards = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        addCards(){
            this.project_id=this.project.id;
            this.name='';
            $('#addCard').modal('show');
        },
        addFeedbackModal(task){
            this.taskId=task.id
            this.task_description=task.task_description
            $('#addFeedbackModal').modal('show')
        },
        submitCard(){
            if(this.name===''){
                Vue.$toast.error('Card name is required',{position:'top-right'})
            }
            else{
                fetch('http://127.0.0.1/projects/public/api/card/store',{
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
                        Vue.$toast.success('Card has been added successfully',{position:'top-right'})
                    }
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        },
        openTaskForm(cardId){
            this.newTaskForStatus=cardId;
        },
        handleTaskAdded(){
            // console.log('hitting save')
        },
        closeAddTaskForm(){
            this.newTaskForStatus=0;
        },
        update(){

        }
    }
}
</script>
