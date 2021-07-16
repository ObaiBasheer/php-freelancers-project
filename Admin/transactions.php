

<?php
include './includes/header.php';
//include './includes/functions.php';
include './connect.php';

$getTitle = 'transactions';
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
            <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">transactions</h1>

       
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">transactions</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>customer</th>
                      <th>product</th>
                      <th>amount</th>
                      <th>created_at</th>
                    </tr>
                  </thead>
                
                  <tbody>
                      <?php 
                      $stmt = $conn->prepare("SELECT * FROM transactions");
                     
                      $serv  = $stmt->execute();
                      while( $serv = $stmt->fetch(PDO ::FETCH_OBJ)) {?>

                     
                    <tr>
                      <td><?php echo $serv->id; ?></td>
                      <td><?php echo $serv->customer_id; ?></td>
                      <td><?php echo $serv->product; ?></td>
                      <td><?php echo $serv->amount; ?></td>
                      <td><?php echo $serv->created_at; ?></td>
                     
                    </tr>

                    <?php  } ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
  include './includes/footer.php';