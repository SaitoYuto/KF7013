<?php
session_start();

require_once './constants/Message.php';
require_once 'shared.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
if (!$isLogin) {
  // Not allowed display account page without login
  header('Location: login.php?error=unauthorize');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>TechSpec</title>
  <link href="../assets/favicon.ico" rel="icon" />
  <link
    href="../assets/stylesheets/common.css"
    rel="stylesheet"
    type="text/css" />
</head>

<body>
  <?php
  echo stringifyHeaderHtml($isLogin);
  ?>
  <div class="main-wrapper">
    <?php
    echo stringifySidebarHtml($isLogin);
    ?>
    <main>
      <?php
      echo stringifyAlertHtml('info', Message::BOOKING_COMPLETE);
      ?>
    </main>
  </div>
  <?php
  echo stringifyFooterHtml(); ?>
</body>

</html>