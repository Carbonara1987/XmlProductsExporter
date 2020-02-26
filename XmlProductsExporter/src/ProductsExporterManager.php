<?php
/**
 * Created by PhpStorm.
 * User: Giovanni Mozambico
 * Date: 31/01/2020
 * Time: 12:15
 */

namespace ProductsExporter;

use PDO;
use Spatie\ArrayToXml\ArrayToXml;



class ProductsExporterManager
{

    private $products = [];
    private $conn;


    private function getData()
    {
        $conn = new Database();
        $this->conn = $conn->connect();


        $sql = "SELECT *
            prod.ID as id,
            prod.code as code,
            prod.description as description
            FROM Products as prod
            LIMIT 100
        ";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->products = $row;


        return $this;

    }


    /**
     * @return array
     */
    public function getProducts()
    {
        $data = $this->getData();
        $products = $data->products;
        $this->products = $products;
        return $this->products;
    }

    public function init(){

        $productExport = $this->getProducts();
        $xml =  ArrayToXml::convert(['product' => $productExport]);

        return $xml;
    }

}