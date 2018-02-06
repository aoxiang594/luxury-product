# Luxury Product Library


## 概述

Luxury Product 是一个产品库SDK，需配合产品库使用。包含了分类、品牌、系列、型号等属性

## 安装
> composer require aoxiang/luxury-product dev-master

## 使用
```php
require_once __DIR__ . '/vendor/autoload.php';  
use luxury\Client;  
$client = new Client("http://127.0.0.1:8089");
$data = $client->getTopCategory();

var_dump($data);
```

##### 得到结果
```json
{
    "list": [{
        "category_id": "1",
        "category_name": "腕表",
        "parent_id": "0",
        "alias": "机芯",
        "keywords": "腕表,手表,表",
        "logo": "miniapp\/static\/watch.png",
        "sort": "40"
    }, {
        "category_id": "2",
        "category_name": "箱包",
        "parent_id": "0",
        "alias": "",
        "keywords": "箱包",
        "logo": "miniapp\/static\/bag.png",
        "sort": "30"
    }, {
        "category_id": "4",
        "category_name": "首饰",
        "parent_id": "0",
        "alias": "",
        "keywords": "首饰",
        "logo": "miniapp\/static\/jewelry.png",
        "sort": "20"
    }, {
        "category_id": "3",
        "category_name": "服饰",
        "parent_id": "0",
        "alias": "",
        "keywords": "服饰",
        "logo": "miniapp\/static\/clothes.png",
        "sort": "10"
    }],
    "total": "4",
    "totalPage": "1",
    "page": 1
}
```


## 文档目录
1. 分类
    - <a href="#getTopCategory">获取顶级分类</a>
    - <a href="#getChildAttribute">获取子分类</a>
2. 品牌、系列、型号
    - <a href="#getBrandList">获取所有品牌</a>
    - <a href="#getSeriesList">获取品牌下的系列</a>
    - <a href="#getModelList">获取系列下的型号</a>
    - <a href="#searchBrand">搜索品牌</a>
    - <a href="#searchSeries">搜索系列</a>
    - <a href="#searchModel">搜索型号</a>
3. 属性
    - <a href="#getTopAttribute">获取某个分类下的属性</a>
    - <a href="#getChildAttribute">获取某个属性的子属性</a>
4. 产品
    - <a href="#searchProductByModel">通过型号搜索某个产品</a>
    - <a href="#getProduct">获取某个产品的详细信息</a>
    - <a href="#getProductByBrandId">通过品牌获取产品信息列表</a>
    - <a href="#getProductBySeriesId">通过系列获取产品信息列表</a>
    - <a href="#getProductByModelId">通过型号获取产品信息列表</a>
    
#### <a name="getTopCategory">获取顶级分类</a>
调用代码
```php 
$client->getTopCategory();
```
返回结果
```json
{
    "code": "200",
    "data": {
        "list": [
            {
                "category_id": "1",
                "category_name": "腕表",
                "parent_id": "0",
                "alias": "机芯",
                "keywords": "腕表,手表,表",
                "logo": "miniapp/static/watch.png",
                "sort": "40"
            },
            {
                "category_id": "2",
                "category_name": "箱包",
                "parent_id": "0",
                "alias": "",
                "keywords": "箱包",
                "logo": "miniapp/static/bag.png",
                "sort": "30"
            },
            {
                "category_id": "4",
                "category_name": "首饰",
                "parent_id": "0",
                "alias": "",
                "keywords": "首饰",
                "logo": "miniapp/static/jewelry.png",
                "sort": "20"
            },
            {
                "category_id": "3",
                "category_name": "服饰",
                "parent_id": "0",
                "alias": "",
                "keywords": "服饰",
                "logo": "miniapp/static/clothes.png",
                "sort": "10"
            }
        ],
        "total": "4",
        "totalPage": "1",
        "page": 1
    },
    "error": "",
    "errorNo": ""
}
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|category_id|string|分类id|
|category_name|string|分类名称|
|parent_id|string|父级id|
|alias|string|别名|
|keywords|string|搜索关键词|
|logo|string|logo|
|sort|string|排序|


#### 获取子分类
获取某个分类下的子分类

调用代码
```php 
$client->getChildCategory($categoryId);
$client->getChildCategory(1);
```
返回参数参考<a href="#getTopCategory">获取顶级分类</a>
#### <a name="getBrandList">获取某个分类下所有品牌</a>
调用代码
```php 
$client->getBrandList($categoryId);
$client->getBrandList(1);
```
```json
{
    "code": "200",
    "data": {
        "list": [
            {
                "brand_id": "1",
                "brand_name": "爱彼",
                "parent_id": "0",
                "logo": "",
                "category_id": "1",
                "sort": "50",
                "initial": "A",
                "type": "1"
            },
            {
                "brand_id": "10",
                "brand_name": "艾米龙",
                "parent_id": "0",
                "logo": "",
                "category_id": "1",
                "sort": "50",
                "initial": "A",
                "type": "1"
            }
            //...
        ],
        "total": "77",
        "totalPage": "1",
        "page": "1"
    },
    "error": "",
    "errorNo": ""
}
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|brand_id|string|品牌id|
|brand_name|string|品牌名称|
|parent_id|string|父级id|
|initial|string|首字母|
|category_id|string|分类id|
|logo|string|logo|
|sort|string|排序|
|type|string|1-品牌，2-系列，3-型号|

### <a name="getSeriesList">获取品牌下的系列</a>
相比获取品牌，会多出series_name、series_id了两个参数
```php 
$client->getSeriesList($brandId);//传入品牌id
$client->getSeriesList(1);
```
```json
{
    "code": "200",
    "data": {
        "list": [
            {
                "brand_id": "9",
                "brand_name": "传统TRADITION",
                "parent_id": "1",
                "logo": "",
                "category_id": "1",
                "sort": "50",
                "initial": "C",
                "type": "2",
                "series_name": "传统TRADITION",
                "series_id": "9"
            },
            {
                "brand_id": "2",
                "brand_name": "高级珠宝HAUTE JOAILLERIE系列",
                "parent_id": "1",
                "logo": "",
                "category_id": "1",
                "sort": "50",
                "initial": "G",
                "type": "2",
                "series_name": "高级珠宝HAUTE JOAILLERIE系列",
                "series_id": "2"
            }
            //...
        ],
        "total": "77",
        "totalPage": "1",
        "page": "1"
    },
    "error": "",
    "errorNo": ""
}
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|series_id|string|系列id|
|series_name|string|系列名称|

#### <a name="getModelList">获取系列下的型号</a>
相比获取品牌，会多出model_name、model_id了两个参数,
```php 
$client->getModelList($seriesId);//传入系列id
$client->getModelList(9);
```
```json
{
    "code": "200",
    "data": {
        "list": [
            {
                "brand_id": "2131",
                "brand_name": "15334OR.OO.A092CR.01",
                "parent_id": "9",
                "logo": "",
                "category_id": "1",
                "sort": "50",
                "initial": "1",
                "type": "3",
                "model_name": "15334OR.OO.A092CR.01",
                "model_id": "2131"
            },
            //...
        ],
        "total": "77",
        "totalPage": "1",
        "page": "1"
    },
    "error": "",
    "errorNo": ""
}
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|model_id|string|型号id|
|model_name|string|型号名称|

#### <a name="searchBrand">搜索品牌</a>
```php
$client->searchBrand($name,$categoryId);
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|name|string|品牌名称|
|category_id|string|分类id|

返回参数及参数说明参考<a href="#getBrandList">获取品牌列表</a>

#### <a name="searchSeries">搜索系列</a>
```php
$client->searchSeries($name,$categoryId);
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|name|string|系列名称|
|category_id|string|分类名称|

返回参数及参数说明参考<a href="#getSearchList">获取系列列表</a>

#### <a name="searchModel">搜索型号</a>
```php
$client->searchModel($name,$categoryId);
```
参数说明

|键|类型|说明|
|:---|:---:|---:|
|name|string|型号名称|
|category_id|string|型号id|

返回参数及参数说明参考<a href="#getModelList">获取型号列表</a>

#### <a name="getTopAttribute">获取某个分类下的属性</a>
```php
$client->getTopAttribute($categoryId);
$client->getTopAttribute(1);
```
```json
{
    "code": "200",
    "data": [
        {
            "attribute_id": "70275",
            "attribute_name": "附件",
            "attribute_type": "checkbox",
            "logo": "nologo.png",
            "usage": "3",
            "format": "",
            "parent_id": "0",
            "category_id": "1",
            "attribute_value": [],
            "children": {
                "list": [
                    {
                        "attribute_id": "70402",
                        "attribute_name": "国检卡",
                        "attribute_type": "checkbox",
                        "logo": "nologo.png",
                        "usage": "3",
                        "parent_id": "70275",
                        "format": "",
                        "category_id": "1"
                    },
                    {
                        "attribute_id": "70403",
                        "attribute_name": "中检证书",
                        "attribute_type": "checkbox",
                        "logo": "nologo.png",
                        "usage": "3",
                        "parent_id": "70275",
                        "format": "",
                        "category_id": "1"
                    }
                ],
                "totalPage": "1",
                "total": "6",
                "page": "1"
            }
        },
        {
            "attribute_id": "11",
            "attribute_name": "表径",
            "attribute_type": "text",
            "logo": "nologo.png",
            "usage": "3",
            "format": "",
            "parent_id": "0",
            "category_id": "1",
            "attribute_value": "",
            "children": {
                "list": [],
                "totalPage": "1",
                "total": "0",
                "page": "1"
            }
        }
        {
            "attribute_id": "32",
            "attribute_name": "表扣材质",
            "attribute_type": "select",
            "logo": "nologo.png",
            "usage": "3",
            "format": "",
            "parent_id": "0",
            "category_id": "1",
            "attribute_value": "",
            "children": {
                "list": [
                    {
                        "attribute_id": "70189",
                        "attribute_name": "铜",
                        "attribute_type": "select",
                        "logo": "logo/6mpd0eo1n29.jpg",
                        "usage": "3",
                        "parent_id": "32",
                        "format": "",
                        "category_id": "1"
                    },
                    {
                        "attribute_id": "70190",
                        "attribute_name": "镀金",
                        "attribute_type": "select",
                        "logo": "/attribute/material/dujin.png",
                        "usage": "3",
                        "parent_id": "32",
                        "format": "",
                        "category_id": "1"
                    }
                ],
                "totalPage": "1",
                "total": "14",
                "page": "1"
            }
        }
    ],
    "error": "",
    "errorNo": ""
}
```

|键|类型|说明|
|:-------|:-------|:-------|
| attribute_id | string| 属性id |
| attribute_name | string| 属性名称|
| attribute_type | string| 属性类型，text-文本，checkbox-多选，select-单选|
| logo | string| logo |
| usage | string| 用途，3入库时属性用的|
| format | string| 属性格式|
| parent_id | string| 父级属性id|
| category_id | string| 分类ID|
| - children |object  |如果有子属性（checkbox\select）的话，这里包含子属性 |

#### <a name="getChildAttribute">获取某个属性的子属性</a>
```php
$client->getChildrenAttribute($attributeId);
$client->getChildrenAttribute(32);
```
返回参数及参数说明参考<a href="#getTopAttribute">获取顶级属性列表</a>
#### <a name="searchProductByModel">通过型号搜索某个产品</a>
```php
$client->searchProductByModel($model, $page);//型号名称，页码
$client->searchProductByModel("L12",1);
```
```json
{
    "code": "200",
    "errorNo": "",
    "error": "",
    "errorInfo": [],
    "data": {
        "list": [
            {
                "product_id": "47812",
                "category_id": "1",
                "title": "宇舶BIG BANG 322.CI.1123.GR",
                "brand_id": "898",
                "series_id": "902",
                "model_id": "46290",
                "brand_name": "宇舶",
                "series_name": "BIG BANG",
                "model_name": "322.CI.1123.GR",
                "public_price": "141500.00",
                "photo": "http://productimg.xbiao.com/63/240_360/920914683800185.jpg"
            }
        ],
        "total": "733",
        "totalPage": "37",
        "page": "3"
    }
}
```

|键|类型|说明|
|:-------|:-------|:-------|
| product_id | string| 产品id |
| category_id | string| 分类ID|
| title | string| 标题 |
| brand_id | string| 产品品牌 |
| series_id | string|产品系列 |
| model_id | string| 产品型号 |
| brand_name | string| 品牌名称 |
| series_name | string| 系列名称|
| model_name | string|型号名称 |
| public_price | string| 公价|
| photo | string| 产品图片|

返回参数及参数说明参考<a href="#getTopAttribute">获取顶级属性列表</a>
#### <a name="getProduct">获取某个产品的详细信息</a>
```php
$client->getProduct($productId);//型号ID
$client->getProduct(49729);
```
```json
{
    "code": "200",
    "errorNo": "",
    "error": "",
    "errorInfo": [],
    "data": {
        "product_id": "49729",
        "category_id": "1",
        "title": "依波时代元素50280216",
        "brand_id": "956",
        "series_id": "972",
        "model_id": "48205",
        "brand_name": "依波",
        "series_name": "时代元素MODERN ELEMENTS",
        "model_name": "50280216",
        "public_price": "1480.00",
        "photo": "http://productimg.xbiao.com/91/240_360/4813314703776156.gif",
        "add_time": "2017-11-30 16:34:12",
        "attribute_list": [
            {
                "product_attribute_id": "1178292",
                "product_id": "49729",
                "attribute_id": "7",
                "mark": "jixinleixing",
                "attribute_name": "机芯类型",
                "attribute_value": "230,230",
                "attribute_value_name": "石英,石英",
                "attribute_type": "select",
                "parent_id": "0"
            }
        ]
    }
}
```
参数说明


|键|类型|说明|
|:-------|:-------|:-------|
| product_id | string| 产品id |
| category_id | string| 分类ID|
| title | string| 标题 |
| brand_id | string| 产品品牌 |
| series_id | string|产品系列 |
| model_id | string| 产品型号 |
| brand_name | string| 品牌名称 |
| series_name | string| 系列名称|
| model_name | string|型号名称 |
| public_price | string| 公价|
| photo | string| 产品图片|
| attribute_list | string| 属性列表|

属性列表中参数说明

|键|类型|说明|
|:-------|:-------|:-------|
| product_attribute_id | string| 产品属性值id |
| product_id | string| 产品ID|
| attribute_id | string| 属性ID|
| mark | string| 标识 |
| attribute_name | string| 属性名称 |
| attribute_value | string| 属性值id，如果是多选，这里是个数组|
| attribute_value_name | string| 属性值名称 |
| attribute_type | string| 属性类型|
| parent_id | string|父级属性id |

#### <a name="getProductByBrandId">通过品牌获取产品信息列表</a>
```php
$client->getProductByBrandId($brandId);
$client->getProductByBrandId(1);
```
```json
{
    "code": "200",
    "errorNo": "",
    "error": "",
    "errorInfo": [],
    "data": {
        "list": [
            {
                "product_id": "926",
                "category_id": "1",
                "title": "艾米龙挑战者 08.1169.G.6.AW.98.6",
                "brand_id": "10",
                "series_id": "11",
                "model_id": "2136",
                "brand_name": "艾米龙",
                "series_name": "挑战者",
                "model_name": " 08.1169.G.6.AW.98.6",
                "public_price": "11200.00",
                "photo": "http://productimg.xbiao.com/101/240_360/3429014611429948.jpg",
                "add_time": "2017-11-30 13:40:22"
            }
        ],
        "total": "733",
        "totalPage": "1",
        "page": "1"
    }
}
```
返回参数及参数说明参考<a href="#searchProductByModel">通过型号搜索产品</a>


#### <a name="getProductBySeriesId">通过系列获取产品信息列表</a>
```php
$client->getProductBySeriesId($seriesId);
$client->getProductBySeriesId(2);
```
```json
{
    "code": "200",
    "errorNo": "",
    "error": "",
    "errorInfo": [],
    "data": {
        "list": [
            {
                "product_id": "1",
                "category_id": "1",
                "title": "爱彼高级珠宝79418BC.ZZ.9188BC.01",
                "brand_id": "1",
                "series_id": "2",
                "model_id": "1285",
                "brand_name": "爱彼",
                "series_name": "高级珠宝HAUTE JOAILLERIE系列",
                "model_name": "79418BC.ZZ.9188BC.01",
                "public_price": "5638000.00",
                "photo": "http://productimg.xbiao.com/57/240_360/3781014690949321.jpg",
                "add_time": "2017-11-30 13:38:20"
            }
        ],
        "total": "733",
        "totalPage": "1",
        "page": "1"
    }
}
```
返回参数及参数说明参考<a href="#searchProductByModel">通过型号搜索产品</a>
#### <a name="getProductByModelId">通过型号获取产品信息列表</a>
```php
$client->getProductByModelId($modelId);
$client->getProductByModelId(2216);
```
```json
{
    "code": "200",
    "errorNo": "",
    "error": "",
    "errorInfo": [],
    "data": {
        "product_id": "1006",
        "category_id": "1",
        "title": "艾米龙莱蒙15.1168.G42.6.8.68.2",
        "brand_id": "10",
        "series_id": "17",
        "model_id": "2216",
        "brand_name": "艾米龙",
        "series_name": "莱蒙",
        "model_name": "15.1168.G42.6.8.68.2",
        "public_price": "18000.00",
        "photo": "http://productimg.xbiao.com/101/240_360/3377714036832777.jpg",
        "add_time": "2017-11-30 13:40:33",
        "attribute_list": [
            {
                "product_attribute_id": "27447",
                "product_id": "1006",
                "attribute_id": "7",
                "mark": "jixinleixing",
                "attribute_name": "机芯类型",
                "attribute_value": "8,8",
                "attribute_value_name": "自动机械,自动机械",
                "attribute_type": "select",
                "parent_id": "0"
            }
        ]
    }
}
```
返回参数及参数说明参考<a href="#searchProductByModel">通过型号搜索产品</a>