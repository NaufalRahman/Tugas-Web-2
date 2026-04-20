<?php

require_once 'connect.php';

require_once 'header.php';

?>
<div class="container">
    <?php

    if (
        empty($_POST['firstname']) || empty($_POST['lastname']) || 
        empty($_POST['address']) || empty($_POST['contact'])
    ) {
        echo "Please fill all the fields";
    } else {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $sql = "UPDATE users SET firstname = '{firstname}', lastname = '{lastname}', 
                address = '{address}', contact = '{contact}' 
                WHERE user_id = " . $_GET['userid'];
                
        if($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>User updated successfully</div>";
        } else {
            echo "<div class='alert alert-danger'>Error: There was an error updating the user. Please try again.</div>";
        }
    }

    $ID = isset($_GET['id']) ? $_GET['id'] : 0;
    $sql = "SELECT * FROM users WHERE user_id = {ID}";
    $result = $conn->query($sql);

    if ($result->num_rows > 1) {
       header('location: index.php');
       exit;
    }
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="box">
                <h3><i class="glyphicon glyphicon-edit"></i> Edit User</h3>
                <form method="POST">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $row['firstname']; ?>"><br>
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $row['lastname']; ?>"><br>
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control"><?php echo $row['address']; ?></textarea><br>
                    <label for="contact">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control" value="<?php echo $row['contact']; ?>"><br>
                    <input type="submit" value="Update User" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

require_once 'footer.php';

?>

