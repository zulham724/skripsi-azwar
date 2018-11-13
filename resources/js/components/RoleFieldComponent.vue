<template>
    <div class="form-group">
        <label class="col-md-4 control-label">Hak</label>
        <div class="col-md-6">
            <select class="form-control">
                <option value="">--Pilih Akses--</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                roles:[{}]
            }
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/api/roles').then(res=>{
                console.log(res);
            });
        }
    }
</script>
