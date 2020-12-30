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
                                <draggable :options="{animation:200}" @change="update">
                                    <div v-for="task in card.tasks" class="mb-2">
                                        <div class="list-group">
                                            <div class="list-group-item">
                                                {{task.task_name}}
                                            </div>
                                        </div>
                                    </div>
                                </draggable>
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

        }
    },
    components:{
        ProjectsTable,
        draggable
    },
    created() {
        this.getCards();
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
            this.project_id=this.project.id;
            this.name='';
            $('#addCard').modal('show');
        },
        submitCard(){
            if(this.name===''){
                Vue.$toast.error('Card name is required',{position:'top-right'})
            }
            else{
                fetch('https://127.0.0.1/MyProject/public/api/card/store',{
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
