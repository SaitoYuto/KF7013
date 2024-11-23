<?php

include './services/Customer.php';
include './constants/Message.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  switch ($_POST['submit']) {
    case 'signup':
      $forename = filter_input(INPUT_POST, 'forename');
      $surname = filter_input(INPUT_POST, 'surname');
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password');
      $dob = filter_input(INPUT_POST, 'dob');
      $customer = new Customer($forename, $surname, $email, $password, $dob);
      try {
        if ($customer->signup()) {
          $_SESSION['id'] = $customer->getID();
          $_SESSION['name'] = $customer->getForename();
          header('Location: index.html');
        } else {
          $errors['signup'] = Message::SIGNUP_FAILURE;
          http_response_code(401);
        }
      } catch (Exception $ex) {
        $errors['signup'] = $ex->getMessage();
        http_response_code(500);
      }
      break;
    case 'login':
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, 'password');
      $customer = new Customer(null, null, $email, $password, null);
      try {
        if ($customer->login()) {
          $_SESSION['id'] = $customer->getID();
          $_SESSION['name'] = $customer->getForename();
          header('Location: index.html');
        } else {
          $errors['login'] = Message::LOGIN_FAILURE;
          http_response_code(401);
        }
      } catch (Exception $ex) {
        $errors['login'] = $ex->getMessage();
        http_response_code(500);
      }
      break;
    default:
      $errors['signup'] = Message::INVALID_REQUEST;
      $errors['login'] = Message::INVALID_REQUEST;
      break;
  }
} else {
  // Expect GET request
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
  <link
    href="../assets/stylesheets/login.css"
    rel="stylesheet"
    type="text/css" />
</head>

<body>
  <?php require_once 'shared.php';
  echo stringifyHeaderHtml();
  ?>
  <div class="main-wrapper">
    <?php require_once 'shared.php';
    echo stringifySidebarHtml();
    ?>
    <main>
      <div id="tab-menu">
        <input id="sign-up-tab" name="tab" type="radio" <?php echo ($_GET['tab'] === "signup") ? "checked" : ""; ?> />
        <label class="tab-menu-item" for="sign-up-tab">Sign Up</label>
        <div class="tab-menu-contents">
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
            <?php
            if (array_key_exists('signup', $errors)) {
              echo "<p class='error'>{$errors['signup']}</p>";
            }
            ?>
            <button
              type="submit"
              class="base-btn"
              name="submit"
              value="signup">
              Create Account
            </button>
          </form>
        </div>
        <input id="login-tab" name="tab" type="radio" <?php echo ($_GET['tab'] === "login") ? "checked" : ""; ?> />
        <label class="tab-menu-item" for="login-tab">Login</label>
        <div class="tab-menu-contents">
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
            <?php
            if (array_key_exists('login', $errors)) {
              echo "<p class='error'>{$errors['login']}</p>";
            }
            ?>
            <button
              type="submit"
              class="base-btn"
              name="submit"
              value="login">
              Login
            </button>
          </form>
        </div>
      </div>
    </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>