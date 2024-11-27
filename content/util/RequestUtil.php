<?php
require_once './constants/Message.php';

class RequestUtil
{
    /**
     * Get error message based on request parameter.
     * 
     * @param string $reqParam request parameter.
     * @return string Error message.
     */
    static function getErrorMessageByParam($reqParam)
    {
        switch ($reqParam) {
            case 'unauthorize':
                return Message::REQUIRED_LOGIN;
            case 'invalid_course_id':
                return Message::INVALID_COURSE_ID;
            case 'not_found_course':
                return Message::NOT_FOUND_COURSE;
            default:
                return Message::DEFAULT_ERROR;
        }
    }
}
