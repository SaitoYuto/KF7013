<?php
session_start();

require_once 'shared.php';
require_once './constants/Message.php';
require_once './logic/Booking.php';
require_once './logic/CoursesManager.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
$alertSelector = '';
$message = '';

$userId = "";
if ($isLogin) {
  $userId = $_SESSION['id'];
} else {
  // Not allowed display account page without login
  header('Location: login.php?error=unauthorize');
  exit();
}

$courseId = filter_input(INPUT_GET, 'courseId', FILTER_VALIDATE_INT);
if ($courseId === false || $courseId === null) {
  http_response_code(400);
  header('Location: courses.php?error=invalid_course_id');
  exit();
}

$course = null;
$coursesManager = CoursesManager::getInstance();
foreach ($coursesManager->getCoursesById(intval($courseId)) as $course) {
  $title = $course['title'];
  $date = $course['session_date'];
  $price = $course['price_per_person'];
  $discountPrice = $course['discount_price'];
  $lecturer = $course['lecturer'];
}
if (!$course) {
  header('Location: courses.php?error=not_found_course');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && array_key_exists('book', $_POST)) {
  $price = filter_input(INPUT_POST, 'coursePrice');
  $note = filter_input(INPUT_POST, 'note');
  $booking = new Booking($courseId, $userId, $studentCount = 1, $studentCount * $price, $note);
  try {
    $booking->book();
    header('Location: booking_complete.php');
  } catch (Exception $ex) {
    $alertSelector = 'error';
    $message = $ex->getMessage();
    http_response_code(500);
  }
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
      <?php echo stringifyAlertHtml($alertSelector, $message); ?>
      <div id="form-wrapper">
        <label id="form-label">Booking</label>
        <form action="" method="post">
          <div class="form-row">
            <label>Course Title</label>
            <input class="disabled" type="text" value="<?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>" readonly>
          </div>
          <div class="form-row">
            <label>Price</label>
            <?php if ($discountPrice): ?>
              <input class="disabled" type="text" value="<?php echo htmlspecialchars($discountPrice, ENT_QUOTES, 'UTF-8') ?>" readonly>
            <?php else: ?>
              <input class="disabled" type="text" value="<?php echo htmlspecialchars($price, ENT_QUOTES, 'UTF-8') ?>" readonly>
            <?php endif; ?>
          </div>
          <div class="form-row">
            <label>Course Date</label>
            <input class="disabled" type="text" value="<?php echo htmlspecialchars($date, ENT_QUOTES, 'UTF-8') ?>" readonly>
          </div>
          <div class="form-row">
            <label>Lecturer</label>
            <input class="disabled" type="text" value="<?php echo htmlspecialchars($lecturer, ENT_QUOTES, 'UTF-8') ?>" readonly>
          </div>
          <div class="form-row">
            <label for="note">Note</label>
            <textarea id="note" name="note" rows="5" maxlength="1000"></textarea>
          </div>
          <button type="submit" class="base-btn" name="book" value="book">
            Book
          </button>
        </form>
      </div>
  </div>
  </main>
  </div>
  <?php echo stringifyFooterHtml(); ?>
</body>

</html>