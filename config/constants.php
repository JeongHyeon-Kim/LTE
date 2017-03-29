<?php
$entireSubjectArray = array();

return [
    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */
    '$entireSubjectArray' => env('$entireSubjectArray', array()),
    'dayCount' => env('dayCount', 6),
    'periodCount' => env('periodCount', 26),
];
?>