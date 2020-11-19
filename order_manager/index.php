<?php

require('order.php');
require('orders_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_orders';
    }
}

if ($action == 'list_orders' || $action == 'Order Manager') {
    include(all_orders.php);
}