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
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_ai.png"
            alt="AI Course" />
          <p class="course-name">
            Artificial Intelligence: Concepts, Techniques, and Real-World
            Applications
          </p>
          <p class="course-provider">By John Anderson</p>
          <p class="course-price">£20</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_iot.png"
            alt="IoT Course" />
          <p class="course-name">
            Internet of Things (IoT): The Future of Connected Devices and Data
          </p>
          <p class="course-provider">By Emily Davis</p>
          <p class="course-price">£25</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_cloud.png"
            alt="Cloud Course" />
          <p class="course-name">
            Foundations and Applications of Cloud Computing
          </p>
          <p class="course-provider">By Amelia Edwards</p>
          <p class="course-price">£28</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_machine_learning_.png"
            alt="Machine Learning Course" />
          <p class="course-name">
            Introduction to Machine Learning: Algorithms and Real-World
            Applications
          </p>
          <p class="course-provider">By Max Fukumoto</p>
          <p class="course-price">
            <span class="original-price">£35</span>
            <span class="discounted-price">£30</span>
          </p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_bigdata.png"
            alt="BigData Learning Course" />
          <p class="course-name">
            Big Data Analytics and Processing Technologies
          </p>
          <p class="course-provider">By Jacob Foster</p>
          <p class="course-price">£35</p>
        </div>
      </div>
      <h2 id="new">New Courses</h2>
      <div class="courses-wrapper">
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_algorithm.png"
            alt="Algorithm Course" />
          <p class="course-name">
            Algorithms: Design, Analysis, and Optimization
          </p>
          <p class="course-provider">By Olivia Carter</p>
          <p class="course-price">£35</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_ios.png"
            alt="iOS Course" />
          <p class="course-name">
            iOS Application Development: From Swift Basics to Implementation
          </p>
          <p class="course-provider">By Jing Wenqi Wang</p>
          <p class="course-price">£30</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_android.png"
            alt="android Course" />
          <p class="course-name">
            Hands-On Android App Development with Kotlin
          </p>
          <p class="course-provider">By Ethan Parker</p>
          <p class="course-price">£30</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_datavisualize.png"
            alt="Data Visualization Course" />
          <p class="course-name">
            Data Visualization: Techniques for Effective Visual Communication
          </p>
          <p class="course-provider">By Sophia Anderson</p>
          <p class="course-price">£40</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_blockchain.png"
            alt="Data Visualization Course" />
          <p class="course-name">
            Blockchain Technology and Decentralized Application Fundamentals
          </p>
          <p class="course-provider">By Liam Thompson</p>
          <p class="course-price">£35</p>
        </div>
      </div>
      <h2 id="enrolled">Most Enrolled Courses</h2>
      <div class="courses-wrapper">
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_java.png"
            alt="Java Course" />
          <p class="course-name">Object-Oriented Programming with Java</p>
          <p class="course-provider">By Emily Collins</p>
          <p class="course-price">
            <span class="original-price">£30</span>
            <span class="discounted-price">£25</span>
          </p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_python.png"
            alt="Python Course" />
          <p class="course-name">
            Introduction to Python Programming and Data Analysis
          </p>
          <p class="course-provider">By Noah Turner</p>
          <p class="course-price">
            <span class="original-price">£30</span>
            <span class="discounted-price">£25</span>
          </p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_web.png"
            alt="Web Development Course" />
          <p class="course-name">
            Web Application Development: Integrating Frontend and Backend
          </p>
          <p class="course-provider">By Ava Robinson</p>
          <p class="course-price">£38</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_streaming.png"
            alt="Streaming Course" />
          <p class="course-name">
            Streaming Protocols and Their Applications
          </p>
          <p class="course-provider">By Mason Hughes</p>
          <p class="course-price">£40</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_ui.png"
            alt="Machine Learning Course" />
          <p class="course-name">
            User Interface Design: Balancing Usability and Aesthetics
          </p>
          <p class="course-provider">By Karthik Natarajan</p>
          <p class="course-price">£35</p>
        </div>
        <div class="course-card">
          <img
            class="course-img"
            src="../assets/images/course_api.png"
            alt="API Course" />
          <p class="course-name">
            APIs and Data Connectivity: Enabling Data Exchange
          </p>
          <p class="course-provider">By Charlotte Scott</p>
          <p class="course-price">£30</p>
        </div>
      </div>
    </main>
  </div>
  <?php require_once 'shared.php';
  echo stringifyFooterHtml(); ?>
</body>

</html>