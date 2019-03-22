<link rel="stylesheet" href="css/signup.css">
<title>SIGNUP</title>

<main>
    <section class="section-default">
        <h1>Signup</h1>
        <form action="includes/signup.inc.php" method="POST">
            <input type="text" name="uid" id="Username" placeholder="Username">
            <input type="text" name="mail" id="E-mail" placeholder="E-mail">
            <input type="text" name="pwd" id="pwd" placeholder="Password">
            <input type="text" name="repeat-pwd" id="pwd" placeholder="Repeat password">
            <button type="submit" name="signup-submit">Signup</button>
        </form>
        <a href="../index.php">BACK</a>
    </section>
</main>