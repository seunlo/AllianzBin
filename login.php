<?php
require_once("partials/header.php");
?>
<div class="row">
  <div class="col-lg-8 innermind"></div>
  <div class="col-lg-4 userarea">
    <form action="process/login_process.php" method="post">
      <h2 class="text-center text-white mt-5">Login Page</h2>
      <?php if (isset($_SESSION['login_error'])) { ?>
        <p class="text-danger text-center fw-bold">
          <?php echo $_SESSION['login_error']; ?>
        </p>
        <?php unset($_SESSION['login_error']); ?>
      <?php } ?>
      <input type="text" class="form-control" name="username" placeholder="Username">
      <input type="password" class="form-control my-3" name="password" placeholder="Password">
      <input type="checkbox" name="remembersuer" class="my-2">
      <label for="remembersuer" class="text-white">Remember my User Id</label><br>
      <input type="submit" name="login_btn" value="Login" class="bg-success text-light w-100 py-2 border-0">
      <div class="d-flex">
        <div class="me-3">
          <button class="btn text-white">Forgot User Id?</button>
        </div>
        <div class="ms-3">
          <button class="btn text-white">Forgot Password?</button>
        </div>
      </div>
    </form>
    <hr class="divider">
    <p>
      Do you need our service?
      <a href="register.php"><input type="submit" value="Register Now" class="bg-success border-0 text-light p-2"></a>
    </p>

  </div>
</div>
<!---------------------------CAROUSEL SECTION ENDS HERE-------------------------->
<?php
require_once("partials/footer.php");
?>