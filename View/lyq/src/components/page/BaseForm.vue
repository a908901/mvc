<template>
    <div>
        <div class="form-box">
            <el-form ref="form" :model="form" label-width="80px">
                <el-form-item label="编号">
                    <el-input v-model="form.number"></el-input>
                </el-form-item>
                <el-form-item label="产品名">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="用途">
                    <el-input v-model="form.use"></el-input>
                </el-form-item>
                <el-form-item label="领用日期">
                    <el-col :span="11">
                        <el-date-picker type="date" placeholder="选择日期" v-model="form.date1" style="width: 100%;"></el-date-picker>
                    </el-col>

                </el-form-item>
                <el-form-item label="所属部门">
                    <el-input v-model="form.department"></el-input>
                </el-form-item>
                <el-form-item label="领用人">
                    <el-input v-model="form.username"></el-input>
                </el-form-item>
                <el-form-item label="使用类型">
                    <el-radio-group v-model="form.resource">
                        <el-radio label="公用"></el-radio>
                        <el-radio label="私用"></el-radio>

                    </el-radio-group>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="onSubmit">提交</el-button>
                    <el-button>取消</el-button>
                </el-form-item>


            </el-form>
        </div>

    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                form: {
                    number:'',
                    name: '',
                    use: '',
                    date1: '',
                    department:'',
                    username:'',
                    resource: '公用'
                }
            }
        },
        methods: {
            onSubmit() {
                this.$message.success('提交成功！');
                console.log(this.form)
            }
        }
    }
</script>
