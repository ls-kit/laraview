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
                <button  type="submit" class="btn btn-primary">Add Review</button>
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
  },
  methods: {
    async getTokenList() {
      await axios.get("/api/review").then((res) => {
        this.tokenList = res.data.data;
      });
    },
    async handleForm() {
      await axios.post("/api/review", this.form).then((res) => {
        this.form.review_body = "";
        Toast.fire({
          icon: "success",
          title: "Review added!",
        });
      });
    },
    changeSelected(event) {
      // obtain the object reference for the textarea>
      var txtarea = document.getElementById("review-editor");
      // obtain the index of the first selected character
      var start = txtarea.selectionStart;
      // obtain the index of the last selected character
      var finish = txtarea.selectionEnd;
      //obtain all Text
      var allText = txtarea.value;

      // obtain the selected text
      var sel = allText.substring(start, finish);
      //append te text;
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
