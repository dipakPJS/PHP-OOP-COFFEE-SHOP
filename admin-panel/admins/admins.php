<?php
// including header file
include "../layouts/Header.php";

// including autoload file
include "../../autoload/autoload3.php";

if(!isset($_SESSION['adminName'])){
  header("location: ".APP_URL."");
}

$dataPost = new DataPost();

$showAdmins = $dataPost->showAdmins();

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Admins</h5>
        <a href="<?= APP_URL; ?>admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">username</th>
              <th scope="col">email</th>
            </tr>
          </thead>
          <tbody>
            <!-- php code for showing admins -->
            <?php 

            $i = 1;
            
            if($showAdmins){

              foreach( (array) $showAdmins as $data){

                ?>
                    <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $data['admin_name']; ?></td>
              <td><?= $data['email']; ?></td>

            </tr>
                <?php
              }

            } else {
              echo "<tr><h2 class = 'text-danger'>Empty Admins</h2></tr>";
            }
            
            ?>
        
           
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php
  // including footer file
  include "../layouts/Footer.php";
  ?>