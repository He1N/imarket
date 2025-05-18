<?php include 'check.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" href="../favicon.ico">
    <title>AdminLTE 3 | Products</title>
    <!-- CSS -->
    <?php include 'includes/css.php'; ?>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'includes/navbar.php'; ?>

        <!-- Main Sidebar Container -->
        <?php
        include 'includes/aside.php';
        active('products', 'products');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <?php
            $arr = array(
                ["title" => "Home", "url" => "/"],
                ["title" => "Products", "url" => "#"],
            );
            pagePath('Products', $arr);
            ?>

            <section class="content">                  

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Products List</h3>
                            </div>
                             <!-- /Boton Agregar -->
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">Add Product</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price Old</th>
                                            <th>Price Current</th>
                                            <th>Description</th>
                                            <th>Rating</th>
                                            <th>Quantity</th>
                                            <th>Added to site</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $data = $query->custom("SELECT 
                                            p.id, 
                                            p.name, 
                                            p.price_old, 
                                            p.price_current, 
                                            p.description, 
                                            p.rating, 
                                            p.quantity, 
                                            p.added_to_site, 
                                            pi.image_url 
                                        FROM products p 
                                        LEFT JOIN (
                                            SELECT product_id, image_url 
                                            FROM product_images 
                                            GROUP BY product_id
                                        ) pi ON pi.product_id = p.id");

                                        foreach ($data as $row) {
                                            echo '<tr>';
                                            echo '<td><img src="/imarket/src/images/products/' . $row['image_url'] . '" alt="product image" style="width: 60px; height: auto;"></td>';
                                            echo '<td>' . $row['name'] . '</td>';
                                            echo '<td>' . $row['price_old'] . '</td>';
                                            echo '<td>' . $row['price_current'] . '</td>';
                                            echo '<td>' . $row['description'] . '</td>';
                                            echo '<td>' . $row['rating'] . '</td>';
                                            echo '<td>' . $row['quantity'] . '</td>';
                                            echo '<td>' . $row['added_to_site'] . '</td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </section>
        </div>

        <!-- Main Footer -->
        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- SCRIPTS -->
    <script src="../src/js/jquery.min.js"></script>
    <script src="../src/js/adminlte.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../src/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../src/js/jquery.dataTables.min.js"></script>
    <script src="../src/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>

    <script>
        function changeStatus(userId, newStatus) {
            window.location.href = "change_status.php?userId=" + userId + "&newStatus=" + newStatus + "&userrole=user";
        }
    </script>
  <!--Modal Add Products -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <iframe src="add_product.php" frameborder="0" style="width:100%; height:600px;"></iframe>
      </div>
    </div>
  </div>
</div>

</body>

</html>