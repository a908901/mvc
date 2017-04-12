<template>
    <div class="login-wrap">
        <!--<div class="ms-title">天宇集团资金管理系统</div>-->
        <div class="index_header font30 rlt">
            <div class="index_header_title">和十素养</div>
            <div class="time abs">
                <marquee style="color:#fff; font-size:large">
                    {{time.nowYear}}年{{time.nowMonth}}月{{time.nowDate}}日
                    &nbsp;&nbsp;星期{{time.nowStr}}
                </marquee>
            </div>
        </div>
        <div class="ms-login">
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="0px" class="demo-ruleForm">
                <el-form-item prop="username">
                    <el-input v-model="ruleForm.username" placeholder="请输入用户名" ></el-input>
                </el-form-item>
                <el-form-item prop="password">
                    <el-input type="password" placeholder="请输入密码" v-model="ruleForm.password" @keyup.enter.native="submitForm('ruleForm')"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-checkbox v-model="checked" checked class="remember">记住密码</el-checkbox>
                </el-form-item>
                <div class="login-btn">
                    <el-button type="primary" @click="submitForm('ruleForm')">登录</el-button>
                </div>
                <!--<p style="font-size:12px;line-height:30px;color:#999;">Tips : 用户名和密码随便填。</p>-->
            </el-form>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                ruleForm: {
                    username: '',
                    password: ''
                },
                rules: {
                    username: [
                        { required: true, message: '请输入用户名', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请输入密码', trigger: 'blur' }
                    ]
                },
                time:{
                    nowYear: "",
                    nowMonth: "",
                    nowDate: "",
                    nowStr: ""
                },
                checked: true
            }
        },
        mounted: function(){
            var date = new Date();
            // var year = date.getFullYear();
            // var month = date.getMonth()+1;
            // var day = date.getDate();
            var a = new Array("日","一","二","三","四","五","六");
            var week =new Date().getDay();
            var str = a[week];
            this.time.nowYear = date.getFullYear();
            this.time.nowMonth = date.getMonth()+1;
            this.time.nowDate = date.getDate();
            this.time.nowStr = str;
        },
        methods: {
            submitForm(formName) {
                const self = this;
                self.$refs[formName].validate((valid) => {
                    if (valid) {
                        localStorage.setItem('ms_username',self.ruleForm.username);
                        self.$router.push('/readme');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            }
        }
    }
</script>

<style>
    /*头部样式*/
    .index_header{
        width:100%;
        height:100px;
        /*background-image: linear-gradient(90deg, #224157 0%, #324157 100%);*/
        backround:#324157;
        line-height:100px;
        text-align: center;
        font-weight: bold;
        color:#fff;
        top:50px;
    }
    .index_header_title{
        width:100%;
        height:100%;
    }
    .time{
        width:30%;
        height:30px;
        line-height:30px;
        top:60px;
        left:60%;
    }
    .rlt{
        position: relative;
    }
    .abs{
        position: absolute;
    }
    .font30{
        font-size:30px;
    }
    /**/
    .login-wrap{
        position: relative;
        width:100%;
        height:100%;
    }
    .ms-title{
        position: absolute;
        top:50%;
        width:100%;
        margin-top: -230px;
        text-align: center;
        font-size:30px;
        color: #fff;

    }
    .ms-login{
        position: absolute;
        left:50%;
        top:50%;
        width:300px;
        height:220px;
        margin:-150px 0 0 -190px;
        padding:40px;
        border-radius: 5px;
        background: #fff;
    }
    .login-btn{
        text-align: center;
    }
    .login-btn button{
        width:100%;
        height:36px;
    }
</style>
