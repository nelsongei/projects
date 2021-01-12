<template>
  <div>
    <div class="row">
      <div class="col-md-3">
        <a :href="'assets_dashboard'">
          <div class="card">
            <div class="card-body">
              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="text-bold">Asset Dashboard</h6>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3">
        <a :href="'create_assets'">
          <div class="card">
            <div class="card-body">
              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="text-bold">Asset</h6>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-3">
        <a :href="'create_category'">
          <div class="card">
            <div class="card-body">
              <div class="list-group">
                <div class="list-group-item">
                  <h6 class="text-bold">Asset Category</h6>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
        <div class="col-md-3">
            <a :href="'create_category'">
                <div class="card">
                    <div class="card-body">
                        <div class="list-group">
                            <div class="list-group-item">
                                <h6 class="text-bold">Purchase Details</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
  </div>
</template>
<router-view></router-view>
<script>
</script>
