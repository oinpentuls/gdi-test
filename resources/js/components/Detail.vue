<template>
  <div class="container">
    <div v-if="property">
      <h1 v-text="property.title"></h1>

      <agile :initial-slide="0">
        <div v-for="image in property.images" :key="image.id">
          <img :src="image.name" alt="" />
        </div>
        <template slot="prevButton"
          ><i class="fas fa-chevron-left"></i
        ></template>
        <template slot="nextButton"
          ><i class="fas fa-chevron-right"></i
        ></template>
      </agile>

      <h2 class="mt-5">Rp {{ property.price }}</h2>
      <p class="mt-2">{{ property.address }}</p>

      <h3>Detail</h3>

      <div class="row">
        <div class="col-md-8 detail bg-white rounded p-5 row">
          <div class="col-md-6 property-title">
            <p class="text-muted">Nama Properti</p>
            <p class="">{{ property.title }}</p>
          </div>

          <div class="col-md-6 property-developer">
            <p class="text-muted">Pengembang</p>
            <p class="">{{ property.developer }}</p>
          </div>

          <div class="col-md-6 property-type">
            <p class="text-muted">Tipe Properti</p>
            <p class="">{{ property.type }}</p>
          </div>

          <div class="col-md-6 property-price">
            <p class="text-muted">Harga Properti</p>
            <p class="">{{ property.price }}</p>
          </div>

          <div class="col-md-6 property-created-at">
            <p class="text-muted">Terdaftar pada</p>
            <p class="">{{ property.created_at }}</p>
          </div>
        </div>

        <div class="col-md-4 card">
          <form>
            <div class="card-body">
              <h4>Tertarik membeli ?</h4>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" />
              </div>
            </div>

            <div class="card-footer">
              <button class="btn btn-primary">Continue</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div v-else>
      <p>No Data</p>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "detail",
  data() {
    return {
      property: "",
    };
  },
  created() {
    this.getProperty();
  },
  methods: {
    getProperty() {
      let slug = this.$router.history.current.params.slug;

      let property = axios
        .get(`/api/${slug}`)
        .then((response) => {
          this.property = response.data.data;
          console.log(response);
        })
        .catch((err) => {
          console.log(err);
        });

      console.log(this.property);
    },
  },
};
</script>
<style>
</style>
