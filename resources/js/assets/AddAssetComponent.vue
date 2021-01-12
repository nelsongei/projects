<template>
    <div>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="col-form-label">Asset Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label">Category</label>
                            <select name="category_id" class="form-control">
                                <option disabled>Select</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label">Serial No</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label">Department</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="col-form-label">Location</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {

    }
</script>
