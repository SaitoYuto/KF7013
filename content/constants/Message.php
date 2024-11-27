<?php

/**
 * Message constants class.
 * 
 * @author Yuto Saito / w23042608
 */
class Message
{
    const AFTER_SIGNUP = "After signing up successfully, automatically redirect to the login page.";
    const DB_CONNECTION_FAIL = "Database connection failed.";
    const DEFAULT_ERROR = "Unexpected Error";
    const DUPLICATE_EMAIL = "An account with this email address already exists.";
    const INTERNAL_SERVER_ERROR = "Internal Server Error.";
    const INVALID_EMAIL_FORMAT = "Invalid email format.";
    const INVALID_REQUEST = "Invalid request.";
    const INVALID_COURSE_ID = "Invalid course ID.";
    const LOGIN_FAILURE = "The email address or password you provided may be incorrect.";
    const NOT_FOUND_COURSE = "Not found course.";
    const SIGNUP_FAILURE = "Sign-up failed. Please try again later.";
    const SQL_PREPARE_FAIL = "Failed to prepare SQL statement: ";
    const SQL_EXEC_FAIL = "Failed to execute SQL statement: ";
    const REQUIRED_CUSTOMER_ID = "Customer ID is required";
    const REQUIRED_EMAIL = "Email is required";
    const REQUIRED_LOGIN = "Login is required.";
    const TITLE_INFO = "INFO";
    const TITLE_ERROR = "ERROR";
}
