<template lang="">
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Token wise form field</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Token">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Merit</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Token">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Product Applicable for</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Token">
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
             <div id="accordion">
               helo
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      </div>
  </section>
</template>
<script>
export default {
    data() {
        return {
            reviews: {}
        }
    },
    mounted(){
        this.getReviews();
    },
    methods:{
        async getReviews() {
            await axios.get('/api/review-list').then((res) => {
                this.reviews = res.data.data
            })
        },
    }
};
</script>
<style lang="">
</style>
