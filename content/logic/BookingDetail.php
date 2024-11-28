<?php

require_once 'ConnectionManager.php';

/**
 * Booking details service class.
 * 
 * @author Yuto Saito / w23042608
 */
class BookingDetail
{

    /**
     * Customer ID.
     * 
     * @var int
     */
    private $customerId;

    /**
     * Constructor.
     * 
     * @param int $customerId Customer ID.
     */
    function __construct($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * Fetch booking detail.
     * 
     * @return array
     */
    public function fetch()
    {
        $conn = null;
        $stmt = null;
        try {
            $conn = ConnectionManager::getInstance()->getConnection();
            if (!$conn) {
                throw new Exception(Message::DB_CONNECTION_FAIL);
            }
            $stmt = mysqli_prepare(
                $conn,
                "SELECT t.title, t.description, t.session_date, t.lecturer, t.session_imagepath, t.image_alt, b.total_booking_cost, b.booking_notes
                FROM `booking` AS b INNER JOIN customers AS c ON b.customerID = c.customerID INNER JOIN training_sessions AS t ON b.trainingID = t.trainingID 
                WHERE c.customerID = ?"
            );
            if (!$stmt) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_error($conn));
            }
            if (!mysqli_stmt_bind_param($stmt, "i", $this->customerId,)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }

            $result = mysqli_stmt_get_result($stmt);
            if (!$result) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }

            $bookings = [];
            while ($booking = mysqli_fetch_assoc($result)) {
                $bookings[] = $booking;
            }
            return $bookings;
        } finally {
            $conn = null;
            $stmt = null;
        }
    }
}
