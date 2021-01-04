<template>
    <div>
        <div class="card card-outline card-warning">
            <div class="card-body">
                <button class="btn btn-primary btn-sm" @click="addCards" href="#">
                    <i class="fa fa-plus"></i>Add Card
                </button>
                <draggable :element="'div'" class="row mt-2 mr-3">
                    <div class="col-md-3" v-for="card in project.card" :key="card.id">
                        <div class="card p-lg-2">
                            <div class="card-header bg-white">
                                <h3 class="card-title text-bold text-warning">{{card.name}}</h3>
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
                                <draggable :element="'div'" v-for="task in card.tasks" class="mb-2" :key="task.id">
                                    <!-- <div v-for="task in card.tasks" class="mb-2" :key="task.id"> -->
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                {{task.task_name}}
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </draggable>
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
import Vue from 'vue'
import draggable from 'vuedraggable'
import ProjectsTable from './ProjectsTable'
export default {
    props:[
        'project'
    ],
    data(){
        return{
            cards:[],
            project_id:'',
            name:'',
            newTaskForStatus: 0,
        }
    },
    components:{
        ProjectsTable,
        draggable
    },
    methods:{
        addCards(){
            this.project_id = this.project.id;
            this.name = '';
            $('#addCard').modal('show');
        },
        openTaskForm(cardId){
            this.newTaskForStatus=cardId
        },
        handleTaskAdded(){

        },
        closeAddTaskForm(){
            this.newTaskForStatus=0;
        }
    }
    
}
</script>