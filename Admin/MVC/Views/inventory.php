<?php
session_start();
require_once('../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../Controllers/inventoryController.php');

// Initialize variables to prevent undefined variable error
$searchedInventoryId = "";
$searchedInventoryName = "";
$searchedAvailableQuantity = "";
$searchedUsedQuantity = "";
$searchedInventoryDescription = "";
$mass = "";

// Check if search by ID is requested
if(isset($_GET['searchId'])) {
    $searchId = $_GET['searchId'];
    if($searchId == ""){
        $searchedInventoryId = "";
        $searchedInventoryName = "";
        $searchedAvailableQuantity = "";
        $searchedUsedQuantity = "";
        $searchedInventoryDescription = "";
    } else {
        $inventory = searchByInventoryID($searchId);
        if ($inventory) {
            $searchedInventoryId = $inventory['inventory_id'];
            $searchedInventoryName = $inventory['inventory_name'];
            $searchedAvailableQuantity = $inventory['available_inventory_quantity'];
            $searchedUsedQuantity = $inventory['used_inventory_quantity'];
            $searchedInventoryDescription = $inventory['inventory_ description'];
        } else {
            $mass = "No inventory found with that ID.";
        }
    }
}





        if(isset($_GET['add'])){
                $inventoryId = $_GET['inventoryId'] ;
                $inventoryName = $_GET['inventoryName'] ;
                $availableQuantity = $_GET['availableQuantity'] ;
                $inventoryDescription = $_GET['inventoryDescription'] ;
                    // Implement the add function in your controller
            $addStatus = addInventory($inventoryId,$inventoryName, $availableQuantity, $inventoryDescription);
            if ($addStatus) {
                $mass = $_SESSION['AddInventoryMess'];
                unset($_SESSION['AddInventoryMess']);
            } else {
              $mass = $_SESSION['AddInventoryMess'];
                unset($_SESSION['AddInventoryMess']);
             }
        }
        if(isset($_GET['delete'])){
             $inventoryId = $_GET['inventoryId'] ;
                $inventoryName = $_GET['inventoryName'] ;
                $availableQuantity = $_GET['availableQuantity'] ;
                $inventoryDescription = $_GET['inventoryDescription'] ;
            // Implement the delete function in your controller
            $deleteStatus = deleteInventory($inventoryId);
            if ($deleteStatus) {
                $mass = "Inventory item deleted successfully!";
            } else {
                $mass = "Failed to delete inventory item.";
            }
        }
        if(isset($_GET['update'])){
             $inventoryId = $_GET['inventoryId'] ;
                $inventoryName = $_GET['inventoryName'] ;
                $availableQuantity = $_GET['availableQuantity'] ;
                $inventoryDescription = $_GET['inventoryDescription'] ;
            // Implement the update function in your controller
            $updateStatus = updateInventory($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription);
            if ($updateStatus) {
                $mass = "Inventory item updated successfully!";
            } else {
                $mass ="Failed to update inventory item.";
            }
        }            
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Operations</title>
    <link rel="stylesheet" href="Styles.css">
    <link rel="stylesheet" href="inventoryStyles.css">
    <style >
        .SearchInventory {
            background-color: #4CAF50; /* Green background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 10px 10px; /* Some padding */
            text-align: center; /* Centered text */
            text-decoration: none; /* Remove underline */
            display: inline-block; /* Get the element to behave like an inline element while retaining block properties */
            font-size: 16px; /* Increase font size */
            margin: 4px 2px; /* Some margin */
            cursor: pointer; /* Pointer/hand icon */
            border-radius: 12px; /* Rounded corners */
            transition-duration: 0.4s; /* 0.4 second transition effect */
        }

        .SearchInventory:hover {
            background-color: white; /* White background on hover */
            color: black; /* Black text on hover */
            border: 2px solid #4CAF50; /* Green border on hover */
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <div class="search-container">
        <input type="text" class="search-bar" placeholder="Search...">
        <button class="search-btn">Search</button>
    </div>
    <div class="Profile">
        <img src="img/notification.jpeg" alt="Notification" class="round-btn" onclick="openNotification()">
        <img src="img/profile.png" alt="Profile" class="round-btn" onclick="openProfile()">
    </div>
</header>
<section>
    <nav>
        <div>
            <button class="navButton" onclick="openHome()">
                <img src="img/home" alt="Home">
                <span>Home</span>
            </button>
            <button class="navButton" onclick="openDashboard()">
                <img src="img/dashboard.png" alt="Dashboard">
                <span>Dashboard</span>
            </button>
            <button class="navButton" onclick="openHospitalSetup()">
                <img src="img/hospital.png" alt="Hospital Setup">
                <span>Hospital Setup</span>
            </button>
            <button class="navButtonOpen" onclick="openInventory()">
                <img src="img/inventory.png" alt="Inventory">
                <span>Inventory</span>
            </button>
            <button class="navButton" onclick="openReport()">
                <img src="img/report.png" alt="Report">
                <span>Report</span>
            </button>
            <button class="navButton" onclick="openSettings()">
                <img src="img/settings.png" alt="Settings">
                <span>Settings</span>
            </button>
            <button class="navButton" onclick="logout()">
                <img src="img/logout.png" alt="Logout">
                <span>Logout</span>
            </button>
        </div>
    </nav>

    <aside>
      
        <section class="inventoryBody">
            <div class="userIdentity">
                <?php $UserName= $_SESSION['name']; ?>
                <p><b>Hey! <?php echo $UserName; ?> -</b> here's what's happening with your Identity today ..</p>
            </div>
            <div class="inventoryListOperation">
                <div class="inventoryList">
                    <!-- Content for Inventory List -->
                    <h2>Inventory List</h2>
                    <table class="inventoryTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Inventory ID</th>
                                <th>Inventory Name</th>
                                <th>Available Inventory Quantity</th>
                                <th>Used Inventory Quantity</th>
                                <th>Inventory Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $res = InventoryList();
                            $count = 0;
                            while ($row = mysqli_fetch_assoc($res)) { 
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $row["inventory_id"]; ?></td>
                                    <td><?php echo $row["inventory_name"]; ?></td>
                                    <td><?php echo $row["available_inventory_quantity"]; ?></td>
                                    <td><?php echo $row["used_inventory_quantity"]; ?></td>
                                    <td><?php echo $row["inventory_ description"]; ?></td>
                                </tr>
                            <?php     
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="inventoryOperations">
                    <!-- Content for Inventory Operations -->
                    <h2>Inventory Operations</h2>
                    <p>Operations such as adding, deleting, updating items.</p>

                    <!-- Search by ID form -->
                    <form id="searchForm" method="GET">
                        <label for="searchId">Search by ID:</label>
                        <input type="text" id="searchId" name="searchId">
                        <button type="submit" class="SearchInventory" name="SearchInventory">Search</button>
                    </form>

                    <!-- Container for displaying search results -->
                    <div id="searchResults">
                        <!-- Input fields for all columns in the table -->
                        <form id="inventoryForm" method="GET">
                            <div class="inputField">
                                <label for="inventoryId">Inventory ID:</label>
                                <input type="text" id="inventoryId" name="inventoryId" value="<?php echo $searchedInventoryId; ?>">
                            </div>
                            <div class="inputField">
                                <label for="inventoryName">Inventory Name:</label>
                                <input type="text" id="inventoryName" name="inventoryName" value="<?php echo $searchedInventoryName; ?>">
                            </div>
                            <div class="inputField">
                                <label for="availableQuantity">Available Quantity:</label>
                                <input type="text" id="availableQuantity" name="availableQuantity" value="<?php echo $searchedAvailableQuantity; ?>">
                            </div>
                            <div class="inputField">
                                <label for="usedQuantity">Used Quantity:</label>
                                <input type="text" id="usedQuantity" name="usedQuantity" value="<?php echo $searchedUsedQuantity; ?>">
                            </div>
                            <div class="inputField">
                                <label for="inventoryDescription">Inventory Description:</label>
                                <input type="text" id="inventoryDescription" name="inventoryDescription" value="<?php echo $searchedInventoryDescription; ?>">
                            </div>
                        
                    </div>
                    <!-- Buttons for add, delete, update operations -->
                    <div class="mass"><p><?php echo $mass;?></p></div>

                    <div class="operationButtons">
                        <button id="addButton" name= "add">Add</button>
                        <button id="deleteButton" name="delete">Delete</button>
                        <button id="updateButton" name="update">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </section>
       
    </aside>
</section>

<script>
    function openNotification() {
        // window.open('notification-page.html', '_blank');
    }

    function openProfile() {
        // window.open('profile-page.html', '_blank');
    }

    function openHome() {
        window.open('../../../Home/MVC/Views/home.php', '_blank');
    }

    function openDashboard() {
        window.location.href = 'dashboard.php';
    }

    function openHospitalSetup() {
        window.location.href = 'hospitalsetup.php';
    }

    function openInventory() {
        window.location.href = 'inventory.php';
    }

    function openReport() {
        window.location.href = 'report.php';
    }

    function openSettings() {
        window.location.href = 'settings.php';
    }

    function logout() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'logout.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    xhr.open('GET', 'logout.php?destroy=true', true);
                    xhr.send();
                    window.location.href = '../../../Home/MVC/Views/home.php';
                } else {
                    console.error('Logout failed:', xhr.responseText);
                }
            }
        };
        xhr.send();
    }

 
</script>
</body>
</html>
