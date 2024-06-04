<?php

define("INPUT_MAXLENGTH_DEFAULT", 100);
define("INPUT_MAXLENGTH_LONG", 200);
define("INPUT_MAXLENGTH_SHORT", 10);
define("TEXTAREA_MAXLENGTH_DEFAULT", 100);
define("TEXTAREA_MAXLENGTH_SMALL", 500);
define("MAX_FILE_SIZE", 10000);
define("PHONE_REGEX", '/^[0-9]{10}$/');

/**
 * Represents an error message. Its fields are immutable once created.
 */
class FormError {
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

    public function __construct(string $field_name, string $human_readable_name, string $error_msg) {
        $this->field_name = $field_name;
        $this->human_readable_name = $human_readable_name;
        $this->error_msg = $error_msg;
    }

    /**
     * @return string The error message
     */
    public function getErrorMsg(): string {
        return $this->error_msg;
    }

    /**
     * @return string The name of the field as it appears in $_POST[]
     */
    public function getFieldName(): string {
        return $this->field_name;
    }

    /**
     * @return string A human readable version of the name
     */
    public function getFieldLabel(): string {
        return $this->human_readable_name;
    }
}
