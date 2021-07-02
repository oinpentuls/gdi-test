<template>
  <div class="container">
    <div class="clearfix py-2">
      <div class="float-right">
        <button
          class="list-btn btn"
          :class="{ 'btn-primary': list }"
          @click="listView"
        >
          <i class="fa fa-list"></i>
        </button>
        <button
          class="grid-btn btn"
          :class="{ 'btn-primary': grid }"
          @click="gridView"
        >
          <i class="fa fa-table"></i>
        </button>
      </div>
    </div>
    <div class="mt-2" v-if="properties">
      <div class="grid row" v-if="grid">
        <div v-for="item in properties" :key="item.id" class="col-md-4">
          <div class="card mt-3 pointer" @click="showDetail(item.slug)">
            <agile :initial-slide="1">
              <div v-for="image in item.images" :key="image.id">
                <img :src="image.name" alt="" class="img-fluid" />
              </div>
              <template slot="prevButton"
                ><i class="fas fa-chevron-left"></i
              ></template>
              <template slot="nextButton"
                ><i class="fas fa-chevron-right"></i
              ></template>
            </agile>
            <div class="card-body">
              <h5 class="card-title">LAVANYA HILLS RESIDENCES</h5>
              <div class="card-text">
                <p>Rp 2.000.000.000</p>
                <p>
                  Jl. Raya Bukit Cinere Rt.011 Rw.005 Gandul Cinere, Depok, Jawa
                  Bara
                </p>
              </div>
              <p class="card-text">
                <small class="text-muted">Last updated 3 mins ago</small>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="list" v-if="list">
        <div
          class="shadow mt-3 bg-white p-2 rounded pointer"
          v-for="item in properties"
          :key="item.id"
          @click="showDetail(item.slug)"
        >
          <div class="row no-gutter">
            <div class="col-md-3">
              <agile :initial-slide="0">
                <div v-for="image in item.images" :key="image.id">
                  <img :src="image.name" alt="" />
                </div>
                <template slot="prevButton"
                  ><i class="fas fa-chevron-left"></i
                ></template>
                <template slot="nextButton"
                  ><i class="fas fa-chevron-right"></i
                ></template>
              </agile>
            </div>
            <div class="col-md-9 relative">
              <h5>{{item.title}}</h5>
              <p>Rp {{item.price}}</p>
              <div class="clearfix">
                <p class="absolute bottom">
                  {{item.address}}
                </p>

                <span class="absolute bottom float-right"
                  ><small class="text-muted"
                    >Last updated 3 mins ago</small
                  ></span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-2" v-else>
      <p class="text-center">No Data</p>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "home",
  data() {
    return {
      grid: false,
      list: false,
      properties: [],
      settings: {
        dots: true,
        dotsClass: "slick-dots custom-dot-class",
        edgeFriction: 0.35,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    };
  },
  created() {
    this.getProperties();
  },
  mounted() {
    this.list = true;
  },
  methods: {
    listView() {
      this.list = true;
      this.grid = false;
    },
    gridView() {
      this.grid = true;
      this.list = false;
    },
    getProperties() {
      let properties = axios
        .get("/api/")
        .then((response) => {
          this.properties = response.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    showDetail(e) {
      this.$router.push({ name: "detail", params: { slug: e } });
    },
  },
};
</script>


<style>
.absolute {
  position: absolute;
}

.relative {
  position: relative;
}

.bottom {
  bottom: 0;
}

.pointer {
  cursor: pointer;
}

.agile__nav-button {
  background: transparent;
  border: none;
  color: #fff;
  cursor: pointer;
  font-size: 24px;
  height: 100%;
  position: absolute;
  top: 0;
  transition-duration: 0.3s;
  width: 80px;
}
.agile__nav-button:hover {
  background-color: rgba(0, 0, 0, 0.5);
  opacity: 1;
}
.agile__nav-button--prev {
  left: 0;
}
.agile__nav-button--next {
  right: 0;
}
.agile__dots {
  bottom: 10px;
  left: 50%;
  position: absolute;
  transform: translateX(-50%);
}
.agile__dot {
  margin: 0 10px;
}
.agile__dot button {
  background-color: transparent;
  border: 1px solid #fff;
  border-radius: 50%;
  cursor: pointer;
  display: block;
  height: 10px;
  font-size: 0;
  line-height: 0;
  margin: 0;
  padding: 0;
  transition-duration: 0.3s;
  width: 10px;
}
.agile__dot--current button,
.agile__dot:hover button {
  background-color: #fff;
}

.slide {
  display: block;
  -o-object-fit: cover;
  object-fit: cover;
  width: 100%;
}
</style>
