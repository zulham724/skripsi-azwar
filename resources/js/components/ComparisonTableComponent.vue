<template>
    <div>
        <div class="row">
            <div class="col-sm-6">

                <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-chatbubble-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Long Polling</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">
                            Estimasi perhitungan data yang dikirimkan dari Robot Long Polling
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                <!-- <div class="box">
                    <div class="box-header">
                        Long Polling
                    </div>
                    <div class="box-body"> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="longpolling">
                            
                            </table>
                        </div>
                    <!-- </div>
                </div> -->
            </div>

            <div class="col-sm-6">
                <div class="info-box bg-aqua">
                    <span class="info-box-icon"><i class="ion-ios-heart-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Websocket</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 100%"></div>
                      </div>
                      <span class="progress-description">
                            Estimasi perhitungan data yang dikirim dari Robot Websocket
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                <!-- <div class="box">
                    <div class="box-header">
                        Websocket
                    </div>
                    <div class="box-body"> -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="socket">
                            
                            </table>
                        </div>
                    <!-- </div>
                </div> -->
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            $("#longpolling").dataTable({
                ajax:function(data,callback,settings){
                    axios.get('/api/pollings').then(res=>{
                        callback(res);
                    });
                },
                columns:[
                    // {title:'user',data:'user.name'},
                    {title:'Urutan',data:'name'},
                    {title:'Perintah',data:'value'},
                    {title:'Waktu diterima',data:function(val){
                        let d = new Date(val.date);
                        const month = [
                            "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"
                        ];
                        return 'Tanggal '+d.getDate()+' '+month[d.getMonth()]+' Tahun '+d.getFullYear()+' jam '+d.getHours()+' menit ke '+d.getMinutes()+' detik ke '+d.getSeconds();
                    }},
                    {title:'band width',data:function(val){
                        return val.bandwidth_usage+' Bytes';
                    }},
                    {title:'Beban cpu',data:function(val){
                        return val.cpu_usage+'%';
                    }},
                    {title:'Pemakaian memory',data:function(val){
                        return val.memory_usage+' Bytes';
                    }}
                ]
            });

            $("#socket").dataTable({
                ajax:function(data,callback,settings){
                    axios.get('/api/sockets').then(res=>{
                        callback(res);
                    });
                },
                columns:[
                    // {title:'user',data:'user.name'},
                    {title:'Urutan',data:'name'},
                    {title:'Perintah',data:'value'},
                    {title:'Waktu diterima',data:function(val){
                        let d = new Date(val.date);
                        const month = [
                            "Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"
                        ];
                        return 'Tanggal '+d.getDate()+' '+month[d.getMonth()]+' Tahun '+d.getFullYear()+' jam '+d.getHours()+' menit ke '+d.getMinutes()+' detik ke '+d.getSeconds();
                    }},
                    {title:'band width',data:function(val){
                        return val.bandwidth_usage+' Bytes';
                    }},
                    {title:'Beban cpu',data:function(val){
                        return val.cpu_usage+'%';
                    }},
                    {title:'Pemakaian memory',data:function(val){
                        return val.memory_usage+' Bytes';
                    }}
                ]
            });

        }
    }
</script>
