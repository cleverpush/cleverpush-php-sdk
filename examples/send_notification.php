<?php

require '../src/CleverPush.php';

$cleverPush = new CleverPush('INSERT_PRIVATE_API_KEY_HERE');

print_r($cleverPush->request('POST', '/notifiation/send'), [
    'channelId' => '',
    'title' => 'Example',
    'text' => 'Optional Subtitle', // Optional
    'url' => 'https://cleverpush.com',
    'subscriptionId' => 'XXXXXX' // Optional, will broadcast to all subscribers if not given
]);
