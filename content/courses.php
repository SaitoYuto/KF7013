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
  <?php require_once 'shared.php';
  echo stringifyHeaderHtml();
  ?>
  <div class="main-wrapper">
    <?php require_once 'shared.php';
    echo stringifySidebarHtml();
    ?>
    <main>
      <h2 id="recommendation">Recommendation to You</h2>
      <div class="courses-wrapper">
        <?php
        try {
          require_once './services/CoursesManager.php';
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
          require_once './services/CoursesManager.php';
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
          require_once './services/CoursesManager.php';
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
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>