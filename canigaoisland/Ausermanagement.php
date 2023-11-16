<?php
include 'connection.php';

// Fetch and display all registered accounts from the database
$sql = "SELECT FirstName, LastName, Email, Username, agentID, Password, BoatID, Role, PhoneNumber FROM Useraccounts";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="auseranangement.css">
    <link rel="stylesheet" href="canigs.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/{your-bootstrap-version}/css/bootstrap.min.css">
    <title>Admin Management</title>
    
<style>
   .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 20px;
            font-weight: bold;
            cursor: pointer;
        }
        /* Add this CSS for the Edit button */


</style>


        
  
</head>
<body id="body">
    <div class="container">
      <!-- Bootstrap Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="navbar-brand active_link" href="#">Admin</a>
        </div>
        <!-- navbar search -->
        <div class="navbar__right">
         
        </div>
      </nav>

        <main style="background-color: #f3faff";>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="assets/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>HELLO ADMIN</h1>
              <p>Welcome to admin dashboard</p>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <!-- Bootstrap Cards -->
            <div class="card bg-light">
              <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Tourist</p>
                <span class="font-bold text-title">578</span>
              </div>
            </div>

            <div class="card bg-light">
              <i class="fa fa-home fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Available Cottages</p>
                <span class="font-bold text-title">9</span>
              </div>
            </div>

            <div class="card bg-light">
              <i class="fa fa-ship fa-2x text-yellow" aria-hidden="true"></i>
               <div class="card_inner">
                 <p class="text-primary-p">Active Boat</p>
                 <span class="font-bold text-title">12</span>
              </div>
            </div>
<?php
include 'connection.php';
$sql = "SELECT FirstName, LastName, Email, Username FROM Useraccounts";
$result = mysqli_query($conn, $sql);

// Perform a SELECT query to retrieve data from your table
$sql = "SELECT * FROM Useraccounts"; // Replace YourTableName with your actual table name

// Execute the query and store the result in a variable
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Count the active Ticketing Agents
$activeTicketingAgentsCount = mysqli_num_rows($result);
?>
            <div class="card bg-light">
             <i class="fa fa-user-secret fa-2x text-green" aria-hidden="true"></i>
                 <div class="card_inner">
                 <p class="text-primary-p">Active Ticketing Agent</p>
                  <span class="font-bold text-title"><?php echo $activeTicketingAgentsCount; ?></span>
                  </div>
              </div>

          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            

    <!-- Table -->
  <table class="table table-striped table-bordered">
  <!-- Add this column header to your table -->
<thead>
  <tr>
    <th>#</th> <!-- Row number column -->
    <th>Full Name</th>
    <th>Agent ID</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>Boat Name</th>
    <th>Role</th>
    <th>Phone Number</th>
     <th>Action</th>  
  </tr>
</thead>

<tbody>
 

<?php
  $rowNumber = 1; 

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
   
    echo "<td>" . $rowNumber . "</td>"; // Display the row number
    echo "<td>" . $row['FirstName'] . " " . $row['LastName'] . "</td>";
    echo "<td>" . $row['agentID'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Username'] . "</td>";
    echo "<td>" . $row['Password'] . "</td>";
    echo "<td>" . $row['BoatID'] . "</td>";
    echo "<td>" . $row['Role'] . "</td>";
    echo "<td>" . $row['PhoneNumber'] . "</td>";
    echo "<td class='action-buttons'>";
    echo "<a href='#' class='edit-link' onclick='openEditModal(" . $row['agentID'] . ", \"" . urlencode($row['FirstName']) . "\", \"" . urlencode($row['LastName']) . "\", \"" . urlencode($row['Birthdate']) . "\", \"" . urlencode($row['Email']) . "\", \"" . urlencode($row['Username']) . "\", \"" . urlencode($row['Password']) . "\", \"" . urlencode($row['BoatID']) . "\", \"" . urlencode($row['Role']) . "\", \"" . urlencode($row['PhoneNumber']) . "\")'>Edit</a>";
  
    echo "<a  class='delete-link' href='deleteuser.php?agentid=" . $row['agentID'] . "'>Delete</a>";
    echo "</td>";
 

    echo "</tr>";
    
    $rowNumber++; // Increment row number for the next row
  }
  ?>
</tbody>
</table>

 <!-- Button to Add Ticketing Agent Account -->
<button class="add-button" id="openModalButton">Add Ticketing Agent Account</button>

  </div>

<!-- Modal for Adding a Ticketing Agent Account -->
<div id="registrationModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModalButton">&times;</span>
        <h3>Add Ticketing Agent Account</h3>
        <form action="useradd.php" method="POST">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" placeholder="Enter first name" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" name= "lastname" id="lastname" placeholder="Enter last name" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate:</label>
                <input type="date" name="birthdate" id="birthdate">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Enter username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Enter password" required>
            </div>
            <div class="form-group">
                <label for="boatid">Boat Name:</label>
                <select class="form-select" name="boatid" id="boatid">
                    <option value="">Select boat</option>
                    <option value="1">1 - Duran-Duran</option>
                    <option value="2">2 - Lorwinds</option>
                    <option value="3">3 - Franklyn</option>
                </select>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-select" name="role" id="role">
                    <option value="Ticketing Agent">Ticketing Agent</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phonenumber">Phone Number:</label>
                <input type="text" name="phonenumber" id="phonenumber" placeholder="Enter phone number">
            </div>
            <div>
                 <button type="button" class="cancel-button" id="cancelUpdateButton">Cancel</button>
                  <button type="submit" class="modalbtn">Submit</button>
            </div>
        
        </form>
    </div>
</div>
</div>



    </main>






  <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="img/slsuto.png" alt="logo" />
            <h1>WanderLust</h1>
            <img src="img/canigs.png" alt="logo" /> 
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>
        <br><br>

        <div class="sidebar__menu">
          <div class="sidebar__link  ">
            <i class="fa fa-home "></i>
            <a href="adminindex.php">Dashboard</a>
          </div>
          <h2>MANAGEMENT</h2>
          
        
          <div class="sidebar__link active_menu_link ">
            <i class="fa fa-building-o "></i>
            <a href="ausermanagement.php">Ticketing Agent Account</a>
          </div>
          
          <div class="sidebar__link">
            <i class="fa fa-money "></i>
             <a href="prices.php">Prices</a>
          </div>

          <h2>MAINTENANCE MANAGEMENT</h2>
          <div class="sidebar__link">
            <i class="fa fa-ship "></i>
            <a href="#">Boat</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-home"></i>
            <a href="#">Cottage</a>
          </div>
         
          
          <h2>Monthly Report</h2>
         
          <div class="sidebar__link">
            <i class="fa fa-line-chart fa-2x text-red"></i>
            <a href="#">Revenue</a>
          </div>
          <hr>
          <div class="sidebar__logout">
            <i class="fa fa-power-off fa-2x text-red"></i>
            <a href="#">Log out</a>
          </div>
          <h2></h2>
          <div class="sidebar__link">
           
            <a href="#"></a>
          </div>
          <div class="sidebar__link">
           
            <a href="#"> </a>
          </div>
         
        </div>
      </div>
    </div>


<!-- Footer -->
<footer>
    <p>&copy; 2023 Wander Lust Ticketing System</p>
</footer>


<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeEditModal()">&times;</span>
    <!-- Add your form fields here -->
    <form id="editForm">
      <!-- Display form fields with corresponding PHP values -->
      <label for="firstName">First Name:</label>
      <input type="text" id="firstName" name="firstName" value="<?php echo urldecode($row['FirstName']); ?>">

      <!-- Add other form fields as needed -->

      <input type="submit" value="Save">
    </form>
  </div>
</div>

    <!-- Add this script just before the closing </body> tag in your HTML -->
    <script>
  // JavaScript functions to handle modal opening and closing
  function openEditModal(agentID, firstName, lastName, birthdate, email, username, password, boatID, role, phoneNumber) {
    document.getElementById('firstName').value = decodeURIComponent(firstName);
    // Set other form field values as needed

    // Show the modal
    document.getElementById('editModal').style.display = 'block';
  }

  function closeEditModal() {
    // Close the modal
    document.getElementById('editModal').style.display = 'none';
  }
</script>



<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="admin.js"></script>

<script src="modaladd.js"></script>
<!-- Bootstrap JavaScript -->
<!-- Include Bootstrap JavaScript at the end of the body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/{your-bootstrap-version}/js/bootstrap.min.js"></script>


</body>
</html>
