<template>
    <div>
        <div class="card card-outline card-white">
            <div class="card-body">
                <button href="#" class="btn btn-primary btn-sm" @click="addCards">
                    <i class="fa fa-plus"></i>Add Card
                </button>
                <div class="row mt-3 mr-2">
                    <div class="col-md-3"  v-for="(card,index) in project.card">
                        <div class="card p-lg-2">
                            <div class="card-header bg-white">
                                <h3 class="card-title">{{card.name}}</h3>
                                <div class="dropright">
                                    <button type="button" class="btn btn-sm float-sm-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <div class="text-center text-primary">Card Actions</div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target=`card.id`>
                                            <i class="fa fa-plus"></i>
                                            Add Task
                                        </a>
                                        <li class="dropdown-item">
                                            <i class="fa fa-thumbtack"></i>
                                            Move Card
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li class="dropdown-item">
                                            <i class="fa fa-tasks"></i>
                                            Move All Tasks Here
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal fade" id='card.id'>
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Task</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    &times;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{card.id}}
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
                        <h5 class="modal-title">Add Card</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="submitCard">
                            <div class="row">
                                <input type="hidden" name="project_id" v-model="project_id" value=this.project_id>
                                <div class="col-md-12 form-group">
                                    <label class="col-form-label" for="name">Card</label>
                                    <input type="text" name="name" class="form-control" id="name" v-model="name">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import draggable from 'vuedraggable'
import Vue from 'vue';
export default {
    mounted() {
        console.log('Component mounted.')
    },
    components: {
        draggable,
    },
    props:[
    ],
    data () {
        return {
            project_id:"",
            cards:[],
            name:"",
            card:'',
            card_id:'',
            task_name:'',
            task_description:'',
            due_date:'',
            tasks:[],
            cardId:''
        }

    },
    created(){
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
            this.project_id = this.project.id;
            this.name = '';
            $('#addCard').modal('show')
        },
        addTask() {
            // this.project_id=this.project.id;
            // this.card_id = this.card.id;
            // this.task_name = '';
            // this.task_description='';
            // this.due_date ='';
            $('#addTask').modal('show')
        },
        submitCard() {
            if (this.name===''){
                Vue.$toast.warning('Card Name is required',{position:'top-right'})
            }
            else {
                fetch('https://127.0.0.1/MyProject/public/api/card/store',{
                    method:'POST',
                    body:JSON.stringify({
                        "project_id":this.project_id,"name":this.name,
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
                            $('#addCard').modal('hide')
                            this.getCards();
                            Vue.$toast.success('Card Has been added successfully',{position:'top-right'})
                        }
                    })
            }

        },
        submitTask(){
            if (this.task_name===''||this.task_description===''||this.due_date===''){
                Vue.$toast.warning('All Fields Are Required',{position:'top-right'})
            }
            else{
                fetch('https://127.0.0.1/MyProject/public/api/task/store',{
                    method:'POST',
                    body:JSON.stringify({
                        "project_id":this.project_id,"card_id":this.card_id,"task_name":this.task_name,"task_description":this.task_description,"due_date":this.due_date
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
                            $('#addTask').modal('hide')
                            this.getCards();
                            Vue.$toast.success('Task Has Been Added Successfully',{position:'top-right'})
                        }
                    })
            }
        },
    },

}
</script>
