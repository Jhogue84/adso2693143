<?php

session_start();

var_dump($_SESSION);

session_destroy();
unset($_SESSION);

echo "finalizo la sesion";
