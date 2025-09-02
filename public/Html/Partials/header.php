<header>
    <nav class="navbar">
        <a href="/" class="logo">RASENGAN</a>
        <div class="nav-links">
            <ul>
                <li<?= isset($page_active) && $page_active === 'accueil' ? ' class="active"' : '' ?>><a href="/">Accueil</a></li>
                <li<?= isset($page_active) && $page_active === 'catalogue' ? ' class="active"' : '' ?>><a href="/catalogue">Catalogue</a></li>
                <li<?= isset($page_active) && $page_active === 'collection' ? ' class="active"' : '' ?>><a href="/collection">Collection</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li<?= isset($page_active) && $page_active === 'connexion' ? ' class="active"' : '' ?>><a href="/compte">Connexion</a></li>
                    <li<?= isset($page_active) && $page_active === 'inscription' ? ' class="active"' : '' ?>><a href="/inscription">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="/Images/burger.png" alt="Menu Hamburger" class="menu-burger" />
    </nav>
</header>