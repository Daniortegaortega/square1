<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Session;
use App\Http\Request;
use App\WishList;

class ScrappingController extends Controller
{

    private $client;
    public $url;
    public $crawler;
    public $filters;
    public $content = array();

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getIndex()
    {
        $this->url = "https://www.appliancesdelivered.ie/dishwashers";
        $this->setScrapeUrl($this->url);

        $this->filters = [
        	'image' => '.product-image > a > img',
        	'image_marca' => '.product-description > div > div > a > img',
        	'title' => 'h4',
        	'descripcion' => '.result-list-item-desc-list',
        	'precio_actual' => 'div > div > div > div > h3',	
        ];

        return view('welcome')->with('contents',$this->getContents());

    }

    public function setScrapeUrl($url = NULL, $method = "GET")
    {
    	$this->crawler = $this->client->request($method, $url);
    	return $this->crawler;
    }

    public function getContents()
    {
    	return $this->content = $this->scraper();
    }

    public function scraper()
    {
    	$count = $this->crawler->filter('.search-results-product')->count();
    	if ($count){
	    	$this->content = $this->crawler->filter('.search-results-product')->each(function(Crawler $node,$i){
	    		return [
	    			'image' => $node->filter($this->filters['image'])->attr('src'),
	    			'image_marca' => $node->filter($this->filters['image_marca'])->attr('src'),
	    			'title' => $node->filter($this->filters['title'])->text(),
	    			'descripcion' => $node->filter($this->filters['descripcion'])->text(),
	    			'precio_actual' => $node->filter($this->filters['precio_actual'])->text(),

	    		];
	    	});
	    }
	    return $this->content;
    }
}
