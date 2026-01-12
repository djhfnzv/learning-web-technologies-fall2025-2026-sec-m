<?php
session_start();

setcookie("visit_count", "", time() - 3600);
setcookie("visit_history", "", time() - 3600);
setcookie("first_visit", "", time() - 3600);
setcookie("last_visit", "", time() - 3600);
setcookie("visitor_id", "", time() - 3600);

session_unset();
session_destroy();

header("Location: index.php");
exit;
