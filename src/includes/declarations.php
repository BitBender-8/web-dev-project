<?php
// Input field lengths
const INPUT_MAXLENGTH_SHORT = 10;
const INPUT_MAXLENGTH_DEFAULT = 85;
const INPUT_MAXLENGTH_LONG = 200;

// Textarea lengths
const TEXTAREA_MAXLENGTH_DEFAULT = 1000;
const TEXTAREA_MAXLENGTH_SMALL = 500;

// The maximum filesize allowed in bytes.
const MAX_UPLOAD_FILE_SIZE = 1048576;

// Regex to check phone number
const PHONE_REGEX = '{^[0][0-9]{9}$}';
const PHONE_ERR_MSG = 'Phone number must be a 10-digit number that starts from 0. Eg. 0928329871';
// Regex to check generic numbers
const NUMBER_REGEX = '{^[1-9][0-9]+}';
// Minimum length of passwords
const MIN_PASSWORD_LENGTH = 8;
// List of allowed file types
const ALLOWED_UPLOAD_FILE_TYPES = ['image/jpeg', 'image/png', 'image/pjpeg', 'image/apng', 'application/pdf'];

// Minimum age for a user to sign up
const MIN_AGE = 18;
// Number of bytes in a Kilobyte
const BYTES_IN_KB = 1024;
// Location of the document root - Change this when you want it to work on your PC
define('PROJECT_ROOT', "/");
// Directory to save uploads in
define('UPLOAD_DIRECTORY', "{$_SERVER['DOCUMENT_ROOT']}" . PROJECT_ROOT . "uploads/");

/**
 * Represents an error message. Its fields are immutable once created.
 */
class FormError
{
    /**
     * @var string The name of the $_POST field that caused the error.
     */
    private string $field_name;

    /**
     * @var string A human readable version of the name of the field
     */
    private string $human_readable_name;

    /**
     * @var string The error message.
     */
    private string $error_msg;

    public function __construct(string $field_name, string $human_readable_name, string $error_msg)
    {
        $this->field_name = $field_name;
        $this->human_readable_name = $human_readable_name;
        $this->error_msg = $error_msg;
    }

    /**
     * @return string The error message
     */
    public function getErrorMsg(): string
    {
        return $this->error_msg;
    }

    /**
     * @return string The name of the field as it appears in $_POST[]
     */
    public function getFieldName(): string
    {
        return $this->field_name;
    }

    /**
     * @return string A human readable version of the name
     */
    public function getFieldLabel(): string
    {
        return $this->human_readable_name;
    }
}
