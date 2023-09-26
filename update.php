<div id="home" style="min-height:100vh;width: 100%;background-blend-mode: overlay;background-image: url(https://www.elegantthemes.com/layouts/wp-content/uploads/2017/12/coding-background-texture.jpg),linear-gradient(180deg,#474ab6 0%,#9271f6 100%)!important;">
<?php
include('./inc/header.php');
include('./inc/nav.php');
include('./core/functions.php');
$_SESSION['id'] = $_GET['id'];
?>
    <div class="container mt-5 text-white fs-5">
    <form class="row g-3 needs-validation" novalidate method="post" action="./handelers/handelUpdate.php">
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">
      First name</label>
    <input name="fname" type="text" class="form-control <?php if(isset($_SESSION['errors']['fname']))echo"is-invalid";?>" id="validationCustom01" placeholder="Enter your first name" required>
    <div class="<?php if(isset($_SESSION['errors']['fname']))echo"invalid-feedback";?>">
      <?php 
      if(isset($_SESSION['errors']['fname']))echo $_SESSION['errors']['fname'];?>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input name="lname" type="text" class="form-control <?php if(isset($_SESSION['errors']['lname']))echo"is-invalid";?>" id="validationCustom02" placeholder="Enter your last name" required>
    <div class="<?php if(isset($_SESSION['errors']['lname']))echo"invalid-feedback";?>">
    <?php if(isset($_SESSION['errors']['lname']))echo $_SESSION['errors']['lname'];?>
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Username</label>
    <div class="input-group has-validation">
      <span class="input-group-text" id="inputGroupPrepend">@</span>
      <input name="username" type="text" class="form-control <?php if(isset($_SESSION['errors']['username']))echo"is-invalid";?>" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
      <div class="<?php if(isset($_SESSION['errors']['username']))echo"invalid-feedback";?>"><?php
      if(isset($_SESSION['errors']['username']))echo $_SESSION['errors']['username'];?>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Email</label>
    <input name="email" type="text" class="form-control <?php if(isset($_SESSION['errors']['email']))echo"is-invalid";?>" id="validationCustom03" required>
    <div class="<?php if(isset($_SESSION['errors']['email']))echo"invalid-feedback";?>">
    <?php 
    if(isset($_SESSION['errors']['email']))echo $_SESSION['errors']['email'];
    
    ?>
    </div>
  </div>
  
  <div class="col-md-3">
    <label for="validationCustom05" class="form-label">password</label>
    <input name="password" type="password" class="form-control <?php if(isset($_SESSION['errors']['password']))echo"is-invalid";?>" id="validationCustom05" required>
    <div class="<?php if(isset($_SESSION['errors']['password']))echo"invalid-feedback";?>">
    <?php if(isset($_SESSION['errors']['password']))echo $_SESSION['errors']['password'];
    unset($_SESSION['errors']);?>
    </div>
  </div>
  <div class="col-12">
    <button class="btn btn-info fw-bold text-white" type="submit">update</button>
  </div>
</form>
</div>
<?php
include('./inc/footer.php');