<?php
if (!isset($_SESSION)) {
  session_start();
}
include('connect.php');

$sql = "SELECT * FROM users where id = '" . $_SESSION["userId"] . "'";
$side_profile = $conn->query($sql);
if ($side_profile->num_rows > 0) {
  $side_profile_row = $side_profile->fetch_assoc();
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">Red & White</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        <img src="dist/img/download.png" class="img-circle elevation-2" alt="User Image">

      </div>
      <div class="info">
        <a href="profile.php" class="d-block">
          <?php echo $side_profile_row['full_name']; ?>
        </a>
      </div>
    </div>

    <?php
    $url = $_SERVER['PHP_SELF'];
    $file = basename($url);

    if ($file == 'students.php') {
      $isStdActive = 'active';
      $isSubActive = '';
      $isDashInActive = '';
      $iscatInActive = '';
      $ischpActive = '';
    } else if ($file == 'subjects.php') {
      $isSubActive = 'active';
      $isStdActive = '';
      $isDashInActive = '';
      $iscatInActive = '';
      $ischpActive = '';
    } else if ($file == 'categories.php') {
      $iscatActive = 'active';
      $isSubActive = '';
      $isStdInActive = '';
      $isDashInActive = '';
      $ischpActive = '';
    } else if ($file == 'sub_categories.php') {
      $issubcatActive = 'active';
      $isStdInActive = '';
      $isSubActive = '';
      $isDashInActive = '';
      $iscatInActive = '';
      $ischpActive = '';
    } else if ($file == 'changePassword.php') {
      $ischpActive = 'active';
      $issubcatActive = '';
      $isStdInActive = '';
      $isSubActive = '';
      $isDashInActive = '';
      $iscatInActive = '';
    } else if ($file == 'profile.php') {
      $isproActive = 'active';
      $ischpActive = '';
      $issubcatActive = '';
      $isStdInActive = '';
      $isSubActive = '';
      $isDashInActive = '';
      $iscatInActive = '';
    } else {
      $isStdActive = '';
      $isDashActive = 'active';
    }
    ?>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="dashboard.php" class="nav-link <?php echo $isDashActive; ?>">
            <!-- <i class="bi bi-speedometer"></i><p>Dashboard</p> -->
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer"
              viewBox="0 0 16 16">
              <path
                d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z" />
              <path fill-rule="evenodd"
                d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z" />
            </svg>
            <p class="ml-2">Dashboard</p>
          </a>
        </li>
        <?php
        if ($_SESSION["role"] == 'Admin') { ?>

          <li class="nav-item menu-open">
            <a href="students.php" class="nav-link <?php echo $isStdActive; ?>">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <path d="M9 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
              <p class="ml-2">Students</p>
            </a>
          </li>
          <?php }
        if ($_SESSION["role"] == 'Staff' || $_SESSION["role"] == 'Admin' || $_SESSION["role"] == 'Company') { ?>

          <li class="nav-item menu-open">
            <a href="categories.php" class="nav-link <?php echo $iscatActive; ?>">
              <i class="fas fa-th"></i>
              <p class="ml-2">Categories</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="sub_categories.php" class="nav-link <?php echo $issubcatActive; ?>">
              <i class="fas fa-vector-square"></i>
              <p class="ml-2">Sub categories</p>
            </a>
          </li>
          <?php }
        if ($_SESSION["role"] == 'Staff' || $_SESSION["role"] == 'Admin') { ?>
          <li class="nav-item menu-open">
            <a href="subjects.php" class="nav-link <?php echo $isSubActive; ?>">
              <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
              </svg>
              <p class="ml-2">Subjects</p>
            </a>
          </li>
          <?php } ?>
        <li class="nav-item menu-open">
          <a href="changePassword.php" class="nav-link <?php echo $ischpActive; ?>">
            <i class="fa fa-key" aria-hidden="true"></i>
            <p class="ml-2">Change Password</p>
          </a>
          <li class="nav-item menu-open">
          <a href="profile.php" class="nav-link <?php echo $isproActive; ?>">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <path d="M12 3a4 4 0 1 0 0 8 4 4 0 1 0 0-8z"></path>
            </svg>
            <p class="ml-2">Profile</p>
          </a>
    </nav>
  </div>
</aside>