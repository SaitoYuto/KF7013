<?php
session_start();

require_once 'shared.php';
require_once './constants/Message.php';
require_once './logic/BookingDetail.php';
require_once './logic/Customer.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
$userId = "";

$details = [];
if ($isLogin) {
  $userId = $_SESSION['id'];
  $customer = new Customer($userId, null, null, null, null, null);
  $customer->loadCustomerById();
  $userForename = $customer->getForename();
  $userSurname = $customer->getSurname();
  $userEmail = $customer->getEmail();
  $userDob = $customer->getDob();
  $bookingDetailLogic = new BookingDetail($userId);
  $details = $bookingDetailLogic->fetch();
} else {
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
  <?php echo stringifyHeaderHtml($isLogin); ?>
  <div class="main-wrapper">
    <?php echo stringifySidebarHtml($isLogin); ?>
    <main>
      <div id="form-wrapper">
        <label id="form-label">Account</label>
        <form action="./logout.php" method="post">
          <div class="form-row">
            <label>Forename</label>
            <input class="disabled" value=<?php echo htmlspecialchars($userForename, ENT_QUOTES, 'UTF-8') ?> readonly />
          </div>
          <div class="form-row">
            <label>Surname</label>
            <input class="disabled" value=<?php echo htmlspecialchars($userSurname, ENT_QUOTES, 'UTF-8')  ?> readonly />
          </div>
          <div class="form-row">
            <label>Email</label>
            <input class="disabled" value=<?php echo htmlspecialchars($userEmail, ENT_QUOTES, 'UTF-8')  ?> readonly />
          </div>
          <div class="form-row">
            <label>Date of Birth</label>
            <input class="disabled" value=<?php echo htmlspecialchars($userDob, ENT_QUOTES, 'UTF-8')  ?> readonly
              min='1940-01-01'
              max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" />
          </div>
          <button type="submit" class="base-btn">Logout</button>
        </form>
      </div>
      <h2>Booking Details</h2>
      <table id="booking-details">
        <thead>
          <tr>
            <th>Course Title</th>
            <th>Session Date</th>
            <th>Lecturer</th>
            <th>Price</th>
            <th>Notes</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($details)): ?>
            <tr>
              <td colspan="5"><?php echo Message::NOT_BOOKING_INFO ?></td>
            </tr>
          <?php else:
            foreach ($details as $detail):
              echo '<tr>';
              echo "<td>{$detail['title']}</td>";
              echo "<td>{$detail['session_date']}</td>";
              echo "<td>{$detail['lecturer']}</td>";
              echo "<td>{$detail['total_booking_cost']}</td>";
              echo "<td>{$detail['booking_notes']}</td>";
              echo '</tr>';
            endforeach;
          endif;
          ?>
        </tbody>
      </table>
  </div>
  </main>
  </div>
  <?php echo stringifyFooterHtml(); ?>
</body>

</html>