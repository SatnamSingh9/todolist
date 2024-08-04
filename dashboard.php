<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="./task_style.css">
</head>
<body>
    <h1>Welcome to Cafe <i>To-Do Tasks </i>portal</h1>  

<main>
      <div class="divider"></div>

      <!-- Class to display links to all pages-->
      <div class="container_head">
        <a href="//localhost/Demo/todolist/dashboard.php" class="citem">Tasks</a>
        <a href="//localhost/Demo/todolist/addnewtask.html" class="citem">Add New Task</a>
        <a href="//localhost/Demo/todolist/completetask.php" class="citem">Complete Task</a>
       </div>

        <div class ="container">
            <div class ="row">
                <div class = "col-md-12">
                        <div class ="card mt-4">
                            <div class ="card-header">
                                <h5>Selection criteria</h5>
                            </div>
                            <div class="card-body">

                            <form action ="" method="GET">
                                <div class = "row">
                                    <label for="">Status:</label>
                                    <select name ="status_filter" class="form-control">
                                        <option value="open">Open</option>
                                        <option value="closed">Closed</option>
                                        <option value="all">All</option>
                                    </select>
                                </div>

                                <div class = "row">
                                    <label for="">Priority:</label>
                                    <select name ="priority_filter" class="form-control">
                                        <option value="both">Both</option>
                                        <option value="normal">Normal</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                </div>

                                <div class ="col-md-4">
                                    <div class="input-group mb-3">
                                        <label for="">Sort By:</label>
                                        <select name ="sort_by" class="form-control">
                                            <option value="asc">Newest First</option>
                                            <option value="desc">Oldest First</option>
                                        </select>
                                    </div>

                                <div class="col-md-4">
                                    <label for=""> Click Me</label>
                                    <button type="submit" class="btn btn-primary px-4">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>To-Do Tasks</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                        <?php
                            include('dbconnection.php');

                            $filter_status = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
                            $filter_priority = isset($_GET['priority_filter']) ? $_GET['priority_filter'] : '';
                            $sort_order = isset($_GET['sort_by']) ? $_GET['sort_by'] : ''; 
                            
                            $query = "select * from tasks"; 
                            
                            if (isset($filter_status)){

                                if($filter_status == "open"){
                                    // echo '<p>' . $filter_status. '</p>';
                                    $query .= " where status = '$filter_status'";
                                } elseif($filter_status == "closed"){
                                    // echo '<p>' . $filter_priority. '</p>';
                                    $query .= " where status = '$filter_status'";
                                } else {
                                    // echo '<p>' . $sort_order. '</p>';
                                    $query .= " where status IN ('open', 'closed')";
                                }
                           
                            
                            
                            };

                            if (isset($filter_priority)){

                                if($filter_priority == "normal"){
                                    $query .= " and priority = '$filter_priority'";
                                } elseif($filter_priority == "urgent"){
                                    $query .= " and priority = '$filter_priority'";
                                } else {
                                    $query .= " and priority IN ('normal', 'urgent')";
                                }

                            };

                            if (isset($sort_order)){

                                if($sort_order == "asc"){
                                    $query .= " ORDER BY raised_on $sort_order";
                                } elseif($sort_order == "desc"){
                                    $query .= " ORDER BY raised_on $sort_order";
                                }

                            };

                            $query .= ";";

                            $query_run = mysqli_query($conn, $query);

                            echo '<div id="filter_result">';
                            echo '<table>';
                            echo '<tr>';
                            echo '<th class="theading">Task Number</th>';
                            echo '<th class="theading">Heading</th>';
                            echo '<th class="theading">Instrustions</th>';
                            echo '<th class="theading">Raised On</th>';
                            echo '<th class="theading">Date</th>';
                            echo '<th class="theading">Priority</th>';
                            echo '<th class="theading">Status</th>';
                            echo '</tr>';
                            echo "<br>";
                            while($row = mysqli_fetch_array($query_run)){
                                echo '<tr>';
                                    echo '<td class="theading">' . $row[1]. '</td>';
                                    echo '<td class="theading">' . $row[2] . '</td>';
                                    echo '<td class="theading">' . $row[2] . '</td>';
                                    echo '<td class="theading">' . $row[3] . '</td>';
                                    echo '<td class="theading">' . $row[4] . '</td>';
                                    echo '<td class="theading">' . $row[5] . '</td>';
                                    echo '<td class="theading">' . $row[6] . '</td>';
                                    echo '</tr>';
                            }
                            echo '</table>';
                            echo "</div>";

                        ?>
                    </div>
                </div>
            </div>
 </main>
</body>
</html>