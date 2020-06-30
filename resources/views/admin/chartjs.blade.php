<canvas id="myChart" width="100" height="100"></canvas>
<script>
$(function () {
    $.ajax({
        url:'/admin/charjsBor',
        type:'GET',
        success : function(data){
            var Arr = JSON.parse(data);
            var len = Arr.length;
            var labelsArr = [];
            var dataArr = [];
            for(var i=0;i<len;i++){
                labelsArr.push(Arr[i]['name']);
                dataArr.push(Arr[i]['grade']);
            }
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labelsArr,
                    datasets: [
                        {
                            label: '个人喜好折线图',
                            //数据类型 折线图
                            type: "line",
                            data: dataArr,
                            backgroundColor:'rgba(54, 162, 235, 0.1)',
                            borderColor:'rgba(255,99,132,1)',
                            borderWidth: 1
                        },
                        {
                            label: '个人对主流游戏的喜爱程度',
                            data: dataArr,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(156,120,51,0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(156,120,51,0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
    })

});
</script>
