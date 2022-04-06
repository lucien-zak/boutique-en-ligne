<table>
    <thead>
        <tr>
            <th>Numéro de commande</th>
            <th>Date de la commande</th>
            <th>Adresse de livraison</th>
            <th>Adresse de facturation</th>
            <th>Moyen de paiements</th>
            <th>Nombre de produits</th>
            <th>Total de la commande</th>
            <th>Télécharger la facture</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            
                for ($i = 0;$i < count($params['commands']); $i++) {
                    if (count($params['commands']) == 0) {
                        echo "<h1>Vous n'avez aucune commande</h1>";
                    } else {
                        echo '<tr>';
                        echo '<td>'.$params['commands'][$i]->command_num.'</td>';
                        echo '<td>'.$params['commands'][$i]->date.'</td>';
                        echo '<td>'.str_replace('null', '', $params['commands'][$i]->delivery_adress).'</td>';
                        echo '<td>'.str_replace('null', '', $params['commands'][$i]->biling_adress).'</td>';
                        echo '<td> **** **** **** '.$params['commands'][$i]->four_last.'</td>';
                        echo '<td>'.$params['commands'][$i]->products.'</td>';
                        echo '<td>'.round($params['commands'][$i]->total, 2).' € </td>';
                        echo '<td></td>';
                        echo '</tr>';
                    }
                }
            
            ?>
    </tbody>
</table>