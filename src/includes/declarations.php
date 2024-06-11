<?php
// Input field lengths
// Like a Person's title
define("INPUT_MAXLENGTH_SHORT", 10);
// For most inputs like name fields
define("INPUT_MAXLENGTH_DEFAULT", 100);
// For addresses and long inputs
define("INPUT_MAXLENGTH_LONG", 200);

// Textarea lengths
define("TEXTAREA_MAXLENGTH_DEFAULT", 1000);
define("TEXTAREA_MAXLENGTH_SMALL", 500);

// The maximum filesize allowed in bytes.
define("MAX_UPLOAD_FILE_SIZE", 1048576);

// Regex to check phone number
define("PHONE_REGEX", '/^[0][0-9]{9}$/');
// Error message to display if phone regex doesn't match
define("PHONE_ERR_MSG", 'Phone number must be a 10-digit number that starts from 0. Eg. 0928329871');
// Regex to check generic numbers
define("NUMBER_REGEX", '/^[1-9][0-9]+/');

// List of allowed file types)
define("ALLOWED_UPLOAD_FILE_TYPES", ['image/jpeg', 'image/png', 'image/pjpeg', 'image/apng', 'application/pdf']);

// Number of bytes in a Kilobyte
define("BYTES_IN_KB", 1024);
// Directory to save uploads in
define("UPLOAD_DIRECTORY", "{$_SERVER['DOCUMENT_ROOT']}/Uploads/");

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
