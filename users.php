<?php

require_once 'connect.php';

require_once 'header.php';

echo "<div class='container'>";

if (isset($_GET['delete'])) {
   $sql = "DELETE FROM users WHERE user_id = " . $_GET['userid'];
    if ($conn->query($sql) === TRUE) {
         echo "<div class='alert alert-success'>User deleted successfully</div>";
    } 
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?> 
    <h2>List of Users</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Address</td>
                <td>Contact</td>
                <td>Action</td>
                <td width="70px">Delete</td>
                <td width="70px">Edit</td>
            </tr>
        <?php

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['contact'] . "</td>";
            echo "<td><input type='submit' name= 'delete' value='Delete' class='btn btn-danger'  /></td>";
            echo "<td><a href='edit.php?userid=" . $row['user_id'] . "' class='btn btn-info'>Edit</a></td>";
        
            echo "</tr>";
            echo "</form>";

        }
        ?>
    </table>
<?php
} else {
    echo "<br><br>No users found.";
}
?> 
</div>
<?php

require_once 'footer.php';
?>