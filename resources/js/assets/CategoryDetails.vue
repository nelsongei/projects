<template>
    <div class="col-md-3">
        <div class="card card-outline card-info">
            <div class="card-body box-profile">
                <div class="text-center text-bold">
                    <h1 style="font-size:72px">{{asset.categories.category.charAt(0)}}</h1>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default{
    props:[
        'asset',
    ],
}
</script>
