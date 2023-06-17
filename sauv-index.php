<?php

 $page=htmlspecialchars(isset($_GET['page']));
 $action=htmlspecialchars(isset($_GET['action']));

 echo '$page = '.$_GET['page'].' </br> $action = '.$_GET['action'].' </br>';



