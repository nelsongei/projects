<template>
    <div class="card">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h4 class="card-title">Add Task</h4>
            </div>
            <form class="form-horizontal" @submit.prevent="addTask">
                <div class="card-body">
                    <input type="hidden" name="project_id" v-model="project_id" value="this.projectId">
                    <input type="hidden" name="card_id" v-model="card_id" value="this.cardId">
                    <div class="form-group">
                        <input type="text" name="task_name" v-model="task_name" class="form-control" placeholder="Enter Task Name">
                    </div>
                    <div class="form-group">
                        <textarea name="task_description" v-model="task_description" class="form-control" placeholder="Task Description"/>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" name="due_date" v-model="due_date">
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <button
                        class="btn bg-info btn-sm py-1"
                        type="reset"
                        @click="$emit('task-canceled')"
                    >
                        &times; Close
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm float-right">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
import Vue  from 'vue'
export default {
    props:{
        cardId:Number,
        projectId:Number,
    },
    data(){
        return{
            task_name:'',
            task_description:'',
            card_id:this.cardId,
            project_id:this.projectId,
            due_date:''
        }
    },
    methods: {
        getBaseURL: function(){
            var getUrl = window.location
            this.baseURL = getUrl.protocol +"//"+getUrl.host+"/"+getUrl.pathname.split('/')[1]+"/";
        },
        addTask(){
            if(this.task_name===''||this.task_description===''){
                Vue.$toast.error('All Fields are required',{position:'top-right'});
            }
            else{
                fetch(`${this.baseURL}/api/task/store`,{
                    method:'POST',
                    body:JSON.stringify({
                        "project_id":this.projectId,"card_id":this.cardId,"task_name":this.task_name,"task_description":this.task_description,"due_date":this.due_date
                    }),
                    headers:{
                        'Accept':'application/json',
                        'Content-Type':'application/json',
                        'X-CSRF-Token':$('meta[name=csrf-token]').attr('content')
                    }
                })
                .then(response=>response.json())
                .then(response=>{
                    if(response.status === 0){
                        window.location.reload();
                        Vue.$toast.success('Task Added',{position:'top-right'})
                    }
                })
            }
        }
    }
}
</script>
