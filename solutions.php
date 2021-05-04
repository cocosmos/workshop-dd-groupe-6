<?php 
include 'bdd.php';
include 'header.php';?>
<body>
    <div class="containersolution">
        <div class="title">
            <h1>La Pollution Numérique</h1>
            <p>Quelles solutions ?</p>
        </div>

        <div class="textlink">
            <div class="online"><a href=#online>
                <h4>sur internet</h4>
                <img src="media/pictosolution/wifi5.png" width="207px">
            </a></div>

            <div class="athome"><a href="#athome">
                <h4>a la maison</h4>
                <img src="media/pictosolution/maison4.png" width="153px">
            </a></div>

            <div class="atwork"><a href="#atwork">
                <h4>en entreprise</h4>
                <img src="media/pictosolution/travail5.png" width="169px">
            </a></div>
        </div>
    </div>

    <div class="solutiontext">
        <!--Online-->
        <div class="onlinetext">
            <div id="online" class="online">
                <h4>sur internet</h4>
                <img src="media/pictosolution/wifi4.png" width="207px">
            </div>
            
            <div class="casetexte1">
                <h1><span>Désabonnez-vous</span><br>Des newsletters qui ne vous intéressent plus !</h1>
                <p>En le limitant le trafic, vous faites un geste pour la planète, vous évitez de faire tourner des serveurs pour stocker tous vos messages.</p> 
            </div>

            <div class="casetexte2">
                <h1><span>Fermez</span><br> vos onglets dans votre navigateur!</h1>
                <p>Prendre le temps de trier ses onglets a un impact bénéfique sur l’environnement. Que vous l’utilisiez ou pas, une fois ouvert l’onglet fait tourner des serveurs qui consomment beaucoup d’électricité.</p> 
            </div>

            <div class="casetexte3">
                <h1><span>Supprimez</span><br> vos anciennes adresses!</h1>
                <p>En effet même si vous n’avez pas été sur cette boite mail depuis des années, vous continuez à recevoir des messages, qui s’entassent et font tourner des serveurs pour les stocker. </p> 
            </div>

            <div class="casetexte4">
                <h1><span>Installez</span><br> un moteur de recherche écoresponsable!</h1>
                <p>Pourquoi ne pas penser à Ecosia et faire un geste pour la planète sans changer vos habitudes ?</p> 
            </div>

            <div class="casetexte5">
                <h1><span>Contournez</span><br> les moteurs de recherche!</h1>
                <p>Si vous la connaissez, entrez directement l’adresse d’un site dans votre navigateur au lieu de passer par une recherche sur le web. Vous gagnerez du temps et économiserez de l’énergie.</p> 
            </div>
        </div>
        <!--At home-->
        <div class="athometext">

            <div id="athome" class="athome">
                <h3>a la maison</h3>
                <img src="media/pictosolution/maison4.png" width="153px">
            </div>

            <div class="casetexte6">
                <h1><span>Éteignez</span><br> votre box internet la nuit et durant vos absences!</h1>
                <p>Ces appareils consomment beaucoup d’électricité, même lorsque vous n’êtes pas en train d’utiliser internet. Leur consommation annuelle se situe entre 150 et 300 kWh, soit autant qu’un grand réfrigérateur!</p> 
            </div>

            <div class="casetexte7">
                <h1><span>Rallongez</span><br>  la durée de vie de vos machines!</h1>
                <p>Selon l’ADEME passer de 2 à 4 ans d’usage pour une tablette ou un ordinateur améliore de 50% son bilan environnemental.</p> 
            </div>

            <div class="casetexte8">
                <h1><span>Privilégiez</span><br> la TNT plutôt que l’ADSL!  </h1>
                <p>vous consommerez beaucoup moins et la planète vous remerciera ! À noter que la 4G consomme 23 fois plus d’énergie que le WIFI donc quand vous êtes chez vous, pensez à la désactiver. </p> 
            </div>

            <div class="casetexte9">
                <h1><span>Visionnez</span><br> vos vidéos en basse définition.</h1>
                <p>Si vous regardez un clip sur votre téléphone portable, une résolution de 240p sera suffisante. Une série sur votre ordinateur portable? 720p fera l’affaire.</p> 
            </div>

            <div class="casetexte10">
                <h1><span>Le mode</span><br> économie d’énergie est votre ami ! </h1>
                <p>Ce mode permet à votre batterie de tenir plus longtemps. Vous rechargez donc moins votre appareil et consommez moins d’électricité!</p> 
            </div>

            <div class="casetexte11">
                <h1><span>Bloquez</span><br> la lecture automatique sur les réseaux sociaux!</h1>
                <p>Un utilisateur YouTube pourrait réduire sa consommation de Co2 de 323 000 tonnes par an rien qu’en stoppant la lecture automatique.</p> 
            </div>
        </div>
            <!-- atwork-->
        <div class="atworktext">
            <div id="atwork" class="atwork">
                <h4>en entreprise</h4>
                <img src="media/pictosolution/travail4.png" width="169px">
            </div>

            <div class="casetexte12">
                <h1><span>Faites</span><br> régulièrement le tri dans vos mails!</h1>
                <p>Vos centaines de mails ouverts qui patientent dans votre boîte de réception sont stockés sur des serveurs qui consomment de l’énergie !</p> 
            </div>

            <div class="casetexte13">
                <h1><span>Modifiez</span><br> votre façon de communiquer!</h1>
                <p>Pourquoi ne pas remplacer les mails par un coup de fil moins gourmand en énergie qui permet souvent une réponse beaucoup plus rapide.</p> 
            </div>

            <div class="casetexte14">
                <h1><span>Utilisez</span><br> le mail plus raisonnablement! </h1>
                <p>Cela permet de désactiver ou désinstaller les applications non utilisées sur vos appareils. Cela fait du bien à vos outils de travail qui sont plus rapides et performant une fois allégé.</p> 
            </div>

            <div class="casetexte15">
                <h1><span>Demandez</span><br> à faire un bilan de votre activité numérique!</h1>
                <p>Cela permet de désactiver ou désinstaller les applications non utilisées sur vos appareils. Cela fait du bien à vos outils de travail qui sont plus rapides et performant une fois allégé.</p> 
            </div>

            <div class="casetexte16">
                <h1><span>Ne misez</span><br> pas tout sur le Cloud ! </h1>
                <p>Mettez à jour votre Cloud régulièrement en supprimant les fichiers inutiles, les doublons et favorisez l’archivage sur votre ordinateur ou sur un disque dur.</p> 
            </div>

            <div class="casetexte17">
                <h1><span>Utiliser</span><br> un ordinateur portable plutôt qu’un poste fixe!</h1>
                <p>Les ordinateurs portables consomment 50 à 80% d’énergie de moins que les postes fixes.</p> 
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php';?>