<template>
    <div class="card">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h4 class="card-title">Add Task</h4>
            </div>
            <form class="form-horizontal">
                <div class="card-body">
                    <input type="hidden" name="project_id" v-model="project_id" value="this.projectId">
                    <input type="hidden" name="card_id" v-model="card_id" value="this.cardId">
                    <div class="form-group">
                        <input type="text" name="name" v-model="name" class="form-control" placeholder="Enter Task Name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Task Description"/>
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
                    <button type="button" class="btn btn-primary btn-sm float-right">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        cardId:Number,
        projectId:Number,
    },
    data(){
        return{
            name:'',
            description:'',
            card_id:this.cardId,
            project_id:this.projectId
        }
    }
}
</script>
