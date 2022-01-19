<template lang="">
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Token wise form field</h3>
            </div>

            <form @submit.prevent="handleForm">
              <div class="card-body">
                <div class="form-group" v-for="(token, index) in tokens">
                  <label for="exampleInputEmail1">{{token.token_name}}</label>
                  <input type="text" v-model="form[token.slug]" class="form-control" id="" placeholder="Enter Token">
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


<div class="block" v-for="review in reviews">
  <input type="radio" name="city" :id="'city'+review.id" />
  <label :for="'city'+review.id"><span>Samarkand</span></label>
  <div class="info">
    <textarea style="width:100%" rows="50" cols="20">{{review.body}}</textarea>
  </div>
</div>


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
import axios from 'axios';
import {
  VsaList,
  VsaItem,
  VsaHeading,
  VsaContent,
  VsaIcon
} from 'vue-simple-accordion';
import 'vue-simple-accordion/dist/vue-simple-accordion.css';

export default {
    components: {
        VsaList,
        VsaItem,
        VsaHeading,
        VsaContent,
        VsaIcon
   },
    data() {
        return {
            reviews: {},
            reviewId: '',
            tokens: {},
            form: {}
        }
    },
    mounted(){
        this.getTokens();
    },
    methods:{
        async getTokens() {
            await axios.get('/api/token').then((res) => {
                this.tokens = res.data.data
            })
        },


        // handleContent(id) {
        //     let data = this.reviews[id].body;
        //     this.reviewId = id;

        //     var text = data;
        //     var regex = /\[([^\][]*)]/g;
        //     var results=[], m;
        //     while ( m = regex.exec(text) ) {
        //     results.push(m[1]);
        //     }
        //     console.log( results );
        //     var uniqueArray = results.filter(function(item, pos) {
        //         return results.indexOf(item) == pos;
        //     })
        //     this.tokens = uniqueArray;

        // },
        handleForm() {
            let convertedData = {}
            for(let item in this.form){
                if(this.form[item] != ""){
                    convertedData[item] = this.form[item];
                }
            }

            axios.post('/api/review-search', convertedData).then((res) => {
                this.reviews = res.data
                console.log(this.reviews);
                for(let item in this.reviews){
                    this.reviews[item]

                    Object.keys(convertedData).forEach(key => {
                        var str = this.reviews[item].body;
                        let token = "["+key+"]";
                        let updateStr = str.replaceAll(token, this.form[key])
                        this.reviews[item].body = updateStr
                    })
                }
            })
        }
    }
};
</script>

<style lang="css" scoped>
body{
  background: #f7f7f7;
  width: 460px;
  max-width: 100%;
  margin: 0 auto;
  padding: 20px;
  font-family: "Verdana";
  font-size: 13px;

}
.block{
  background: linear-gradient(#111, #333);
  color: #fff;
  padding-top: 5px;
  box-shadow: 0 1px 2px #ccc;
}

.block input[type='radio']:checked ~ .info{
  height: 130px;
  transition: .3s ease-in;
}

input[type='radio']{
  width: 100%;
  display: none;
}

label{
  width: 450px;
  max-width: 100%;
  cursor: pointer;
}

span{
  font-family: 'Arial';
  font-weight: bold;
  display: block;
  padding: 10px 12px 12px 15px;
  margin: 0;
  cursor: pointer;
}

.info{
  background: #fff;
  color: #222;
  width: 100%;
  height: 0;
  line-height: 2;
  padding-left: 1px;
  display: block;
  overflow: hidden;
  box-sizing: border-box;
  transition: .3s ease-out;
}

h4{
  color: #111;
  text-align: right;
  text-shadow: 2px 2px 3px #fff;
  position: absolute;
  bottom: 20px;
  right: 15px;
}

h4 a{
  color: #111;
  text-decoration: none;
}

::selection{
  background: #222;
  color: #fff;
}

.github img{
  position: absolute;
  top: 0;
  right: 0;
  border: 0;
}
</style>
