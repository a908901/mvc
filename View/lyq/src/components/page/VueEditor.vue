<template>
    <div>

        <div class="form-box">
            <el-form ref="form" :model="form" label-width="80px">
                <el-form-item label="帐单号">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="款项来源">
                    <el-select v-model="form.region" placeholder="请选择">
                        <el-option label="公司盈利" value="bbk"></el-option>
                        <el-option label="借贷融资" value="xtc"></el-option>
                        <el-option label="接受资助" value="imoo"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="日期时间">
                    <el-col :span="11">
                        <el-date-picker type="date" placeholder="选择日期" v-model="form.date1" style="width: 100%;"></el-date-picker>
                    </el-col>
                    <el-col class="line" :span="2">-</el-col>
                    <el-col :span="11">
                        <el-time-picker type="fixed-time" placeholder="选择时间" v-model="form.date2" style="width: 100%;"></el-time-picker>
                    </el-col>
                </el-form-item>
                <!--<el-form-item label="选择开关">-->
                <!--<el-switch on-text="" off-text="" v-model="form.delivery"></el-switch>-->
                <!--</el-form-item>-->
                <el-form-item label="款额">
                    <el-radio-group v-model="form.resource">
                        <el-radio label="0-500"></el-radio>
                        <el-radio label="500-1000"></el-radio>
                        <el-radio label="1000-5000"></el-radio>
                        <el-radio label="5000-10000"></el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item label="详细说明">
                    <el-input type="textarea" v-model="form.desc"></el-input>
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
                    name: '',
                    region: '',
                    date1: '',
                    date2: '',
                    delivery: true,
                    type: ['步步高'],
                    resource: '小天才',
                    desc: ''
                }
            }
        },
        methods: {
            onSubmit() {
                this.$message.success('提交成功！');
            }
        }
    }
</script>
