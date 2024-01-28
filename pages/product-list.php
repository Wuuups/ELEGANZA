<?php
require_once("../db_violin_connect.php");

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);













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
   <style>
      .img {
         width: auto;
         height: 100px;
      }

      .pic a {
         width: 100px;
         height: 100px;
      }

      .large-icon {
         font-size: 2rem;
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
      <div id="layoutSidenav_content">
         <main>
            <div class="container-fluid px-4">
               <h1 class="mt-4">PRODUCT LIST</h1>
               <ol class="breadcrumb mb-4">
                  <li class="breadcrumb-item"><a href="index.php">ELEGANZA Studio</a></li>
                  <li class="breadcrumb-item active">Product list</li>
               </ol>

               <!-- title -->
               <div class="row col-12 px-4 py-2">
                  <div class="col">
                     <h5>Image</h5>
                  </div>
                  <div class="col-3">
                     <h5>Name</h5>
                  </div>
                  <div class="col">
                     <h5>Brand</strong>
                  </div>
                  <div class="col">
                     <h5>Price</h5>
                  </div>
                  <div class="col">
                     <h5>Num</h5>
                  </div>
                  <div class="col">
                     <h5>Status</h5>
                  </div>
               </div>


               <?php foreach($rows as $product) :?>

                  

               <!-- product -->
               <div class="accordion" id="accordionFlushExample">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed p-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                           <div class="row d-flex col-12 align-items-center">
                              <div class="col text-center"><img class="objf-cover img" src="../images/<?=$product["img"]?>" alt=""></div>
                              <div class="col-3"><?=$product["name"]?></div>
                              <div class="col"><?=$product["brand"]?></div>
                              <div class="col">$<?=$product["price"]?></div>
                              <div class="col"><?=$product["num"]?></div>
                              <div class="col">On stage</div>
                           </div>
                        </button>
                     </h2>

                     <!-- accordion body -->
                     <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body py-4">

                           <!-- for the img -->
                           <h5>All images</h5>
                           <div class="pic d-flex flex-wrap align-content-center pb-3">
                              <img class="img me-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                              <img class="img me-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                              <img class="img me-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                              <img class="img me-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                              <img class="img me-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">
                              <img class="img me-3 img-thumbnail" src="../images/12809212_800.jpg" alt="">

                              <!-- add img -->
                              <a class="d-flex justify-content-center align-items-center" href="">
                              <i class="bi bi-plus large-icon"></i>
                              </a>

                           </div>

                           <hr>

                           <!-- details -->
                           <div class="row col-12 mt-4">

                              <div class="col">
                                 <h5>Details</h5>
                                 <ul class="list-unstyled">
                                    <li class="py-1">Size:4/4</li>
                                    <li class="py-1">Top:scpure</li>
                                    <li class="py-1">BAS:maple</li>
                                    <li class="py-1">Neck:maple:</li>
                                    <li class="py-1">FB:</li>
                                 </ul>
                              </div>

                              <div class="col">
                                 <h5>Introduce</h5>
                                 <p>Size: 4/4 ,Premium instrument ,Balanced throughout the entire sound spectrum ,Bottom, neck and sides made of European maple ,Top made of European spru</p>
                              </div>

                              <div class="col d-flex justify-content-end align-items-end">
                                 <i class="bi bi-pencil large-icon ms-2"></i>
                                 <i class="bi bi-trash3 large-icon text-danger ms-4"></i>
                              </div>
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
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
</body>

</html>