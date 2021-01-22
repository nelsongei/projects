<template>
    <div>
        <div class="card card-outline card-warning">
            <div class="card-body">
                <button class="btn btn-sm btn-primary" @click="addCards">
                    <i class="fa fa-plus"></i> Add Card
                </button>
                <div class="row mt-2 mr-3" v-model="cards" v-bind="taskDragOptions">
                    <div class="col-md-3" v-for="card in project.card" :key="card.id">
                        <div class="card p-lg-2">
                            <div class="card-header">
                                <p class="card-title text-bold">{{card.name}}</p>
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
                                <Task
                                    v-if="newTaskForStatus===card.id"
                                    :card-id="card.id"
                                    :project-id="project.id"
                                    v-on:task-added="handleTaskAdded"
                                    v-on:task-canceled="closeAddTaskForm"
                                ></Task>
                                <draggable
                                    class="list-group"
                                    v-model="card.items"
                                    tag="v-layout"
                                    :group="{name: 'card'}"
                                    v-bind="taskDragOptions"
                                    @add="update($event,false)"
                                >
                                    <transition-group class="mb-2" tag="div">
                                        <div v-for="task in card.tasks" :key="task.id" class="mb-2" :data-id="task.id" :card-id="card.id">
                                            <div class="list-group">
                                                <div class="list-group-item" @click="addFeedbackModal(task)">
                                                    {{task.task_name}}
                                                </div>
                                            </div>
                                            <div class="modal fade" id="addFeedbackModal">
                                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <form @submit.prevent="endEditing(task)">
                                                                        <div class="form-group">
                                                                            <label class="col-form-group" for="task_description">Task Description</label>
                                                                            <textarea v-if="task === editingTask" @keyup.enter="endEditing(task)" @blur="endEditing(task)" class="form-control" rows="2" id="task_description" name="task_description" v-model="task_description"></textarea>
                                                                        </div>
                                                                    </form>
                                                                    <p v-if="task !== editingTask" @dblclick="editTask(task)">{{task_description}}</p>
                                                                    <b>Task Todo List</b>
                                                                    <ul class="bg-white ui-sortable todo-list" v-for="checklist in task.checklists" :key="checklist.id">
                                                                        <li>
                                                                            <input type="checkbox">
                                                                            <span class="text">{{checklist.todo_name}}</span>
                                                                            <small class="badge badge-success badge-pill">
                                                                                <i class="fa fa-clock"></i>
                                                                                2 Mins Ago
                                                                            </small>
                                                                            <div class="tools">
                                                                                <div class="">
                                                                                    <button type="button" class="btn btn-sm dropdown" data-toggle="dropdown">
                                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                                    </button>
                                                                                    <div class="dropdown-menu">
                                                                                        <span class="dropdown-item dropdown-header text-center text-bold text-dark">Checklist Action</span>
                                                                                        <div class="dropdown-divider"></div>
                                                                                        <a class="dropdown-item">
                                                                                            <i class="fa fa-plus"></i>Add Todo
                                                                                        </a>
                                                                                        <a class="dropdown-item">
                                                                                            <i class="fa fa-clock"></i> Due Date
                                                                                        </a>
                                                                                        <a class="dropdown-item">
                                                                                            <i class="fa fa-user-plus"></i> Assign To
                                                                                        </a>
                                                                                        <a class="dropdown-item">
                                                                                            <i class="fa fa-edit"></i> Edit
                                                                                        </a>
                                                                                        <a class="dropdown-item">
                                                                                            <i class="fa fa-trash"></i> Delete
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                    <br/>
                                                                    <b>Feedback</b>
                                                                    <ul class="bg-white ui-sortable todo-list">
                                                                        <p v-for="feedback in task.feedback" :key="feedback.id">{{feedback.feedback}}</p>
                                                                        <li>
                                                                            <form class="" @submit.prevent="addFeedback(task)">
                                                                                <div class="">
                                                                                      <span>
                                                                                        <input type="hidden" name="task_id" value="task.id" v-model="task.id">
                                                                                        <div class="form-group">
                                                                                            <textarea class="form-control" name="feedback" v-model="feedback" @keyup.enter="addFeedback(task)" placeholder="Add Feedback"></textarea>
                                                                                        </div>
                                                                                      </span>
                                                                                </div>
                                                                                <button type="submit" class="btn btn-sm btn-primary">
                                                                                    Add
                                                                                </button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label>Task Actions</label>
                                                                    <div class="dropdown mb-1">
                                                                        <button class="btn btn-default btn-md btn-sm btn-block dropdown" data-toggle="dropdown">
                                                                            <i class="fa fa-check"></i>Complete Task
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <form class="px-4 py-3" @submit.prevent="taskComplete(task)">
                                                                                <div class="form-group">
                                                                                    <label class="col-form-label">Complete</label>
                                                                                    <select name="completed" v-model="completed" class="form-control">
                                                                                        <option :value="1">Complete</option>
                                                                                        <option :value="0">Not Complete</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="dropdown-divider"></div>
                                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                                    Complete
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropright mb-1">
                                                                        <button class="btn btn-block btn-md btn-default dropdown" data-toggle="dropdown">
                                                                            <i class="fa fa-check-square"></i> Add Todo List
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <form class="px-4 py-3" @submit.prevent="addTodo(task)">
                                                                                <input type="hidden" name="task_id" v-model="taskId">
                                                                                <div class="form-group">
                                                                                    <label class="col-form-label" for="todo_name">Name</label>
                                                                                    <input type="text" name="todo_name" class="form-control" id="todo_name" v-model="todo_name">
                                                                                </div>
                                                                                <div class="dropdown-divider"></div>
                                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                                    Add
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown mb-1">
                                                                        <button class="btn btn-block btn-md btn-default dropdown" data-toggle="dropdown">
                                                                            <i class="fa fa-arrow-right"></i> Move Task
                                                                        </button>
                                                                        <div class="dropdown-menu">
                                                                            <form class="px-4 py-3" @submit.prevent="moveTask(task)">
                                                                                <div class="form-group">
                                                                                    <label class="col-form-label">Move To</label>
                                                                                    <select class="form-control" name="card_id" v-model="card_id">
                                                                                        <option disabled value="">Select Card</option>
                                                                                        <option v-for="card in project.card" :key="card.id" :value="card.id">{{card.name}}</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="dropdown-divider"></div>
                                                                                <button type="submit" class="btn btn-primary btn-sm">
                                                                                    Move
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
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
                                <button class="btn btn-sm text" @click="openTaskForm(card.id)">
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
import Vue from 'vue';
import Task from './TaskComponent'
import draggable from 'vuedraggable';
    export default {
        props:[
            'project',
        ],
        components:{
            draggable,
            Task,
        },
        data(){
            return{
                cards:{},
                name:'',
                project_id:'',
                newTaskForStatus:0,
                baseURL:'',
                projectId:this.project.id,
                editingTask:null,
                task_description:'',
                feedback:'',
                taskId:'',
                todo_name:'',
                card_id:'',
                completed:'',
                tasks:[],
            }
        },
        created() {
            this.getBaseURL();
        },
        mounted(){
            this.getCards()
        },
        computed:{
            taskDragOptions(){
                return {
                    animation: 200,
                    group:'tasks',
                    dragClass:"status-drag"
                };
            },
        },
        methods:{
            getBaseURL: function(){
                var getUrl = window.location
                this.baseURL= getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
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
            addFeedbackModal(task){
                this.taskId=task.id;
                this.task_description = task.task_description;
                $('#addFeedbackModal').modal('show')
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
            moveTask(task){
                fetch(`${this.baseURL}move/${this.taskId}`,{
                    method:'post',
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
            addFeedback(task){
                if (this.feedback ===''){
                    Vue.$toast.warning('This field is required',{position:'top-right'})
                }
                else{
                    fetch(`${this.baseURL}api/feedback/store`,{
                        method:'post',
                        body:JSON.stringify({
                            "feedback":this.feedback,"task_id":this.taskId
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
                            this.getCards();
                            window.location.reload()
                            Vue.$toast.success('Feedback added',{position:'top-right'})
                        }
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            },
            taskComplete(task){
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
                    if(response.status===0){
                        Vue.$toast.info('Task Status Updated',{position:'top-right'})
                    }
                })
                .catch(error=>{
                    console.log(error)
                })
            },
            addTodo(task){
                if(this.todo_name===''){
                    Vue.$toast.warning('Todo name is required',{position:'top-right'})
                }
                else{
                    fetch(`${this.baseURL}api/checklist/store`,{
                        method:'post',
                        body:JSON.stringify({
                            "todo_name":this.todo_name,"task_id":this.taskId,
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
                            this.getCards();
                            window.location.reload()
                            Vue.$toast.info('You have added a new checklist',{position:'top-right'})
                        }
                    })
                    .catch(error=>{
                        console.log(error)
                    })
                }
            },
            update(event){
                let toTask = event.to;
                let fromTask = event.from;
                let task_id = event.item.getAttribute('data-id');
                let card_id = fromTask.id === toTask.id ? null: toTask.id;
                let order  = event.newIndex === event.oldIndex ? false : event.newIndex;
                if(order!==false){
                    axios.patch(`http://127.0.0.1/projects/public/api/task/sync/${task_id}`,{
                        order,card_id
                    })
                    .then(response=>{
                        Vue.$toast.info('Moved',{position:'top-right'})
                    })
                }
            },
            getTasks(){
                axios.get(`http://127.0.0.1/projects/public/api/tasks/${this.projectId}`)
                .then(response=>{
                    this.tasks=response.data
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>
