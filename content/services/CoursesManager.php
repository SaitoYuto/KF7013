<?php

include './services/ConnectionManager.php';

/**
 * Courses data management class.
 * This class is designed as Singleton pattern.
 * 
 * @author Yuto Saito / w23042608
 */
class CoursesManager
{
    /**
     * Self instances.
     * 
     * @var CoursesManager
     */
    private static $instance;

    /**
     * Courses.
     * 
     * @var array|null|false
     */
    private $courses;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            static::$instance = new CoursesManager();
            static::$instance->load();
        }
        return static::$instance;
    }

    private function load()
    {
        $conn = null;
        $stmt = null;
        try {
            $conn = ConnectionManager::getInstance()->getConnection();
            if (!$conn) {
                throw new Exception(Message::DB_CONNECTION_FAIL);
            }
            $stmt = mysqli_prepare($conn, "SELECT * FROM training_sessions");
            if (!$stmt) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_error($conn));
            }
            if (!mysqli_stmt_execute($stmt)) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }
            $result = mysqli_stmt_get_result($stmt);
            if (!$result) {
                throw new Exception(Message::INTERNAL_SERVER_ERROR . mysqli_stmt_error($stmt));
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $this->courses[] = $row;
            }
        } finally {
            $conn = null;
            $stmt = null;
        }
    }

    /**
     * Get courses by category.
     * 
     * @return array Courses.
     */
    public function getCoursesByCategory($category)
    {
        $array = [];
        foreach ($this->courses as $course) {
            if ($course['category'] === $category) {
                array_push($array, $course);
            }
        }
        return $array;
    }
}
