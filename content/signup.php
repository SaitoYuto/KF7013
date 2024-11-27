<?php
session_start();

require_once './constants/Message.php';
require_once './logic/Customer.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);

if ($isLogin) {
  // Not allowed to display sing-up page by already login user
  header('Location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('signup', $_POST)) {
  $forename = filter_input(INPUT_POST, 'forename');
  $surname = filter_input(INPUT_POST, 'surname');
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password');
  $dob = filter_input(INPUT_POST, 'dob');
  $customer = new Customer(null, $forename, $surname, $email, $password, $dob);
  try {
    if ($customer->signup()) {
      header('Location: login.php');
    } else {
      $alertSelector = 'error';
      $message = Message::SIGNUP_FAILURE;
      http_response_code(401);
    }
  } catch (Exception $ex) {
    $alertSelector = 'error';
    $message = $ex->getMessage();
    http_response_code(500);
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $alertSelector = "info";
  $message = Message::AFTER_SIGNUP;
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
        <label id="form-label">Sign Up</label>
        <form action="" method="post">
          <div class="form-row">
            <label for="sign-up-forename">Forename</label>
            <input
              id="sign-up-forename"
              type="text"
              name="forename"
              required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="sign-up-surname">Surname</label>
            <input
              id="sign-up-surname"
              type="text"
              name="surname"
              required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="sign-up-email">Email</label>
            <input
              id="sign-up-email"
              type="email"
              name="email"
              required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="sign-up-password">Password</label>
            <input
              id="sign-up-password"
              type="password"
              name="password"
              minlength="8"
              required
              autocomplete="current-password"
              placeholder="Required and more than 8 characters" />
          </div>
          <div class="form-row">
            <label for="sign-up-dob">Date of Birth</label>
            <input
              id="sign-up-dob"
              type="date"
              name="dob"
              required
              min='1940-01-01'
              max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>"
              placeholder="Required" />
          </div>
          <button
            type="submit"
            class="base-btn"
            name="signup"
            value="signup">
            Create Account
          </button>
        </form>
      </div>
    </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>