<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
    <h1 class="page-header text-center">SALES OF THE MONTH</h1>
    
        <form action="" method="GET">
        <div class="row">
            <div class="col-md-2"><input type="text" name="search" required value="<?php if (isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Customer Name"><br>
            </div>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search">SEARCH</span></button>
        </div>
    </form>
    <table class="table table-striped table-bordered">
        <thead>
            <th>Date</th>
            <th>Customer</th>
            <th>Total Price</th>
            <th>Details</th>
        </thead>
        <tbody>
            <?php 
                if (isset($_GET['search'])){
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM purchase WHERE customer LIKE '$filtervalues' ";
                    $query_run = mysqli_query($conn,$query);

                    if (mysqli_num_rows($query_run) > 0){
                        foreach($query_run as $row){
                        ?>
                        <tr>
                            <td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                            <td><?php echo $row['customer']; ?></td>
                            <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                           <td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
                            <?php include('sales_modal.php'); ?>
                           </td>
                        </tr>
                        <?php   
                        }
                    }else{
                        ?>
                        <tr>
                            <td colspan="4">NO RECORD FOUND</td>
                        </tr>
                        <?php
                    }
                }
                
            ?>
        </tbody>
    </table>
    
    <table class="table table-striped table-bordered">
        <thead>
            <th>Date</th>
            <th>Customer</th>
            <th>Total Price</th>
            <th>Details</th>
        </thead>
        <tbody>
            <?php 
                if (isset($_GET['search'])){
                    $filtervalues = $_GET['search'];
                }
                $sql="select * from purchase order by purchaseid desc";
                $query=$conn->query($sql);
                while($row=$query->fetch_array()){
                    ?>
                    <tr>
                        <td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
                        <td><?php echo $row['customer']; ?></td>
                        <td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
                        <td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
                            <?php include('sales_modal.php'); ?>
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>