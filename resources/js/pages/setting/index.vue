<template lang="">
    <div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
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
                                    <input type="text" id="name" class="form-control" placeholder="Change Name">
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="image" class="col-form-label w-100">Upload Image</label>
                                </div>
                                <div class="col-8">
                                    <div class="form-group mb-0">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <div class="col-4">
                                    <label for="name" class="col-form-label w-100">Change Email</label>
                                </div>
                                <div class="col-8">
                                    <input type="text" id="name" class="form-control" placeholder="Change Email">
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Old Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="New Password">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Retype New Password">
                            </div>
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

}
</script>
<style lang="">

</style>
