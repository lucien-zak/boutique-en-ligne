<body>
<table>
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Supprimer l'utilisateur</th>
        </tr>
    </thead>
    <tbody>
            <?php 
                for($i = 0;$i < count($params['users']); $i++)
                {
                    echo '<tr>';
                    echo '<td>'.$params['users'][$i]['firstname'].'</td>';
                    echo '<td>'.$params['users'][$i]['name'].'</td>';
                    echo '<td>'.$params['users'][$i]['email'].'</td>';
                    echo '<td><a href="/admin/users/delete/'.$params['users'][$i]['id'].'">Supprimer '.$params['users'][$i]['email'].'</a></td>';
                    echo '</tr>';
                }
            ?>
    </tbody>
</table>
</body>

</html>

