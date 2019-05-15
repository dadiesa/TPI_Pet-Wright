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
            <li><i class="material-icons"><a href="../index.php">class</a></i></li>
            <li><a href="../Pages/modal.php">Modal</a></li>
            <?php
            if(isset($_SESSION['Pseudo'])) {
                if ($userRole == "Admin") {
                    echo "<li><a href='../Pages/AddContent.php?type=add&id=0'>Ajouter</a></li>";
                }
            }
            echo "<li><a href='EvalGrafic.php'>Graphique</a></li>";
            ?>
            </ul>
            <a href="#" class="brand-logo center">Pet-Weight</a>
            <ul class="right hide-on-med-and-down">
            <?php
            //Si l'utilisateur est connecté alors il peut se déconnecter.
            if(isset($_SESSION['Pseudo']))
            {
                echo "<li><a class='waves-light modal-trigger' href='../Pages/user.php'>$_SESSION[Pseudo]</a></li>";
                echo "<li><a href='../php/disconnection.php' class='waves-effect waves-light btn red'>Déconnexion</a></li>";

            }
            //Sinon il peut se connecter ou s'inscrire
            else
            {
                echo "<li><a href='../Pages/loginPage.php' class='waves-effect waves-light btn'>Connexion</a></li>";
                echo "<li><a href='../Pages/registration.php' class='waves-effect waves-light btn'>Inscription</a></li>";
            }
            ?>
        </ul>
        <!--Menu en mode mobile-->
        <ul id="mobile-demo" class="side-nav">
            <li><i class="material-icons"><a href="../index.php">class</a></i></li>
            <li><a href="../Pages/modal.php">Modal</a></li>
            <?php
            if(isset($_SESSION['Pseudo'])) {
                if ($userRole == "Admin")
                {
                    echo "<li><a href='../Pages/AddContent.php?type=add&id=0'>Ajouter</a></li>";
                }
            }
            echo "<li><a href='EvalGrafic.php'>Graphique</a></li>";
            ?>
            <li><a href="#">Evaluer</a></li>
            <?php
            //Si l'utilisateur est connecté alors il peut se déconnecter.
            if(isset($_SESSION['Pseudo']))
            {
                echo "<li><a class='waves-light modal-trigger' href='../Pages/user.php'>$_SESSION[Pseudo]</a></li>";
                echo "<li><a href='../php/disconnection.php' class='waves-effect waves-light btn red'>Déconnexion</a></li>";

            }
            //Sinon il peut se connecter ou s'inscrire
            else
            {
                echo "<li><a href='../Pages/loginPage.php' class='waves-effect waves-light btn'>Connexion</a></li>";
                echo "<li><a href='../Pages/registration.php' class='waves-effect waves-light btn'>Inscription</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>
