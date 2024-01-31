<?php
require_once("../db_violin_connect.php");


//product
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);
$rowcount = $result->num_rows;

//product cate
$catesql = "SELECT * FROM product_category";
$cateResult = $conn->query($catesql);
$cateRows = $cateResult->fetch_all(MYSQLI_ASSOC);

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

      .toggle-input {
         display: none;
      }

      p {
         margin: 0;
      }

      .form-control {
         padding: 0.275rem;
         margin: 0;
      }

      .editBtnArea {
         width: fit-content;
         margin-left: auto;
      }

      .editBtn,
      .deleteBtn {
         pointer-events: padding-box;
      }

      .editBtn:hover,
      .deleteBtn:hover {
         cursor: pointer;
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
                     <!-- <div class="d-flex align-content-center">
                        <i class="bi bi-search fs-3 me-3"></i>
                        <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item"><a href="index.php">ELEGANZA Studio</a></li>
                           <li class="breadcrumb-item active">Product list</li>
                        </ol>
                     </div> -->
                  </div>
                  <div class="d-flex justify-content-end align-items-center flex-grow-1">
                     <div data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="bi bi-plus-lg fs-1 m-2"></i>
                     </div>
                  </div>
               </div>




               <!-- ADD -->
               <div class="collapse" id="collapseExample">

                  <div id="accordionExample">
                     <ul class="nav nav-tabs">
                        <?php foreach ($cateRows as $cate) : ?>
                           <li class="nav-item">
                              <a class="nav-link" style="border-radius:0.375rem ;" data-bs-toggle="collapse" href="#cateCollapse<?= $cate["type"] ?>"><?= $cate["type"] ?></a>
                           </li>
                        <?php endforeach; ?>


                     </ul>
                     <div class="accordion mt-3">
                        <?php foreach ($cateRows as $cate) : ?>
                           <form action="./product-add.php" method="post">
                              <input type="hidden" name="addId" value="<?= $cate["product_category_id"] ?>">

                              <div class="collapse" id="cateCollapse<?= $cate["type"] ?>" data-bs-parent="#accordionExample">

                                 <div class="row g-2">
                                    <!-- product detail -->
                                    <div class="col">
                                       <?php if ($cate["product_category_id"] == 1) : ?>
                                          <div class="form-floating mb-2">
                                             <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="nameAdd">
                                             <label for="floatingInput">Product Name :</label>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="priceAdd">
                                                   <label for="floatingInput">Price :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="numAdd">
                                                   <label for="floatingInput">Num :</label>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="brandAdd">
                                                   <label for="floatingInput">Brand :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="sizeAdd">
                                                   <label for="floatingInput">Size :</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="topAdd">
                                                   <label for="floatingInput">Top :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="basAdd">
                                                   <label for="floatingInput">Bas :</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="neckAdd">
                                                   <label for="floatingInput">Neck :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="fingerAdd">
                                                   <label for="floatingInput">Fb :</label>
                                                </div>
                                             </div>
                                          </div>
                                       <?php elseif ($cate["product_category_id"] == 2) : ?>
                                          <div class="form-floating mb-2">
                                             <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="nameAdd">
                                             <label for="floatingInput">Product Name :</label>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="priceAdd">
                                                   <label for="floatingInput">Price :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="numAdd">
                                                   <label for="floatingInput">Num :</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="brandAdd">
                                                   <label for="floatingInput">Brand :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="sizeAdd">
                                                   <label for="floatingInput">Size :</label>
                                                </div>
                                             </div>
                                          </div>
                                       <?php elseif ($cate["product_category_id"] == 3) : ?>
                                          <div class="form-floating mb-2">
                                             <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="nameAdd">
                                             <label for="floatingInput">Product Name :</label>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="priceAdd">
                                                   <label for="floatingInput">Price :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="numAdd">
                                                   <label for="floatingInput">Num :</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="brandAdd">
                                                   <label for="floatingInput">Brand :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="bowAdd">
                                                   <label for="floatingInput">Bow :</label>
                                                </div>
                                             </div>
                                          </div>
                                       <?php elseif ($cate["product_category_id"] == 4) : ?>
                                          <div class="form-floating mb-2">
                                             <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="nameAdd">
                                             <label for="floatingInput">Product Name :</label>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="priceAdd">
                                                   <label for="floatingInput">Price :</label>
                                                </div>
                                             </div>
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control" id="floatingInput" placeholder="0000" name="numAdd">
                                                   <label for="floatingInput">Num :</label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="row g-2">
                                             <div class="col">
                                                <div class="form-floating mb-2">
                                                   <input type="text" class="form-control h-100" id="floatingInput" placeholder="0000" name="brandAdd">
                                                   <label for="floatingInput">Brand :</label>
                                                </div>
                                             </div>
                                          </div>
                                       <?php endif; ?>
                                    </div>

                                    <!-- intro -->
                                    <div class="col">
                                       <div class="form-floating mb-2">
                                          <textarea type="text" class="form-control" id="floatingInput" placeholder="0000" name="introAdd"></textarea>
                                          <label for="floatingInput">Introduction :</label>
                                       </div>

                                    </div>
                                    <!-- img upload -->
                                    <div class="col">
                                       <div class="h-100 w-100 border">
                                          <!-- <div class="card-body h-100"></div> -->

                                       </div>
                                    </div>
                                 </div>
                                 <button type="submit" class="btn btn-primary">
                                          Add
                                       </button>



                              </div>
                           </form>
                        <?php endforeach; ?>
                     </div>
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

                  <form action="product-edit.php" method="post">

                     <!-- product -->
                     <div class="accordion" id="accordion<?= $product["product_id"] ?>">
                        <div class="accordion-item">
                           <h2 class="accordion-header" id="heading<?= $product["product_id"] ?>">
                              <button class="accordion-button collapsed p-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $product["product_id"] ?>" aria-expanded="false" aria-controls="collapse<?= $product["product_id"] ?>">

                                 <input type="hidden" name="editId" value="<?= $product["product_id"] ?>">

                                 <!-- product -->
                                 <div class="row d-flex col-12 align-items-center" style="height: 100px;">
                                    <div class="col text-start">
                                       <div class="align-img text-center">
                                          <img class="objf-cover img" src="../images/<?= $product["img"] ?>" alt="">
                                       </div>
                                    </div>
                                    <div class="col-3 pe-5">
                                       <div class="w-75">
                                          <p id="nameText<?= $product["product_id"] ?>">
                                             <?= $product["name"] ?>
                                          </p>
                                          <input placeholder="Name" value="<?= $product["name"] ?>" type="text" class="form-control toggle-input" id="nameInput<?= $product["product_id"] ?>" name="nameEdit">
                                       </div>
                                    </div>
                                    <div class="col">
                                       <div class="w-50">
                                          <p id="priceText<?= $product["product_id"] ?>">
                                             $<?= $product["price"] ?>
                                          </p>
                                          <input placeholder="Price" value="<?= $product["price"] ?>" type="text" class="form-control toggle-input" id="priceInput<?= $product["product_id"] ?>" name="priceEdit">
                                       </div>
                                    </div>
                                    <div class="col">
                                       <div class="w-25">
                                          <p id="numText<?= $product["product_id"] ?>">
                                             <?= $product["num"] ?>
                                          </p>
                                          <input placeholder="num" value="<?= $product["num"] ?>" type="text" class="form-control toggle-input" id="numInput<?= $product["product_id"] ?>" name="numEdit">
                                       </div>
                                    </div>
                                    <div class="col">
                                       <div>
                                          On stage
                                          <!-- put status here -->
                                       </div>
                                    </div>
                                 </div>
                              </button>
                           </h2>

                           <!-- accordion body -->
                           <div id="collapse<?= $product["product_id"] ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $product["product_id"] ?>" data-bs-parent="#accordion<?= $product["product_id"] ?>">
                              <div class="accordion-body px-3 py-4 position-relative">

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
                                                <div class="pe-3">
                                                   <div>
                                                      <p id="introText<?= $product["product_id"] ?>">
                                                         <?= $product["introduction"] ?>
                                                      </p>
                                                      <textarea placeholder="introduction" value="<?= $product["introduction"] ?>" type="text" class="form-control toggle-input" id="introInput<?= $product["product_id"] ?>" name="introEdit"><?= $product["introduction"] ?></textarea>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>

                                          <div class="col-6 ps-3">
                                             <!-- Details -->
                                             <h5>Details</h5>
                                             <ul class="list-unstyled pe-3">
                                                <?php if ($product["product_category_id"] == 1) : ?>
                                                   <li class="">
                                                      <span id="brandText<?= $product["product_id"] ?>">
                                                         Brand : <?= $product["brand"] ?>
                                                      </span>
                                                      <input placeholder="brand" value="<?= $product["brand"] ?>" type="text" class="form-control toggle-input" id="brandInput<?= $product["product_id"] ?>" name="brandEdit">
                                                   </li>
                                                   <li class="">
                                                      <span id="sizeText<?= $product["product_id"] ?>">
                                                         Size : <?= $product["size"] ?>
                                                      </span>
                                                      <input placeholder="Size" value="<?= $product["size"] ?>" type="text" class="form-control toggle-input" id="sizeInput<?= $product["product_id"] ?>" name="sizeEdit">
                                                   </li>
                                                   <li class="">
                                                      <span id="topText<?= $product["product_id"] ?>">
                                                         Top : <?= $product["top"] ?>
                                                      </span>
                                                      <input placeholder="Top" value="<?= $product["top"] ?>" type="text" class="form-control toggle-input" id="topInput<?= $product["product_id"] ?>" name="topEdit">
                                                   </li>
                                                   <li class="">
                                                      <span id="basText<?= $product["product_id"] ?>">
                                                         BAS : <?= $product["back_and_sides"] ?>
                                                      </span>
                                                      <input placeholder="BAS" value="<?= $product["back_and_sides"] ?>" type="text" class="form-control toggle-input" id="basInput<?= $product["product_id"] ?>" name="basEdit">
                                                   </li>
                                                   <li class="">
                                                      <span id="neckText<?= $product["product_id"] ?>">
                                                         Neck : <?= $product["neck"] ?>
                                                      </span>
                                                      <input placeholder="Neck" value="<?= $product["neck"] ?>" type="text" class="form-control toggle-input" id="neckInput<?= $product["product_id"] ?>" name="neckEdit">
                                                   </li>
                                                   <li class="">
                                                      <span id="fingerText<?= $product["product_id"] ?>">
                                                         FB : <?= $product["fingerboard"] ?>
                                                      </span>
                                                      <input placeholder="Fingerboard" value="<?= $product["fingerboard"] ?>" type="text" class="form-control toggle-input" id="fingerInput<?= $product["product_id"] ?>" name="fingerEdit">
                                                   </li>
                                                <?php elseif ($product["product_category_id"] == 2) : ?>
                                                   <ul class="list-unstyled">
                                                      <li class="">
                                                         <span id="brandText<?= $product["product_id"] ?>">
                                                            Brand : <?= $product["brand"] ?>
                                                         </span>
                                                         <input placeholder="Brand" value="<?= $product["brand"] ?>" type="text" class="form-control toggle-input" id="brandInput<?= $product["product_id"] ?>" name="brandEdit">
                                                      </li>
                                                      <li class="">
                                                         <span id="sizeText<?= $product["product_id"] ?>">
                                                            Size : <?= $product["size"] ?>
                                                         </span>
                                                         <input placeholder="Size" value="<?= $product["size"] ?>" type="text" class="form-control toggle-input" id="sizeInput<?= $product["product_id"] ?>" name="sizeEdit">
                                                      </li>
                                                   </ul>
                                                <?php elseif ($product["product_category_id"] == 3) : ?>
                                                   <ul class="list-unstyled">
                                                      <li class="">
                                                         <span id="brandText<?= $product["product_id"] ?>">
                                                            Brand : <?= $product["brand"] ?>
                                                         </span>
                                                         <input placeholder="Brand" value="<?= $product["brand"] ?>" type="text" class="form-control toggle-input" id="brandInput<?= $product["product_id"] ?>" name="brandEdit">
                                                      </li>
                                                      <li class="">
                                                         <span id="bowText<?= $product["product_id"] ?>">
                                                            bow : <?= $product["bow"] ?>
                                                         </span>
                                                         <input placeholder="Bow" value="<?= $product["bow"] ?>" type="text" class="form-control toggle-input" id="bowInput<?= $product["product_id"] ?>" name="bowEdit">
                                                      </li>
                                                   </ul>
                                                <?php elseif ($product["product_category_id"] == 4) : ?>
                                                   <ul class="list-unstyled">
                                                      <li class="">
                                                         <span id="brandText<?= $product["product_id"] ?>">
                                                            Brand : <?= $product["brand"] ?>
                                                         </span>
                                                         <input placeholder="Brand" value="<?= $product["brand"] ?>" type="text" class="form-control toggle-input" id="brandInput<?= $product["product_id"] ?>" name="brandEdit">
                                                      </li>
                                                   </ul>
                                                <?php endif; ?>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Edit btn -->
                                 <div class="editBtnArea d-flex justify-content-between align-items-start position-absolute fixed-top">
                                    <!-- Check -->
                                    <button class="checkBtn border-0 bg-white bi bi-check2 fs-3 px-3 p-2 pb-1" data-product-id="<?= $product["product_id"] ?>" type="submit"></button>
                                    <!-- Edit -->
                                    <i class="editBtn border-0 bg-white bi bi-pencil fs-4 px-3 p-2" data-product-id="<?= $product["product_id"] ?>"></i>
                                    <!-- Delete -->
                                    <i class="deleteBtn bi border-0 bg-white bi-trash3 text-danger fs-4 px-3 p-2" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $product["product_id"] ?>"></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </form>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal<?= $product["product_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title"><?= $product["name"] ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              Delete?
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <a href="./product-delete.php?product_id=<?= $product["product_id"] ?>" type="button" class="btn btn-danger">Delete</a>
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
      const editButtons = document.querySelectorAll(`.editBtn`);

      editButtons.forEach(editBtn => {
         editBtn.addEventListener("click", function() {
            const productId = this.getAttribute("data-product-id");
            const inputNames = ["name", "brand", "size", "top", "bas", "neck", "finger", "bow", "strings", "num", "price", "intro"];
            const textNames = ["name", "brand", "size", "top", "bas", "neck", "finger", "bow", "strings", "num", "price", "intro"];
            const checkBtns = document.querySelectorAll(`.checkBtn[data-product-id="${productId}"]`);

            inputNames.forEach(inputName => {
               const input = document.querySelector(`#${inputName}Input${productId}`);

               if (input) {
                  input.style.display = input.style.display === 'none' ? 'inline' : 'none';
               }
            });

            textNames.forEach(textName => {
               const text = document.querySelector(`#${textName}Text${productId}`);
               if (text) {
                  text.style.display = text.style.display === 'inline' ? 'none' : 'inline';
               }
            });
         });
      });
   </script>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="js/scripts.js"></script>
</body>

</html>