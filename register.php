<?php
include_once "partials/header.php";
session_start();

?>
<div class="userarea">
  <div class='row justify-content-center'>
    <div class='col-lg-6'>
      <form action='process/register_process.php' method="post" class="mt-2">
        <?php if (isset($_SESSION['reg_error'])) { ?>
          <p class="text-white text-center fw-bold">
            <?php echo $_SESSION['reg_error']; ?>
          </p>
          <?php unset($_SESSION['reg_error']); ?>
        <?php } ?>
        <div class="mb-2">
          <input type='text' name="fullname" id='name' class='form-control' placeholder='Full Name' />
        </div>
        <div class="mb-2">
          <input type='email' name="email" id='email' class='form-control' placeholder='Email Address' />
        </div>
        <div class="mb-2">
          <input type='text' name="username" id='username' class='form-control' placeholder='User Name' />
          <span id="response" class="text-white fw-bold"></span>
        </div>
        <div class="mb-2">
          <input type='password' name="password" id="password" class='form-control' placeholder="Password" />
          <span id="passResponse"></span>
        </div>
        <div class="mb-2">
          <input type='password' name="cust_confirm_pass" id='confirm_pass' class='form-control'
            placeholder="Confirm - Password" />
        </div>

        <div class='text-center mt-2'>
          <input type="submit" value="Sign Up" name="reg_btn" class="form_send">
        </div>
      </form>
    </div>
  </div>
</div>
<!--
<script src="jquery.js"></script>
<script>
  $(document).ready(function () {
    $("#username").change(function () {
      var user = $(this).val();//picking form value
      $.ajax({
        url: "process/register_process.php",//to where
        type: "post",//what method
        data: { "xyz": user },//data you are sending
        success: function (response) {//if successful
          //alert(response);
          $("#response").text(response);

          var datarespone = JSON.parse(response);
          if (datarespone.success == true) {
            $("#username").css("background", "white");
            $("#response").text(datarespone.message);
          } else {
            $("#username").css("background", "red");
            $("#response").text(datarespone.message);
          }
        }
      })
    })
  })



</script>

-->

<?php
include_once "partials/footer.php";
?>