
<script>
import { Bar  } from 'vue-chartjs'

export default {
  extends: Bar ,
  props: ['chartdata', 'options'],
  mounted () {
  this.renderChart({
    labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho"
    ,"Julho","Agosto","Setembro","Outubro","Novembro","Dezembro"],
    datasets: [
      {
        label: 'Dizimo',
            data: [12, 19, 3, 5, 2, 3,10,15,25,20,23,30],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 159, 64, 0.2)',
            ]
      }
    ]},
    {
      responsive: true
    }
  )
}
}
</script>

<style>

</style>
