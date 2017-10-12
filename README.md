# QueryList V4 Plugin - BingSearcher
BingSearcher
# Installation
```
composer require liesauer/ql-plugin-bingsearcher
```
# Bind
* BingSearcher `BingSearcher` ()
# BingSearcher
* BingSearcher search(string $keyword) - 设置搜索关键字
* BingSearcher setHttpOption(array $httpOpt = []) - 设置抓取时使用的http设置，详细参数请阅读Guzzle文档
* array page(int $page) - 获取第$page页的内容
* array pages(int $pages, int $base = 1) - 获取从$base开始总共$pages页的内容
* int getCount() - 获取总共的结果数
* int getPages() - 获取总共的页数（由总结果数计算而得，而实际上Bing似乎最多只能搜索100页）

**每页只能固定10条**
# Usage
```php
use liesauer\QLPlugin\BingSearcher;
use QL\QueryList;

require_once __DIR__ . '/vendor/autoload.php';

$ql = QueryList::getInstance();

// use this plugin
$ql->use(BingSearcher::class);

$bingSearcher = $ql->BingSearcher();

$result = $bingSearcher->search('QueryList')->pages(3);

var_dump($result);

/*
array(30) {
  [0]=>
  array(2) {
    ["title"]=>
    string(57) "QueryList|基于phpQuery的无比强大的PHP采集工具"
    ["link"]=>
    string(21) "https://querylist.cc/"
  }
  [1]=>
  array(2) {
    ["title"]=>
    string(35) "介绍 - QueryList 4.0 指导文档"
    ["link"]=>
    string(25) "https://doc.querylist.cc/"
  }
  [2]=>
  array(2) {
    ["title"]=>
    string(56) "Google - 谷歌搜索引擎 - QueryList 4.0 指导文档"
    ["link"]=>
    string(42) "https://doc.querylist.cc/site/index/doc/43"
  }
  [3]=>
  array(2) {
    ["title"]=>
    string(48) "GitHub - thomasw/querylist: Sick of for loop …"
    ["link"]=>
    string(36) "https://github.com/thomasw/querylist"
  }
  [4]=>
  array(2) {
    ["title"]=>
    string(70) "QueryList首页、文档和下载 - PHP采集工具 - 开源中国 …"
    ["link"]=>
    string(31) "https://oschina.net/p/querylist"
  }
  [5]=>
  array(2) {
    ["title"]=>
    string(33) "QueryList Element (Windows) - …"
    ["link"]=>
    string(79) "https://msdn.microsoft.com/en-us/library/windows/desktop/aa385678(v=vs.85).aspx"
  }
  [6]=>
  array(2) {
    ["title"]=>
    string(57) "PHP 用QueryList抓取网页内容 - wb145230 - 博客园"
    ["link"]=>
    string(46) "http://www.cnblogs.com/wb145230/p/4716403.html"
  }
  [7]=>
  array(2) {
    ["title"]=>
    string(31) "Understanding ViewChildren, …"
    ["link"]=>
    string(101) "https://netbasal.com/understanding-viewchildren-contentchildren-and-querylist-in-angular-896b0c689f6e"
  }
  [8]=>
  array(2) {
    ["title"]=>
    string(47) "QueryList - ts - API - Archived Angular v2 Docs"
    ["link"]=>
    string(72) "https://v2.angular.io/docs/ts/latest/api/core/index/QueryList-class.html"
  }
  [9]=>
  array(2) {
    ["title"]=>
    string(58) "QueryList3 正式发布！ - QueryList交流社区|基 …"
    ["link"]=>
    string(36) "https://querylist.cc/article-15.html"
  }
  [10]=>
  array(2) {
    ["title"]=>
    string(70) "QueryList首页、文档和下载 - PHP采集工具 - 开源中国 …"
    ["link"]=>
    string(34) "http://www.oschina.net/p/querylist"
  }
  [11]=>
  array(2) {
    ["title"]=>
    string(47) "GitHub - jae-jae/QueryList: QueryList是基 …"
    ["link"]=>
    string(36) "https://github.com/jae-jae/QueryList"
  }
  [12]=>
  array(2) {
    ["title"]=>
    string(67) "QueryList 4.0 简洁、优雅、可扩展的PHP采集工具(爬 …"
    ["link"]=>
    string(39) "http://www.tuicool.com/articles/6n6nqii"
  }
  [13]=>
  array(2) {
    ["title"]=>
    string(56) "QueryList 4.0 简洁、优雅的 PHP 采集工具 - V2EX"
    ["link"]=>
    string(29) "https://www.v2ex.com/t/394689"
  }
  [14]=>
  array(2) {
    ["title"]=>
    string(71) "QueryList学习二十三：专题—对于更复杂的http网络操 …"
    ["link"]=>
    string(36) "https://www.thinkswn.com/article/143"
  }
  [15]=>
  array(2) {
    ["title"]=>
    string(70) "PHP 使用 QueryList 轻松实现一个百度网盘资源搜索引 …"
    ["link"]=>
    string(29) "https://www.v2ex.com/t/395748"
  }
  [16]=>
  array(2) {
    ["title"]=>
    string(42) "QueryList · angular学习笔记 · 看云"
    ["link"]=>
    string(56) "https://www.kancloud.cn/wujie520303/angular2_note/262962"
  }
  [17]=>
  array(2) {
    ["title"]=>
    string(54) "智能矩阵超级学习系统 | Super learning System"
    ["link"]=>
    string(41) "http://s.wanxue.cn/sls/category/queryList"
  }
  [18]=>
  array(2) {
    ["title"]=>
    string(33) "QueryList Element (Windows) - …"
    ["link"]=>
    string(79) "https://msdn.microsoft.com/en-us/library/windows/desktop/aa385678(v=vs.85).aspx"
  }
  [19]=>
  array(2) {
    ["title"]=>
    string(56) "querylist - 文库下载 1亿免费文档搜索与下载"
    ["link"]=>
    string(60) "http://www.wenkuxiazai.com/doc/4c3d3ac516fc700abb68fcca.html"
  }
  [20]=>
  array(2) {
    ["title"]=>
    string(54) "智能矩阵超级学习系统 | Super learning System"
    ["link"]=>
    string(41) "http://s.wanxue.cn/sls/category/queryList"
  }
  [21]=>
  array(2) {
    ["title"]=>
    string(71) "PHP使用QueryList轻松实现一个百度网盘资源搜索引擎  …"
    ["link"]=>
    string(49) "http://www.voidcn.com/article/p-xgojkxyz-boa.html"
  }
  [22]=>
  array(2) {
    ["title"]=>
    string(70) "QueryList 4.0 简洁、优雅、可扩展的PHP采... 来自稀土 …"
    ["link"]=>
    string(41) "http://www.weibo.com/5383066644/Fp8UU6dAx"
  }
  [23]=>
  array(2) {
    ["title"]=>
    string(53) "用querylist实现页面爬虫_PHP教程_第七城市"
    ["link"]=>
    string(50) "http://www.th7.cn/Program/php/201708/1237963.shtml"
  }
  [24]=>
  array(2) {
    ["title"]=>
    string(64) "DImage 图片下载扩展 | QueryList采集器开发手册 | …"
    ["link"]=>
    string(37) "http://www.php.cn/php/php-DImage.html"
  }
  [25]=>
  array(2) {
    ["title"]=>
    string(48) "GitHub - jae-jae/QueryList: Simple, elegant, …"
    ["link"]=>
    string(36) "https://github.com/jae-jae/QueryList"
  }
  [26]=>
  array(2) {
    ["title"]=>
    string(68) "QueryList 4.0 发布,简洁、优雅的PHP采集工具_太原达 …"
    ["link"]=>
    string(38) "http://ty.php.tedu.cn/news/261718.html"
  }
  [27]=>
  array(2) {
    ["title"]=>
    string(71) "QueryList学习二十三：专题—对于更复杂的http网络操 …"
    ["link"]=>
    string(36) "https://www.thinkswn.com/article/143"
  }
  [28]=>
  array(2) {
    ["title"]=>
    string(12) "Angular Docs"
    ["link"]=>
    string(37) "https://angular.io/api/core/QueryList"
  }
  [29]=>
  array(2) {
    ["title"]=>
    string(69) "关于hibernate querylist无法返回查询结果 高手解救一 …"
    ["link"]=>
    string(40) "http://www.codes51.com/itwd/2945668.html"
  }
}
```