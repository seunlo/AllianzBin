<?php include "partials/header.php" ?>

<body>
  <div class="container-fluid m-3">
    <h2 class='text-center mb-5'>Admin Registration</h2>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
        <img src="" class="img-fluid">
      </div>
    </div>
    <div class="col-lg-6">
      <form action="" method="post">
        <div class="form-outline mb-4">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" class="form-control">
        </div>
        <div class="form-outline mb-4">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control">
        </div>
        <div class="form-outline mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control">
        </div>
        <div class="form-outline mb-4">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"
            class="form-control">
        </div>
        <div>
          <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_reg" value="Register">
          <p class="small fw-bold mt-2 pt-1">Do you already have an account? <a href="admin_login.php"
              class="link-danger">Login</a></p>
        </div>
      </form>
    </div>

  </div>