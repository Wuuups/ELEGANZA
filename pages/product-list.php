<?php
require_once("../db_violin_connect.php");


//product
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rowcount = $result->num_rows;


//image












?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <title>Product</title>
   <link href="css/styles.css" rel="stylesheet" />
   <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

   <style>
      .img {
         width: auto;
         height: 100px;
      }

      .pic a {
         width: 100px;
         height: 100px;
      }

      .align-img {
         width: 100px;
      }
   </style>
</head>

<body>
   <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <!-- Navbar Brand-->
      <a class="navbar-brand ps-3" href="index.php">ELEGANZA Studio</a>
      <!-- Sidebar Toggle-->
      <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
      <!-- Navbar Search-->
      <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
         <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
         </div>
      </form>
      <!-- Navbar-->
      <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
               <li><a class="dropdown-item" href="#!">Settings</a></li>
               <li><a class="dropdown-item" href="#!">Activity Log</a></li>
               <li>
                  <hr class="dropdown-divider" />
               </li>
               <li><a class="dropdown-item" href="#!">Logout</a></li>
            </ul>
         </li>
      </ul>
   </nav>
   <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
               <div class="nav">
                  <div class="sb-sidenav-menu-heading">Function</div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                     <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                     Product
                     <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                     <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Product list</a>
                     </nav>
                  </div>
               </div>
            </div>
         </nav>
      </div>


      <!-- main content -->
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-4">
               <div class="d-flex justify-content-between align-items-center my-4">
                  <div>
                     <h1 class="mb-0">PRODUCT LIST</h1>
                     <div class="d-flex align-content-center">
                        <i class="bi bi-search fs-3 me-3"></i>
                        <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item"><a href="index.php">ELEGANZA Studio</a></li>
                           <li class="breadcrumb-item active">Product list</li>
                        </ol>
                     </div>
                  </div>
                  <div class="d-flex justify-content-end align-items-center flex-grow-1">
                     <i class="bi bi-plus-lg fs-1 m-2"></i>
                  </div>
               </div>

               <div class="py-2">
                  <?= $rowcount ?> Products
               </div>

               <!-- title -->
               <div class="row col-12  py-2  pe-3">
                  <div class="col ">
                     <h5>Image</h5>
                  </div>
                  <div class="col-3 ps-4 pe-2">
                     <h5>Name</h5>
                  </div>
                  <div class="col ps-3">
                     <h5>Price</h5>
                  </div>
                  <div class="col">
                     <h5>Num</h5>
                  </div>
                  <div class="col">
                     <h5>Status</h5>
                  </div>
               </div>

               <?php foreach ($rows as $product) : ?>

                  <!-- product -->
                  <div class="accordion" id="accordion<?= $product["product_id"] ?>">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?= $product["product_id"] ?>">
                           <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $product["product_id"] ?>" aria-expanded="false" aria-controls="collapse<?= $product["product_id"] ?>">
                              <div class="row d-flex col-12 align-items-center">
                                 <div class="col text-start">
                                    <div class="align-img text-center">
                                       <img class="objf-cover img" src="../images/<?= $product["img"] ?>" alt="">
                                    </div>
                                 </div>
                                 <div class="col-3 pe-5">
                                    <div class="w-75">
                                       <?= $product["name"] ?>
                                    </div>
                                 </div>
                                 <div class="col">$<?= $product["price"] ?></div>
                                 <div class="col"><?= $product["num"] ?></div>
                                 <div class="col">On stage</div>
                              </div>
                           </button>
                        </h2>


                        <!-- accordion body -->
                        <div id="collapse<?= $product["product_id"] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $product["product_id"] ?>" data-bs-parent="#accordion<?= $product["product_id"] ?>">
                           <div class="accordion-body p-3 position-relative">




                              <div class="row">
                                 <div class="col">
                                    <!-- for the img -->
                                    <h5>All images</h5>
                                    <div class="pic d-flex flex-wrap align-content-center ">
                                       <?php
                                       // foreach() : 
                                       ?>
                                       <img class="img me-3 mb-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                                       <img class="img me-3 mb-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                                       <img class="img me-3 mb-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                                       <img class="img me-3 mb-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                                       <img class="img me-3 mb-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                                       <img class="img me-3 mb-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                                       <?php
                                       // endforeach; 
                                       ?>
                                       <!-- add img -->
                                       <a class="d-flex justify-content-center align-items-center" href="">
                                          <i class="bi bi-plus fs-1"></i>
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col border-start ps-3">
                                    <div class="row col-12">
                                       <div class="col-6">
                                          <div class="mb-3 ">
                                             <h5>Introduction</h5>
                                             <div class=""><?= $product["introduction"] ?></div>
                                          </div>
                                       </div>
                                       <div class="col-6 ps-3">

                                       <!-- Details -->
                                          <h5>Details</h5>
                                          <ul class="list-unstyled">
                                             <?php if ($product["product_category_id"] == 1) : ?>
                                                <li class="">Brand : <?= $product["brand"] ?></li>
                                                <li class="">Size : <?= $product["size"] ?></li>
                                                <li class="">Top : <?= $product["top"] ?></li>
                                                <li class="">BAS : <?= $product["back_and_sides"] ?></li>
                                                <li class="">Neck : <?= $product["neck"] ?></li>
                                                <li class="">FB : <?= $product["fingerboard"] ?></li>
                                             <?php elseif ($product["product_category_id"] == 2) : ?>
                                                <ul class="list-unstyled">
                                                   <li class="">Brand : <?= $product["brand"] ?></li>
                                                   <li class="">Size : <?= $product["size"] ?></li>
                                                </ul>
                                             <?php elseif ($product["product_category_id"] == 3) : ?>
                                                <ul class="list-unstyled">
                                                   <li class="">Brand : <?= $product["brand"] ?></li>
                                                   <li class="">bow : <?= $product["bow"] ?></li>
                                                </ul>
                                             <?php elseif ($product["product_category_id"] == 4) : ?>
                                                <ul class="list-unstyled">
                                                   <li class="">Brand : <?= $product["brand"] ?></li>
                                                </ul>
                                             <?php endif; ?>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              

                              <!-- Edit btn -->
                              <div class="col d-flex justify-content-end align-items-end position-absolute fixed-bottom ">
                                 <!-- edit -->
                                 <i class="bi bi-pencil fs-3 edit-icon px-2 pb-2" id="contentEdit"></i>
                                 <!-- delete -->
                                 <i class="bi bi-trash3 fs-3 text-danger  px-2 pb-2"></i>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>

               <?php endforeach; ?>

            </div>
         </main>



         <footer class="py-3 bg-light mt-auto">
            <div class="container-fluid px-4">
               <div class="d-flex align-items-center justify-content-end small">
                  <div class="text-muted">Copyright &copy; ELEGANZA Studio 2024</div>
               </div>
            </div>
         </footer>
         
      </div>
   </div>





   <script>

   
   
   </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
</body>

</html>