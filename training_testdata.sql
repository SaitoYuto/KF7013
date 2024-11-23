--
-- Dumping data for table `customers`
-- The password is `Fredtest`
--

INSERT INTO `customers` (`customerID`, `password_hash`, `customer_forename`, `customer_surname`,`customer_email`, `date_of_birth`) VALUES
(1, '$2y$10$qOrhpkdI0Mib.Hizs7.6A.hApiW2HfJIH/iut2Q87m/NbSJRcdbx6', 'Fred', 'Brown', 'fred@test.com', '1985-11-13 00:00:00');

--
-- Dumping data for table `training_sessions`
--

INSERT INTO `training_sessions` (`trainingID`, `title`, `description`, `session_date`, `price_per_person`, `session_imagepath`) VALUES
(1, 'Asian Cooking course', 'Learn how to cook a variety of dishes from all over Asia','2024-10-20 20:00',25.50, 'AsianCooking.jpg'),
(2, 'Cake Decorating', 'All things icing and decorating will be covered with lots of hands-on practice', '2024-11-08 14:00',12.00,'CakeDecorating.jpg');

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`trainingID`, `customerID`, `number_people`,`total_booking_cost`, `booking_notes`) VALUES
(1, 1, 2, 51.00,'Wheelchair access needed');

