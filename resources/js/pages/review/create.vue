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
              <button v-for="token in tokenList" class="btn btn-sm btn-default btn-block mb-2 token" :value="token.id">{{token.token_name}}</button>
            </div>
          </div>
        </div>
      </div>
</div>
  </section>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            tokenList: {},

        }
    },
    created() {
        this.getTokenList();
    },
    methods: {
       async getTokenList() {
           await axios.get('/api/review').then((res) => {
               this.tokenList = res.data.data
           })
       }
    }
};
</script>
<style lang="">
</style>
