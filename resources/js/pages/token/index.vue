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
import $ from 'jquery'

export default {
    data() {
        return {
            form: {
                token_name: ''
            }
        }
    },
    created() {
        this.getTokenList()
    },
    methods: {
        getTokenList() {
            $(document).ready( function () {
            $.noConflict();
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "api/token",
                "columns": [
                    { "data": "id" },
                    { "data": "user.name" },
                    { "data": "created_at" },
                    { "data": "status" },
                    { 'data': null,
                      wrap: true,
                      "render": function (item) {
                        return '<div class="dropdown"><button id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-sm dropdown-toggle">Action</button> <div aria-labelledby="dropdownMenuLink" class="dropdown-menu" style=""><button data-id="'+item.id+'" class="dropdown-item edit">Edit</button> <button class="dropdown-item delete" data-id="'+item.id+'">Delete</button></div></div>'
                      }
                    },
                ],

                "bDestroy": true,
                "pageLength": 5
            });
        });

        // edit row
        $(document).on('click', '.edit', function(){
            let id = $(this).data('id');
            axios.put('api/token/'+id).then((res) => {
                console.log(res);
            })
            
        })

        },
        handleForm() {
            axios.post('api/token', this.form).then((res) => {
                if(res.data){
                    this.form.token_name = "";

                    Toast.fire({
                        icon: 'success',
                        title: 'New Token Added!'
                    })
                    this.getTokenList();

                }
            })
        }
    }
}
</script>
<style lang="">

</style>
