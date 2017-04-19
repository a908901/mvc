<template>
    <div class="table">

        <el-table :data="tableData" border style="width: 100%"  highlight-current-row>
            <el-table-column prop="tdate" label="日期" sortable width="150">
            </el-table-column>

            </el-table-column>
            <el-table-column prop="address" label="方式" :formatter="formatter">
            </el-table-column>

            <el-table-column label="操作" width="120">
                <template scope="scope">
                    <el-button size="small"
                               @click="handleDetail(scope.$index, scope.row)">详情</el-button>
                </template>
            </el-table-column>
        </el-table>
        <div class="pagination">
            <el-pagination
                layout="prev, pager, next"
                @current-change="handleCurrentChange"
                :page-size="10"
                :total="total">
            </el-pagination>
        </div>

        <!--详情界面-->
        <el-dialog title="详情" v-model="detailFormVisible" :close-on-click-modal="false">
            <el-form  :model="detailForm" label-width="80px"   ref="detailForm">
                <el-form-item label="日期" prop="tdate">
                    <el-input v-model="detailForm.tdate" auto-complete="off" readonly="readonly"></el-input>
                </el-form-item>
                <el-form-item label="名字" prop="name">
                    <el-input v-model="detailForm.name" auto-complete="off" readonly="readonly"></el-input>
                </el-form-item>
                <el-form-item label="公司名" prop="address">
                    <el-input v-model="detailForm.address" auto-complete="off" readonly="readonly"></el-input>
                </el-form-item>
                <!--<el-form-item  label="是否归还">-->
                <!--<el-radio-group v-model="editForm.tag">-->
                <!--<el-radio class="radio" :label="1">是</el-radio>-->
                <!--<el-radio class="radio" :label="0">否</el-radio>-->
                <!--</el-radio-group>-->
                <!--</el-form-item>-->
                <!--<el-form-item label="年龄">-->
                <!--<el-input-number  ></el-input-number>-->
                <!--</el-form-item>-->
                <el-form-item label="方式" prop="tag">
                    <el-input v-model="detailForm.tag" auto-complete="off" readonly="readonly"></el-input>
                </el-form-item>
                <el-form-item label="详细说明">
                    <el-input v-model="detailForm.detailed" type="textarea" readonly="readonly"></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer"  scope="scope">
                <el-button @click.native="detailFormVisible = false">取消</el-button>
                <!--<el-button @click.native="editSubmit(scope.row)" type="primary">提交</el-button>-->
            </div>
        </el-dialog>
    </div>
</template>
<style>
    input[readonly="readonly"]:focus{
        border:1px solid #bfcbd9;/*这里你可以自己调节边框样式*/
    }
</style>

<script>
    import { XHRGet, XHRPost } from "../../api/ajax";
    export default {
        data() {
            return {
                tableData:"",
                //详情界面数据
                detailForm: {
                    tdate: '',
                    name: -1,
                    address:"",
                    tag: 0,//方式
                    detaialed: ''
                },
                total: 5,
                pageNum: 1,
                detailFormVisible: false,
            }


        },
        mounted: function () {
//            this.tableData = [
//                {tdate: '2017-03-12', name: 'linxlin', address: '南宁市江南区亭洪路', tag: '家'},
//                {tdate: '2017-03-15', name: 'linlan', address: '广西医科大学', tag: '学校'},
//                {tdate: '2017-03-12', name: '卢誉秋', address: '南宁市江南区那洪大道研祥智谷', tag: '家'},
//                {tdate: '2017-02-14', name: '龙池', address: '南宁市青秀区金源CBD', tag: '公司'}
//            ]

            const _this = this;
            let data = this.pageNum;
            console.log(data);
            XHRGet('./Upload.php',{pageNum:data}, function (response) {
                _this.tableData = response.data.data;
                _this.total = response.data.pageCount;
                console.log(_this.total);
            })

        },
        methods: {
            formatter(row, column) {
                return row.address;
            },
            filterTag(value, row) {
                return row.tag === value;
            },

            //显示详情页面
            handleDetail: function (index, row) {
                this.detailFormVisible = true;
                this.detailForm = Object.assign({}, row);
                console.log(row)
            },
            //分页设计
            handleCurrentChange(val) {
                this.pageNum = val;
                this.getUsers();
            },
            //获取用户列表
            getUsers() {

                let para = this.pageNum;
//                getUserListPage(para).then((res) => {
//                    this.total = res.data.pageCount;
//                    this.users = res.data.pageSize;
//                });
                const _this= this;
                XHRGet('./Upload.php',{pageNum:para}, function (response) {
                    _this.total = response.data.pageCount;
                    _this.tableData = response.data.data;

                })
            }

        }
    }
</script>
