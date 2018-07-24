<?php

require '../src/CleverPush.php';

$cleverPush = new CleverPush('INSERT_PRIVATE_API_KEY_HERE');

print_r($cleverPush->request('GET', '/channels'));
