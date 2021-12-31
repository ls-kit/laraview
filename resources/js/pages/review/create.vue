<template lang="">
    <div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Review Field</h3>
            </div>
            <form>
              <div class="card-body">
                <div class="form-group">
                  <textarea class="form-control" id="review-editor" rows="8">Enter Review Here</textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Review</button>
              </div>
            </form>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Token List</h3>
            </div>
            <div class="card-body">
              <button class="btn btn-sm btn-default btn-block mb-2 token" value="[token_1]">Token 1</button>
              <button class="btn btn-sm btn-primary btn-block mb-2 token" value="[token_2]">Token 2</button>
              <button class="btn btn-sm btn-secondary btn-block mb-2 token" value="[token_3]">Token 3</button>
              <button class="btn btn-sm btn-info btn-block mb-2 token" value="[token_4]">Token 4</button>
              <button class="btn btn-sm btn-danger btn-block mb-2 token" value="[token_5]">Token 5</button>
              <button class="btn btn-sm btn-success btn-block mb-2 token" value="[token_6]">Token 6</button>
              <button class="btn btn-sm btn-warning btn-block mb-2 token" value="[token_7]">Token 7</button>
              <button class="btn btn-sm btn-primary btn-block mb-2 token" value="[token_8]">Token 8</button>
            </div>
          </div>
        </div>
      </div>
</div>
  </section>
    </div>
</template>
<script>
export default {};
</script>
<style lang="">
</style>
