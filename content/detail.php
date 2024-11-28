<?php
session_start();

require_once './constants/Message.php';
require_once './logic/CoursesManager.php';


$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
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
  $desc = $course['description'];
  $date = $course['session_date'];
  $price = $course['price_per_person'];
  $discountPrice = $course['discount_price'];
  $imagePath = $course['session_imagepath'];
  $imageAlt = $course['image_alt'];
  $lecturer = $course['lecturer'];
}
if (!$course) {
  header('Location: courses.php?error=not_found_course');
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
  <link
    href="../assets/stylesheets/detail.css"
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
      <div id="course-wrapper">
        <div id="course-detail">
          <div id="course-main">
            <h3>
              <?php echo htmlspecialchars($title) ?>
            </h3>
            <h4>
              Description
            </h4>
            <p>
              <?php echo htmlspecialchars($desc) ?>
            </p>
            <?php if ($isLogin): ?>
              <a href=<?php echo "./booking.php?courseId={$courseId}" ?> class="base-link">Book Now</a>
            <?php else: ?>
              <a href="./signup.php" class="base-link">Sign Up Now</a>
            <?php endif; ?>
          </div>
          <?php
          $imagePath = htmlspecialchars("../assets/images/" . $imagePath);
          $imageAlt = htmlspecialchars($imageAlt);
          if (file_exists($imagePath)) {
            echo "<img src='{$imagePath}' alt='{$imageAlt}'>";
          } else {
            echo "<img src='../assets/images/default.png' alt='Default course image'>";
          }
          ?>
        </div>
        <div id="course-info-cards">
          <div class="course-info-card">
            <img
              src="../assets/images/icon_calender.png"
              alt="Course Date Image" />
            <p><?php echo $date ?></p>
          </div>
          <div class="course-info-card">
            <img
              src="../assets/images/icon_tag.png"
              alt="Course Price Image" />
            <p class="<?php echo ($discountPrice && $discountPrice < $price) ? 'original-price' : ''; ?>">
              £<?php echo number_format((float)$price, 2) ?>
            </p>
            <?php if ($discountPrice && $discountPrice < $price): ?>
              <p class="discount-price">
                £<?php echo number_format((float)$discountPrice, 2) ?>
              </p>
            <?php endif; ?>
          </div>
          <div class="course-info-card">
            <img
              src="../assets/images/icon_lecturer.png"
              alt="Course Lecturer Image" />
            <p>By <?php echo $lecturer ?></p>
          </div>
        </div>
      </div>
    </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>