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
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 20
    , NULL
    , 'course_ai.png'
    , 'AI Course'
    , 'John Anderson'
    , 'Recommendation'
) 
, ( 
    2
    , 'Internet of Things (IoT): The Future of Connected Devices and Data'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 25
    , NULL
    , 'course_iot.png'
    , 'IoT Course'
    , 'Emily Davis'
    , 'Recommendation'
) 
, ( 
    3
    , 'Foundations and Applications of Cloud Computing'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 28
    , NULL
    , 'course_cloud.png'
    , 'Cloud Course'
    , 'Amelia Edwards'
    , 'Recommendation'
) 
, ( 
    4
    , 'Introduction to Machine Learning: Algorithms and Real-World Applications'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 35
    , 30
    , 'course_machine_learning.png'
    , 'Machine Learning Course'
    , 'Max Fukumoto'
    , 'Recommendation'
) 
, ( 
    5
    , 'Big Data Analytics and Processing Technologies'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 35
    , NULL
    , 'course_bigdata.png'
    , 'BigData Learning Course'
    , 'Jacob Foster'
    , 'Recommendation'
) 
, ( 
    7
    , 'Algorithms: Design, Analysis, and Optimization'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 35
    , NULL
    , 'course_algorithm.png'
    , 'Algorithm Course'
    , 'Olivia Carter'
    , 'New'
) 
, ( 
    8
    , 'iOS Application Development: From Swift Basics to Implementation'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 30
    , NULL
    , 'course_ios.png'
    , 'iOS Course'
    , 'Jing Wenqi Wang'
    , 'New'
) 
, ( 
    9
    , 'Hands-On Android App Development with Kotlin'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 30
    , NULL
    , 'course_android.png'
    , 'Android Course'
    , 'Ethan Parker'
    , 'New'
) 
, ( 
    10
    , 'Data Visualization: Techniques for Effective Visual Communication'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 40
    , NULL
    , 'course_datavisualize.png'
    , 'Data Visualization Course'
    , 'Sophia Anderson'
    , 'New'
) 
, ( 
    11
    , 'Blockchain Technology and Decentralized Application Fundamentals'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 35
    , NULL
    , 'course_blockchain.png'
    , 'Blockchain Course'
    , 'Liam Thompson'
    , 'New'
) 
, ( 
    12
    , 'Object-Oriented Programming with Java'
    , 'T.B.D'
    , '2024-10-20 20:00'
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
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 30
    , 25
    , 'course_python.png'
    , 'Python Course'
    , 'Noah Turner'
    , 'Enrolled'
) 
, ( 
    14
    , 'Web Application Development: Integrating Frontend and Backend'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 38
    , NULL
    , 'course_web.png'
    , 'Web Development Course'
    , 'Ava Robinson'
    , 'Enrolled'
) 
, ( 
    15
    , 'Streaming Protocols and Their Applications'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 40
    , NULL
    , 'course_streaming.png'
    , 'Streaming Course'
    , 'Mason Hughes'
    , 'Enrolled'
) 
, ( 
    16
    , 'User Interface Design: Balancing Usability and Aesthetics'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 35
    , NULL
    , 'course_ui.png'
    , 'User Interface Course'
    , 'Karthik Natarajan'
    , 'Enrolled'
) 
, ( 
    17
    , 'APIs and Data Connectivity: Enabling Data Exchange'
    , 'T.B.D'
    , '2024-10-20 20:00'
    , 30
    , NULL
    , 'course_api.png'
    , 'Web API Course'
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
