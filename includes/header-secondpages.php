<header>
    <div class="header-content">
        <a href="/"><img src="../assets/img/Logo.png" alt="logo" id="header-logo-link"></a>
        
        <nav>
            <ul id="nav">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="../events.php">Evènements</a></li>
                <li><a href="../courses.php">Cours</a></li>
                <li><a href="../formations.php">Formations</a></li>
                <li class="nav-separator">|</li>
                <li class="nav-item">
  <a class="nav-link" href="<?php echo isset($_SESSION['user']) ? '../account/profile.php' : '../account/customers.php'; ?>">Espace client</a>
</li>

            </ul>
        </nav>
    </div>
</header>