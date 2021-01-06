<template>
    <draggable :dragOptions="dragOptions" v-model="tasks" @end="changeOrder">
        <transition-group :id="cardId">
            <div v-for="task in tasks" :key="task.id" class="mb-2">
                <div class="list-group">
                    <div class="list-group-item" @click="addFeedbackModal(task)">
                        {{task.task_name}}
                    </div>
                </div>
                <div class="modal fade" id="addFeedbackModal">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
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
                                        <ul class="bg-white ui-sortable todo-list" v-for="checklist in task.checklist" :key="checklist.id">
                                            <li>
                                                <input type="checkbox">
                                                <span class="text">{{checklist.name}}</span>
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
                                                    <span class="img-circle elevation-1 text px-3 py-3">NN</span>
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
                                        <button class="btn btn-block btn-md btn-default">
                                            <i class="fa fa-check"></i> Complete Task
                                        </button>
                                        <button class="btn btn-block btn-md btn-default">
                                            <i class="fa fa-user"></i> Add User
                                        </button>
                                        <button class="btn btn-block btn-md btn-default">
                                            <i class="fa fa-bars"></i> Add Comments
                                        </button>
                                        <div class="dropright">
                                            <button class="btn btn-block btn-md btn-default dropdown" data-toggle="dropdown">
                                                <i class="fa fa-check-square"></i> Add Todo List
                                            </button>
                                            <div class="dropdown-menu">
                                                <form class="px-4 py-3" @submit.prevent="addTodo">
                                                    <input type="hidden" name="task_id" v-model="taskId">
                                                    <div class="form-group">
                                                        <label class="col-form-label" for="todo_name">Name</label>
                                                        <input type="text" name="todo_name" class="form-control" id="todo_name">
                                                    </div>
                                                    <div class="dropdown-divider"></div>
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        Add
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-block btn-md btn-default dropdown" data-toggle="dropdown">
                                                <i class="fa fa-arrow-right"></i> Move Task
                                            </button>
                                            <div class="dropdown-menu">
                                                <form class="px-4 py-3" @submit.prevent="moveTask(task)">
                                                    <div class="form-group">
                                                        <label class="col-form-label">Move To</label>
                                                        <select class="form-control" name="card_id" v-model="card_id">
                                                            <option disabled value="">Select Card</option>
                                                            <option v-for="card in cards" :key="card.id" :value="card.id">{{card.name}}</option>
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
</template>
<script>
import draggable from "vuedraggable";
    export default {
        props:{
            cardId:Number,
            projectId:Number
        },
        data(){
            return{
                tasks:[]
            }
        },
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
        methods:{
            changeOrder(){

            },
            addFeedbackModal(task){
                this.taskId=task.id;
                this.task_description = task.task_description;
                $('#addFeedbackModal').modal('show')
            },

        }
    }
</script>
