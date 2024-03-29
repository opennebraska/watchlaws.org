<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | To be used in models
    |
    */

    'group_type' => [
        'group'     => 'Group',
        'workspace' => 'Workspace',
        'topic'     => 'Topic',
    ],
    'group_membership_role' => [
        'user'      => 'User',
        'admin'     => 'Admin',
        'moderator' => 'Moderator',
    ],
    'user_role' => [
        'user'      => 'User',
        'admin'     => 'Admin',
    ],

    /*
    |--------------------------------------------------------------------------
    | Views
    |--------------------------------------------------------------------------
    |
    | to be used in views
    |
    */

    'navigation_states' => [
        'NE' => 'Nebraska',
        'SD' => 'South Dakota',
        'US' => 'U.S. Congress',
    ],

    /*
    |--------------------------------------------------------------------------
    | LegiScan codes
    |--------------------------------------------------------------------------
    |
    | The enumerations for LegiScan codes
    |
    */

    'legiscan_carry_over' => ['OE', 'EO', 'NO'],
    'legiscan_states'     => [
        'AL' => 'Alabama',
        'AK' => 'Alaska',
        'AZ' => 'Arizona',
        'AR' => 'Arkansas',
        'CA' => 'California',
        'CO' => 'Colorado',
        'CT' => 'Connecticut',
        'DE' => 'Delaware',
        'FL' => 'Florida',
        'GA' => 'Georgia',
        'HI' => 'Hawaii',
        'ID' => 'Idaho',
        'IL' => 'Illinois',
        'IN' => 'Indiana',
        'IA' => 'Iowa',
        'KS' => 'Kansas',
        'KY' => 'Kentucky',
        'LA' => 'Louisiana',
        'ME' => 'Maine',
        'MD' => 'Maryland',
        'MA' => 'Massachusetts',
        'MI' => 'Michigan',
        'MN' => 'Minnesota',
        'MS' => 'Mississippi',
        'MO' => 'Missouri',
        'MT' => 'Montana',
        'NE' => 'Nebraska',
        'NV' => 'Nevada',
        'NH' => 'New Hampshire',
        'NJ' => 'New Jersey',
        'NM' => 'New Mexico',
        'NY' => 'New York',
        'NC' => 'North Carolina',
        'ND' => 'North Dakota',
        'OH' => 'Ohio',
        'OK' => 'Oklahoma',
        'OR' => 'Oregon',
        'PA' => 'Pennsylvania',
        'RI' => 'Rhode Island',
        'SC' => 'South Carolina',
        'SD' => 'South Dakota',
        'TN' => 'Tennessee',
        'TX' => 'Texas',
        'UT' => 'Utah',
        'VT' => 'Vermont',
        'VA' => 'Virginia',
        'WA' => 'Washington',
        'WV' => 'West Virginia',
        'WI' => 'Wisconsin',
        'WY' => 'Wyoming',
        'DC' => 'Washington D.C.',
        'US' => 'U.S. Congress',
    ],

];
