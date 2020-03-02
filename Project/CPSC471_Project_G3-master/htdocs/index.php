<html>

<head>
    <meta charset="utf-8">
    <title>UCalgary Online Secondhand Trading System</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <?php
    include "Utility.php";
    ?>
</head>

<!-- global font style -->
<body style="font-family: Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace;">

<div id="container" style="width:100%">

    <div id="header">
        <form style="margin-top:20px;"
                method="post"
              action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <fieldset>
                <legend>Login</legend>
                Username <label>
                    <input type="text" size="30" name="username" style = "font-size:15px">
                </label><br>
                Password <label>
                    <input type="password" size="30" name="password" style = "font-size:15px">
                </label><br>
                <input type="submit" name="login" value="Login" style = "font-size:20px">
                <input type="submit" name="register" value="Register" style = "font-size:20px" formaction="./register.php" >
                <input type="submit" name="reset" value="Reset" style = "font-size:20px" formaction="./reset.php" >
            </fieldset>
        </form>
    </div>
    <?php

    // Create connection
    $conn = Utility\get_a_connection();

    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        // Check if the username and the password exists
        $sql = $conn->prepare("select * from client where username = ? and password = ?");
        $sql->bind_param("ss", $_POST['username'], $_POST['password']);
        $sql->execute();

        // No matches found, pop out a message
        if ($sql->get_result()->num_rows === 0) {
            Utility\alert("Wrong username or password!");
        } else {
            echo "登陆成功";    // username_100000: abcdefgh
        }

        $sql->close();
    }


    //$sql = "select * from ucalgary_member";
    //$result = $conn->query($sql);
    // Close connection
    //mysqli_close($conn);
    ?>


    <div id="menu"
         style="background-color:#cfcfcf;
         height:100%;
         width:20%;
         float:left;
         text-align: center">

        <b>菜单</b><br>
        HTML<br>
        CSS<br>
        JavaScript

        <table style="width:95%" align="center">
            <tr>
                <th>公告栏</th>
            </tr>
            <tr>
                <td>January</td>
            </tr>
            <tr>
                <td>February</td>
            </tr>
        </table>

    </div>

    <div id="content" style="background-color:#EEEEEE;width:80%;float:left;">
        <!-- 表格在这里 -->
        <table style="width:100%">
            <tr>
                <th>Month</th>
                <th>Savings</th>
            </tr>
            <tr>
                <td>January</td>
                <td align="right">$100</td>
            </tr>
            <tr>
                <td>February</td>
                <td align="right">$80</td>
            </tr>
        </table>
        <?php

        $sql = "select * from ucalgary_member";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // 输出数据
            while($row = $result->fetch_assoc()) {
                echo $row["balance"] . "<br>";
            }
        }
        // Close connection
        mysqli_close($conn);

        ?>
    </div>

    <div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
        UCalgary Online Secondhand Trading System - CPSC 471 Project Group 3
    </div>


</body>
</html>
