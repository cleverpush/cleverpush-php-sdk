<?php

require '../src/CleverPush.php';

$cleverPush = new CleverPush('INSERT_PRIVATE_API_KEY_HERE');

print_r($cleverPush->request('POST', '/notification/send', [
    'channelId' => '',
    'title' => 'Example',
    'text' => 'Optional Subtitle', // Optional
    'url' => 'https://cleverpush.com',
    'subscriptionId' => '' // Optional, will broadcast to all subscribers if not given
]));
