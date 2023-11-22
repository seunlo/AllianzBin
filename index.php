<?php
require_once("partials/header.php");
include_once "classes/Customer.php";
$customer = new Customer();
$allcustomers = $customer->retrieveCustomer($cust_id);
// echo "<pre>";
// print_r($allcustomers);
// exit();


$category = $allcustomers['cat_name'];

?>

<!---------------------------CAROUSEL SECTION STARTS HERE-------------------------->
<div class="row text-center">
  <div class="col-md-7 ms-5 mt-3">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner main">
        <div class="carousel-item active">
          <img src="assets/images/vehicle.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="col-md-4 mt-3 payment_area bg-success">
    <div class="row">
      <div class="col-md">
        <form action="payment.php" method="post">
          <input type="hidden" name="cust_id" value="<?php echo $allcustomers['cust_id'] ?>">
          <?php if (!empty($category)) { ?>
            <button class="btn gen_btn">PayBill</button>
            <?php
          } else { ?>
            <button class="btn gen_btn" disabled>PayBill</button>
          <?php } ?>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md">
        <button class="btn gen_btn"><a href="profile.php" class="text-decoration-none text-light fw-bold">Manage Your
            Account</a></button>
      </div>
    </div>
    <div class="row">
      <div class="col-md">
        <button class="btn gen_btn text-light fw-bold">Schedule Pick-Up</button>
      </div>
    </div>
  </div>
</div>
<!---------------------------CAROUSEL SECTION ENDS HERE-------------------------->

<!---------------------------REGISTER SECTION STARTS HERE--------------------------->
<div class="row my-3">
  <div class="col-md-11 m-auto">
    <div class="row">
      <div class="col-md-4">
        <button class="option_area"><i class="fa-solid fa-house"></i>Residents</button>
      </div>
      <div class="col-md-4">
        <button class="option_area"><i class="fa-solid fa-people-roof"></i>Communities</button>
      </div>
      <div class="col-md-4">
        <button class="option_area"><i class="fa-solid fa-briefcase"></i>Enterprise</button>
      </div>
    </div>
  </div>
</div>
<!----------------------------------REGISTER SECTION ENDS HERE----------------------------->
<div class="row">
  <div class="col-md-11 m-auto">
    <div class="row">
      <div class="col-md">
        <p class="text-justify">
          Allianz Bin is committed to improving the environment in which we all live in by providing efficient,
          effective and cutting edge solid waste services which not only reduce the impact on our world but also offer
          sustainable solutions to our most pressing environmental challenges.
          We work with communities and policy makers in low and middle-income communities to implement waste
          management programmes. Our work improves the livelihoods of some of the poorest and most marginalised,
          supports grassroots entrepreneurs and promotes circular economy innovation contributing to a cleaner and
          healthier future for all. Waste management helps address some of the world’s most pressing issues and is
          critical to achieving sustainable development.
        </p>
      </div>
    </div>
  </div>
</div>
<?php
require_once("partials/footer.php");
?>