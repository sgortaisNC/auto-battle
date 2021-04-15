<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With');
//header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Max-Age: 600');

echo json_encode(['test' => 'GRAVE']);
