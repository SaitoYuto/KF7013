<?php

/**
 * Booking service class.
 * 
 * @author Yuto Saito / w23042608
 */
class Booking
{
    /**
     * Training ID.
     * 
     * @var int
     */
    private $trainingId;

    /**
     * Customer ID.
     * 
     * @var int
     */
    private $customerId;

    /**
     * Student count.
     * 
     * @var int
     */
    private $studentCount;

    /**
     * Total cost.
     * 
     * @var float
     */
    private $totalCost;

    /**
     * Booking note.
     * 
     * @var string|null
     */
    private $note;

    /**
     * Constructor.
     * 
     * @param int $trainingId Training ID.
     * @param int $customerId Customer ID.
     * @param int $studentCount Student count.
     * @param float $totalCost Total cost.
     * @param string|null $note Booking note.
     */
    function __construct($trainingId, $customerId, $studentCount, $totalCost, $note)
    {
        $this->trainingId = $trainingId;
        $this->customerId = $customerId;
        $this->studentCount = $studentCount;
        $this->totalCost = $totalCost;
        $this->note = $note;
    }


    /**
     * Book training.
     * 
     * @return void
     * @throws Exception
     */
    public function book()
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
                "INSERT INTO booking (trainingID, customerID, number_people, total_booking_cost, booking_notes) VALUES (?, ?, ?, ?, ?)"
            );
            if (!$stmt) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_error($conn));
            }
            if (!mysqli_stmt_bind_param($stmt, "iiids", $this->trainingId, $this->customerId, $this->studentCount, $this->totalCost, $this->note)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
        } finally {
            $conn = null;
            $stmt = null;
        }
    }
}
