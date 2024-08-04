<?php
 $useractions = ["Activate", "Terminate", "Delete"];

 function generateOptions($array) {
     $options = "";
     foreach ($array as $value) {
         $options .= "<option>$value</option>";
     }
     return $options;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./task_style.css">
</head>
<body>

<main>
      <div class="divider"></div>
      <h2> Specify user and Action: </h2>

        <form action="updateuser.php" method="POST">

            <div class="textfield">
                <label for="heading">Select User Name:</label><br>
                <input type="text" name="selecteduser" id="selecteduser" placeholder="User ID" size = 10 required><br>
            </div>

            <label> Select Action:</label>
            <select name="user-action" >
                <option>Select Action</option>
                <?php echo generateOptions($useractions); ?>
            </select>

            <div class = "buttonfield">
                <button type="submit" id="submit">Update User</button>
                
            </div>


        </form>

</body>
</html>        