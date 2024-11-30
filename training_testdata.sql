INSERT 
INTO `customers` ( 
    `customerID`
    , `password_hash`
    , `customer_forename`
    , `customer_surname`
    , `customer_email`
    , `date_of_birth`
) 
VALUES ( 
    1
    , '$2y$10$qOrhpkdI0Mib.Hizs7.6A.hApiW2HfJIH/iut2Q87m/NbSJRcdbx6'
    , 'Fred'
    , 'Brown'
    , 'fred@test.com'
    , '1985-11-13 00:00:00'
); 

--
-- Dumping data for table `training_sessions`
--
INSERT 
INTO `training_sessions` ( 
    `trainingID`
    , `title`
    , `description`
    , `session_date`
    , `price_per_person`
    , `discount_price`
    , `session_imagepath`
    , `image_alt`
    , `lecturer`
    , `category`
) 
VALUES ( 
    1
    , 'Artificial Intelligence: Concepts, Techniques, and Real-World Applications'
    , 'This course provides a comprehensive introduction to the fundamental concepts, methodologies, and practical applications of Artificial Intelligence (AI). Students will explore key AI techniques, including machine learning, natural language processing, computer vision, and expert systems. The course emphasizes understanding both the theoretical foundations of AI and its real-world implementations across various industries, such as healthcare, finance, and autonomous systems. Through a combination of lectures, hands-on projects, and case studies, participants will gain the skills to develop AI-driven solutions and critically evaluate their impact on society. This course is ideal for those aiming to build a strong foundation in AI and apply it to solve complex, real-world problems.'
    , '2024-10-20 20:00'
    , 20
    , NULL
    , 'course_ai.png'
    , 'AI Course Thumbnail'
    , 'John Anderson'
    , 'Recommendation'
) 
, ( 
    2
    , 'Internet of Things (IoT): The Future of Connected Devices and Data'
    , 'Explore the world of IoT, where everyday devices connect and communicate using advanced technologies. Learn about IoT architecture, protocols, and applications, and discover how data from connected devices is shaping industries like healthcare, transportation, and smart cities.'
    , '2024-11-26 19:00'
    , 25
    , NULL
    , 'course_iot.png'
    , 'IoT Course Thumbnail'
    , 'Emily Davis'
    , 'Recommendation'
) 
, ( 
    3
    , 'Foundations and Applications of Cloud Computing'
    , 'Gain a comprehensive understanding of cloud computing, from fundamental concepts to real-world applications. Topics include cloud infrastructure, virtualization, and services such as IaaS, PaaS, and SaaS. Learn how cloud technology is revolutionizing businesses.'
    , '2025-01-13 17:00'
    , 28
    , NULL
    , 'course_cloud.png'
    , 'Cloud Course Thumbnail'
    , 'Amelia Edwards'
    , 'Recommendation'
) 
, ( 
    4
    , 'Introduction to Machine Learning: Algorithms and Real-World Applications'
    , 'Dive into the basics of machine learning, including supervised, unsupervised, and reinforcement learning. Understand key algorithms and discover how machine learning is used to solve practical problems in areas like finance, healthcare, and image recognition.'
    , '2025-02-07 18:00'
    , 35
    , 30
    , 'course_machine_learning.png'
    , 'Machine Learning Course Thumbnail'
    , 'Max Fukumoto'
    , 'Recommendation'
) 
, ( 
    5
    , 'Big Data Analytics and Processing Technologies'
    , 'Learn how to design efficient algorithms, analyze their performance, and optimize them for real-world problems. Topics include divide-and-conquer, dynamic programming, graph algorithms, and advanced data structures.'
    , '2025-03-03 20:00'
    , 35
    , NULL
    , 'course_bigdata.png'
    , 'BigData Learning Course Thumbnail'
    , 'Jacob Foster'
    , 'Recommendation'
) 
, ( 
    7
    , 'Algorithms: Design, Analysis, and Optimization'
    , 'Learn how to design efficient algorithms, analyze their performance, and optimize them for real-world problems. Topics include divide-and-conquer, dynamic programming, graph algorithms, and advanced data structures.'
    , '2025-03-27 19:00'
    , 35
    , NULL
    , 'course_algorithm.png'
    , 'Algorithm Course Thumbnail'
    , 'Olivia Carter'
    , 'New'
) 
, ( 
    8
    , 'iOS Application Development: From Swift Basics to Implementation'
    , 'Begin your journey into iOS development with an introduction to Swift programming and Apples development tools. Build functional and user-friendly iOS apps, covering concepts from interface design to deployment on the App Store.'
    , '2025-04-21 20:00'
    , 30
    , NULL
    , 'course_ios.png'
    , 'iOS Course Thumbnail'
    , 'Jing Wenqi Wang'
    , 'New'
) 
, ( 
    9
    , 'Hands-On Android App Development with Kotlin'
    , 'Develop Android applications using Kotlin, a modern and versatile programming language. This course emphasizes practical skills, guiding you through UI design, database integration, and app publishing.'
    , '2025-05-15 20:00'
    , 30
    , NULL
    , 'course_android.png'
    , 'Android Course Thumbnail'
    , 'Ethan Parker'
    , 'New'
) 
, ( 
    10
    , 'Data Visualization: Techniques for Effective Visual Communication'
    , 'Learn how to transform data into compelling visuals that communicate insights effectively. This course covers visualization principles, tools like Tableau and D3.js, and best practices for storytelling with data.'
    , '2025-06-09 20:00'
    , 40
    , NULL
    , 'course_datavisualize.png'
    , 'Data Visualization Course Thumbnail'
    , 'Sophia Anderson'
    , 'New'
) 
, ( 
    11
    , 'Blockchain Technology and Decentralized Application Fundamentals'
    , 'Explore the fundamentals of blockchain technology and its applications in decentralized systems. Learn how blockchain ensures data security and transparency, and understand the basics of developing decentralized applications (dApps).'
    , '2025-06-20 21:00'
    , 35
    , NULL
    , 'course_blockchain.png'
    , 'Blockchain Course Thumbnail'
    , 'Liam Thompson'
    , 'New'
) 
, ( 
    12
    , 'Object-Oriented Programming with Java'
    , 'Discover the principles of object-oriented programming (OOP) using Java. This course covers classes, inheritance, polymorphism, and other OOP concepts while building real-world applications.'
    , '2025-07-20 20:00'
    , 30
    , 25
    , 'course_java.png'
    , 'Java Course'
    , 'Emily Collins'
    , 'Enrolled'
) 
, ( 
    13
    , 'Introduction to Python Programming and Data Analysis'
    , 'Begin coding in Python and learn how to analyze data effectively. This course covers Python syntax, libraries like Pandas and NumPy, and techniques for cleaning, visualizing, and interpreting data.'
    , '2025-10-08 20:00'
    , 30
    , 25
    , 'course_python.png'
    , 'Python Course Thumbnail'
    , 'Noah Turner'
    , 'Enrolled'
) 
, ( 
    14
    , 'Web Application Development: Integrating Frontend and Backend'
    , 'Develop full-stack web applications by combining frontend and backend technologies. This course covers HTML, CSS, JavaScript, and frameworks like React and Node.js, enabling you to build robust, dynamic websites.'
    , '2025-10-20 20:00'
    , 38
    , NULL
    , 'course_web.png'
    , 'Web Development Course Thumbnail'
    , 'Ava Robinson'
    , 'Enrolled'
) 
, ( 
    15
    , 'Streaming Protocols and Their Applications'
    , 'Gain an understanding of streaming protocols like RTSP, HLS, and WebRTC, and learn how they power live video, audio, and data delivery. Explore real-world use cases in media, gaming, and communication platforms.'
    , '2025-11-11 19:00'
    , 40
    , NULL
    , 'course_streaming.png'
    , 'Streaming Course Thumbnail'
    , 'Mason Hughes'
    , 'Enrolled'
) 
, ( 
    16
    , 'User Interface Design: Balancing Usability and Aesthetics'
    , 'Learn how to create user interfaces that are both visually appealing and user-friendly. This course covers design principles, usability testing, and tools like Figma and Adobe XD for prototyping.'
    , '2025-11-20 20:00'
    , 35
    , NULL
    , 'course_ui.png'
    , 'User Interface Course Thumbnail'
    , 'Karthik Natarajan'
    , 'Enrolled'
) 
, ( 
    17
    , 'APIs and Data Connectivity: Enabling Data Exchange'
    , 'Discover how APIs facilitate data exchange between systems and applications. Learn how to design, consume, and secure APIs while exploring real-world examples like REST and GraphQL.'
    , '2025-12-16 20:00'
    , 30
    , NULL
    , 'course_api.png'
    , 'Web API Course Thumbnail'
    , 'Charlotte Scott'
    , 'Enrolled'
);


--
-- Dumping data for table `booking`
--
INSERT 
INTO `booking` ( 
    `trainingID`
    , `customerID`
    , `number_people`
    , `total_booking_cost`
    , `booking_notes`
) 
VALUES (1, 1, 2, 51.00, 'Wheelchair access needed');
