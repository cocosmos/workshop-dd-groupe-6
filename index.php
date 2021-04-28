<?php 
include 'bdd.php';
include 'header.php';?>
<body>

    <p>Et si vous preniez conscience de l’énergie que conssomme votre boite mail…</p>

    <img class="green_paperplane" src="..."> <!--METTRE IMAGE PAPERPLANE-->

    <h1>E-Cobox vous aide à comprendre comment réduire sa Pollution numérique</h1>

    <form action="connection.php" method="post">
        <input type="email" placeholder="email" name="email" required>
        <input type="password" name="password" placeholder="Mot de passe d'applications" required>
        <button type="submit">Submit</button>
    </form>
</body>
<?php include 'footer.php';?>
