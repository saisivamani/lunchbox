<?php
  session_start();
  // Calculation for this Month
  if(empty($_SESSION['supid'])) header("location: login.php");
  include("connect.php");
  $subscriptions = mysqli_query($con,"select *,count(*) from subscriptions");
  $team = mysqli_query($con,"select * from team");
  $date = date("Y-m-d");
  $total_scbscriptions = mysqli_fetch_assoc($subscriptions)['count(*)'];
  $total_not_pickes = 0;
  $total_In_Transtion = 0;
  $total_Delivered = 0;
  $not_picked_students = mysqli_query($con,"select * from subscriptions where stdid not in (select stdid from delivary where date='$date')");
  $picked_students = mysqli_query($con,"select * from delivary where date='$date'");

  // Calculation for this Month agent Report
  $this_month = date("m");
  $this_year = date("Y");
  $this_month_working_days = mysqli_num_rows(mysqli_query($con,"SELECT count(*) FROM `delivary` WHERE month(date) = $this_month and year(date) = $this_year GROUP BY date; "));

  // Calculation for day to day analysis

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

    <title>Lunch Box Dashboard</title>

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
          <div class="app-brand demo ">
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

            <li class="menu-item active">
              <a href="allocate_student.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Analytics">Allocate</div>
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
                <li class="menu-item">
                  <a href="parent_registration_details.php" class="menu-link">
                    <div data-i18n="Account">Parent Registrations</div>
                  </a>
                </li>
                <li class="menu-item">
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
            id="layout-navbar" >
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
                    <h5 class="card-header">Allocate Students to Agent</h5>
                    <div class="card-body">
                      <div>
                        <label for="smallSelect" class="form-label">Select Agent</label>
                        <select id="smallSelect" class="form-select form-select-sm">
                          <option>Select Agent</option>
                          <option value="9581981888">jagadish</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>

                    </div>
                  </div>
                </div>   
              </div>
              <div id="students_to_agent"></div>
              <!-- Hoverable Table rows -->
              <div class="card" >
                <h5 class="card-header">Allocating Delivery Agent to Students</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Student Name</th>
                        <th>Parent Name</th>
                        <th>Area</th>
                        <th>School</th>
                        <th>Delivary Agent</th>
                        <th>Update</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> echo $student['sname'] </strong></td>
                        <td> echo $parent['pname'] </td>
                        <td> echo $address['area'] </td>
                        <td><span class="badge bg-label-success me-1">echo $school['school_name'] </span></td>
                        <form action="allocate_agent.php" method="get">
                        <input type="hidden" name="stdid">
                        <td><div>
                        <select id="smallSelect" name="agent" class="form-select form-select-sm">
                          <option>select agent</option>
                        </select>
                      </div></td>                        
                        <td><input type="submit" class="btn btn-sm btn-outline-success"></td>
                        </form>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Hoverable Table rows -->
            </div>
            <!--/ Monthly Report Ends Here Shiva -->
              

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
    <script>
      const smallSelect = document.getElementById('smallSelect');
      const students = document.getElementById('students_to_agent');

      smallSelect.addEventListener("change",function(){
        const agents_selected =smallSelect.value;

        //Making xml https request
        const std_dets = new XMLHttpRequest();
        std_dets.open("GET","get_student_details.php?agent="+agents_selected,true);
        std_dets.onreadystatechange =function(){
          if( std_dets.readyState === 4 & std_dets.status === 200){
            const data_students = JSON.parse(std_dets.responseText);
            console.log(data_students);
            // Sending Data to display ie to students_to_agent container
            sendtodisplay(data_students);
          }
        };
        std_dets.send();
      });
      function sendtodisplay(data){
        students.innerHTML = data;
        // for(let i = 0; i <data.length; i++){
        //   const item = data[i];
        // }

      }    


    </script>
  </body>
</html>