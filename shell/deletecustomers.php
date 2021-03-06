<?php

/**
 *
 * Copyright (c) 2017.
 * deletecustomers.php
 * Code compiled by: @dbashyal 'damu' on 24/10/17 4:20 PM
 * Visit http://dltr.org for Magento Tips and Tricks
 *
 */

require_once "../app/Mage.php";
Mage::app('admin')->setUseSessionInUrl(false);

// populate this array with the order increment ids that you would like to delete
$customerIds = range(145000223,145000322);

$collection = Mage::getModel('customer/customer')->getCollection();//->addFieldToFilter('increment_id', (array) $customerIds);
$collection->addFieldToFilter('email', array('nlike' => '%lowes%'));
$collection->addFieldToFilter('email', array('nlike' => '%acid%'));

foreach($collection as $customer){
    echo 'deleting customer id : ' . $customer->getId() . "\n";
    $customer->delete();
}

echo "Done!!!\n";