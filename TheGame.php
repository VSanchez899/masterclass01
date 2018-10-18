<!DOCTYPE html>
<html lang="en" style="background-color: black;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <script></script> -->
</head>
<body>
<!-- This is the form that the page display to the user to send data to the back end-->
        <form action="TheGame.php" method="post"><br>
        <p style="text-align: center; border: 1px solid red; color: white; ">
        Username:<br> <input type="text" name="Uname" required><br>
        password:<br> <input type="text" name="pass" required><br>
        Screen Name:<br> <input type="text" name="Sname" required><br>
        Your full name:<br> <input type="text" name="name" required><br>
        Your Email:<br> <input type="text" name="email" required><br>
        Your Age :<br> <input type="select" name="age" min="13" max="85" required><br>Must Be 13 or above<br>
        <textarea name="comment" cols="100" rows="6"></textarea><br>
        <input type="submit" name="submit" value="Submit Your Response"><br>
        </p>
        </form>
        <h3 style="text-align: center; color: white;">Leaderboard</h3>
    <?php
    $dir = "./TheGamers.txt";
    if (is_dir($dir)) {
        if (isset($_POST['submit'])) {
            //this takes the information from the form and writes it into a text file that was chosen
                $gameString = stripslashes($_POST['Uname']) . " Username" . "\n";
                $gameString .= stripslashes($_POST['pass']) . " Password" . "\n";
                $gameString .= stripslashes($_POST['name']) . " Full name" . "\n";
                $gameString .= stripslashes($_POST['Sname']) ." Screenname" . "\n";
                $gameString .= stripslashes($_POST['email']) . " Email" . "\n";
                $gameString .= stripslashes($_POST['age']) . " Age" . "\n";
                $gameString .= stripslashes($_POST['comment']) . " Comment" . "\n";
                $Uname = $_POST['Sname'];
                $saveFileName = "$dir/TheGame.txt";
                if (file_put_contents($saveFileName, $gameString) > 0) {
                    echo "<p style='text-align: center; color: white;'>Info was successfully saved<br><p>\n";
                    echo "<p style='text-align: center; color: white; margin-left: auto; margin-right: auto;'>$Uname<p>";
                } else {
                    echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                }
               }
   }else {
        mkdir($dir);
        //this changes the mode of the server to allow certain permissions like writing or creating a file on a server
        chmod($dir, 0757);
   }
    ?>
</body>
</html>