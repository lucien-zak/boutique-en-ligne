<header>
    <nav>
        <a <?= $params['titre'] == "Accueil" ? "class='color-orange'" : "";?> href="/"><i class="fas fa-home"></i></a>
        <a <?= $params['titre'] == "Produits" || "Produit" ? "class='color-orange'" : "";?> href="/products"><i class="color fas fa-record-vinyl"></i></a>
        <a <?= $params['titre'] == "Panier" ? "class='color-orange'" : "";?> href="/cart"><i class="color fas fa-shopping-cart"></i></a>
        <a <?= $params['titre'] == "Account" || "Profil" || "Vos Adresses" || "Vos Paiements" ? "class='color-orange'" : "";?> href="/account"><i class="color fas fa-user"></i></a>
    </nav>
</header>