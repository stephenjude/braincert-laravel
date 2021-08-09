<?php

return [
    /**
     * Braincert api response format:
     * - xml
     * - json
     */
    'format' => env('BRAINCERT_FORMAT', 'json'),

    /**
     * Braincer api key
     */
    'api_key' => env('BRAINCERT_API_KEY'),
];
