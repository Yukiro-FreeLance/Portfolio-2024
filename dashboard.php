<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Include database connection file
include('db_con.php');

// Edit Project Functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['editProject'])) {
    // Retrieve project details from the form
    $projectId = $_POST['projectId'];
    $projectName = $_POST['projectName'];
    $projectType = $_POST['projectType'];
    $progressPercentage = $_POST['progressPercentage'];

    // Update project details in the database
    $sql = "UPDATE projects SET project_name = ?, project_type = ?, progress_percentage = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $projectName, $projectType, $progressPercentage, $projectId);
    if ($stmt->execute()) {
        // Project updated successfully
        // You can redirect to the dashboard or display a success message
    } else {
        // Error occurred while updating project
        // You can redirect to the dashboard or display an error message
    }
}

// Delete Project Functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteProject'])) {
    // Retrieve project ID from the form
    $projectId = $_POST['projectId'];

    // Delete project from the database
    $sql = "DELETE FROM projects WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $projectId);
    if ($stmt->execute()) {
        // Project deleted successfully
        // You can redirect to the dashboard or display a success message
    } else {
        // Error occurred while deleting project
        // You can redirect to the dashboard or display an error message
    }
}

// Function to get project count by status
function getProjectCount($conn, $status) {
    $sql = "SELECT COUNT(*) AS count FROM projects WHERE status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Get project counts
$progressProjects = getProjectCount($conn, 'In Progress');
$upcomingProjects = getProjectCount($conn, 'Upcoming');
$totalProjects = $progressProjects + $upcomingProjects;
?>

<!-- Your HTML code continues here -->



  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>

  <link rel="shortcut icon" href="img/logo-2.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/dashboard.css" />
  <script src="js/dashboard.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <title>Luche | Dashboard</title>

  <body>

    <div class="app-container">
      <div class="app-header">
        <div class="app-header-left">
          <span class="app-icon"></span>
          <p class="app-name">Portfolio</p>
          <div class="search-wrapper">
            <input class="search-input" type="text" placeholder="Search" />
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search" viewBox="0 0 24 24">
              <defs></defs>
              <circle cx="11" cy="11" r="8"></circle>
              <path d="M21 21l-4.35-4.35"></path>
            </svg>
          </div>
        </div>
        <div class="app-header-right">
          <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
              <defs></defs>
              <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
          </button>
          <button class="add-btn" title="Add New Project">
            <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
              <line x1="12" y1="5" x2="12" y2="19" />
              <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
          </button>
          <button class="notification-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
              <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
              <path d="M13.73 21a2 2 0 0 1-3.46 0" />
            </svg>
          </button>
          <button class="profile-btn">
            <img src="img/logo-2.png" />
            <span>Wendel Luche</span>
          </button>
          <button class="profile-btn" id="logout-btn">
            <span>Log out</span>
          </button>
          <script>
            document.getElementById('logout-btn').addEventListener('click', function() {
              // Perform AJAX request to log out user
              var xhr = new XMLHttpRequest();
              xhr.open('POST', 'logout.php', true);
              xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
              xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                  // Redirect to index.php after successful logout
                  window.location.href = 'index.php';
                }
              };
              xhr.send();
            });
          </script>

        </div>
        <button class="messages-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
          </svg>
        </button>
      </div>
      <div class="app-content">
        <div class="app-sidebar">
          <a href="" class="app-sidebar-link active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
              <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
          </a>
          <a href="" class="app-sidebar-link">
            <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-pie-chart" viewBox="0 0 24 24">
              <defs />
              <path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
            </svg>
          </a>
          <a href="" class="app-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
              <line x1="16" y1="2" x2="16" y2="6" />
              <line x1="8" y1="2" x2="8" y2="6" />
              <line x1="3" y1="10" x2="21" y2="10" />
            </svg>
          </a>
          <a href="" class="app-sidebar-link">
            <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-settings" viewBox="0 0 24 24">
              <defs />
              <circle cx="12" cy="12" r="3" />
              <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
            </svg>
          </a>
        </div>
        <div class="projects-section">
          <div class="projects-section-header">
            <p>Projects</p>
            <p class="time" id="currentDate"></p>

            <script>
              // Get current date
              var currentDate = new Date();

              // Get month, day, and year
              var month = currentDate.toLocaleString("default", {
                month: "long"
              });
              var day = currentDate.getDate();
              var year = currentDate.getFullYear();

              // Display the date in the HTML element
              document.getElementById("currentDate").innerHTML = month + " " + day + ", " + year;
            </script>
          </div>


          <div class="projects-section-line">
            

            <div class="projects-status">
              <div class="item-status">
                <span class="status-number"><?php echo $progressProjects; ?></span>
                <span class="status-type">In Progress</span>
              </div>
              <div class="item-status">
                <span class="status-number"><?php echo $upcomingProjects; ?></span>
                <span class="status-type">Upcoming</span>
              </div>
              <div class="item-status">
                <span class="status-number"><?php echo $totalProjects; ?></span>
                <span class="status-type">Total Projects</span>
              </div>
            </div>


            <div class="view-actions">
              <button class="view-btn list-view" title="List View">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list">
                  <line x1="8" y1="6" x2="21" y2="6" />
                  <line x1="8" y1="12" x2="21" y2="12" />
                  <line x1="8" y1="18" x2="21" y2="18" />
                  <line x1="3" y1="6" x2="3.01" y2="6" />
                  <line x1="3" y1="12" x2="3.01" y2="12" />
                  <line x1="3" y1="18" x2="3.01" y2="18" />
                </svg>
              </button>
              <button class="view-btn grid-view active" title="Grid View">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                  <rect x="3" y="3" width="7" height="7" />
                  <rect x="14" y="3" width="7" height="7" />
                  <rect x="14" y="14" width="7" height="7" />
                  <rect x="3" y="14" width="7" height="7" />
                </svg>
              </button>
            </div>
          </div>
          <div class="project-boxes jsGridView">

            <?php
            // Assuming you have already established a database connection and fetched data into $result
            $sql = "SELECT * FROM projects";
            $result = mysqli_query($conn, $sql);
            // Check if there are any projects
            if (mysqli_num_rows($result) > 0) {
              // Loop through each project and generate the HTML for the project box
              while ($row = mysqli_fetch_assoc($result)) {
                $projectId = $row['id'];
                $projectDate = $row['project_date'];
                $projectName = $row['project_name'];
                $projectType = $row['project_type'];
                $progressPercentage = $row['progress_percentage'];
                $daysLeft = $row['days_left'];
                // You can fetch participants' data and other relevant information as needed

                // Generate HTML for the project box
                echo '<div class="project-box-wrapper">';
                echo '<div class="project-box" style="background-color: #d5deff">';
                echo '<div class="project-box-header">';
                echo '<span>' . $projectDate . '</span>';
                echo '<div class="more-wrapper">';
                echo '<button class="project-btn-more">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical">';
                echo '</svg>';
                echo '</button>';
                echo '</div>';
                echo '</div>';
                echo '<div class="project-box-content-header">';
                echo '<p class="box-content-header">' . $projectName . '</p>';
                echo '<p class="box-content-subheader">' . $projectType . '</p>';
                echo '</div>';
                echo '<div class="box-progress-wrapper">';
                echo '<p class="box-progress-header">Progress</p>';
                echo '<div class="box-progress-bar">';
                echo '<span class="box-progress" style="width: ' . $progressPercentage . '%; background-color: #4067f9"></span>';
                echo '</div>';
                echo '<p class="box-progress-percentage">' . $progressPercentage . '%</p>';
                echo '</div>';
                echo '<div class="project-box-footer">';
                // Add participants and days left information here
                echo '<div class="participants">';
                // Add participants' images here
                echo '</div>';
                echo '<div class="days-left" style="color: #4067f9">' . $daysLeft . ' Days Left</div>';
                echo '<div class="more-options">';
                echo '<button type="button" class="btn edit-btn" style="background-color: #4CAF50; font-size: 12px; padding:2px 10px 2px 10px; color: white; margin-right: 8px; margin-top: 10px; border-radius: 25px" onclick="showEditModal(' . $projectId . ')">Edit</button>';
                echo '<button type="button" class="btn delete-btn" style="background-color: #ff2600; font-size: 12px; padding:2px 10px 2px 10px; color: white; margin-right: 8px;  margin-top: 10px; border-radius: 25px"  onclick="showDeleteModal(' . $projectId . ')">Delete</button>';
                echo '</div>';

                echo '</div>';
                echo '</div>';
                echo '</div>';

               // Add the edit modal
                echo '<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">';
                echo '  <div class="modal-dialog">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h2>Edit Project</h2>';
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>';
                echo '</div>';
                echo '<div class="modal-body">';
                // Edit Form
                echo '<form id="editForm">';
                echo '<div class="form-group">';
                echo '<label for="projectName">Project Name:</label>';
                echo '<input type="text" class="form-control" id="projectName" name="projectName" value="' . $projectName . '">';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="projectType">Project Type:</label>';
                echo '<input type="text" class="form-control" id="projectType" name="projectType" value="' . $projectType . '">';
                echo '</div>';
                echo '<div class="form-group">';
                echo '<label for="progressPercentage">Progress Percentage:</label>';
                echo '<input type="number" class="form-control" id="progressPercentage" name="progressPercentage" min="0" max="100" value="' . $progressPercentage . '">';
                echo '</div>';
                echo '</form>';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                echo '<button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';




                // Add the delete modal
                echo '<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">';
                echo '  <div class="modal-dialog">';
                echo '<div class="modal-content">';
                echo '<div class="modal-header">';
                echo '<h2>Delete Project</h2>';
                echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>';
                echo '</div>';
                echo '<div class="modal-body">';
                echo 'Are you sure you want to delete this project?';
                echo '</div>';
                echo '<div class="modal-footer">';
                echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
                echo '<button type="button" class="btn btn-danger">Delete</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                
              }
            } else {
              echo "No projects found.";
            }

            
            ?>

          </div>
        </div>

        <div class="messages-section">
          <button class="messages-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
              <circle cx="12" cy="12" r="10" />
              <line x1="15" y1="9" x2="9" y2="15" />
              <line x1="9" y1="9" x2="15" y2="15" />
            </svg>
          </button>

          <div class="projects-section-header">
            <p>Client Messages</p>
          </div>
          <div class="messages">
          <?php

              $sql = "SELECT * FROM messages";
              $result = mysqli_query($conn, $sql);

              // Check if any rows were returned
              if (mysqli_num_rows($result) > 0) {
                  // Loop through each row of data
                  while ($row = mysqli_fetch_assoc($result)) {
                      // Retrieve data from the current row
                      $profileImage = $row['profile_image'];
                      $name = $row['name'];
                      $email = $row['email'];

                      $message = $row['message_content'];
                      $date = $row['timestamp'];
                      if (empty($profileImage)) {
                        // Set default image URL
                        $defaultImage = 'img/noimage.png';
                        // Use default image URL
                        $profileImage = $defaultImage;
                    }
            
                      // Echo the message box structure with the fetched data
                      echo '<div class="message-box">';
                      echo '<img src="' . $profileImage . '" alt="profile image" />';
                      echo '<div class="message-content">';
                      echo '<div class="message-header">';
                      echo '<div class="name">' . $name . '</div>';
                      echo '</div>';
                      echo '<p class="message-line">' . $message . '</p>';
                      echo '<p class="message-line time">' . $date . '</p>';
                      echo '</div>';
                      echo '</div>';
                  }
              } else {
                  // No rows were returned from the query
                  echo "No messages found.";
              }

              // Close the database connection
              mysqli_close($conn);
              ?>


          </div>
        </div>
      </div>
    </div>
    <script>
      function showEditModal(projectId) {
          // You can fetch the project details and populate the edit modal form here
          // For example, you can use AJAX to fetch the project details based on the projectId
          // Once you have the details, populate the form and show the modal
          $('#editModal').modal('show');
      }

      function showDeleteModal(projectId) {
          // Set the projectId in the delete modal form (if needed)
          // Show the delete modal
          $('#deleteModal').modal('show');
      }
  </script>

  </body>

  </html>