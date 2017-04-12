<template>
    <div>
        <div class="mix-echarts">
            <IEcharts :option="mix" ></IEcharts>
        </div>
    </div>
</template>

<script>
    import IEcharts from 'vue-echarts-v3';
    export default {
        data: function(){
            return {
                mix:{
                    color:["#20a0ff","#13CE66","#F7BA2A","#FF4949","#61a0a8"],
                    legend: {
                        data:['盈利','收入','支出']
                    },
                    xAxis: {
                        data: ['周一','周二','周三','周四','周五','周末']
                    },
                    yAxis:{},
                    series: [
                        {
                            name: "盈利",
                            type: "line",
                            data: [15, 20, 40, 20, 35, 43]
                        },
                        {
                            name: "收入",
                            type: "bar",
                            data: [20, 30, 50, 45, 45, 60]
                        },
                        {
                            name: "支出",
                            type: "bar",
                            data: [5, 10, 10, 30, 10, 17]
                        }
                    ]
                }
            }
        },
        components: {
            IEcharts
        }
    }
</script>

<style scoped>
    .mix-echarts{
        width:900px;
        height:600px;
    }
</style>
