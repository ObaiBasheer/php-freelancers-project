<?php
session_start();
include './includes/header.php';
//include './includes/functions.php';
include './connect.php';

$getTitle = 'Dashboard';
?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">USERS</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo checkitem ('userID', 'users');  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">transactions</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php  echo checkitem ('id', 'transactions');  ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">services</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php  echo checkitem ('serv_id', 'services');  ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Comments</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         

          
        <div class="row">
        <div class="col-sm-6">
                        <div class="card shadow mb-4  border-bottom-primary">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Last 5 users Added</h6>
                          </a>
                        
                        
                        
                          <!-- Card Content - Collapse -->
                          <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                            
                            <?php $thelatest = getlatest('Fname', 'users','userID', $limit = 5);
                              foreach($thelatest as $user) {


                                echo '<li>'.$user['Fname'] . '</li>';
                              }
                            
                            ?>
                                
                            
                            </div>
                          </div>
                      
                        </div>
        </div>
        <div class="col-sm-6">
                        <div class="card shadow mb-4  border-bottom-success">
                          <!-- Card Header - Accordion -->
                          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">Last 5 services Added</h6>
                          </a>
                        
                        
                        
                          <!-- Card Content - Collapse -->
                          <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">

                            <?php $thelatest = getlatest('name', 'services','serv_id', $limit = 5);
                              foreach($thelatest as $service) {


                                echo '<li>'.$service['name'] . '</li>';
                              }
                            
                            ?>
                            
                            </div>
                          </div>
                      
                        </div>
        </div>
      </div>



   
       
        
        

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
include './includes/footer.php';