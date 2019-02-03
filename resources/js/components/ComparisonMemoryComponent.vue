
<script>
    import { Bar } from 'vue-chartjs';
    export default {
        props:['options'],
        extends: Bar,
        data(){
          return {
            datas:[]
          }
        },
        mounted() {
            console.log('Component mounted.');
            // Overwriting base render method with actual data.

            axios.get('/api/compare/memory').then(res=>{
              this.datas = res.data;

              this.renderChart({
                labels: res.data.labels,
                datasets: [
                  {
                    label: 'Long Polling',
                    backgroundColor: 'rgb(255, 255, 255)',
                    borderWidth: 1,
                    borderColor: 'rgb(0, 0, 0)',
                    data: res.data.datasets.polling
                  },{
                    label: 'Websocket',
                    backgroundColor: pattern.draw('zigzag-horizontal', 'rgb(0, 0, 0)'),
                    borderWidth: 1,
                    borderColor: 'rgb(0, 0, 0)',
                    data: res.data.datasets.socket
                  }
                ]
              },{
                responsive:true,
                maintainAspectRatio:false
              });

            });

        }
    }
</script>
