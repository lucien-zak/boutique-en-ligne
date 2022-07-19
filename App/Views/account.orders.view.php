<main>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Quantity</th>
                <th>Address</th>
                <th>Date</th>
                <th>Price</th>
                <th>Status</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                
                    for ($i = 0;$i < count($params['commands']); $i++) {
                        if (count($params['commands']) == 0) {
                            echo "<h1>Vous n'avez aucune commande</h1>";
                        } else {
                            echo '<tr class="orderLine">';
                            echo '<td>'.$params['commands'][$i]->command_num.'</td>';
                            echo '<td>'.$params['commands'][$i]->quantity.'</td>';
                            echo '<td>'.str_replace('null', '', $params['commands'][$i]->delivery_adress).'</td>';
                            echo '<td>'.$params['commands'][$i]->date.'</td>';
                            echo '<td>'.round($params['commands'][$i]->total, 2).' € </td>';
                            echo '<td>'.$params['commands'][$i]->products.'</td>';
                            echo '<td class="options"><button class="options" alt="Télécharger la facture" type="button"><i class="fas fa-file-export"></i></button><button class="options" type="button"><i class="fas fa-eye"></i></button></td>';
                            echo '</tr>';
                        }
                    }
                ?>
        </tbody>
    </table>
    <div class="pagination"></div>
</main>