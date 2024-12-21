<?php

require_once './constants/Message.php';

/**
 * Stringify header HTML.
 * 
 * @param string $isLogin Whether the user has logged in or not.
 * @return string
 */
function stringifyHeaderHtml($isLogin)
{
    $messages = [
        'Welcome to TechSpec!',
        'Boost your skills!',
        'Enjoy our courses!',
        'Learn at your own pace!',
        'Discover new possibilities!',
        'Achieve your goals with us!',
    ];
    $message = $messages[rand(0, count($messages) - 1)];
    $userAuthHtml =
        $isLogin ? "<p id='welcome-msg'>$message</p>" :
        "<a class='base-link' href='./signup.php'>Sign Up</a> <a class='base-link' href='./login.php'>Login</a>";

    return <<< Header
        <header class="flex-row-center-space-between">
        <div class="flex-row">
            <a class="flex-row" href="./index.php">
                <img
                class="logo-img"
                src="../assets/images/logo-dark.png"
                alt="Company Logo" />
                <p class="company-name">TechSpec</p>
            </a>
            <div id="search-area">
                <input
                id="search-bar"
                type="search"
                placeholder="What do you want to learn?" />
                <div id="search-candidates">
                    <ul>
                        <li>
                            <a class="flex-row" href="./courses.php#recommendation">
                                <img
                                class="list-icon"
                                src="../assets/images/course_ai.png"
                                alt="AI Course" />
                                <p>
                                Artificial Intelligence: Concepts, Techniques, and
                                Real-World Applications
                                </p>
                            </a>
                        </li>
                        <li>
                            <a class="flex-row" href="./courses.php#new">
                                <img
                                class="list-icon"
                                src="../assets/images/course_algorithm.png"
                                alt="Algorithm Course" />
                                <p>Algorithms: Design, Analysis, and Optimization</p>
                            </a>
                        </li>
                        <li>
                            <a class="flex-row" href="./courses.php#enrolled">
                                <img
                                class="list-icon"
                                src="../assets/images/course_java.png"
                                alt="Java Course" />
                                <p>Object-Oriented Programming with Java</p>
                            </a>
                        </li>
                        <li>
                            <a class="flex-row" href="./courses.php#recommendation">
                                <img
                                class="list-icon"
                                src="../assets/images/course_iot.png"
                                alt="IoT Course" />
                                <p>
                                Internet of Things (IoT): The Future of Connected Devices
                                and Data
                                </p>
                            </a>
                        </li>
                        <li>
                            <a class="flex-row" href="./courses.php#new">
                                <img
                                class="list-icon"
                                src="../assets/images/course_ios.png"
                                alt="iOS Course" />
                                <p>
                                iOS Application Development: From Swift Basics to
                                Implementation
                                </p>
                            </a>
                        </li>
                        <li>
                            <a class="flex-row" href="./courses.php#enrolled">
                                <img
                                class="list-icon"
                                src="../assets/images/course_python.png"
                                alt="Python Course" />
                                <p>Introduction to Python Programming and Data Analysis</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <div>
    $userAuthHtml
    </div>
    </header>
    Header;
}

/**
 * Stringify side bar HTML.
 * 
 * @return string
 */
function stringifySidebarHtml($isLogin)
{
    $account =
        $isLogin
        ? "<li>
                <a class='flex-row' href='./account.php'>
                    <img
                        class='list-icon'
                        src='../assets/images/icon_account.png'
                        alt='Account Icon' />
                        <p>Account</p>
                </a>
            </li>"
        : "";
    return <<< Sidebar
        <aside>
            <div id="hamburger-menu" class="list-icon">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav>
                <ul id="sidebar-list">
                    <li>
                        <a class="flex-row" href="./index.php">
                            <img
                                class="list-icon"
                                src="../assets/images/icon_home.png"
                                alt="Home Icon" />
                            <p>Home</p>
                        </a>
                    </li>
                    <li>
                        <a class="flex-row" href="./courses.php">
                            <img
                                class="list-icon"
                                src="../assets/images/icon_courses.png"
                                alt="Courses Icon" />
                            <p>Courses</p>
                        </a>
                    </li>
                    <li>
                        <a class="flex-row" href="./credit.php">
                            <img
                                class="list-icon"
                                src="../assets/images/icon_credit.png"
                                alt="Credit Icon" />
                            <p>Credit</p>
                        </a>
                    </li>
                    $account
                </ul>
            </nav>
        </aside>
        Sidebar;
}

/**
 * Stringify footer HTML.
 * 
 * @return string
 */
function stringifyFooterHtml()
{
    return <<< Footer
        <footer>
            <div class="flex-row-center-space-evenly">
                <ul>
                    <li>TechSpec for Organization</li>
                    <li>Teach on TechSpec</li>
                    <li>About Us</li>
                    <li>Contact Us</li>
                </ul>
                <ul>
                    <li>Career</li>
                    <li>Blog</li>
                    <li>Affiliate</li>
                    <li>Investors</li>
                </ul>
                <ul>
                    <li>Terms</li>
                    <li>Privacy Policy</li>
                    <li>Sitemap</li>
                    <li>Accessibility statement</li>
                </ul>
            </div>
            <div class="flex-row-center-space-between">
                <a class="flex-row" href="./index.php">
                    <img
                    class="logo-img"
                    src="../assets/images/logo-light.png"
                    alt="Company Logo" />
                    <p class="company-name">TechSpec</p>
                </a>
                <p id="copy-right">© 2024 TechSpec. All Rights Reserved.</p>
            </div>
        </footer>
    Footer;
}


/**
 * Stringify alert HTML.
 * 
 * @param string $classSelector
 * @param string $message
 * @return string
 */
function stringifyAlertHtml($classSelector, $message)
{
    $ALERT_TYPES = [
        'info' => Message::TITLE_INFO,
        'error' => Message::TITLE_ERROR
    ];
    if (!isset($ALERT_TYPES[$classSelector])) {
        return "";
    }
    $title = $ALERT_TYPES[$classSelector];
    $escapedMessage =  htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    return <<< Alert
        <div id="alert-card" class="$classSelector" role="alert">
            <div id="alert-content">
            <h3>$title</h3>
            <p>$escapedMessage</p>
            </div>
        </div>
    Alert;
}
