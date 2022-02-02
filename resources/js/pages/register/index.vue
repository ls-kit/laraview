<template lang="">
    <div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User list</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Short Dis</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="user in users">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td v-if="user.is_admin == 1">Admin</td>
                    <td v-else>User</td>
                    <td>
                          <a style="cursor:pointer" class="btn btn-danger"  @click="deleteUser(user.id)">Delete</a>
                    </td>
                  </tr>
                </tbody>
                    <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users: [],
        }
    },
    mounted() {
        this.getUsers();
    },

    methods: {
        async getUsers() {
            await axios.get('/api/get-users').then((res) => {
                this.users = res.data;
                // this.users = res.data.data
            })
        },
        deleteUser(id) {

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
                    axios.get('api/delete-user/' + id).then((res) => {
                        this.getUsers();
                    })
                    Swal.fire(
                        'Deleted!',
                        'Your review has been deleted.',
                        'success'
                    )
                }
            })
        }
    }
}
</script>
<style lang="">

</style>
