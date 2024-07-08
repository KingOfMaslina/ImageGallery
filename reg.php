<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="in.css" rel="stylesheet">
    <title>ImSite</title>
</head>
<body class ="bodyreg">
        <main class="mainreg">
        <div class="logdivreg">
            <img class ="imgreg" src="logo.png">
        </div>

            <form action="userreg.php" method="post" enctype="multipart/form-data" class="formreg_tw" >
                <label for="avatar">Select Avatar</label>
                <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" />
                <input type="text" placeholder="MAIL" name="mail">
                <input type="text" placeholder="LOGIN" name="login">
                <input type="text" placeholder="PASSWORD" name="pass">
                <input type="submit" value="Sign up">

        </form> 
        <button type="button" class="reg"><a href="index.php">BACK</a></button> 
            
        </main>
</body>
</html>