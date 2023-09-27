<?php
session_start();
if(isset($_SESSION["isLogin"])) {
include('connect.php');
$sql = "SELECT * FROM subcategories where id = '" . $_GET['id'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
include('header.php');
include('sidebar.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sub categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit sub categories</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php
                            if (isset($_GET['msg'])) {
                                echo "<h3 style='color:red;text-align:center;'>" . $_GET['msg'] . "</h3>";
                            }
                            ?>
                        </div>
                        <!-- /.card-header -->
                        <form action="save_sub_cat.php" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Select Category</label>
                                    <select name="catname" class="form-control">
                                        <?php

                                        $catsql = "SELECT * FROM categories";
                                        $resultcat = $conn->query($catsql);

                                        if ($resultcat->num_rows > 0) {
                                            while ($row_cat = $resultcat->fetch_assoc()) {
                                                if ($row_cat['id'] == $row['cat_id']) {
                                                    echo '<option value="' . $row_cat['id'] . '" selected>' . $row_cat['cat_name'] . '</option>';
                                                } else {
                                                    echo '<option value ="' . $row_cat['id'] . '">' . $row_cat['cat_name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Category Name</label>
                                    <input class="form-control" type="text" placeholder="Enter Category Name" name="sub_cat_name" id="sub_cat_name" value="<?php echo $row['subcat_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <?php
                                    if ($row['status'] == '1') {
                                        $isActive = 'checked';
                                        $isInActive = '';
                                    } else {
                                        $isInActive = 'checked';
                                        $isActive = '';
                                    }
                                    ?>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="status" value="1" <?php echo $isActive; ?>>
                                        <label for="customRadio1" class="custom-control-label">Active</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="status" value="0" <?php echo $isInActive; ?>>
                                        <label for="customRadio2" class="custom-control-label">In Active</label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <input type="hidden" name="edit_id" value="<?php echo $_GET['id']; ?>">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="sub_categories.php" class="btn btn-danger">Cancel</a>
                            </div>

                            <!-- /.card-body -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('footer.php'); 
} else {
  header('Location:index.php?msg=Unauthorized Access.!');
}
 ?>