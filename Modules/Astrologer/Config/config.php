<?php

return [
    'name' => 'Astrologer',
    'google' => [
        /*
        | Spreadsheet ID for new orders
        */
        'spreadsheet_id' => env('GOOGLE_SPREADSHEET_ID', ''),

        /*
        | Sheet ID for new orders
        */
        'sheet_id' => env('GOOGLE_SHEET_ID', ''),
    ],
];
