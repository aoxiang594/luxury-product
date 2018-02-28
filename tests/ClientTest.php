<?php
require_once __DIR__ . '/../../../autoload.php';

use luxury\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public $client;

    public function __construct()
    {
        $this->client = new luxury\Client('http://127.0.0.1:8089');
    }

//    public function startTest()
//    {
//        $this->testGetTopCategory();
//        $this->testGetChildCategory();
//        $this->testGetBrandList();
//        $this->testGetSeriesList();
//        $this->testGetModelList();
//        $this->testGetModelListByBrandId();
//        $this->testSearchBrand();
//        $this->testSearchSeries();
//        $this->testSearchModel();
//        $this->testSearchProductByModel();
//        $this->testGetProduct();
//        $this->testGetProductByBrandId();
//        $this->testGetProductBySeriesId();
//        $this->testGetProductByModelId();
//        $this->testFilterProduct();
//        $this->testFilterProduct();
//    }

    public function testGetTopCategory()
    {
        $data = $this->client->getTopCategory();

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }


    public function testGetChildCategory()
    {
        $data = $this->client->getChildCategory('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetBrandList()
    {
        $data = $this->client->getBrandList('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetSeriesList()
    {
        $data = $this->client->getSeriesList('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetModelList()
    {
        $data = $this->client->getModelList('9');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetModelListByBrandId()
    {
        $data = $this->client->getModelListByBrandId('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testSearchBrand()
    {
        $data = $this->client->searchBrand('劳');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testSearchSeries()
    {
        $data = $this->client->searchSeries('HAUTE');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testSearchModel()
    {
        $data = $this->client->searchModel('26564RC');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetBrandById()
    {
        $data = $this->client->getBrandById('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));
    }

    public function testGetSeriesById()
    {
        $data = $this->client->getSeriesById('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));
    }

    public function testGetModelById()
    {
        $data = $this->client->getModelById('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));
    }


    public function testGetTopAttribute()
    {
        $data = $this->client->getTopAttribute('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetChildAttribute()
    {
        $data = $this->client->getChildAttribute('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));
    }

    public function testSearchProductByModel()
    {
        $data = $this->client->searchProductByModel('26564RC');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetProduct()
    {
        $data = $this->client->getProduct('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetProductByBrandId()
    {
        $data = $this->client->getProductByBrandId('1');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetProductBySeriesId()
    {
        $data = $this->client->getProductBySeriesId('2');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetProductByModelId()
    {
        $data = $this->client->getProductByModelId('1285');

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testFilterProduct()
    {
        $filterList = array(
            'brand_id'   => array(1, 10),
            'sex'        => array(1),
            'size'       => array(35),
            'core_type'  => array(1),
            'min_price'  => 10000,
            'max_price'  => 50000,
            'material'   => array(26),
            'watch_band' => array(70394, 70396)
        );
        $data       = $this->client->FilterProduct($filterList, 1);

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }

    public function testGetProductIdList()
    {
        $filterList = array(
            'brand_id'   => array(1, 10),
            'sex'        => array(1),
            'size'       => array(35),
            'core_type'  => array(1),
            'min_price'  => 10000,
            'max_price'  => 50000,
            'material'   => array(26),
            'watch_band' => array(70394, 70396)
        );
        $data       = $this->client->getProductIdList($filterList, 1);

        $this->assertEquals(is_array($data), true, "Error:" . $this->client->error . ",errorNo:" . $this->client->errorNo);
        $this->assertTrue(empty($this->client->error));

    }


}