<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="col-md-12 float-sm-left">
                    <button href="#" class="btn btn-success btn-sm" data-toggle="modal">
                        <i class="fa fa-times"></i>Add Project
                    </button>
                    <button class="btn btn-sm bg-pink">
                        <i class="fa fa-file-excel"></i>Export Projects
                    </button>
                    <div class="row mt-3">
                        <div class="col-4">
                            <div class="p-2 card card-success">
                                <h3>Initiation</h3>
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
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
