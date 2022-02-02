<template lang="">
    <div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Review List</h3>
              <button v-if="selected.length > 0" class="btn btn-danger ml-4" v-on:click="deleteReview(selected)">Delete</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>ID <input type="checkbox" v-model="selectAll"></th>
                    <th>Short Dis</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="review in reviews">

                    <td> <input type="checkbox" v-model="selected" :value="review.id" number> {{review.id}}</td>
                    <td>{{review.body | truncate(50, '...')}}</td>
                    <td>{{new Date(review.created_at).toLocaleString()}}</td>
                    <td v-if="review.status"><span class="btn-sm btn-success">Active</span></td>
                    <td v-else><span class="btn-sm btn-danger">Deactive</span></td>
                    <td>
                      <div class="dropdown show">
                        <a class="btn btn-default btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <router-link class="dropdown-item" :to="{name: 'update-review',params: {id: review.id}}">Edit</router-link>
                          <a class="dropdown-item"  @click="deleteReview(review.id)">Delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
                    <pagination :data="reviews" @pagination-change-page="getResults"></pagination>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </section>
    </div>
</template>
<script>
export default {
    data() {
        return {
            reviews: [],
            selected: []
        }
    },
    mounted() {
        this.getReviews();
    },
     computed: {
        selectAll: {
            get: function () {
                return this.reviews ? this.selected.length == this.reviews.length : false;
            },
            set: function (value) {
                var selected = [];

                if (value) {
                    this.reviews.forEach(function (review) {
                        selected.push(review.id);
                    });
                }

                this.selected = selected;
            }
        }
    },
    filters: {
        truncate: function (text, length, suffix) {
            if (text.length > length) {
                return text.substring(0, length) + suffix;
            } else {
                return text;
            }
        },
    },
    methods: {
        async getReviews() {
            await axios.get('/api/review-list').then((res) => {
                this.reviews = res.data.data
            })
        },
        deleteReview(id) {

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('api/review/' + id).then((res) => {
                        this.getReviews();
                    })
                    Swal.fire(
                        'Deleted!',
                        'Your review has been deleted.',
                        'success'
                    )
                }
            })
        },
        getResults(page) {
            if (typeof page === "undefined") {
                page = 1;
            }
            axios.get("api/token?page=" + page).then((response) => {
                this.tokenList = response.data;
            });
        },
    }
}
</script>
<style lang="">

</style>
