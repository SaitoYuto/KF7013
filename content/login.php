<?php
session_start();

include './logic/Customer.php';
include './constants/Message.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);

if ($isLogin) {
  // Not allowed display login page by already login user
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('login', $_POST)) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password');
  $customer = new Customer(null, null, null, $email, $password, null);
  try {
    if ($customer->login()) {
      session_regenerate_id();
      $_SESSION['id'] = $customer->getID();
      $_SESSION['name'] = $customer->getForename();
      header('Location: index.php');
    } else {
      $alertSelector = 'error';
      $message = Message::LOGIN_FAILURE;
      http_response_code(401);
    }
  } catch (Exception $ex) {
    $alertSelector = 'error';
    $message = $ex->getMessage();
    http_response_code(500);
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $alertSelector = "";
  $message = "";
} else {
  $alertSelector = 'error';
  $message = Message::INVALID_REQUEST;
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
  <?php require_once 'shared.php';
  echo stringifyHeaderHtml($isLogin);
  ?>
  <div class="main-wrapper">
    <?php require_once 'shared.php';
    echo stringifySidebarHtml($isLogin);
    ?>
    <main>
      <?php require_once 'shared.php';
      echo stringifyAlertHtml($alertSelector, $message);
      ?>
      <div id="form-wrapper">
        <label id="form-label">Login</label>
        <form action="" method="post">
          <div class="form-row">
            <label for="login-email">Email</label>
            <input
              id="login-email"
              type="email"
              name="email"
              required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="login-password">Password</label>
            <input
              id="login-password"
              type="password"
              name="password"
              minlength="8"
              required
              autocomplete="current-password"
              placeholder="Required and more than 8 characters" />
          </div>
          <button
            type="submit"
            class="base-btn"
            name="login"
            value="login">
            Login
          </button>
        </form>
      </div>
    </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>