<template>
    <div class="table">

        <el-table :data="users" border style="width: 100%"  highlight-current-row  id="tableId">
            <el-table-column prop="tdata" label="日期" sortable width="150">
            </el-table-column>
            <el-table-column prop="number" label="编号" width="120">
            </el-table-column>
            <el-table-column prop="name" label="领用人" >
            </el-table-column>
            <el-table-column prop="tag" label="标签" width="120"
                             :filters="[{ text: '归还', value: '归还' }, { text: '未归还', value: '未归还' }]"
                             :filter-method="filterTag">
                <template scope="scope">
                    <el-tag :type="scope.row.tag === '归还' ? 'primary' : 'success'" close-transition>{{scope.row.tag}}
                    </el-tag>
                </template>
            </el-table-column>
            <el-table-column label="操作" width="180">
                <template scope="scope">
                    <el-button size="small"
                               @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                    <el-button size="small" type="danger"
                               @click="handleDel(scope.$index, scope.row)">删除</el-button>
                </template>
            </el-table-column>
        </el-table>
        <div class="pagination">
            <el-pagination
                layout="prev, pager, next"
                :total="1000">
            </el-pagination>
        </div>

        <!--编辑界面-->
        <el-dialog title="编辑" v-model="editFormVisible" :close-on-click-modal="false">
            <el-form  :model="editForm" label-width="80px"  :rules="editFormRules" ref="editForm">
                <el-form-item label="领用日期" prop="tdata">
                    <el-input v-model="editForm.tdata" auto-complete="off"></el-input>
                </el-form-item>
                <el-form-item label="编号" prop="number">
                    <el-input v-model="editForm.number" auto-complete="off"></el-input>
                </el-form-item>
                <el-form-item label="领用人" prop="name">
                    <el-input v-model="editForm.name" auto-complete="off"></el-input>
                </el-form-item>
                <el-form-item label="是否归还" prop="tag">
                    <el-input v-model="editForm.tag" auto-complete="off"></el-input>
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
                <el-form-item label="详细说明">
                    <el-input v-model="editForm.detailed" type="textarea" ></el-input>
                </el-form-item>
            </el-form>
            <div slot="footer" class="dialog-footer"  scope="scope">
                <el-button @click.native="editFormVisible = false">取消</el-button>
                <el-button @click.native="editSubmit(scope.row)" type="primary">提交</el-button>
            </div>
        </el-dialog>




    </div>
</template>

<script>
    import util from '../../common/js/util'
    import { getUserListPage, removeUser, batchRemoveUser, editUser, addUser } from '../../api/api.js';
    export default {
        data() {
            return {
                users: "",
                //编辑界面数据
                editForm: {
                    id:1,
                    tdata: '',
                    number: '',
                    name: -1,
                    tag: 0,
                    detaialed: ''
                },
                editFormRules: {
                    name: [
                        { required: true, message: '请输入姓名', trigger: 'blur' }
                    ]
                },
                page: 2,
                editFormVisible: false,//编辑界面是否显示
            }

        },
        mounted: function () {
            this.users = [
                {id:1,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:2,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:3,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:4,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:5,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:6,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:7,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:8,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:9,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:10,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:11,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:12,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:13,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:14,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:15,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:16,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:17,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:18,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:19,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:20,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:21,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:22,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:23,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:24,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:25,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:26,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:27,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:28,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'},
                {id:29,tdata: '2017-03-12', number: '01', name: '鲈鱼', tag: '归还', detailed: '111'},
                {id:30,tdata: '2017-03-15', number: '02', name: '鲈鱼', tag: '未归还', detailed: '222'},
                {id:31,tdata: '2017-03-18', number: '03', name: '鲈鱼', tag: '归还', detailed: '333'},
                {id:32,tdata: '2017-03-26', number: '04', name: '鲈鱼', tag: '未归还', detailed: '444'}
            ]

        },
        methods: {
            formatter(row, column) {
                return row.address;
            },
            filterTag(value, row) {
                return row.tag === value;
            },
//            //获取用户列表
//            getUsers() {
//                let para = {
//                    page: this.page,
//                    name: this.users.name,
//                    id: this.users.tdata
//                };
//
//                getUserListPage(para).then((res) => {
//                    this.total = res.data.total;
//                    this.users = res.data.users;
//                });
//            },
//            handleEdit(index, row) {
//                this.$message('编辑第'+(index+1)+'行');
//            },
            handleDel: function (index, row) {
                this.$confirm('确认删除该记录吗?', '提示', {
                    type: 'warning'
                }).then(() => {
                    let para = { id: row.id };
                    console.log(para);
                    console.log(row.name);
                    //removeUser(para).then(() => {
                    this.users.splice(para,1);//删掉表的某一行
                    this.$message({
                        message: '删除成功',
                        type: 'success'
                    });
                    //this.getUsers();
                    //});
                }).catch(() => {

                });
            },

            //显示编辑页面
            handleEdit: function (index,row) {
                this.editFormVisible = true;
                this.editForm = Object.assign({}, row);
            },
            //编辑提交的的时候页
            editSubmit: function (row) {
                this.$refs.editForm.validate((valid) => {
                    if (valid) {
                        this.$confirm('确认提交吗？', '提示', {}).then((row) => {
                            //
                            let pif = { id: row.id };
                            console.log(pif)
                            let para = Object.assign({}, this.editForm);
                            console.log(para)
                            editUser(para).then((res) => {
                                this.$message({
                                    message: '提交成功',
                                    type: 'success'
                                });
                                this.$refs['editForm'].resetFields();
                                this.editFormVisible = false;

                                //this.getUsers();
                            });
                            //

                        });
                    }
                });
            },

        }

    }
</script>
