<?php
session_start();

include './constants/Message.php';
include './logic/Customer.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
$userId = "";
$userForename = "";
$userSurname = "";
$userEmail = "";
$userDob = "";

if ($isLogin) {
  $userId = $_SESSION['id'];
  $customer = new Customer($userId, null, null, null, null, null);
  $customer->loadCustomerById();
  $userForename = $customer->getForename();
  $userSurname = $customer->getSurname();
  $userEmail = $customer->getEmail();
  $userDob = $customer->getDob();
} else {
  // Not allowed display account page without login
  header('Location: index.php?error=unauthorize');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('update', $_POST)) {
  $forename = filter_input(INPUT_POST, 'forename');
  $surname = filter_input(INPUT_POST, 'surname');
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, 'password');
  $dob = filter_input(INPUT_POST, 'dob');
  $customer = new Customer($userId, $forename, $surname, $email, $password, $dob);
  // try {
  //   if ($customer->signup()) {
  //     session_regenerate_id();
  //     $_SESSION['id'] = $customer->getID();
  //     $_SESSION['name'] = $customer->getForename();
  //     header('Location: index.php');
  //   } else {
  //     $errors['signup'] = Message::SIGNUP_FAILURE;
  //     http_response_code(401);
  //   }
  // } catch (Exception $ex) {
  //   $error = $ex->getMessage();
  //   http_response_code(500);
  // }
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
        <label id="form-label">Account</label>
        <form action="" method="post">
          <div class="form-row">
            <label for="forename">Forename</label>
            <input
              id="forename"
              type="text"
              name="forename"
              value=<?php echo $userForename ?> required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="surname">Surname</label>
            <input
              id="surname"
              type="text"
              name="surname"
              value=<?php echo $userSurname ?>
              required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="email">Email</label>
            <input
              id="email"
              type="email"
              name="email"
              value=<?php echo $userEmail ?>
              required
              placeholder="Required" />
          </div>
          <div class="form-row">
            <label for="password">New Password</label>
            <input
              id="password"
              type="password"
              name="password"
              minlength="8"
              required
              autocomplete="current-password"
              placeholder="Required and more than 8 characters" />
          </div>
          <div class="form-row">
            <label for="dob">Date of Birth</label>
            <input
              id="dob"
              type="date"
              name="dob"
              value=<?php echo $userDob ?>
              required
              min='1940-01-01'
              max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>"
              placeholder="Required" />
          </div>
          <button
            type="submit"
            class="base-btn"
            name="update"
            value="update">
            Update
          </button>
        </form>
      </div>
      <a id="logout-btn" class="base-link" href="./logout.php">Logout</a>
  </div>
  </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>