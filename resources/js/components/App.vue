<template>
  <div class="container-fluid shadow-sm p-3 mb-5 bg-body rounded">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link class="navbar-brand" to="/">GDI - TEST</router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- <ul class="navbar-nav">
          <li class="nav-item active">

          </li>
        </ul> -->
        </div>
      </nav>
    </div>

    <div class="content">
      <div class="container py-5">
        <div class="row">
          <div class="col-md-11">
            <div class="search">
              <input type="text" class="form-control" placeholder="search" />
            </div>
          </div>
          <div class="col-md-1">
            <button class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
      <router-view></router-view>
    </div>
  </div>
</template>
<script>
export default {};
</script>
