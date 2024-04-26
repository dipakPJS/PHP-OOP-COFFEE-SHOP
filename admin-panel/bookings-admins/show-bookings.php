<?php
// including header file
include "../layouts/Header.php";

// including autoload file

include "../../autoload/autoload3.php";

if(!isset($_SESSION['adminName'])){
  header("location: ".APP_URL."");
}

$dataPost = new DataPost();

$showBookings = $dataPost->showAdminBookings();

?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Bookings</h5>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">first_name</th>
              <th scope="col">last_name</th>
              <th scope="col">date</th>
              <th scope="col">time</th>
              <th scope="col">phone</th>
              <th scope="col">message</th>
              <th scope="col">status</th>
              <th scope="col">created_at</th>
              <th scope="col">Update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <!-- php code starts here -->
            <?php

            if ($showBookings) {

              $i = 1;

              foreach ((array) $showBookings as $data) {

            ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <td><?= $data['first_name']; ?></td>
                  <td><?= $data['last_name']; ?></td>
                  <td><?= $data['booking_date']; ?></td>
                  <td><?= $data['booking_time']; ?></td>
                  <td><?= $data['phone']; ?></td>
                  <td><?= $data['messages']; ?></td>
                  <td><?= $data['status']; ?></td>
                  <td><?= $data['created_at']; ?></td>
                  <td><a href="update-bookings.php/?id=<?= $data['id'] ?>" class="btn btn-warning text-white  text-center ">Update</a></td>
                  <td><a href="delete-bookings.php/?id=<?= $data['id'] ?>" class="btn btn-danger  text-center ">Delete</a></td>
                </tr>

            <?php

              }
            } else {
              echo "<tr><h2 class = 'text-danger text-center'>No Bookings</h2></tr>";
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