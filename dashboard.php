<?php
session_start();
if (isset($_SESSION["isLogin"])) {
  include('connect.php');
  include('header.php');
  include('sidebar.php');

  //students
  $sql = "SELECT count(id) as total_students FROM students";
  $result = $conn->query($sql);
  $total_stu_row = $result->fetch_assoc();

  //subjects
  $sql = "SELECT count(id) as total_subjects FROM subjects";
  $result = $conn->query($sql);
  $total_sub_row = $result->fetch_assoc();

  // categoery
  $sql = "SELECT count(id) as total_cat FROM categories";
  $result = $conn->query($sql);
  $total_cat_row = $result->fetch_assoc();

  // sub category
  $sql = "SELECT count(id) as total_subcat FROM subcategories";
  $result = $conn->query($sql);
  $total_subcat_row = $result->fetch_assoc();

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <?php
        if ($_SESSION["role"] == 'Admin' ) { ?>

          <div class="col-lg-3 col-6">
            <!-- small box -->

            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $total_stu_row['total_students']; ?></h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>

          <!-- col -->
          <?php  
        if ($_SESSION["role"] == 'Staff' || $_SESSION["role"] == 'Admin' ) { ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->

            <div class="small-box bg-secondary">
              <div class="inner">
                <h3><?php echo $total_sub_row['total_subjects']; ?></h3>
                <p>Subjects</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="subjects.php" class="small-box-footer">More info<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>


          <!-- ./col -->
          <?php
        if ($_SESSION["role"] == 'Staff' || $_SESSION["role"] == 'Admin' || $_SESSION["role"] == 'Company') { ?>
    
          <div class="col-lg-3 col-6">
            <!-- small box -->

            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $total_cat_row['total_cat']; ?></h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-th"></i>
              </div>
              <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $total_subcat_row['total_subcat']; ?></h3>

                <p>Sub Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-vector-square"></i>
              </div>
              <a href="sub_categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">


          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">

                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('footer.php');
} else {
  header('Location:index.php?msg=Unauthorized Access.!');
}
?>