<template>
    <div>
        <div class="card card-outline card-warning">
            <div class="card-body">
                <button href="#" class="btn btn-primary btn-sm" @click="addCards">
                    <i class="fa fa-plus"></i>Add Card
                </button>
                <div class="row mt-2 mr-3">
                    <div class="col-md-3" v-for="card in project.card" :key="card.id">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h3 class="card-title">{{ card.name }}</h3>
                                <button
                                    class="btn btn-sm float-right"
                                    @click="openTaskForm(card.id)"
                                >
                                    <i class="fa fa-plus"></i>
                                </button>
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
                    <form>
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="project_id" v-model="project_id" value="this.project.id">
                                <div class="col-md-12 form-group">
                                    <label for="project" class="col-form-label">Card Name</label>
                                    <input type="text" name="project" class="form-control" id="project" v-model="name">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button class="btn btn-default" data-dismiss="modal">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Add Card
                                </button>
                            </div>
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
export default{
    props:[
        'project',
    ],
    data(){
        return{
            cards: [],
            name: '',
            project_id:this.project.id,
            newTaskForStatus:0

        }
    },
    components:{
        ProjectsTable,
    },
    methods: {
        getCards(){
            axios.get('https://127.0.0.1/MyProject/public/api/cards')
            .then(response=>{
                this.cards = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        addCards(){
            $('#addCard').modal('show')
        },
        openTaskForm(cardId){
            this.newTaskForStatus=cardId;
        },
        handleTaskAdded(){

        },
        closeAddTaskForm(){
            this.newTaskForStatus=0;
        },
    }
}
</script>
