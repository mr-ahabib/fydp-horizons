<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU Fydp Horizon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="group.css">
    
</head>
<body>

<div>
    <?php include('navbar.php'); ?>
   </div>
    <br> <br><br><br><br>

            <div class="square">
                <br>
                <h1 style="text-align: center; font-weight: bold; color: #3a94dd;">Create a Group</h1>
                  
                <form class="innerForm" action="create.php" method="POST">
                
                    <input class="input" type="text" placeholder="   Group Name" name="gname" id="gname"><br>
                   
                    <input class="input" type="text" placeholder="   Member Limit  " name="limits" id="limits"><br>
                    <input class="input" type="text" placeholder="   Field Name" name="field" id="field"><br>  
                    <input class="description" type="text" placeholder="   Write a description..." name="des" id="des"><br>
                    <button class="button" type="submit">Create</button>
               
                </form>
                

            </div>
    
</body>

</html>