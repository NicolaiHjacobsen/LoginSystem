<link rel="stylesheet" href="css/signup.css">
<title>SIGNUP</title>

<main>
    <section class="section-default">
        <h1>Signup</h1>
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