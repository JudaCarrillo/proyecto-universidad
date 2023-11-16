<?php
session_start();
if (isset($_SESSION['nombre'])) {
    echo '<div>Bienvenido, <span>' . $_SESSION['nombre'] . '</span></div>';
} else {
    echo '<div>Usuario no identificado</div>';
}
?>
