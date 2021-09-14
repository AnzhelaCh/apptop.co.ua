<?php
setcookie ( "user", $user['name'], time() - 3600, "/");
setcookie ( "userId", $user['id'], time() - 3600, "/");
setcookie('userBanks', json_encode($result), time() - 3600, "/");
header('Location: /');
?>