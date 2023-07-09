<?php
  session_start();
  // Calculation for this Month
  if(empty($_SESSION['supid'])) header("location: login.php");
  include("connect.php");
  $run1 = mysqli_query($con,"select * from parent where pid='0'");
  $pid=0;
  if(isset($_POST['getdetails'])){
    $pid=$_POST['pid'];
    $run1 = mysqli_query($con,"select * from parent where pid='$pid'");
    if(mysqli_num_rows($run1)==0){
      echo "<script>alert('No Parent Found')</script>";
    }  
  }
  if(isset($_POST['update'])){
    $mobile=$_POST['pid'];
    $pname=$_POST['pname'];
    $altphone=$_POST['altphone'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    echo $mobile.$pname.$altphone.$email.$pass.$pid;
    $run2 = mysqli_query($con,"update parent set pid='11654',pname='jkbbh',altphone='53',email='email',pass='pass' where pid='9052727402'");
    if($run2){
      echo "<script>alert('Parent Details Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('Parent Details Updation Failed')</script>";
    }
  }

  ?>
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="Bhavani/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Update Parent Registration Details</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="Bhavani/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="Bhavani/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="Bhavani/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="Bhavani/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="Bhavani/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.php" class="app-brand-link">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Lunch Box</span>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            
            <!-- Layouts -->
            <li class="menu-item ">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Our Leads</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Account Settings">Parents</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item ">
                  <a href="parent_registration_details.php" class="menu-link">
                    <div data-i18n="Account">Parent Registrations</div>
                  </a>
                </li>
                <li class="menu-item active">
                  <a href="update_parent_details.php" class="menu-link">
                    <div data-i18n="Notifications">Update Parent Details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="update_parent_address.php" class="menu-link">
                    <div data-i18n="Connections">Update Parent Address</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <!-- Components -->
            <!-- <li class="menu-header small text-uppercase"> -->
              <!-- <span class="menu-header-text">Student Details</span></li> -->
            <!-- Cards -->
            <!-- User interface -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="User interface">Students</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="all_student_list.php" class="menu-link">
                    <div data-i18n="Accordion">All Student Details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="student_wise_orders.php" class="menu-link">
                    <div data-i18n="Alerts">Student Wise Analysis</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="update_student_subscription.php" class="menu-link">
                    <div data-i18n="Badges">Update Subscription</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="allocate_delivary_agent.php" class="menu-link">
                    <div data-i18n="Typography">Allocating Delivary Agent</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Form Elements">Delivary</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="delivary_agent_details.php" class="menu-link">
                    <div data-i18n="Basic Inputs">Delivary Agent Details</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="new_delivary_agent.php" class="menu-link">
                    <div data-i18n="Basic Inputs">New Delivary Agent</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="delivary_agent_report.php" class="menu-link">
                    <div data-i18n="Basic Inputs">Delivary Agent Report</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="updating_delivary_agent_link.php" class="menu-link">
                    <div data-i18n="Input groups">Update Agent Link</div>
                  </a>
                </li>
              </ul>
            </li>
            
            <!-- Misc -->
            <!-- <li class="menu-header small text-uppercase"> -->
              <!-- <span class="menu-header-text">Schools</span></li> -->
              <li class="menu-item ">
                <a href="newschool.php" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                  <div data-i18n="Analytics">New School</div>
                </a>
              </li>
            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              
              <h3 style="padding-top: 20px;">Bhimavaram Online</h3>

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="Bhavani/img/avatars/sureshsir.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="Bhavani/img/avatars/sureshsir.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">Dr. Suresh Babu</span>
                            <small class="text-muted">Founder BVRMOL</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-4">
                    <h5 class="card-header">Select the Parent</h5>
                    <form action="#" method="post">
                      <div class="card-body">
                        <div>
                          <label for="defaultFormControlInput" class="form-label">Parent Mobile Number</label>
                          <input type="text"
                            class="form-control"
                            id="defaultFormControlInput"
                            placeholder="905 2727 402"
                            aria-describedby="defaultFormControlHelp"
                            name="pid"
                          />
                        </div>
                        <div class="mt-3">
                          <button type="submit" name="getdetails" class="btn btn-primary">Get Details</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <?php
              if(mysqli_num_rows($run1)>0){
                $run1 = mysqli_fetch_assoc($run1);
              ?>
              <div class="row">

                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Update Parent Details</h5>
                    </div>
                    <div class="card-body">
                      <form method="post" action="#">
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Parent Name</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              placeholder="<?php echo $run1['pname']; ?>"
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              name="pname"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Phone No</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-phone"></i
                            ></span>
                            <input
                              type="text"
                              id="basic-icon-default-phone"
                              class="form-control phone-mask"
                              placeholder="<?php echo $run1['pid']; ?>"
                              aria-label="658 799 8941"
                              aria-describedby="basic-icon-default-phone2"
                              name="pid"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-phone">Alternative Phone</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"
                              ><i class="bx bx-phone"></i
                            ></span>
                            <input
                              type="text"
                              id="basic-icon-default-phone"
                              class="form-control phone-mask"
                              placeholder="<?php echo $run1['altphone']; ?>"
                              aria-label="658 799 8941"
                              aria-describedby="basic-icon-default-phone2"
                              name="altphone"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                            <input
                              type="text"
                              id="basic-icon-default-email"
                              class="form-control"
                              placeholder="<?php echo $run1['email']; ?>"
                              aria-label="john.doe"
                              aria-describedby="basic-icon-default-email2"
                              name="email"
                            />
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Password</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-lock-open-alt"></i>
                          </span>
                            <input
                              type="text"
                              class="form-control"
                              id="basic-icon-default-fullname"
                              placeholder="..........."
                              aria-label="John Doe"
                              aria-describedby="basic-icon-default-fullname2"
                              name="pass"
                            />
                          </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
                
              </div>
              <?php
              }
              ?>

              
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://github.com/praveentech21" target="_blank" class="footer-link fw-bolder">Sai Praveen</a>
                </div>
                
              </div>
            </footer>
            <!-- / Footer -->

          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js vendor/js/core.js -->
    <script src="Bhavani/vendor/libs/jquery/jquery.js"></script>
    <script src="Bhavani/vendor/libs/popper/popper.js"></script>
    <script src="Bhavani/vendor/js/bootstrap.js"></script>
    <script src="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="Bhavani/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="Bhavani/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="Bhavani/js/main.js"></script>

    <!-- Page JS -->
    <script src="Bhavani/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
