<?php

namespace luxury;

use Requests;

class Client
{
    public $request;
    public $domain;
    public $urlList;
    public $headers;
    public $options;
    public $error = "";
    public $errorNo = "";
    public $errorInfo = [];

    public function __construct($domain)
    {
        $this->domain = $domain;
        Requests::register_autoloader();
        $this->request = new \Requests_Session();
        $this->urlList = array(
            'getTopCategory'        => "/index/category/getTopCategory",
            'getChildCategory'      => "/index/category/getChildCategory",
            'getBrandList'          => "/index/brand/getBrandByCategoryId",
            'getSeriesList'         => "/index/brand/getSeriesByBrandId",
            'getModelList'          => "/index/brand/getModelBySeriesId",
            'getModelListByBrandId' => "/index/brand/getModelListByBrandId",
            'getBrandById'          => "/index/brand/getBrandById",
            'searchBrandByName'     => "/index/brand/searchByName",
            'getTopAttribute'       => "/index/attribute/getTopAttributeByCategoryId",
            'getChildAttribute'     => "/index/attribute/getChildAttribute",
            'searchProductByModel'  => "/index/product/searchProductByModel",
            'getProduct'            => "/index/product/getProductById",
            'getProductByBrandId'   => "/index/product/getProductByBrandId",
            'getProductBySeriesId'  => "/index/product/getProductBySeriesId",
            'getProductByModelId'   => "/index/product/getProductByModelId",
        );
        $this->headers = array(
            "Content-Type" => "application/json",
        );
        $this->options = array();
    }

    public function start()
    {
        return $this->getProduct('45952');
    }

    /**
     * buildData 整理需要返回的数据
     * @param $response
     * @return bool|mixed
     */
    protected function buildData($response)
    {
        if ($response->status_code == 200) {

            $body = json_decode($response->body, true);

            if (is_array($body)) {
                if ($body['code'] == '200') {
                    return $body['data'];
                } else {
                    $this->error   = $body['error'];
                    $this->errorNo = $body['errorNo'];
                    return false;
                }
            } else {
                $this->error     = "获取数据失败";
                $this->errorNo   = "data_parse_error";
                $this->errorInfo = $response;
                return false;
            }
        } else {
            $this->error     = "请求失败";
            $this->errorNo   = "request_fail";
            $this->errorInfo = $response->body;

            return false;
        }


    }

    /**
     * getTopCategory 获取所有顶级分类
     * @return bool|mixed
     */
    public function getTopCategory()
    {
        $data     = array();
        $response = $this->request->get($this->domain . $this->urlList['getTopCategory'], $this->headers, $data, $this->options);
        return $this->buildData($response);

    }

    /**
     * getChildCategory 获取某个分类下的子分类
     * @param int $categoryId
     * @return bool|mixed
     */
    public function getChildCategory($categoryId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getChildCategory'] . "/category_id/" . $categoryId, $this->headers);
        return $this->buildData($response);
    }


    /**
     * getBrandList  获取某个分类下的品牌
     * @param int $categoryId
     * @return bool|mixed
     */
    public function getBrandList($categoryId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getBrandList'] . "/category_id/" . $categoryId, $this->headers);
        return $this->buildData($response);
    }

    /**
     * getSeriesList 获取系列
     * @param int $brandId
     * @return bool|mixed
     */
    public function getSeriesList($brandId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getSeriesList'] . "/brand_id/" . $brandId, $this->headers);
        return $this->buildData($response);
    }

    /**
     * getModelList 获取型号
     * @param int $seriesId
     * @return bool|mixed
     */
    public function getModelList($seriesId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getModelList'] . "/series_id/" . $seriesId, $this->headers);
        return $this->buildData($response);
    }

    /**
     * getModelList 获取型号
     * @param int $seriesId
     * @return bool|mixed
     */
    public function getModelListByBrandId($brandId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getModelListByBrandId'] . "/brand_id/" . $brandId, $this->headers);
        return $this->buildData($response);
    }

    public function getBrandById($brandId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getBrandById'] . "/brand_id/" . $brandId, $this->headers);
        return $this->buildData($response);
    }

    public function getSeriesById($seriesId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getBrandById'] . "/brand_id/" . $seriesId, $this->headers);
        return $this->buildData($response);
    }

    public function getModelById($modelId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getBrandById'] . "/brand_id/" . $modelId, $this->headers);
        return $this->buildData($response);
    }

    /**
     * searchBrand
     * @param $brandName
     * @param int $categoryId
     * @return bool|mixed
     */
    public function searchBrand($brandName, $categoryId = 1)
    {
        return $this->searchBrandByName($brandName, 'brand', $categoryId);
    }

    /**
     * searchSeries
     * @param $seriesName
     * @param int $categoryId
     * @return bool|mixed
     */
    public function searchSeries($seriesName, $categoryId = 1)
    {
        return $this->searchBrandByName($seriesName, 'series', $categoryId);
    }

    /**
     * searchModel
     * @param $modelName
     * @param int $categoryId
     * @return bool|mixed
     */
    public function searchModel($modelName, $categoryId = 1)
    {
        return $this->searchBrandByName($modelName, 'model', $categoryId);
    }

    /**
     * searchBrandByName  搜索品牌
     * @param $brandName
     * @param $type
     * @param int $categoryId
     * @return bool|mixed
     */
    protected function searchBrandByName($brandName, $type, $categoryId = 1)
    {
        $data     = array(
            'name'        => $brandName,
            'type'        => $type,
            'category_id' => $categoryId,
        );
        $data     = json_encode($data);
        $response = $this->request->post($this->domain . $this->urlList['searchBrandByName'], $this->headers, $data, $this->options);
        return $this->buildData($response);
    }


    /**
     * getTopAttribute 获取顶级属性
     * @param int $categoryId
     * @return bool|mixed
     */
    public function getTopAttribute($categoryId = 1)
    {
        $response = $this->request->get($this->domain . $this->urlList['getTopAttribute'] . "/category_id/" . $categoryId, $this->headers);
        return $this->buildData($response);
    }

    /**
     * getChildrenAttribute 获取子属性
     * @param int $attributeId
     */
    public function getChildAttribute($attributeId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getChildAttribute'] . "/attribute_id/" . $attributeId, $this->headers);
        return $this->buildData($response);
    }


    /**
     * searchProductByModel 搜索型号
     * @param string $model
     * @param int $page
     * @return bool|mixed
     */
    public function searchProductByModel($model = "", $page = 1)
    {
        $data     = array(
            'model' => $model,
            'page'  => $page
        );
        $data     = json_encode($data);
        $response = $this->request->post($this->domain . $this->urlList['searchProductByModel'], $this->headers, $data, $this->options);
        return $this->buildData($response);
    }


    /**
     * getProduct
     * @param int $productId
     * @return bool|mixed
     */
    public function getProduct($productId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getProduct'] . "/product_id/" . $productId, $this->headers);
        return $this->buildData($response);
    }

    public function getProductByBrandId($brandId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getProductByBrandId'] . "/brand_id/" . $brandId, $this->headers);
        return $this->buildData($response);
    }

    public function getProductBySeriesId($seriesId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getProductBySeriesId'] . "/series_id/" . $seriesId, $this->headers);
        return $this->buildData($response);
    }

    public function getProductByModelId($modelId = 0)
    {
        $response = $this->request->get($this->domain . $this->urlList['getProductByModelId'] . "/model_id/" . $modelId, $this->headers);
        return $this->buildData($response);
    }
}