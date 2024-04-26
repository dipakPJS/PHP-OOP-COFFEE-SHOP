<?php

class DataPost
{

    // using dataconn trait here

    use DataConn;

    //   method for registering the user

    public function registerUser($username, $email, $password)
    {
        $sql = 'INSERT INTO users (username, email, user_password) VALUES (:username, :email, :user_password)';
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':user_password' => $password

        ]);

        header('location: http://localhost/coffee-blend/auth/login.php');
    }

    // method for login the user

    public function loginUser($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['user_password'])) {
                $_SESSION['userId'] = $result['id'];
                $_SESSION['userName'] = $result['username'];
                $_SESSION['userEmail'] = $result['email'];


                header('location: http://localhost/coffee-blend/index.php');
            } else {
                echo "<h2 class = 'text-danger'>Incorrect email or password</h2>";
            }
        } else {
            echo "<h2 class = 'text-danger'>Incorrect email or password </h2>";
        }
    }

    // method for booking the table

    public function bookTable($fName, $lName, $date, $time, $phone, $message, $user_Id)
    {
        $sql = "INSERT INTO bookings (first_name, last_name, booking_Date, booking_time,
     phone, messages, user_id) VALUES (:fname, :lname, :book_date, :book_time, :phone,
      :messages, :user_id)";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":fname" => $fName,
            ":lname" => $lName,
            ":book_date" => $date,
            ":book_time" => $time,
            ":phone" => $phone,
            ":messages" => $message,
            ":user_id" => $user_Id
        ]);
    }

    // method for showing product items

    public function showProducts()
    {
        $sql = "SELECT * FROM products WHERE type = 'drink'";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for showing product by id

    public function showProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }

        if ($result = $stmt->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // method for showing related products

    public function showRelatedProducts($type, $id)
    {
        $sql = "SELECT * FROM products WHERE type = :types AND id != :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":types" => $type,
            ":id" => $id
        ]);

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for inserting into cart

    public function insertIntoCart($name, $image, $price, $size, $product_id, $description, $quantity, $user_id)
    {
        $sql = "INSERT INTO cart (product_name, product_image, price, product_size, product_id, product_description,
         product_quantity, user_id) VALUES (:product_name, :product_image, :price, :product_size, :product_id,
          :product_description, :product_quantity, :user_id)";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":product_name" => $name,
            ":product_image" => $image,
            ":price" => $price,
            ":product_size" => $size,
            ":product_id" => $product_id,
            ":product_description" => $description,
            ":product_quantity" => $quantity,
            ":user_id" => $user_id,
        ]);
    }

    // method for showing cart

    public function showDataCart($id)
    {
        $sql = "SELECT * FROM cart WHERE user_id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for validating cart

    public function validateCart($product_id, $user_id)
    {

        $sql = "SELECT * FROM cart WHERE product_id = :product_id AND user_id = :user_id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":product_id" => $product_id,
            ":user_id" => $user_id
        ]);

        if ($result = $stmt->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // method for deleting products in the cart

    public function deleteProduct($id)
    {

        $sql = "DELETE FROM cart WHERE id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);

        // echo "<script>alert('product deleted successfully');</script>";

    }

    // method for total cart price

    public function cartTotal($user_id)
    {
        $sql = "SELECT SUM(product_quantity * price) as total FROM cart WHERE user_id = :user_id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":user_id" => $user_id
        ]);

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for product orders

    public function orderProduct(
        $first_name,
        $last_name,
        $state,
        $street_address,
        $city,
        $zip_code,
        $phone,
        $email,
        $user_Id,
        $status,
        $total_price
    ) {

        $sql = "INSERT INTO orders (first_name, last_name, states, street_address, city,
         zip_code, phone, email, user_id, current_status, total_price) VALUES (:first_name, 
         :last_name, :states, :street_address, :city, :zip_code, :phone, :email, :user_id,
          :current_status, :total_price)";

        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":first_name" => $first_name,
            ":last_name" => $last_name,
            ":states" => $state,
            ":street_address" => $street_address,
            ":city" => $city,
            ":zip_code" => $zip_code,
            ":phone" => $phone,
            ":email" => $email,
            ":user_id" => $user_Id,
            ":current_status" => $status,
            ":total_price" => $total_price,
        ]);
    }

    // method for deleting the cart items

    public function deleteCart($user_id)
    {

        $sql = "DELETE FROM cart WHERE user_id = :user_id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":user_id" => $user_id
        ]);
    }

    // method for showing desserts from the products database table

    public function selectDesserts()
    {
        $sql = "SELECT * FROM products WHERE type = 'dessert'";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // method for showing drinks from the products database table

    public function selectDrinks()
    {
        $sql = "SELECT * FROM products WHERE type = 'drink'";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // method for getting booking data

    public function showBooking($user_id)
    {
        $sql = "SELECT * FROM bookings WHERE user_id = :user_id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":user_id" => $user_id
        ]);

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // method for getting order data

    public function showOrders($user_id)
    {
        $sql = "SELECT * FROM orders WHERE user_id = :user_id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":user_id" => $user_id
        ]);

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }

        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //   method for creating reviews

    public function createReview($review, $username)
    {

        $sql = "INSERT INTO reviews (review, user_name) VALUES (:review, :user_name)";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":review" => $review,
            ":user_name" => $username
        ]);

        // header("location: ".APP_URL."");
        echo "<script>alert('your review have been submitted');
        window.location.href = 'http://localhost/coffee-blend/index.php';
        </script>";
    }

    // method for showing review data

    public function showReview()
    {
        $sql = "SELECT * FROM reviews";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // methods for admin panel starts

    // method for logging admins

    public function loginAdmin($email, $password)
    {
        $sql = 'SELECT * FROM admins WHERE email = :email';
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (password_verify($password, $result['admin_password'])) {
                $_SESSION['adminId'] = $result['id'];
                $_SESSION['adminName'] = $result['admin_name'];
                $_SESSION['userEmail'] = $result['email'];


                header('location: http://localhost/coffee-blend/admin-panel/index.php');
            } else {
                echo "<h2 class = 'text-danger'>Incorrect email or password</h2>";
            }
        } else {
            echo "<h2 class = 'text-danger'>Incorrect email or password </h2>";
        }
    }

    // method for counting the product rows

    public function countProduct()
    {
        $sql = "SELECT COUNT(*) AS count_product FROM products";
        $stmt  = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for counting the orders rows

    public function countOrders()
    {
        $sql = "SELECT COUNT(*) AS count_orders FROM orders";
        $stmt  = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for counting the bookings rows

    public function countBookings()
    {
        $sql = "SELECT COUNT(*) AS count_bookings FROM bookings";
        $stmt  = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for counting the users rows

    public function countAdmins()
    {
        $sql = "SELECT COUNT(*) AS count_admins FROM admins";
        $stmt  = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for creating admins

    public function createAdmins($name, $email, $password)
    {
        $sql = "INSERT INTO admins (admin_name, email, admin_password) VALUES (:adminName, :email, :adminPassword)";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":adminName" => $name,
            ":email" => $email,
            ":adminPassword" => $password,
        ]);

        echo "<script>alert('New admin has been added');
        window.location.href = 'http://localhost/coffee-blend/admin-panel/admins/admins.php';
        </script>";
    }

    // method for showing admin data in admin panel

    public function showAdmins()
    {
        $sql = "SELECT * FROM admins";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for showing orders in admin panel


    public function showAdminOrders()
    {
        $sql = "SELECT * FROM orders";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while ($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
            return $result;
        }
    }

    // method for deleting the orders through admin panel

    public function deleteOrders($id)
    {
        $sql = "DELETE FROM orders WHERE id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
    }

    // method for updating status in admin panel

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET current_status = :current_status WHERE id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":current_status" => $status,
            ":id" => $id
        ]);
    }

    // method for showing products in admin panel

    public function showAdminProducts(){
        $sql = "SELECT * FROM products";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            return $result;
        }
    }


    
    // method for showing bookings in admin panel

    public function showAdminBookings(){
        $sql = "SELECT * FROM bookings";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute();

        while($result = $stmt->fetchAll(PDO::FETCH_ASSOC)){
            return $result;
        }
    }

    // method for deleting bookings 

    public function deleteBookings($id){
        $sql = "DELETE FROM bookings WHERE id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
    }

      // method for updating booking status in admin panel

      public function updateBookingStatus($id, $status)
      {
          $sql = "UPDATE bookings SET status = :booking_status WHERE id = :id";
          $stmt = $this->dataConnection()->prepare($sql);
          $stmt->execute([
              ":booking_status" => $status,
              ":id" => $id
          ]);
      }

      // method for inserting products in admin panel

      public function insertProduct($name, $image, $description, $price, $type){
        $sql = "INSERT INTO products (product_name, product_image, description, price, type)
        VALUES (:product_name, :product_image, :description, :price, :type)";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":product_name" => $name,
            ":product_image" => $image,
            ":description" => $description,
            ":price" => $price,
            ":type" => $type
        ]);
      }

// method for selecting the products page in admin panel

public function selectAdminProducts($id){

    $sql = "SELECT * FROM products WHERE id = :id";
    $stmt = $this->dataConnection()->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);

    while($result = $stmt->fetchAll()){
        return $result;
    }

}

    //   method for deleting the products through admin panel
    public function deleteAdminProducts($id){
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->dataConnection()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
    }

}
