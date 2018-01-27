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
    - 获取子分类
2. 品牌、系列、型号
    - 获取所有品牌
    - 获取品牌下的系列
    - 获取系列下的型号
    - 搜索品牌
    - 搜索系列
    - 搜索型号
3. 属性
    - 获取某个分类下的属性
    - 获取某个属性的子属性
4. 产品
    - 通过型号搜索某个产品
    - 获取某个产品的详细信息
    
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
- 获取所有品牌
- 获取品牌下的系列
- 获取系列下的型号
- 搜索品牌
- 搜索系列
- 搜索型号
- 获取某个分类下的属性
- 获取某个属性的子属性
- 通过型号搜索某个产品
- 获取某个产品的详细信息


