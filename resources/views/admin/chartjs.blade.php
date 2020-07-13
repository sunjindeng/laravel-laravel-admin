<div style="width: 30%;height: 300px;">
    <canvas id="myChart"></canvas>
</div>
<div style="height: 300px;width: 30%">
    <canvas id="salesChart"></canvas>
</div>
<div style="height: 300px;width: 30%">
    <canvas id="pieChart"></canvas>
</div>
<script>
    $(function () {
        //饼状
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: pieData
        })

        //曲线
        var linectx = document.getElementById('salesChart').getContext('2d');
        var lineChart = new Chart(linectx, {
            type: 'line',
            data: {
                labels: x_labels,
                datasets: default_datasets
            },
            options: areaChartOptions
        })
        //树状
        $.ajax({
            url: '/admin/charjsBor',
            type: 'GET',
            success: function (data) {
                var Arr = JSON.parse(data);
                var len = Arr.length;
                var labelsArr = [];
                var dataArr = [];
                for (var i = 0; i < len; i++) {
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
                                backgroundColor: 'rgba(54, 162, 235, 0.1)',
                                borderColor: 'rgba(255,99,132,1)',
                                borderWidth: 1
                            },
                            {
                                label: '个人对主流游戏的喜爱程度',
                                data: dataArr,
                                backgroundColor: [
                                    'rgba(255,182,193, 0.2)',
                                    'rgba(220,20,60, 0.2)',
                                    'rgba(255,0,255, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(156,120,51,0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,182,193,1)',
                                    'rgba(220,20,60, 1)',
                                    'rgba(255,0,255, 1)',
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
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        })

    });
    var areaChartOptions = {
        // 轴线的颜色
        scaleLineColor: "rgba(255,0,255,0.2)",
        scaleShowLabels: true,// y轴上刻度的数值显示
// 显示轴线、以及刻度，默认为true
        showScale: true,
        // 在图标上显示网状表格。默认为false
        scaleShowGridLines: false,
        // 线条是否显示弧度，默认为true
        bezierCurve: false,
        // 显示数据线上的坐标点，默认为true，我认为显示出来比较好，否则鼠标找点很困难。
        pointDot: true,
        // 响应式
        responsive: true,

        // String - Colour of the grid lines
        scaleGridLineColor: "rgba(255,0,255,0.2)",
        // Number - Width of the grid lines
        scaleGridLineWidth: 1,
        // Boolean - Whether to show horizontal lines
        // (except X axis)
        scaleShowHorizontalLines: true,
        // Boolean - Whether to show vertical lines (except
        // Y axis)
        scaleShowVerticalLines: true,
        // Number - Tension of the bezier curve between
        // points
        bezierCurveTension: 0.3,
        // Number - Radius of each point dot in pixels
        pointDotRadius: 4,
        // Number - Pixel width of point dot stroke
        pointDotStrokeWidth: 1,
        // Number - amount extra to add to the radius to
        // cater for hit detection outside the drawn point
        pointHitDetectionRadius: 20,
        // Boolean - Whether to show a stroke for datasets
        datasetStroke: true,
        // Number - Pixel width of dataset stroke
        datasetStrokeWidth: 2,
        // Boolean - Whether to fill the dataset with a
        // color
        datasetFill: true,
        // String - A legend template
        legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
        // Boolean - whether to maintain the starting aspect
        // ratio or not when responsive, if set to false,
        // will take up entire container
        maintainAspectRatio: true
    };
    var default_datasets = [
        {
            label: "66666",
            backgroundColor: 'rgba(135,206,250,0.2)',
            borderColor: 'rgba(153,50,204)',
            data: [10, 20, 30, 50, 10, 80, 53]
        },
        {
            label: "99999",
            backgroundColor: 'rgba(64,224,208,0.2)',
            borderColor: 'rgba(0,128,128)',
            data: [12, 32, 52, 19, 95, 31, 56]
        }
    ];
    //X轴
    var x_labels = ["January", "February", "March", "April", "May", "June", "July"];
    //饼状参数
    var pieData = {
        labels: [
            "红色",
            "蓝色",
            "黄色",
            "洋红"
        ],
        datasets: [
            {
                data: [300, 50, 100,90],
                backgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    "#FF00FF"
                ],
                hoverBackgroundColor: [
                    "#FF6384",
                    "#36A2EB",
                    "#FFCE56",
                    "#FF00FF"
                ]
            }]
    }

</script>
