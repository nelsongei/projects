<template>
    <div>
        <div class="card card-outline card-white">
            <div class="card-body">
                <button href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addCard">
                    <i class="fa fa-plus"></i>Add Card
                </button>
                <div class="row mt-3 mr-2">
                    <div class="col-md-3">
                        <div class="card p-2" v-for="card in cards" :key="card.id">
                            <div class="card-header bg-white">
                                <h4 class="card-title">{{card.name}}</h4>
                                <button type="button" class="btn btn-sm float-sm-right" data-toggle="modal" data-target="#addTask">
                                    <span aria-hidden="true">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                </button>
                                <div class="modal fade" id="addTask">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Add Task</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    x
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" class="form-horizontal" action="">
                                                    <div class="row">
                                                        <div class="col-md-12 form-group">
                                                            <label class="col-form-label" for="task">Task</label>
                                                            <input type="text" name="task" id="task" class="form-control">
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label class="col-form-label" for="description">Task</label>
                                                            <textarea name="description" class="form-control" id="description"></textarea>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <label class="col-form-label" for="due_date">Due Date</label>
                                                            <input type="date" name="due_date" id="due_date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                                            <i class="fa fa-times"></i>
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-success btn-sm">
                                                            Add Task
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-2 card card-success">
                            <h3>Developing</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="p-2 card card-success">
                            <h3>Done</h3>
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
                            x
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" class="form-horizontal" action="">
                            <div class="row">
                                <input type="hidden" name="project_id">
                                <div class="col-md-12 form-group">
                                    <label class="col-form-label" for="card">Card</label>
                                    <input type="text" name="card" class="form-control" id="card">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                                    <i class="fa fa-times"></i>
                                    Close
                                </button>
                                <button type="submit" class="btn btn-success btn-sm">
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
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        components: {
            draggable,
            },
        data () {
            return {
                cards: [],
                tasks: [],
                cardId:'',
                taskId:'',
                }
        },
        created() {
            this.getCards();
        },
        methods: {
            getCards: function (url) {
                var page_url = url || 'https://127.0.0.1/MyProject/public/cards';
                fetch(page_url)
                .then(res=>res.json())
                .then(res=>{
                    this.cards = res.data;
                })

            }
        }
    }
</script>
