<?php
require_once("partials/header.php");
?>

<!---------------------------CAROUSEL SECTION STARTS HERE-------------------------->
<div class="row">
  <div class="col-md innermind"></div>
</div>

<div class="row mt-4">
  <div class="col-md-6 m-auto">
    <h3 class="fw-bold">Call Us Today</h3>
    <p>Please find below phone numbers to reach out to us:</p>
    <ul>
      <li>+2348055447687</li>
      <li>+2348055444688</li>
      <li>+2348055445689</li>
    </ul>
    <h5 class="fw-bold">Hours Of Operation</h5>
    <div class="hour-operation">
      <p>Mon-Friday: 8am to 5pm</p>
      <p>Saturday: 8am to 3pm</p>
      <p>Sunday: Closed</p>
    </div>
  </div>
  <div class="col-md-5 px-3 m-auto">
    <h5 class="fw-bold">Get a Free Estimate Now</h5>
    <hr>
    <form action="" method="post" class="mt-4">
      <div class="d-flex mb-3">
        <div>
          <label for="fname">First Name</label>
          <input type="text" name="fname" class="form-control">
        </div>
        <div class="mx-5">
          <label for="lname">Last Name</label>
          <input type="text" name="lname" class="form-control">
        </div>
      </div>
      <div class="d-flex mb-3">
        <div>
          <label for="phone">Phone Number</label>
          <input type="tel" name="phone" class="form-control">
        </div>
        <div class="mx-5">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
      </div>
      <div>
        <label for="message">Message</label>
        <textarea name="message" id="" cols="5" rows="3" class="form-control"></textarea>
      </div>
      <input type="checkbox" name="accept_terms" id="">
      <span class="form-terms">By submitting your contact information, you understand and agree that you may be
        contacted by any of our agents via any of the means provided above.</span><br>
      <input type="submit" name="send_message" value="Send" id="" class="form_send my-3 py-2">
    </form>
  </div>
</div>
<?php
require_once("partials/footer.php");
?>