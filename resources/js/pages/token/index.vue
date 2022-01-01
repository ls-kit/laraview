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
                                <button type="submit" class="btn btn-primary btn-sm">Add Token</button>
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
                            <table class="table table-hover text-nowrap">
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

                                    <tr v-for="token in tokenList">
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="tag tag-danger">Denied</span></td>
                                        <td>
                                            <div class="dropdown show">
                                                <a class="btn btn-default btn-sm dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
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
import axios from 'axios'
export default {
    data() {
        return {
            tokenList: {},
            form: {
                token_name: ''
            }
        }
    },
    mounted() {
        this.getTokenList()
    },
    methods: {
        async getTokenList() {
                await axios.get('/token-list').then((res) => {
                    this.tokenList = res.data
                })
        },

        handleForm() {
            axios.post('/token', this.form).then((res) => {
                if(res.data){
                    this.form.token_name = "";

                    Toast.fire({
                        icon: 'success',
                        title: 'New Token Added!'
                    })


                }
            })
        }


    }
}
</script>
<style lang="">

</style>
