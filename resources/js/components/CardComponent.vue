<template>
    <div>
        <div class="card card-outline card-warning">
            <div class="card-body">
                <button class="btn btn-sm btn-primary" @click="addCards">
                    <i class="fa fa-plus"></i> Add Card
                </button>
                <draggable element="div" class="row mt-2 mr-3" v-model="cards" :dragOptions="dragOptions">
                    <div class="col-md-3" v-for="card in cards" :key="card.id">
                        <div class="card p-lg-2">
                            <div class="card-header bg-white">
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
                                <ExampleComponent
                                    :card-id="card.id"
                                >
                                </ExampleComponent>
                            </div>
                            <div class="card-footer bg-white">
                                <button class="btn btn-sm text" @click="openTaskForm(card.id)">
                                    <i class="fa fa-plus"></i> Add Task
                                </button>
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
import ExampleComponent from "./ExampleComponent";
export default {
    props:[
        'project'
    ],
    components:{
        draggable,
        ProjectsTable,
        ExampleComponent
    },
    data(){
        return{
            cards:[],
            tasks:[],
            project_id:'',
            name:'',
            newTaskForStatus:0,
            task_name:'',
            task_description:'',
            editingTask:null,
            baseURL:'',
            taskId:'',
            todo_name:'',
            card_id:'',
            projectId:this.project.id,
            completed:[true,false],
        }
    },
    computed:{
        dragOptions(){
            return {
                animation: 1,
                group:'cards',
                ghostClass:'ghost'
            };
        },
    },
    created(){
        this.getBaseURL();
    },
    mounted(){
        this.getCards();
    },
    methods:{
        getBaseURL: function(){
            var getUrl = window.location
            this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/public/";
        },
        getCards(){
            axios.get(`${this.baseURL}api/cards/${this.projectId}`)
            .then(response=>{
                this.cards = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        getTasks(){
            // fetch(`${this.baseURL}api/tasks/${this.cardId}`)
            fetch('http://127.0.0.1/projects/public/api/tasks/1')
            .then(response=>{
                this.tasks = response.data
            })
            .catch(error=>{
                console.log(error)
            })
        },
        addFeedbackModal(task){
            this.taskId=task.id;
            this.task_description = task.task_description;
            $('#addFeedbackModal').modal('show')
        },
        addCards(){
            this.project_id=this.project.id;
            this.name='';
            $('#addCard').modal('show')
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
                        Vue.$toast.success('Card has been added successfully',{position:'top-right'})
                    }
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        },
        openTaskForm(cardId){
            this.newTaskForStatus=cardId
        },
        handleTaskAdded(){

        },
        closeAddTaskForm(){
            this.newTaskForStatus=0;
        },
        changeOrder(){

        },
        moveTask(task){
            fetch(`${this.baseURL}move/${this.taskId}`,{
                method:'put',
                body:JSON.stringify({
                    "card_id":this.card_id
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
                    $('#addFeedbackModal').modal('hide');
                    window.location.reload()
                    Vue.$toast.success('Task Moved Successfully',{position:'top-right'});
                }
            })
        },
        completeTask(task){
            fetch(`${this.baseURL}complete/${this.taskId}`,{
                method:'put',
                body:JSON.stringify({
                    "completed":this.completed
                }),
                headers:{
                    'Accept':'application/json',
                    'Content-Type':'application/json',
                    'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                }
            })
            .then(response=>response.json())
            .then(response=>{
                if (response.status ===200){
                    Vue.$toast.success('Task Completed',{position:'top-right'});
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        endEditing(task){
            this.editingTask =  null;
            fetch(`${this.baseURL}api/task/${this.taskId}`,{
                method:'put',
                body:JSON.stringify({
                    "task_description":this.task_description
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
                    Vue.$toast.success('Task Description Updated successfully',{position:'top-right'});
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        editTask(task){
            this.editingTask = task;
        },
        addTodo(task){
            if (this.todo_name ===''){
                Vue.$toast.error('Todo Name is Required',{position:'top-right'})
            }
            else{
                fetch('http://127.0.0.1/projects/public/api/checklist/store',{
                    method:'post',
                    body:JSON.stringify({
                        "todo_name":this.todo_name,"task_id":this.taskId
                    }),
                    headers:{
                        'Accept':'application/json',
                        'Content-Type':'application/json',
                        'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                    }
                })
                .then(response=>response.json())
                .then(response=>{
                    if (response.status===0){
                        this.getCards();
                        window.location.reload()
                        Vue.$toast.success('Todo List added',{position:'top-right'});
                    }
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        }
    }
}
</script>
<style scoped>
#checkboxes input{
    display: inline-block;
}
#checkboxes span{
    display: inline-block;
}
</style>
