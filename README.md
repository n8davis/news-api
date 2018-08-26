## Simple News API Wrapper

#### Get Sources
```
$news    = new News( 'YOUR_NEWS_API_KEY' ); 
$sources = $news->get_sources([ 
    'country'  => 'us' ,
    'language' => 'en'
 ]);
```

#### Get Everything 
```
$news    = new News( 'YOUR_NEWS_API_KEY' ); 
$sources = $news->get_everything([ 
    'q'        => 'bitcoin',
    'sources'  => 'bbc-news,the-verge',
    'domains'  => 'bbc.co.uk,techcrunch.com',
    'from'     => '2017-12-01',
    'to'       => '2017-12-12',
    'language' => 'en',
    'sortBy'   => 'relevancy',
    'page'     => 2
 ]);
```


#### Get Top Headlines
```
$news    = new News( 'YOUR_NEWS_API_KEY' ); 
$sources = $news->get_top_headlines([ 
    'q'        => 'bitcoin',
    'sources'  => 'bbc-news,the-verge',
    'category' => 'business',
    'country'  => 'us' ,
    'language' => 'en'
 ]);
```