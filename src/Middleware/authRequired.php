<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: /connexion");
    exit;
}
