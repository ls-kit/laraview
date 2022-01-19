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
            <form @submit.prevent="handleForm">
              <div class="card-body">
                <div class="form-group">
                  <textarea v-model="form.review_body" class="form-control" id="review-editor" rows="8">Enter Review Here</textarea>
                </div>
              </div>
              <div class="card-footer">
                <button  type="submit" class="btn btn-warning">Update Review</button>
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
              <button @click="changeSelected" v-for="token in tokenList" class="btn btn-sm btn-default btn-block mb-2 token" :value="token.slug">{{token.token_name}}</button>
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
      form: {
        review_body: "",
        tokens: ""
      },
    };
  },
  created() {
    this.getTokenList();
    this.getReview();
  },
  methods: {
    async getTokenList() {
      await axios.get("/api/review").then((res) => {
        this.tokenList = res.data.data;
      });
    },
    async getReview() {
        await axios.get("/api/review/"+this.$route.params.id).then((res) => {
            this.form.review_body = res.data
            console.log(res);
        })
    },
    async handleForm() {
      await axios.put("/api/review/"+this.$route.params.id, this.form).then((res) => {
        console.log(res);
        Toast.fire({
          icon: "success",
          title: "Review Updated!",
        });
        this.$router.push("/review")
      });
    },
    changeSelected(event) {
      console.log("test");
      var txtarea = document.getElementById("review-editor");
      var start = txtarea.selectionStart;
      var finish = txtarea.selectionEnd;
      var allText = txtarea.value;

      var sel = allText.substring(start, finish);
      var newText =
        allText.substring(0, start) +
        "[" +
        event.target.value +
        "]" +
        allText.substring(finish, allText.length);

      txtarea.value = newText;
      this.form.review_body = newText;

      var text = newText;
        var regex = /\[([^\][]*)]/g;
        var results=[], m;
        while ( m = regex.exec(text) ) {
        results.push(m[1]);
        }
        console.log( results );
        this.form.tokens = results;
    },
  },
};
</script>
<style lang="">
</style>
