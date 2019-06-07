
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>
<script src="../materialize/js/init.js"></script>


<!--navbar-->
<nav id="menu-haut">
    <div class="nav-wrapper #00695c teal darken-3">
        <a href="#" data-activates="mobile-demo" class="button-collapse">
            <i class="material-icons">menu</i>
        </a>
        <!--Menu en mode normal-->
        <ul class="left hide-on-med-and-down">
            <li><i class="material-icons"><a href="PetsList.php">class</a></i></li>
            <li><a href='PetsList.php'>Mes animaux</a></li>
            <li><a href='PetAddWeight.php'>Nouveau poids</a></li>
            <li><a href='PetGrafic.php'>Graphiques</a></li>
        </ul>
        <ul href="#" class="brand-logo center hide-on-med-and-down">Pet-Weight</ul>
        <ul class="right hide-on-med-and-down">
            <?php
            //Si l'utilisateur est connecté alors il peut se déconnecter.
            if(isset($_SESSION['Pseudo']))
            {
                echo "<li><a class='waves-light modal-trigger' href='../Pages/user.php'>$_SESSION[Pseudo]</a></li>";
                echo "<li><a href='../php/disconnection.php' class='waves-effect waves-light btn red'>Déconnexion</a></li>";
            }
            ?>
        </ul>
        <!--Menu en mode mobile-->
        <ul id="mobile-demo" class="side-nav">
            <li><a href='PetsList.php'>Mes animaux</a></li>
            <li><a href='PetAddWeight.php'>Nouveau poids</a></li>
            <li><a href='PetGrafic.php'>Graphiques</a></li>
            <?php
            //Si l'utilisateur est connecté alors il peut se déconnecter.
            if(isset($_SESSION['Pseudo']))
            {
                echo "<li><a class='waves-light modal-trigger' href='../Pages/user.php'><b>$_SESSION[Pseudo]</b></a></li>";
                echo "<li><a href='../disconnection.php' class='waves-effect waves-light btn red'>Déconnexion</a></li>";

            }
            ?>
        </ul>
    </div>
</nav>

