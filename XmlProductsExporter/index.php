<?php
/**
 * Created by PhpStorm.
 * User: Giovanni Mozambico
 * Date: 31/01/2020
 * Time: 10:27
 */

use ProductsExporter\ProductsExporterManager;

require_once 'vendor/autoload.php';

$product = new ProductsExporterManager();

$filename = "./exports/export.xml";

file_put_contents (  $filename , $product->init() );

