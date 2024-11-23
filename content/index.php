<!DOCTYPE html>
<html lang="en">

<head>
  <meta
    http-equiv="Content-Type"
    content="text/html; charset=UTF-8 width=device-width, initial-scale=1.0" />
  <title>TechSpec</title>
  <link href="../assets/favicon.ico" rel="icon" />
  <link
    href="../assets/stylesheets/common.css"
    rel="stylesheet"
    type="text/css" />
  <link
    href="../assets/stylesheets/index.css"
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
      <h1>Level up your skills with the highest quality courses</h1>
      <div class="flex-row-center">
        <div id="learn-img" class="main-img">
          <h3>Cutting-edge courses by certificated instructor</h3>
        </div>
        <div id="online-img" class="main-img">
          <h3>
            Fully online, for professionals <br />to learn at the own pace
          </h3>
        </div>
      </div>
      <h2>Popular Topics</h2>
      <div id="topic-wrapper">
        <div class="topic-card">
          <img src="../assets/images/icon_ai.png" alt="AI Topic" />
          <p>AI</p>
        </div>
        <div class="topic-card">
          <img src="../assets/images/icon_iot.png" alt="IoT Topic" />
          <p>IoT</p>
        </div>
        <div class="topic-card">
          <img src="../assets/images/icon_cloud.png" alt="Cloud Topic" />
          <p>Cloud</p>
        </div>
        <div class="topic-card">
          <img src="../assets/images/icon_bigdata.png" alt="Big Data Topic" />
          <p>Big Data</p>
        </div>
        <div class="topic-card">
          <img
            src="../assets/images/icon_mobile.png"
            alt="Mobile App Topic" />
          <p>Mobile App</p>
        </div>
        <div class="topic-card">
          <img
            src="../assets/images/icon_programming.png"
            alt="Programming Topic" />
          <p>Programming</p>
        </div>
        <div class="topic-card">
          <img
            src="../assets/images/icon_automation.png"
            alt="Automation Topic" />
          <p>Automation</p>
        </div>
        <div class="topic-card">
          <img
            src="../assets/images/icon_blockchain.png"
            alt="Blockchain Topic" />
          <p>Blockchain</p>
        </div>
      </div>
    </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>