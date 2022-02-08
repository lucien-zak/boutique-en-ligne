<?php !empty($session)?dump($_SESSION):'' ?>

<form action="/account/login" method="POST">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit" name="valider">
</form>
<?=
isset($params['message'])?$params['message']:'';

?>