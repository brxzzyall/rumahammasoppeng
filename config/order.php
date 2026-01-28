<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Order Auto-Delete Configuration
    |--------------------------------------------------------------------------
    |
    | Configure automatic deletion of completed orders
    |
    */

    'auto_delete_delay' => (int) env('ORDER_AUTO_DELETE_DELAY', 30),

];
