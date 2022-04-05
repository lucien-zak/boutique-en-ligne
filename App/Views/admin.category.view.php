<?php
echo '<h1>Modifier vos sous-catégories</h1>';
echo '<table><thead><tr><th>Sous-Catégories</th><th>Catégories</th><th>Actions</th></thead>';
echo '<tbody>';
foreach ($params['allcategory'] as $subcategory) 
{
    if ($subcategory->categoriesid == $params['id']) 
    {
        echo '<tr> <form action="/admin/subcategory/modify/' . $subcategory->sub_categorieid . '" method="post">';
        echo '<td><input type="text" name="' . $subcategory->sub_categorieid . '" value="' . $subcategory->sub_categorie . '"id=""></td>';
        echo '<td> <select name="category" id="">"';
        foreach ($params['categories'] as $category) 
        {
            if ($category['id'] == $params['id'])
            {
                echo '<option selected value="' . $category['id'] . '">' . $category['categorie'] . '</option>';        
            }
            else 
            {
                echo '<option value="' . $category['id'] . '">' . $category['categorie'] . '</option>';

            }

        }
        echo '</select></td>';
        echo '<td><input class="btn" type="submit" name="action" value="Modifier"id=""> <input class="btn" type="submit" name="action" value="Supprimer"id=""></td>';
        echo '</form>';
    }
}
echo '</table>';
?>
<h1>Ajouter une sous-catégorie</h1>
<form action="/admin/sub_category/add" method="post">
    <input type="text" name="subcategory" id="">
    <input type="text" name="category" id="" value="<?= $params['id']?>" hidden>
    <input type="submit" value="Ajouter">
</form>
