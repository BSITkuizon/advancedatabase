<?php
session_start();

function getConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wanderlustdb";
    
    // Create a connection to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
     
        
    }
    else{
        return $conn;
    }

    }
function insertInfoTicket() {
    $conn = getConnection(); // Ensure this function is defined and returns a valid database connection

    // Check if the form's submit button was clicked
    if (isset($_POST['submit'])) {
        $ticketType = $_POST['ticketType'];
        $groupName = $_POST['groupName'];
        $cottageType = $_POST['cottageType'];
        $timeSchedule = $_POST['timeSchedule'];
        $contactNumber = $_POST['contactNumber'];
        $stayType = $_POST['stayType'];
        $address = $_POST['address'];
        $boat = $_POST['boat'];

        // // Check the count for "Tourism Building Room"
        // if ($cottageType === "Tourism Building Room") {
        //     $sql = "SELECT COUNT(*) as `count` FROM `bookings` WHERE `cottage_type` = 'Tourism Building Room'";
        //     $result = $conn->query($sql);
        //     if ($result && $result->num_rows > 0) {
        //         $row = $result->fetch_assoc();
        //         $count = $row['count'];
        //         if ($count === 0) {
        //             // The count is 0, you can display an error message or handle it as needed
        //             // For example, you can redirect with an error message
        //             echo "<script>
        //                 alert('Tourism Building Room is not available. Please choose another cottage.');
        //                 window.location.href = 'ticketingagent.php';
        //             </script>";
        //             exit(); // Stop further execution
        //         }
        //     }
        // }

        // Proceed with the insertion
        $sql = "INSERT INTO bookings (ticket_type, group_name, cottage_type,boat, time_schedule, contact_number, address, stayType) 
                VALUES ('$ticketType', '$groupName', '$cottageType','$boat', '$timeSchedule', '$contactNumber', '$address', '$stayType')";

        $result = $conn->query($sql);

        if ($result) {
            $encodedGroupName = urlencode($groupName);
            echo "<script>
                    alert('Ticket submitted. Add members.');
                    window.location.href = 'user/addmember.php?groupName=$encodedGroupName'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Error creating a ticket!');
                    window.location.href = 'ticketingagent.php'; 
                  </script>";
        }

        $conn->close();
    }
}

function insertMembers(){
    if (isset($_POST['submitMembers'])) {
        $groupName = urldecode($_GET['groupName']);
        $memberCount = $_POST['memberCount'];
    
        $conn = getConnection();
        $conn->begin_transaction();

        try {
            for ($i = 0; $i < $memberCount; $i++) {
                if (isset($_POST["memberName"][$i])) {
                    $memberName = $conn->real_escape_string($_POST["memberName"][$i]);
                    $sql = "INSERT INTO members (name, groupName) VALUES ('$memberName', '$groupName')";
                    if (!$conn->query($sql)) {
                        throw new Exception("Error inserting member $i: " . $conn->error);
                    }
                }
            }
            $conn->commit();
            echo "<script>
                alert('Ticket completed successfully!');
                window.location.href = 'addmember.php'; 
              </script>";
        } catch (Exception $e) {
            $conn->rollback();
            echo "Transaction failed: " . $e->getMessage();
        }
        $conn->close();
    }
}
?>
