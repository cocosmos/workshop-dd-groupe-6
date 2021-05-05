<?php 
include 'bdd.php';
include 'header.php';?>
<body>
    <div class="index">
        <div class="container">
            <div class="row">
                <div class="index__left">
                    <p>Et si vous preniez conscience de l’énergie que consomme votre boite mail…</p>

                    <h1>E-Cobox vous aide à comprendre comment réduire sa Pollution numérique</h1>
                </div>
                <div class="index__right">
                    <img src="media/GIF/2.gif" alt="" width="460">
                </div>
    
            </div>
            <div class="row">
                <div class="button__left">
                    <img src="media/GIF/3.gif" alt="" width="460" >
                </div>
                <?php if(!isset($_COOKIE["name"])){
                    echo "<div class='button__right'>
                    <a class='btn btn__dark' href='register.php'>Connectez votre boîte mail</a>
                    <p>*E-Cobox s'engage à ne garder aucune information sur votre boîte mail</p>
                    </div>";
                }else{
                    echo "<div class='button__right'>
                    <a class='btn btn__dark' href='profile.php'>Voir le profil</a>
                    </div>";
                }
                ?>
                
            </div>
        </div>
    </div>

</body>
<?php include 'footer.php';?>

