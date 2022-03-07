
<h1>Êtes vous sur de vouloir supprimer la catégorie "<?php foreach($params['categories'] as $category){ if($category['id'] == $params['id']){ echo $category['categorie']; } } ?>" et toutes ses sous-catégories ?</h1> 
<h2>Toutes les sous-catégories : <?php foreach($params['allcategory'] as $category){ if($category->categoriesid == $params['id']){ echo '"'.$category->sub_categorie.'" '; } } ?> </h2>
<a href="/admin/category/delete/<?= $params['id'] ?>/confirm">Oui </a><a href="/admin"> Retour à la page admin</a>

<?php




