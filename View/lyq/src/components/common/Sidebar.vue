<template>
    <div class="sidebar">
        <el-menu :default-active="onRoutes" class="el-menu-vertical-demo" theme="dark" unique-opened router>
            <el-menu-item index="readme">
                <i class="el-icon-setting"></i>系统自我介绍
            </el-menu-item>
            <el-submenu index="2">
                <template slot="title"><i class="el-icon-date"></i>财产管理</template>
                <el-menu-item index="baseform">领用申购</el-menu-item>
                <el-menu-item index="vueeditor">款项增加</el-menu-item>
                <el-menu-item index="markdown">领用详情</el-menu-item>
                <el-menu-item index="upload">财产转移</el-menu-item>
            </el-submenu>
            <el-submenu index="3">
                <template slot="title"><i class="el-icon-menu"></i>故障维修</template>
                <el-menu-item index="basetable">故障报告</el-menu-item>
                <el-menu-item index="vuetable">维修记录</el-menu-item>
            </el-submenu>
            <el-submenu index="4">
                <template slot="title"><i class="el-icon-star-on"></i>财产台账</template>
                <el-menu-item index="basecharts">盈利图表</el-menu-item>
                <el-menu-item index="mixcharts">收入支出图表</el-menu-item>
            </el-submenu>
        </el-menu>
    </div>
</template>

<script>
    export default {
        computed:{
            onRoutes(){
                return this.$route.path.replace('/','');
            }
        }
    }
</script>

<style scoped>
    .sidebar{
        display: block;
        position: absolute;
        width: 250px;
        left: 0;
        top: 70px;
        bottom:0;
        background: #2E363F;
    }
    .sidebar > ul {
        height:100%;
    }
</style>
