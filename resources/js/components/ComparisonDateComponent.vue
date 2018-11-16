
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

            axios.get('/api/compare/dates').then(res=>{
              this.datas = res.data;

              this.renderChart({
                labels: res.data.labels,
                datasets: [
                  {
                    label: 'First rank',
                    backgroundColor: '#F39C12',
                    data: res.data.datasets
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
