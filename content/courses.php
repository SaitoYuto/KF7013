<?php
session_start();

require_once 'shared.php';
require_once './logic/CoursesManager.php';
require_once './util/RequestUtil.php';

$isLogin = isset($_SESSION['id']) && isset($_SESSION['name']);
$error = filter_input(INPUT_GET, 'error');
if ($error) {
  $alertSelector =  'error';
  $message = RequestUtil::getErrorMessageByParam($error);
} else {
  $alertSelector = '';
  $message = '';
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
    href="../assets/stylesheets/courses.css"
    rel="stylesheet"
    type="text/css" />
</head>

<body>
  <?php echo stringifyHeaderHtml($isLogin); ?>
  <div class="main-wrapper">
    <?php echo stringifySidebarHtml($isLogin); ?>
    <main>
      <?php echo stringifyAlertHtml($alertSelector, $message); ?>
      <h2 id="recommendation">Recommendation to You</h2>
      <div class="courses-wrapper">
        <?php
        try {
          $coursesManager = CoursesManager::getInstance();
          foreach ($coursesManager->getCoursesByCategory("Recommendation") as $recommendation) {
            $priceTag
              = isset($recommendation['discount_price'])
              ? "<p class='course-price'> <span class='original-price'>£35</span> <span class='discounted-price'>£30</span> </p>"
              : "<p class='course-price'>£{$recommendation['price_per_person']}</p>";
            echo <<< HTML
            <div class="course-card">
                <img
                    class="course-img"
                    src="../assets/images/{$recommendation['session_imagepath']}"
                    alt="{$recommendation['image_alt']}" />
                <p class="course-name">{$recommendation['title']}</p>
                <p class="course-provider">By {$recommendation['lecturer']}</p>
                $priceTag
                <a class="base-link" href="./detail.php?courseId={$recommendation['trainingID']}">More Detail</a>
            </div>
            HTML;
          }
        } catch (Exception $ex) {
          echo "<h3 class='error'>{$ex->getMessage()}</h3>";
          http_response_code(500);
        }
        ?>
      </div>
      <h2 id="new">New Courses</h2>
      <div class="courses-wrapper">
        <?php
        try {
          $coursesManager = CoursesManager::getInstance();
          foreach ($coursesManager->getCoursesByCategory("New") as $new) {
            $priceTag
              = isset($new['discount_price'])
              ? "<p class='course-price'> <span class='original-price'>£35</span> <span class='discounted-price'>£30</span> </p>"
              : "<p class='course-price'>£{$new['price_per_person']}</p>";
            echo <<< HTML
            <div class="course-card">
                <img
                    class="course-img"
                    src="../assets/images/{$new['session_imagepath']}"
                    alt="{$new['image_alt']}" />
                <p class="course-name">{$new['title']}</p>
                <p class="course-provider">By {$new['lecturer']}</p>
                $priceTag
                <a class="base-link" href="./detail.php?courseId={$new['trainingID']}">More Detail</a>
            </div>
            HTML;
          }
        } catch (Exception $ex) {
          echo "<h3 class='error'>{$ex->getMessage()}</h3>";
          http_response_code(500);
        }
        ?>
      </div>
      <h2 id="enrolled">Most Enrolled Courses</h2>
      <div class="courses-wrapper">
        <?php
        try {
          $coursesManager = CoursesManager::getInstance();
          foreach ($coursesManager->getCoursesByCategory("Enrolled") as $enrolled) {
            $priceTag
              = isset($enrolled['discount_price'])
              ? "<p class='course-price'> <span class='original-price'>£35</span> <span class='discounted-price'>£30</span> </p>"
              : "<p class='course-price'>£{$enrolled['price_per_person']}</p>";
            echo <<< HTML
            <div class="course-card">
                <img
                    class="course-img"
                    src="../assets/images/{$enrolled['session_imagepath']}"
                    alt="{$enrolled['image_alt']}" />
                <p class="course-name">{$enrolled['title']}</p>
                <p class="course-provider">By {$enrolled['lecturer']}</p>
                $priceTag
                <a class="base-link" href="./detail.php?courseId={$enrolled['trainingID']}">More Detail</a>
            </div>
            HTML;
          }
        } catch (Exception $ex) {
          echo "<h3 class='error'>{$ex->getMessage()}</h3>";
          http_response_code(500);
        }
        ?>
      </div>
    </main>
  </div>
  <?php echo stringifyFooterHtml(); ?>
</body>

</html>