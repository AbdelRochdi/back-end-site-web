<?php include "admin_header.php" ?>





            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Product List
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->
                <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                
                        <th>Id</th>
                        <th>Title</th>                       
                        <th>Image</th>
                        <th>Description</th>
                        <th>Info</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                
                      <tbody>
                      <?php 
                            $query = "SELECT * FROM products";
                            $load_products_query = mysqli_query($connection,$query);

                            if (!$load_products_query) {
                                die("QUERY FAILED". mysqli_error($connection));
                            }

                            while ($row = mysqli_fetch_array($load_products_query)) {
                                $product_id = $row['product_id'];
                                $product_title = $row['product_title'];
                                $product_image = $row['product_image'];
                                $product_desc = $row['product_desc'];
                                $product_info = $row['product_info'];
                                $product_date = $row['product_date'];


                                echo "<tr>";
                                echo "<td>$product_id</td>";
                                echo "<td>$product_title</td>";
                                echo "<td>$product_image</td>";
                                echo "<td>$product_desc</td>";
                                echo "<td>$product_info</td>";
                                echo "<td>$product_date</td>";
                                echo "<td> <a href=''>Edit</a></td>";
                                echo "<td><a href=''>Delete</a></td>";
                                echo "</tr>";
                            }

                            

                        ?>

                      </tbody>
            </table>
            
            </form>

            </div>
            <!-- /.container-fluid -->

        

    <?php include "admin_footer.php" ?>