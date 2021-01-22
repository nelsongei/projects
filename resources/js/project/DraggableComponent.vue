<template>
    <div class="card">
        <div class="row mt-2 mr-3 ml-2">
            <div class="col-md-3" v-for="card in project.card" :key="card.index">
                <div class="card p-lg-2">
                    <div class="card-header">
                        <h3 class="card-title text-bold">{{card.name}}</h3>
                    </div>
                    <div class="card-body">
                        <draggable
                            class="list-group-item"
                            v-model="card.items"
                            tag="v-layout"
                            :group="{name: 'card'}"
                            v-bind="taskDragOptions"
                            @end="handleTaskMoved"
                        >
                            <div
                                v-for="task in card.tasks" :key="task.title"
                                class="mb-2"
                            >
                                <div class="list-group" style="width: 100%;">
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
</template>
<script>
import Vue from "vue"
import draggable from "vuedraggable"
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css"
Vue.use(Vuetify)
    export default{
        props:[
            'project',
        ],
        components:{
            draggable,
        },
        data() {
            return {
                cards: [],
                baseURL:'',
                projectId:this.project.id,
            }
        },
        computed: {
            taskDragOptions() {
                return {
                    animation: 200,
                    group: "task-list",
                    dragClass: "status-drag"
                };
            }
        },
        created(){
            this.getCards()
        },
        methods: {
            getBaseURL: function(){
                var getUrl = window.location
                this.baseURL= getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
            },
            handleTaskMoved(event){
                console.log(event.target.value)
            },
            getCards(){
                axios.get(`http://127.0.0.1/projects/public/api/cards/${this.projectId}`)
                .then(response=>{
                    this.cards  = response.data;
                })
                .catch(error=>{
                    console.log(error)
                })
            }
        },
    }
</script>
