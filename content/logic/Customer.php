<?php

require_once 'ConnectionManager.php';

/**
 * Customer service class.
 * 
 * @author Yuto Saito / w23042608
 */
class Customer
{
    /**
     * The column for the customer ID.
     */
    public const COL_CUSTOMER_ID = 'customerID';

    /**
     * The column for storing the customer's password hash.
     */
    public const COL_PASSWORD_HASH = 'password_hash';

    /**
     * The column for the customer's first name.
     */
    public const COL_FORENAME = 'customer_forename';

    /**
     * The column for the customer's last name.
     */
    public const COL_SURNAME = 'customer_surname';

    /**
     * The column for the customer's email address.
     */
    public const COL_EMAIL = 'customer_email';

    /**
     * The column for the customer's date of birth.
     */
    public const COL_DOB = 'date_of_birth';

    /**
     * Customer's ID.
     * 
     * @var string|null
     */
    private $id;

    /**
     * Customer's raw password.
     * 
     * @var string|null
     */
    private $rawPassword;

    /**
     * Customer's password hash.
     * 
     * @var string|null
     */
    private $passwordHash = null;

    /**
     * Customer's forename.
     * 
     * @var string|null
     */
    private $forename;

    /**
     * Customer's surname.
     * 
     * @var string|null
     */
    private $surname;

    /**
     * Customer's email.
     * 
     * @var string|null
     */
    private $email;

    /**
     * Customer's data of birth.
     * 
     * @var string|null
     */
    private $dob;

    /**
     * A list of whitelisted column names for use in dynamic SQL queries.
     * 
     * @var array
     */
    const WHITE_LIST = [self::COL_CUSTOMER_ID, self::COL_EMAIL];

    /**
     * Constructor.
     * 
     * @param string $id Customer's id.
     * @param string $forename Customer's forename.
     * @param string $surname Customer's surname.
     * @param string $email Customer's email.
     * @param string $rawPassword Customer's password.
     * @param string $dob Customer's date of birth.
     */
    function __construct($id, $forename, $surname, $email, $rawPassword, $dob)
    {
        $this->id = $id;
        $this->forename = $forename;
        $this->surname = $surname;
        $this->email = $email;
        $this->rawPassword = $rawPassword;
        $this->dob = $dob;
    }

    /**
     * Get customer's id.
     * 
     * @return string Customer's id
     */
    public function getID()
    {
        return $this->id;
    }

    /**
     * Get customer's forename
     * 
     * @return string Customer's forename.
     */
    public function getForename()
    {
        return $this->forename;
    }

    /**
     * Get customer's surname.
     * 
     * @return string Customer's surname.
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Get customer's email.
     * 
     * @return string Customer's email.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get customer's date of birth.
     * 
     * @return string Customer's date of birth.
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Sets customer's properties based on the provided associative array.
     *
     * @param array $customer Associative array containing customer data. 
     *                        Expected keys: COL_CUSTOMER_ID, COL_PASSWORD_HASH, 
     *                        COL_FORENAME, COL_SURNAME, COL_EMAIL, COL_DOB.
     */
    private function setCustomer($customer)
    {
        $this->setID($customer[self::COL_CUSTOMER_ID]);
        $this->setPasswordHash($customer[self::COL_PASSWORD_HASH]);
        $this->setForename($customer[self::COL_FORENAME]);
        $this->setSurname($customer[self::COL_SURNAME]);
        $this->setEmail($customer[self::COL_EMAIL]);
        $this->setDob($customer[self::COL_DOB]);
    }

    /**
     * Set the ID.
     *
     * @param string $id Customer's ID.
     */
    private function setID($id)
    {
        $this->id = $id;
    }

    /**
     * Set the password hash.
     *
     * @param string $passwordHash Customer's hashed password.
     */
    private function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    /**
     * Set the forename.
     *
     * @param string $forename Customer's forename.
     */
    private function setForename($forename)
    {
        $this->forename = $forename;
    }

    /**
     * Set customer's surname.
     *
     * @param string $surname Customer's forename.
     */
    private function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * Set customer's email.
     *
     * @param string $email Customer's email.
     */
    private function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception(Message::INVALID_EMAIL_FORMAT);
        }
        $this->email = $email;
    }

    /**
     * Set the date of birth.
     *
     * @param string $dob customer's date of birth.
     */
    private function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * Sign up.
     * 
     * @return boolean Result of signup.
     */
    public function signup()
    {
        if (!$this->isDuplicateEmail()) {
            $this->register();
            return true;
        }
        return false;
    }

    /**
     * Determines if email is duplicate.
     * 
     * @return boolean Duplicate of not.
     * @throws Exception
     */
    private function isDuplicateEmail()
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
                "SELECT customerID FROM customers WHERE customer_email = ?"
            );
            if (!$stmt) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_error($conn));
            }
            if (!mysqli_stmt_bind_param($stmt, "s", $this->email)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            $result = mysqli_stmt_get_result($stmt);
            if (!$result) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if (mysqli_num_rows($result) > 0) {
                throw new Exception(Message::DUPLICATE_EMAIL);
            } else {
                return false;
            }
        } finally {
            $conn = null;
            $stmt = null;
        }
    }

    /**
     * Register customer.
     * 
     * @return void
     * @throws Exception
     */
    private function register()
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
                "INSERT INTO customers (password_hash, customer_forename, customer_surname, customer_email, date_of_birth) VALUES (?, ?, ?, ?, ?)"
            );
            if (!$stmt) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_error($conn));
            }
            if (!mysqli_stmt_bind_param($stmt, "sssss", password_hash($this->rawPassword, PASSWORD_DEFAULT), $this->forename, $this->surname, $this->email, $this->dob)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
        } finally {
            if ($stmt) {
                mysqli_stmt_close($stmt);
            }
            if ($conn) {
                mysqli_close($conn);
            }
        }
    }

    /**
     * Login.
     * 
     * @return boolean Result of login.
     */
    public function login()
    {
        $this->loadCustomerByEmail();
        return password_verify($this->rawPassword, $this->passwordHash);
    }

    /**
     * Load customer date by customer ID.
     */
    public function loadCustomerById()
    {
        if (!$this->id) {
            throw new Exception(Message::REQUIRED_CUSTOMER_ID);
        }
        $sql = "SELECT customerID, password_hash, customer_forename, customer_surname, customer_email, date_of_birth
        FROM customers
        WHERE customerID = ? LIMIT 1";
        $this->loadCustomerByField($sql, $this->id);
    }

    /**
     * Load customer date by email.
     */
    public function loadCustomerByEmail()
    {
        if (!$this->email) {
            throw new Exception(Message::REQUIRED_EMAIL);
        }
        $sql = "SELECT customerID, password_hash, customer_forename, customer_surname, customer_email, date_of_birth
        FROM customers
        WHERE customer_email = ? LIMIT 1";
        $this->loadCustomerByField($sql, $this->email);
    }

    /**
     * Load customer date by specific field.
     * 
     * @param string $sql SQL. 
     * @param string $value Value.
     */
    private function loadCustomerByField($sql, $value)
    {
        $conn = null;
        $stmt = null;
        try {
            $conn = ConnectionManager::getInstance()->getConnection();
            if (!$conn) {
                throw new Exception(Message::DB_CONNECTION_FAIL);
            }

            $stmt = mysqli_prepare($conn, $sql);
            if (!$stmt) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_error($conn));
            }
            if (!mysqli_stmt_bind_param($stmt, "s", $value)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            $result = mysqli_stmt_get_result($stmt);
            if (!$result) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            if ($customer = mysqli_fetch_assoc($result)) {
                $this->setCustomer($customer);
            }
        } finally {
            $conn = null;
            $stmt = null;
        }
    }
}
