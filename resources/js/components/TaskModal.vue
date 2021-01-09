<template>
    <div>
        <div class="modal fade" id="addFeedbackModal">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">{{ taskName }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    props:[
        'taskName'
    ],
  }
</script>