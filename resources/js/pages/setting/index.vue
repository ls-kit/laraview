<template lang="">
    <div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <form @submit.prevent="handleForm">
                        <div class="card-body">

                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Name</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="name" v-model="form.name" class="form-control" placeholder="Change Name">
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Change Email</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" v-model="form.email" id="name" class="form-control" placeholder="Change Email">
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Old Password</label>
                                </div>
                                <div class="col-8">
                                <input type="password" v-model="form.old_password" class="form-control" placeholder="old Password">
                                </div>
                            </div>

                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Password</label>
                                </div>
                                <div class="col-8">
                                <input type="password" v-model="form.password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Confirem Password</label>
                                </div>
                                <div class="col-8">
                                <input type="password" v-model="form.password_confirmation" class="form-control" placeholder="Retype New Password">
                                </div>
                            </div>
                        <!-- /.card-body -->
                            </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
    </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      uid: "",
      form: {
        name: "",
        email: "",
        old_password: "",
        password: "",
        password_confirmation: "",
      },
    };
  },
  mounted() {
    this.getSettings();
  },
  methods: {
    getSettings() {
      axios.get("/api/setting").then((res) => {
        this.form.name = res.data.name;
        this.form.email = res.data.email;
        this.uid = res.data.id;
      });
    },
    handleForm() {
      axios.put("/api/setting/" + this.uid, this.form).then((res) => {
        Toast.fire({
          icon: "success",
          title: "Settings Updated!",
        });
        this.form.name = res.data.name;
        this.form.email = res.data.email;
        this.uid = res.data.id;
        (this.form.password = ""), (this.form.password_confirmation = "");
      });
    },
  },
};
</script>
<style lang="">
</style>
