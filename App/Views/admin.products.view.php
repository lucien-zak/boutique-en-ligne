<?php

// dump($params);

echo '<table><thead><tr><th>Image du produit</th><th>Designation du produit</th><th>Nom du produit</th><th>Artiste</th><th>Descritpion du produit</th><th>En stock</th><th>Catégorie du produit</th><th>Sous-catégorie du produit</th></thead>';
echo '<tbody>';
foreach ($params['products'] as $product) {
    echo '<tr>';
    echo '<td><img height="50" width="50" src="../assets/img/products/' . $product->slug . "-" . $product->id . '.png"></img></td>';
    echo '<td>' . $product->slug . '-' . $product->id . '</td>';
    echo '<td>' . $product->name . '</td>';
    echo '<td>' . $product->artist . '</td>';
    echo '<td>' . $product->description . '</td>';
    echo '<td>' . $product->stock . '</td>';
    echo '<td>' . $product->categorie . '</td>';
    echo '<td>' . $product->sub_categorie . '</td>';
    echo '<td><a href="/admin/product/modify/' . $product->slug . '-' . $product->id . '"><span class="material-icons">edit</span></a></td>';
    echo '<td><a href="/admin/product/delete/' . $product->slug . '-' . $product->id . '"><span class="material-icons">delete</span></a></td>';
    echo '</tr>';
}
echo '</table>';
// echo '<h1>Ajouter un produits</h1>';
// echo '<form action="/admin/product/add" method="post" enctype="multipart/form-data">';
// echo '<h5>Nom du produit : </h5><input type="text" value="" name="name" id="">';
// echo '<h5>Description du produit : </h5><textarea name="description" id="" cols="30" rows="10"></textarea>';
// echo '<h5>Prix du produit : </h5><input type="float" value="" name="price" id="">';
// echo '<h5>Date de sortie du produit : </h5><input type="date" value="" name="released" id="">';
// echo '<h5>Stock du produit : </h5><input type="number" min="0" value="" name="stock" id="">';
// echo '<h5>Selectionner l\'artiste : </h5><select name="artist" id="">';
// foreach($params['artists'] as $key => $artist)
// {
//     echo $artist['id'];
//     echo '<option value="'.$artist['id'].'">'.$artist['artist'].'</option>';

// }
// echo '</select>';
// echo '<h5>Selectionner la catégorie/sous-catégorie : </h5><select name="category" id="">';
// foreach($params['allcategory'] as $category)
// {

//     echo '<option value="'.$category->categoriesid.'/'.$category->sub_categorieid.'">'.$category->categorie.' - '.$category->sub_categorie.'</option>';

// }
// echo '</select>';
// echo '<label for="file">Fichier</label>';
// echo '<input type="file" name="file">';
// echo '<br><input type="submit" value="Ajouter un produit">';
// echo '</form>';
?>

<!-- Modal Trigger -->
<a class="waves-effect waves-light btn modal-trigger" href="#modal1">Ajouter un produit</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
    <form action="/admin/product/add" method="post" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="row">
                <div class="input-field col s10 center">
                    <input id='name' name="name" type="text">
                    <label for="name">Nom du produit</label>
                </div>
                <div class="input-field col s10">
                    <textarea id="description" class="materialize-textarea" name="description"></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="input-field col s10 center">
                    <input id='price' name="price" type="number" step=0.5>
                    <label for="price">Prix du produit</label>
                </div>
                <div class="input-field col s10 center">
                    <input id='released' name="released" type="date">
                    <label for="released">Date de sortie du produit</label>
                </div>
                <div class="input-field col s10 center">
                    <input type="number" min="0" value="" name="stock" id="stock">
                    <label for="stock">Quantité du produit</label>
                </div>
                <div class="input-field col s10 center">
                    <select name="artist">
                        <option value="" disabled selected>Choisir l'artiste</option>
                        <?php
                        foreach ($params['artists'] as $key => $artist) {
                            echo $artist['id'];
                            echo '<option value="' . $artist['id'] . '">' . $artist['artist'] . '</option>';
                        }
                        ?>
                    </select>
                    <label>Choix de l'artiste</label>
                </div>
                <div class="input-field col s10 center">
                    <select name="category">
                        <option value="" disabled selected>Choisir la catégorie</option>
                        <?php
                        foreach ($params['allcategory'] as $category) {
                            echo '<option value="' . $category->categoriesid . '/' . $category->sub_categorieid . '">' . $category->categorie . ' - ' . $category->sub_categorie . '</option>';
                        }
                        ?>
                    </select>
                    <label>Choix de la catégorie</label>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>Choisissez un image</span>
                    <input name="file" type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer<i class="material-icons right">send</i></button>
    </form>
</div>
</div>