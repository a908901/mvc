<template>
    <div>
        <div class="echarts">
            <IEcharts :option="line" ></IEcharts>
        </div>
        <div class="echarts">
            <IEcharts :option="bar" ></IEcharts>
        </div>
        <div class="echarts">
            <IEcharts :option="pie" ></IEcharts>
        </div>
        <div class="echarts">
            <IEcharts :option="pie_radius" ></IEcharts>
        </div>
    </div>
</template>

<script>
    import IEcharts from 'vue-echarts-v3';
    export default {
        components: {
            IEcharts
        },
        data: () => ({
            line: {
                color:["#20a0ff","#13CE66","#F7BA2A","#FF4949"],
                title: {
                    text: '柱形图'
                },
                xAxis: {
                    data: ["一月", "二月", "三月", "四月", "五月", "六月","七月","八月","九月","十月","十一月","十二月"]
                },
                yAxis:{},
                series: [
                    {
                        name: "盈利",
                        type: "line",
                        data: [15, 20, 46, 20, 35, 43, 36, 43, 29, 59, 50,26]
                    }
                ]
            },
            bar: {
                color:["#20a0ff","#13CE66","#F7BA2A","#FF4949"],
                title: {
                    text: '柱状图'
                },
                xAxis: {
                    data: ["一月", "二月", "三月", "四月", "五月", "六月","七月","八月","九月","十月","十一月","十二月"]
                },
                yAxis:{},
                series: [
                    {
                        name: "盈利",
                        type: "bar",
                        data: [15, 20, 46, 20, 35, 43, 36, 43, 29, 59, 50,26]
                    }
                ]
            },
            pie: {
                color:["#20a0ff","#13CE66","#F7BA2A","#FF4949","#61a0a8","blue", "yellow" ,"pink" , "#ddd", "#aaa", "#ff00ff", "#ffaaff"],
                title : {
                    text: '饼状图',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"]
                },
                series : [
                    {
                        name: '盈利',
                        type: 'pie',
                        radius : '55%',
                        center: ['50%', '50%'],
                        data:[
                            {value:15, name:'一月'},
                            {value:20, name:'二月'},
                            {value:46, name:'三月'},
                            {value:20, name:'四月'},
                            {value:35, name:'五月'},
                            {value:43, name:'六月'},
                            {value:36, name:'七月'},
                            {value:43, name:'八月'},
                            {value:29, name:'九月'},
                            {value:59, name:'十月'},
                            {value:50, name:'十一月'},
                            {value:26, name:'十二月'}
                        ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            },
            pie_radius:{
                color:["#20a0ff","#13CE66","#F7BA2A","#FF4949","#61a0a8","blue", "yellow" ,"pink" , "#ddd", "#aaa", "#ff00ff", "#ffaaff"],
                title : {
                    text: '环形图',
                    x:'center'
                },
                tooltip : {
                    trigger: 'item',
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: 'vertical',
                    left: 'left',
                    data: ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月"]
                },
                series : [
                    {
                        name: '盈利',
                        type: 'pie',
                        radius : ['40%','60%'],
                        data:[
                            {value:15, name:'一月'},
                            {value:20, name:'二月'},
                            {value:46, name:'三月'},
                            {value:20, name:'四月'},
                            {value:35, name:'五月'},
                            {value:43, name:'六月'},
                            {value:36, name:'七月'},
                            {value:43, name:'八月'},
                            {value:29, name:'九月'},
                            {value:59, name:'十月'},
                            {value:50, name:'十一月'},
                            {value:26, name:'十二月'}
                        ],
                        itemStyle: {
                            emphasis: {
                                shadowBlur: 10,
                                shadowOffsetX: 0,
                                shadowColor: 'rgba(0, 0, 0, 0.5)'
                            }
                        }
                    }
                ]
            }
        })
    }
</script>

<style scoped>
    .echarts {
        float: left;
        width: 500px;
        height: 400px;
    }
</style>
