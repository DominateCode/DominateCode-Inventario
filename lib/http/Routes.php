<?php
Router::add("home","HainController","Main");
Router::add("login","LoginController","Main");
Router::add("logout","LoginController","logout");
Router::add("about","AboutController","Main");
Router::add("perfil","RegistrarController","Main");
Router::add("admin","adminController","Main");
?>