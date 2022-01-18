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
                  <label for="exampleInputEmail1">{{token}}</label>
                  <input type="text" v-model="form[token]" class="form-control" id="exampleInputEmail1" placeholder="Enter Token">
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
                <vsa-list>
                    <!-- Here you can use v-for to loop through items  -->
                    <vsa-item @click="handleContent(index)" v-for="(review, index) in reviews" :key="reviews.id" >
                        <vsa-heading>
                            Review Item #{{  review.id  }}
                        </vsa-heading>

                        <vsa-content>
                            {{  review.body  }}
                        </vsa-content>
                    </vsa-item>
                </vsa-list>
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
            newContent: "hello",
            reviewId: '',
            tokens: [],
            form: {}
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
        handleContent(id) {
            let data = this.reviews[id].body;
            this.reviewId = id;

            var text = data;
            var regex = /\[([^\][]*)]/g;
            var results=[], m;
            while ( m = regex.exec(text) ) {
            results.push(m[1]);
            }
            console.log( results );
            var uniqueArray = results.filter(function(item, pos) {
                return results.indexOf(item) == pos;
            })
            this.tokens = uniqueArray;

        },
        handleForm() {

            Object.keys(this.form).forEach(key => {
                var str = this.reviews[this.reviewId].body;
                let token = "["+key+"]";

                let updateStr = str.replaceAll(token, this.form[key])

               this.reviews[this.reviewId].body = updateStr
               this.newContent = updateStr;
            })

            console.log(this.reviews[this.reviewId].body);
        }
    }
};
</script>
<style lang="">
</style>
