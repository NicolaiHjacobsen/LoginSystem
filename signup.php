<link rel="stylesheet" href="css/signup.css">
<title>SIGNUP</title>

<main>
    <section class="section-default">
        <h1>Signup</h1>
        <?php
        if(isset($_GET['error']))
        {
            if($_GET['error'] == "emptyfields")
            {
                echo '<p class="errorCheck">Fill in all the fields!';
            }
            else if($_GET['error'] == "invalidmailuid")
            {
                echo '<p class="errorCheck">Invalid username and e-mail!';
            }
            else if($_GET['error'] == "invalidmail")
            {
                echo '<p class="errorCheck">Invalid e-mail!';
            }
            else if($_GET['error'] == "invaliduid")
            {
                echo '<p class="errorCheck">Invalid username!';
            }
            else if($_GET['error'] == "invaliduid")
            {
                echo '<p class="errorCheck">Invalid username!';
            }
            else if($_GET['error'] == "passwordcheck")
            {
                echo '<p class="errorCheck">Your passwords do not match!';
            }
        }
        else if($_GET['signup'] == "success")
        {
            echo '<p class="successCheck">success!';
        }
    ?>
        <form action="includes/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
        </form>
        <a href="../index.php">BACK</a>
    </section>
</main>