<template>
    <div class="table">

        <el-table :data="tableData" border style="width: 100%" @selection-change="selsChange" highlight-current-row>
            <el-table-column prop="date" label="日期" sortable width="150">
            </el-table-column>

            </el-table-column>
            <el-table-column prop="address" label="标题" :formatter="formatter">
            </el-table-column>

            <el-table-column label="操作" width="120">
                <template scope="scope">
                    <el-button size="small"
                               @click="handleEdit(scope.$index, scope.row)">详情</el-button>
                </template>
            </el-table-column>
        </el-table>
        <div class="pagination">
            <el-pagination
                layout="prev, pager, next"
                :total="1000">
            </el-pagination>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tableData: [{
                    date: '2017-03-12',
                    name: 'linxlin',
                    address: '南宁市江南区亭洪路',
                    tag: '家'
                }, {
                    date: '2017-03-015',
                    name: 'linlan',
                    address: '广西医科大学',
                    tag: '学校'
                }, {
                    date: '2017-03-12',
                    name: '卢誉秋',
                    address: '南宁市江南区那洪大道研祥智谷',
                    tag: '家'
                }, {
                    date: '2017-02-14',
                    name: '龙池',
                    address: '南宁市青秀区金源CBD',
                    tag: '公司'
                }],
                page: 1
            }

        },
        methods: {
            formatter(row, column) {
                return row.address;
            },
            filterTag(value, row) {
                return row.tag === value;
            },
//            handleEdit(index, row) {
//                this.$message('编辑第'+(index+1)+'行');
//            },
            handleDelete(index, row) {
                //this.$message.error('删除第'+(index+1)+'行');
                this.$confirm('确认删除该记录吗?', '提示', {
                    type: 'warning'
                }).then(() => {
                    console.log(888);
                    //this.listLoading = true;
                    //NProgress.start();
                    let para = { id: row.id };
                    removeUser(para).then((res) => {
                        console.log(99999);
                        //this.listLoading = false;
                        //NProgress.done();
                        this.$message({
                            message: '删除成功',
                            type: 'success'
                        });
                        //this.getUsers();
                    });
                }).catch(() => {

                });
            },
            getUsers() {


            },
            //显示编辑页面
            handleEdit: function (index, row) {
                this.editFormVisible = true;
                this.editForm = Object.assign({}, row);
            },
            //编辑页面
            editSubmit: function () {
                this.$refs.editForm.validate((valid) => {
                    if (valid) {
                        this.$confirm('确认提交吗？', '提示', {}).then(() => {
                            this.editLoading = true;
                            //NProgress.start();
                            let para = Object.assign({}, this.editForm);
                            para.birth = (!para.birth || para.birth == '') ? '' : util.formatDate.format(new Date(para.birth), 'yyyy-MM-dd');
                            editUser(para).then((res) => {
                                this.editLoading = false;
                                //NProgress.done();
                                this.$message({
                                    message: '提交成功',
                                    type: 'success'
                                });
                                this.$refs['editForm'].resetFields();
                                this.editFormVisible = false;
                                this.getUsers();
                            });
                        });
                    }
                });
            },
            selsChange: function (sels) {
                this.sels = sels;
            }
        }
    }
</script>
