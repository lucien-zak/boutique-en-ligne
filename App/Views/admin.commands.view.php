<body>
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
            <th>Statut de la commande</th>
            <th>Modifier le statut</th>
        </tr>
    </thead>
    <tbody>
            <?php 
            
                for($i = 0;$i < count($params['commands']); $i++)
                {

                    echo '<tr>';
                    echo '<td>'.$params['commands'][$i]->command_num.'</td>';
                    echo '<td>'.$params['commands'][$i]->date.'</td>';
                    echo '<td>'.str_replace('null','',$params['commands'][$i]->delivery_adress).'</td>';
                    echo '<td>'.str_replace('null','',$params['commands'][$i]->biling_adress).'</td>';
                    echo '<td> **** **** **** '.$params['commands'][$i]->four_last.'</td>';
                    echo '<td>'.$params['commands'][$i]->products.'</td>';
                    echo '<td>'.round($params['commands'][$i]->total, 2).' € </td>';
                    echo '<td>'.$params['commands'][$i]->statut.'</td>';
                    echo '<td><form action="/admin/commands/update/'.$params['commands'][$i]->command_num.'" method="POST"><select name="statut" id=""><option selected disabled>Choisir le statut</option><option value="Non_Traitee">Non Traitée</option><option value="En_cours">En cours</option><option value="Livree">Livrée</option></select><input type="submit"></form></td>';
                    echo '</tr>';
                }
            
            ?>
    </tbody>
</table>
</body>

</html>

