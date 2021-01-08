<template>
    <draggable v-model="tasks" :dragOptions="dragOptions">
        <transition-group :id="cardId">
            <div class="mb-2" v-for="task in tasks" :key="task.id">
                <div class="list-group">
                    <div class="list-group-item" @click="addFeedbackModal(task)">
                        {{task.task_name}}
                        <div class="modal fade" id="addFeedbackModal">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        {{taskId}}
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            &times;
                                        </button>
                                    </div>
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
                                                    <li>
                                                        <div class="">
                                                            <!--                                                                                <span class="img-circle elevation-1 text px-3 py-3">NN</span>-->
                                                            <span>
                                                                <div class="form-group">
                                                                    <textarea class="form-control" placeholder="Add Feedback"></textarea>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Task Actions</label>
                                                <div class="checkboxes mb-1">
                                                    <a class="btn btn-block btn-md btn-default">
                                                        <input type="checkbox" name="completed" @change="completeTask(task)" v-model="task.completed">&nbsp;<strong>Complete:</strong> <span>{{task.task_name}}</span>
                                                    </a>
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
                                                                <label class="col-form-label" for="card_id">Move To</label>
                                                                <select class="form-control" name="card_id" id="card_id">
                                                                    <option disabled value="">Select Card</option>
                                                                    <option v-for="card in cards" :key="card.id">{{card.name}}</option>
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
                </div>
            </div>
        </transition-group>
    </draggable>
</template>
<script>
import draggable from "vuedraggable";
import Vue from "vue";
    export default {
      props:[
          'cardId',
          'cards'
      ],
        components:{
            draggable,
        },
        computed:{
            dragOptions(){
                return{
                    animation: 1,
                }
            }
        },
        data(){
            return{
                tasks:[],
                task_name:'',
                taskId:'',
                task_description:'',
                editingTask:null,
                todo_name:''
            }
        },
        created() {
            this.getBaseURL();
        },
        mounted() {
            this.getTasks()
        },
        methods:{
            getBaseURL: function(){
                var getUrl = window.location
                this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/public/";
            },
            getTasks(){
                axios.get(`${this.baseURL}api/tasks/${this.cardId}`)
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
            moveTask(task){
                axios.put(`${this.baseURL}move/${this.taskId}`,{
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
                            this.getTasks();
                            $('#addFeedbackModal').modal('hide');
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
