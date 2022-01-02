<template lang="">
    <!-- token field  -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Add Token</h3>
                        </div>
                        <form @submit.prevent="handleForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Enter Token Text</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter Token" v-model="form.token_name">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" :class="editMode ? 'btn-warning' : 'btn-primary'" class="btn  btn-sm">{{editMode ? 'Update': 'Add Token'}}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Token List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table id="myTable" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <span class="btn-sm btn-worning"></span>
                                    <tr v-for="token in tokenList.data" :key="token.id">
                                        <td>{{token.id}}</td>
                                        <td>{{token.user.name}}</td>
                                        <td>{{new Date(token.created_at).toLocaleString()}}</td>
                                        <td v-if="token.status == 0"><span class="btn-sm btn-warning">Pending</span></td>
                                        <td v-else><span class="btn-sm btn-success">Active</span></td>
                                        <td>
                                        <div class="dropdown show">
                                        <a  role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-sm dropdown-toggle">Action</a>
                                        <div aria-labelledby="dropdownMenuLink" class="dropdown-menu">
                                            <button @click="editToken(token.id)" class="dropdown-item">Edit</button>
                                            <button @click="deleteToken(token.id)" class="dropdown-item">Delete</button>
                                        </div>
                                        </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <pagination :data="tokenList" @pagination-change-page="getResults"></pagination>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
</div>
    </section>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            editMode: false,
            editId: '',
            form: {
                token_name: "",
            },
            tokenList: {},
        };
    },
    created() {
        this.getTokenList();
    },
    methods: {
        async getTokenList() {
            await axios.get("api/token").then((res) => {
                console.log(res);
                this.tokenList = res.data;
            });
        },

        getResults(page) {
            if (typeof page === "undefined") {
                page = 1;
            }
            axios.get("api/token?page=" + page).then((response) => {
                this.tokenList = response.data;
            });
        },

        handleForm() {
            if(this.editMode){
                axios.put("api/token/"+this.editId, this.form).then((res) => {
                    if (res.data) {
                        this.editId = ''
                        this.editMode = false;
                        this.form.token_name = "";

                        Toast.fire({
                            icon: "success",
                            title: "Selected Token Updated!",
                        });
                        this.getTokenList();
                    }
                });
            }else{
            axios.post("api/token", this.form).then((res) => {
                if (res.data) {
                    this.form.token_name = "";

                    Toast.fire({
                        icon: "success",
                        title: "New Token Added!",
                    });
                    this.getTokenList();
                }
            });

            }

        },

       async editToken(id){
            await axios.get('api/token/'+id).then((res) => {
                this.form.token_name = res.data.token_name;
                this.editMode = true;
                this.editId = id;
            })

        },
        deleteToken(id){

           Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                axios.delete('api/token/'+id).then((res) => {
                    this.getTokenList();
                })
                Swal.fire(
                'Deleted!',
                'Your token has been deleted.',
                'success'
                )
            }
            })
        },


    },
};
</script>
