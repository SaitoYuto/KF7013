<?php

/**
 * Message constants class.
 * 
 * @author Yuto Saito / w23042608
 */
class Message
{
    const DB_CONNECTION_FAIL = "Database connection failed.";
    const SQL_PREPARE_FAIL = "Failed to prepare SQL statement: ";
    const SQL_EXEC_FAIL = "Failed to execute SQL statement: ";
    const LOGIN_FAILURE = "The email address or password you provided may be incorrect.";
    const SIGNUP_FAILURE = "Sign-up failed. Please try again later.";
    const INVALID_REQUEST = "Client Invalid Request.";
    const INTERNAL_SERVER_ERROR = "Internal Server Error.";
}
