<?php
  // Autor Boukernine Abdellatif
  require_once("includes/database.php");
  require_once("includes/pagination.php");

 ?>
 <?php

   // Pagination ************
   //1. the current page number ($current_page)
      $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
   //2. records per page ($per_page)
      $per_page = 1;
   //3. total record count ($total_count)
      $total_count = count_all_produit();

    $pagination = new Pagination($page,$per_page,$total_count);
      $sql  = "SELECT * FROM produit";
      $sql .= " LIMIT {$per_page}";
      $sql .= " OFFSET {$pagination->offset()}";

  ?>
  <?php
       $result = find_by_sql($sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Pagination</title>
</head>
<body>
  <style media="screen">

  </style>

         <header>
           <nav class="navbar navbar-inverse bg-primary navbar-toggleable-sm">
               <a href="#" class="navbar-brand">AbdellatifStore</a>
              <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Store</a>
                <a class="nav-item nav-link" href="#">Services</a>
                <a class="nav-item nav-link" href="#">Vente</a>
              </div><!-- navbar-nav -->
           </nav>
         </header>


        <div class="container"><br>

             <div class="row">
                   <?php while ($donnes = $result->fetch()) { ?>
                <div class="col-lg-3">
                     <div class="card">
                          <img class="card-img-top" src="images/<?php echo $donnes['image']; ?>" alt="" style="height:150px">
                          <div class="card-body">
                            <h5 class="text-success">2000DA</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur.</p>
                         </div>
                    </div>
                </div>
                 <?php } ?>
             </div>

        </div>




   <!-- Pagination --><br><br>
       <nav aria-label="...">
              <ul class="pagination justify-content-center">
                 <?php if($pagination->has_previous_page()){?>
                  <li class="page-item">
                      <a class="page-link" href="<?php echo 'index.php?page='.$pagination->previous_page(); ?>" tabindex="-1">Previous</a>
                  </li>
                <?php }else{ ?>
                  <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                  </li>
                <?php } ?>

                    <?php for($i=1; $i <= $pagination->total_pages(); $i++){ ?>
                      <?php if($i == $page){?>
                       <li class="page-item active">
                           <a class="page-link" href="#"><?php echo $i; ?><span class="sr-only">(current)</span></a>
                        </li>
                      <?php }else{ ?>
                          <li class="page-item"><a class="page-link" href="<?php echo 'index.php?page='.$i; ?>"><?php echo $i; ?></a></li>
                      <?php } ?>
                     <?php }?>

                <?php if($pagination->has_next_page()){ ?>
                    <li class="page-item">
                         <a class="page-link" href="<?php echo 'index.php?page='.$pagination->next_page(); ?>">Next</a>
                    </li>
                <?php }else{ ?>
                    <li class="page-item disabled">
                         <a class="page-link" href="#">Next</a>
                    </li>
              <?php } ?>
              </ul>
         </nav>



         <footer><br><br><br><br>
           <div class="container">
             <div class="col-12 col-md">
                  <small class="d-block mb-3 text-muted">Copyright (c) 2020 Copyright Holder All Rights Reserved, <a href="https://boukernineabdellatif.netlify.com">Boukernine abdellatif</a> </small>
             </div>
           </div>

         </footer>

 <script src="js/bootstrap.min.js"></script>
</body>
</html>
