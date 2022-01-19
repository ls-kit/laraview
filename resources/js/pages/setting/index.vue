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
                    <form>
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
                                    <label for="name" class="col-form-label w-100">Password</label>
                                </div>
                                <div class="col-8">
                                <input type="password" v-model="form.password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Password</label>
                                </div>
                                <div class="col-8">
                                <input type="password" v-model="form.confirmed_passwrod" class="form-control" placeholder="Retype New Password">
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
export default {
data() {
    return {
        form: {
            name: '',
            email: '',
            password: '',
            confirmed_passwrod: ''
        }
    }
}
}
</script>
<style lang="">

</style>
