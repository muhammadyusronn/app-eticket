<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/<?= base_url('dash'); ?> by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 May 2026 02:56:12 GMT -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>:: eTicket:: BADILAG </title>
  <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
  <!-- project css file  -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/my-task.style.min.css">
  <!-- plugin css file  -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/datatables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugin/datatables/dataTables.bootstrap5.min.css">
</head>

<body data-mytask="theme-indigo">
  <div id="mytask-layout">

    <!-- sidebar -->
    <div class="sidebar px-4 py-4 py-md-5 me-0">
      <div class="d-flex flex-column h-100">
        <a href="<?= base_url('dash'); ?>" class="mb-0 brand-icon">
          <span class="logo-icon">
            <svg width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
              <path fill-rule="evenodd"
                d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
              <path
                d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
              <path
                d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
            </svg>
          </span>
          <span class="logo-text">e-Ticket</span>
        </a>
        <!-- Menu: main ul -->

        <ul class="menu-list flex-grow-1 mt-3">
          <li><a class="m-link" href="<?= base_url('dash'); ?>"><i class="icofont-home fs-5"></i>
              <span>Dashboard</span></a></li>
          <li><a class="m-link" href="<?= base_url('knowledgebase'); ?>"><i class="icofont-light-bulb fs-5"></i>
              <span>Knowledge Base</span></a></li>
          <li><a class="m-link" href="<?= base_url('create-ticket'); ?>"><i class="icofont-paper-plane fs-5"></i>
              <span>Create Tickets</span></a></li>
          <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i
                class="icofont-ticket"></i> <span>My Tickets</span> <span
                class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
            <!-- Menu: Sub menu ul -->
            <ul class="sub-menu collapse" id="tikit-Components">
              <li><a class="ms-link" href="<?= base_url('ticket') ?>"> <span>All Tickets</span></a></li>
              <li><a class="ms-link" href="<?= base_url('ticket?status=1') ?>"> <span>Waiting <span
                      class="badge bg-info rounded-pill"><?= $jumlah_ticket_waiting ?></span></span></a></li>
              <li><a class="ms-link" href="<?= base_url('ticket?status=2') ?>"> <span>On Progress <span
                      class="badge bg-success rounded-pill"><?= $jumlah_ticket_on_progress ?></span></span></a></li>
              <li><a class="ms-link" href="<?= base_url('ticket?status=3') ?>"> <span>Pending <span
                      class="badge bg-warning rounded-pill"><?= $jumlah_ticket_pending ?></span></span></a></li>
              <li><a class="ms-link" href="<?= base_url('ticket?status=4') ?>"> <span>Solved <span
                      class="badge bg-secondary rounded-pill"><?= $jumlah_ticket_resolved ?></span></span></a></li>
            </ul>
          </li>
          <!-- <li class="collapsed">
            <a class="m-link" data-bs-toggle="collapse" data-bs-target="#issues" href="#"><i class="icofont-bug"></i>
              <span>Issues</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
           
            <ul class="sub-menu collapse" id="issues">
              <li><a class="ms-link" onclick="return alert('sabarrrrrr')"> <span>All Issues</span></a></li>
              <li><a class="ms-link" onclick="return alert('sabarrrrrr')"> <span>Open Issues</span></a></li>
              <li><a class="ms-link" onclick="return alert('sabarrrrrr')"> <span>Reported by Me</span></a></li>
            </ul>
          </li> -->
          <!-- END -->
        </ul>



        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
          <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
      </div>
    </div>

    <!-- main body area -->
    <div class="main px-lg-4 px-md-4">

      <!-- Body: Header -->
      <div class="header">
        <nav class="navbar py-4">
          <div class="container-xxl">

            <!-- header rightbar icon -->
            <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">

              <div class="dropdown notifications">
                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="icofont-alarm fs-5"></i>
                  <span class="pulse-ring"></span>
                </a>
                <div id="NotificationsDiv"
                  class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-sm-end p-0 m-0">
                  <div class="card border-0 w380">
                    <div class="card-header border-0 p-3">
                      <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                        <span>Notifications</span>
                        <span class="badge text-white">11</span>
                      </h5>
                    </div>
                    <div class="tab-content card-body">
                      <div class="tab-pane fade show active">
                        <ul class="list-unstyled list mb-0">
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="<?= base_url() ?>assets/images/xs/avatar5.jpg"
                                alt="">
                              <div class="flex-fill ms-2">
                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Muhammad
                                    Yusron Hartoyo</span> <small>2MIN</small></p>
                                <span class="">Added 2021-02-19 my-Task ui/ux Design <span
                                    class="badge bg-success">Review</span></span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <div class="avatar rounded-circle no-thumbnail">DF</div>
                              <div class="flex-fill ms-2">
                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane
                                    Fisher</span> <small>13MIN</small></p>
                                <span class="">Task added Get Started with Fast Cad project</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="<?= base_url() ?>assets/images/xs/avatar3.jpg"
                                alt="">
                              <div class="flex-fill ms-2">
                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea
                                    Gill</span> <small>1HR</small></p>
                                <span class="">Quality Assurance Task Completed</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="<?= base_url() ?>assets/images/xs/avatar5.jpg"
                                alt="">
                              <div class="flex-fill ms-2">
                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Diane
                                    Fisher</span> <small>13MIN</small></p>
                                <span class="">Add New Project for App Developemnt</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2 mb-1 border-bottom">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="<?= base_url() ?>assets/images/xs/avatar6.jpg"
                                alt="">
                              <div class="flex-fill ms-2">
                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Andrea
                                    Gill</span> <small>1HR</small></p>
                                <span class="">Add Timesheet For Rhinestone project</span>
                              </div>
                            </a>
                          </li>
                          <li class="py-2">
                            <a href="javascript:void(0);" class="d-flex">
                              <img class="avatar rounded-circle" src="<?= base_url() ?>assets/images/xs/avatar5.jpg"
                                alt="">
                              <div class="flex-fill ms-2">
                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Zoe
                                    Wright</span> <small class="">1DAY</small></p>
                                <span class="">Add Calander Event</span>
                              </div>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>
                  </div>
                </div>
              </div>
              <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center">
                <div class="u-info me-2">
                  <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold">Muhammad
                      Yusron Hartoyo</span></p>
                  <small>Admin Profile</small>
                </div>
                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown"
                  data-bs-display="static">
                  <img class="avatar lg rounded-circle img-thumbnail"
                    src="<?= base_url() ?>assets/images/xs/avatar5.jpg" alt="profile">
                </a>
                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                  <div class="card border-0 w280">
                    <div class="card-body pb-0">
                      <div class="d-flex py-1">
                        <img class="avatar rounded-circle" src="<?= base_url() ?>assets/images/xs/avatar5.jpg"
                          alt="profile">
                        <div class="flex-fill ms-3">
                          <p class="mb-0"><span class="font-weight-bold">Muhammad Yusron Hartoyo</span></p>
                          <small class="">muhammad.yusron@gmail.com</small>
                        </div>
                      </div>

                      <div>
                        <hr class="dropdown-divider border-dark">
                      </div>
                    </div>
                    <div class="list-group m-2 ">
                      <a href="task.html" class="list-group-item list-group-item-action border-0 "><i
                          class="icofont-tasks fs-5 me-3"></i>My Task</a>
                      <a href="members.html" class="list-group-item list-group-item-action border-0 "><i
                          class="icofont-ui-user-group fs-6 me-3"></i>members</a>
                      <a href="ui-elements/auth-signin.html" class="list-group-item list-group-item-action border-0 "><i
                          class="icofont-logout fs-6 me-3"></i>Signout</a>
                      <div>
                        <hr class="dropdown-divider border-dark">
                      </div>
                      <a href="ui-elements/auth-signup.html" class="list-group-item list-group-item-action border-0 "><i
                          class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-md-1">
                <a href="#offcanvas_setting" data-bs-toggle="offcanvas" aria-expanded="false" title="template setting">
                  <svg class="svg-stroke" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                      d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                    </path>
                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                  </svg>
                </a>
              </div>
            </div>

            <!-- menu toggler -->
            <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse"
              data-bs-target="#mainHeader">
              <span class="icofont-navigation-menu"></span>
            </button>

            <!-- main menu Search-->
            <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
              <div class="input-group flex-nowrap input-group-lg">
                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                <input type="search" class="form-control" placeholder="Search" aria-label="search"
                  aria-describedby="addon-wrapping">
                <button type="button" class="input-group-text add-member-top" id="addon-wrappingone"
                  data-bs-toggle="modal" data-bs-target="#addUser"><i class="fa fa-plus"></i></button>
              </div>
            </div>

          </div>
        </nav>
      </div>