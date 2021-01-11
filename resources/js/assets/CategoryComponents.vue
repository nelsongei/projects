<template>
  <div class="card">
    <div class="card-body">
      <button class="btn btn-primary btn-sm">
        <i class="fa fa-plus"></i>
        Add Category
      </button>
      <div class="row mt-2 mr-2">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Asset Category Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Category Name</td>
              <td>
                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cogs"></i>Action
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
export default {

}
</script>