<head>
    <title>UCalgary Secondhand Online Store</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body class="grey lighten-4">
<nav class="white z-depth-0">
    <div class="container">
        <a href="#" class="brand-logo brand-text">UCalgary Secondhand Online Store</a>
        <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="index.php" class="btn brand z-depth-0">BACK</a></li>
        </ul>
    </div>
</nav>

<?php
include "Utility.php";

if (isset($_POST['submit'])) {
    echo $_POST['ucid'] . '<br />';
    echo $_POST['username'] . '<br />';
    echo $_POST['password'] . '<br />';
    echo $_POST['email'] . '<br />';
    echo $_POST['phone_number'] . '<br />';
    echo $_POST['address'] . '<br />';
}

?>

<section class="container grey-text">
    <h5 class="center">Reset your account</h5>

    <form class="white" action="index.php" method="POST">

        <label>UCID</label>
        <label>
            <input type="text" name="ucid">
        </label>
        <label></label>

        <label>Campus Email</label>
        <label>
            <input type="text" name="email">
        </label>
        <label></label>

        <label>Password Question</label>
        <label>
            <input type="text" name="question">
        </label>
        <label></label>

        <label>Answer of the Question</label>
        <label>
            <input type="text" name="answer">
        </label>
        <label></label>

        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('footer.php'); ?>