<?php
session_start();
require_once './logic/CoursesManager.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
$courseId = $_GET['courseId'];
if (!$courseId) {
  header('Location: courses.php');
}
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
              <?php echo $title ?>
            </h3>
            <h4>
              Description
            </h4>
            <p>
              <?php echo $desc ?>
            </p>
            <?php if ($isLogin): ?>
              <a href="./booking.php" class="base-link">Book Now</a>
            <?php else: ?>
              <a href="./signup.php" class="base-link">Register Now</a>
            <?php endif; ?>
          </div>
          <?php echo "<img src='../assets/images/{$imagePath}' alt='{$imageAlt}'>" ?>
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
            <p class="<?php echo $discountPrice ? 'original-price' : ''; ?>">
              £<?php echo $price ?>
            </p>
            <?php if ($discountPrice): ?>
              <p class="discount-price">
                £<?php echo $discountPrice ?>
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