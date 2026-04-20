<?php

require_once 'connect.php';

require_once 'header.php';

?>
<div  class="container">
    <div class="box">
     
    if (isset($_POST['firstname'])  && isset($_POST['lastname']) && isset($_POST['address']) && isset($_POST['contact'])) {
echo "please fill all the fields";
    } else {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $sql = "INSERT INTO users (firstname, lastname, address, contact) 
        VALUES ('$firstname', '$lastname', '$address', '$contact')";

        if($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>New user added successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }

    ?>
    </div class="row">
        </div class="col-md-6 col-md-offset-3">
            <div class="box">
                <h3> <i class="glyphicon glyphicon-plus"></i> Add New User</h3>
                <form method="POST"
                  <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control"><br>
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control"><br>
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea><br>
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control"><br>
                    <<br>
                    <input type="submit" value="Add User" class="btn btn-success" value = "Add User">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once 'footer.php';

?>
