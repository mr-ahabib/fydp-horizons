<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Creating</title>
    <link rel="stylesheet" href="group.css">
</head>

<body>

    <div id="main_div">

        <div class="header">
            <a href="https://www.uiu.ac.bd/" class="logo"><img width="70px" src="./img/uiu_logo.png"></a>
            <a href="#fydpHorizon" class="name">UIU FYDP Horizon</a>
    
            <div class="header-right">
              <a href="#home"><img width="40px" src="./img/mess.webp"></a>
              <a href="#home"><img width="40px" src="./img/images.png"></a>
            </div>
        </div>
        


        <div class="form_div">
            <div class="square">
                <br>
                <h1 style="text-align: center; font-weight: bold; color: #3a94dd;">Create a Group</h1>
                  
                <form action="create.php" method="POST">
                
                    <input class="input" type="text" placeholder="   Group Name" name="gname" id="gname"><br>
                   
                    <input class="input" type="text" placeholder="   Member Limit  " name="limits" id="limits"><br>
                    <input class="input" type="text" placeholder="   Field Name" name="field" id="field"><br>  
                    <input class="description" type="text" placeholder="   Write a description..." name="des" id="des"><br>
                    <button class="button" type="submit">Create</button>
               
                </form>
                

            </div>
        </div>



    </div>
    
    
</body>

</html>