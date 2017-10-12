<?php

namespace liesauer\QLPlugin;

use QL\Contracts\PluginContract;
use QL\QueryList;

class BingSearcher implements PluginContract
{
    private static $api   = 'http://cn.bing.com/search?q=';
    private static $range = '#b_results > .b_algo';
    private static $rules = [
        'title' => ['h2 > a', 'text'],
        'link'  => ['h2 > a', 'href'],
    ];

    private $querylist;
    private $keyword;
    private $httpOpt = [];

    private function __construct(QueryList $querylist)
    {
        $this->querylist = $querylist->rules(self::$rules)->range(self::$range);
    }

    public static function install(QueryList $querylist, ...$opts)
    {
        $name         = $opt[0] ?? 'BingSearcher';
        $bingSearcher = new BingSearcher($querylist);
        $querylist->bind($name, function () use ($bingSearcher) {
            return $bingSearcher;
        });
    }

    public function setHttpOption(array $httpOpt = [])
    {
        $this->httpOpt = $httpOpt;

        return $this;
    }

    public function search(string $keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    public function page($page = 1)
    {
        // Collection to Array
        return $this->query($page)->query()->getData()->toArray();
    }

    public function pages($pages, $base = 1)
    {
        $results = [];
        for ($i = $base; $i <= $pages; $i++) {
            $res     = $this->page($i);
            $results = array_merge($results, $res);
        }

        return $results;
    }

    public function getCount()
    {
        $count = 0;
        // $text  = getMiddleText($this->query(1)->find('.sb_count')->text(), '共 ', ' 条');
        // if ($text !== false) {
        //     $count = (int) str_replace(',', '', $text);
        // }
        $count = intval(str_replace(',', '', $this->query(1)->find('.sb_count')->text()));

        return $count;
    }

    public function getPages()
    {
        return ceil($this->getCount() / 10);
    }

    private function query($page = 1)
    {
        $this->querylist->get(self::$api, [
            'q'     => (string) $this->keyword,
            'first' => ($page - 1) * 10 + 1,
            // 'qs'   => 'ds',
            // 'form' => 'QBRE',
            // 'web'  => 'scope',
        ], $this->httpOpt);

        return $this->querylist;
    }
}
