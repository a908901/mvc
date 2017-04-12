<template>
    <div class="table">

        <el-table :data="tableData" border style="width: 100%" @selection-change="selsChange" highlight-current-row>
            <el-table-column prop="date" label="日期" sortable width="150">
            </el-table-column>
            <el-table-column prop="name" label="编号" width="120">
            </el-table-column>
            <el-table-column prop="address" label="领用人" :formatter="formatter">
            </el-table-column>
            <el-table-column prop="tag" label="标签" width="120"
                             :filters="[{ text: '归还', value: '归还' }, { text: '未归还', value: '未归还' }]"
                             :filter-method="filterTag">
                <template scope="scope">
                    <el-tag :type="scope.row.tag === '家' ? 'primary' : 'success'" close-transition>{{scope.row.tag}}
                    </el-tag>
                </template>
            </el-table-column>
            <el-table-column label="操作" width="180">
                <template scope="scope">
                    <el-button size="small"
                               @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                    <el-button size="small" type="danger"
                               @click="handleDelete(scope.$index, scope.row)">删除</el-button>
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
                    name: '01',
                    address: '鲈鱼',
                    tag: '归还'
                }, {
                    date: '2017-03-015',
                    name: '02',
                    address: '录取',
                    tag: '归还'
                }, {
                    date: '2017-03-12',
                    name: '03',
                    address: '龙凤',
                    tag: '未归还'
                }, {
                    date: '2017-02-14',
                    name: '04',
                    address: '蝶舞',
                    tag: '归还'
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
