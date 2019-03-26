<?php require 'Top.php' ?>

<main>

<body>
    <section class="login-status">
    <?php
             if(isset($_SESSION['userId']))
            {
                echo '<p>You are logged in!</p>';
            }
            else
            {
                echo '<p>You are logged out!</p>';
            } 
    ?>      
    </section>



</body>



</main>
