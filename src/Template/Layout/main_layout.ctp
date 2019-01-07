<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Dashboard</title> -->

    <!-- For local jQuery link, Bootstrap required -->
    <!--<?= $this->Html->script('bootstrap/jquery-3.2.1.slim.min.js') ?>-->
    <?= $this->Html->script('bootstrap/jquery-3.3.1.min.js') ?>
    <?= $this->Html->script('bootstrap/popper.min.js') ?>

    <!-- For local Font Awesome icon link -->
    <?= $this->Html->css('fontAwesome/all.min.css') ?>

    <!-- For local CSS link -->
    <?= $this->Html->css('mainlayout.css') ?>

    <!-- For local JS link -->
    <?= $this->Html->script('mainlayout.js') ?>
    <?= $this->Html->script('sweetalert.js') ?>

    <!-- For local Bootstrap/CSS link -->
    <?= $this->Html->css('bootstrap/bootstrap-grid.min.css') ?>
    <?= $this->Html->css('bootstrap/bootstrap-reboot.min.css') ?>
    <?= $this->Html->css('bootstrap/bootstrap.min.css') ?>

    <!-- For local Bootstrap/JS link -->
    <?= $this->Html->script('bootstrap/bootstrap.bundle.min.js') ?>
    <?= $this->Html->script('bootstrap/bootstrap.min.js') ?>
</head>
<body>
<nav class="topNav navbar navbar-light">
  <a class="navLogo navbar-brand" href="/Dashboards/index">
    <img src="/img/logo-2.png" alt="logo">
  </a>

  <div class="login dropdown">
    <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <h4><i class="fas fa-user-circle"></i> <span id="roleName">Roger</span> </h4> <br>
      <h6>Role:  <span id="role"> CRO Admin </span></h6>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> My Account</a>
      <a class="dropdown-item" href="/sd-users/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
    </div>
  </div>
</nav>

<nav class="mainNav navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navMenu navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Dashboards/index">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/sd-products/addproduct">Product</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ICSR</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Register SAE/AE</a>
          <a class="dropdown-item" href="#">Case List</a>
          <!-- Use the following if we need diveder in dropdown menu
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
          -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Form Builder</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Add Form</a>
          <a class="dropdown-item" href="#">Form List</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Account</a>
      </li>
    </ul>
  </div>
</nav>



<!-- The following codes are required when this layout applied to any other  -->
<?= $this->Flash->render() ?>
<!-- Disable this when applied Bootstrap Framework    <div class="container clearfix"></div> -->
<?= $this->fetch('content') ?>


<!-- jQuery required these for loading datepicker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


</body>
</html>