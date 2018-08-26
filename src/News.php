<?php
/**
 * Created by PhpStorm.
 * User: nate
 * Date: 8/26/18
 * Time: 2:00 PM
 */

namespace News;


use News\News\Error;
use News\News\Everything;
use News\News\Headline;
use News\News\Source;

class News
{
    const ABC_NEWS         = 'abc-news';
    const AL_JAZEERA       = 'al-jazeera-english';
    const AP               = 'associated-press';
    const AXIOS            = 'axios';
    const BR               = 'bleacher-report';
    const BLOOMBERG        = 'bloomberg';
    const BREITBART        = 'breitbart-news';
    const BUSINESS_INSIDER = 'business-insider';
    const BUZZFEED         = 'buzzfeed';
    const CBS_NEWS         = 'cbs-news';
    const CNBC             = 'cnbc';
    const CNN              = 'cnn';
    const FOX_NEWS         = 'fox-news';
    const URL              = 'https://newsapi.org/v2/';

    protected $error;
    protected $key ;

    /**
     * News constructor.
     * @param $key
     */
    public function __construct( $key )
    {
        $this->key = $key;
    }

    /**
     * @return array
     */
    protected function headers()
    {
        return ['Content-Type: application/json', 'X-Api-Key: ' . $this->key ];
    }

    /**
     * @param array $data
     * @return array|bool|mixed
     */
    public function get_top_headlines( array $data )
    {
        $connect  = new Client();
        $connect->request(
            self::URL . 'top-headlines?' . http_build_query( $data ),
            [],
            Client::GET ,
            $this->headers() );

        $response = is_string( $connect->response ) ? json_decode( $connect->response ) : false;

        if( $response === false ) return [];

        if( property_exists( $response , 'status' ) && $response->status == 'error' ){

            $error = new Error();
            $error->setStatus( $response->status )
                ->setCode( $response->code )
                ->setMessage( $response->message );

            $this->setError( $error ) ;

            return $error;
        }

        $articles = [];
        if( property_exists( $response , 'articles' ) ){
            foreach( $response->articles as $article ){
                $headline = new Headline();
                $source   = new Source();
                $source->setId( $article->source->id )
                    ->setName( $article->source->name );
                $headline->setSource( $source )
                    ->setAuthor( $article->author )
                    ->setTitle( $article->title )
                    ->setUrl( $article->url )
                    ->setDescription( $article->description )
                    ->setUrlToImage( $article->urlToImage )
                    ->setPublishedAt( $article->publishedAt );

                $articles[] = $headline;

            }
        }
        return $articles ;

    }

    /**
     * @param array $data
     * @return array|bool|mixed
     */
    public function get_everything( array $data )
    {
        $connect  = new Client();
        $connect->request(
            self::URL . 'everything?' . http_build_query( $data ),
            [],
            Client::GET ,
            $this->headers() );
        $response = is_string( $connect->response ) ? json_decode( $connect->response ) : false;

        if( $response === false ) return [];

        if( property_exists( $response , 'status' ) && $response->status == 'error' ){

            $error = new Error();
            $error->setStatus( $response->status )
                ->setCode( $response->code )
                ->setMessage( $response->message );

            $this->setError( $error ) ;

            return $error;
        }

        $articles = [];
        if( property_exists( $response , 'articles' ) ){
            foreach( $response->articles as $article ){
                $everything = new Everything();
                $source     = new Source();
                $source->setId( $article->source->id )
                    ->setName( $article->source->name );
                $everything->setSource( $source )
                    ->setAuthor( $article->author )
                    ->setTitle( $article->title )
                    ->setUrl( $article->url )
                    ->setDescription( $article->description )
                    ->setUrlToImage( $article->urlToImage )
                    ->setPublishedAt( $article->publishedAt );

                $articles[] = $everything;

            }
        }
        return $articles ;
    }

    /**
     * @param array $data
     * @return array|bool|mixed
     */
    public function get_sources( array $data )
    {
        $connect  = new Client();

        $response = $connect->request(
            self::URL. 'sources?' . http_build_query( $data ),
            [],
            Client::GET ,
            $this->headers() );
        $response = is_string( $response ) ? json_decode( $response ) : false;

        if( $response === false ) return [];

        if( property_exists( $response , 'status' ) && $response->status == 'error' ){

            $error = new Error();
            $error->setStatus( $response->status )
                ->setCode( $response->code )
                ->setMessage( $response->message );

            $this->setError( $error ) ;

            return $error;
        }

        $sources = [];
        if( property_exists( $response , 'sources' ) ) {

            foreach ($response->sources as $value) {
                $source = new Source();
                $source->setId($value->id)
                    ->setName($value->name)
                    ->setDescription($value->description)
                    ->setCategory($value->category)
                    ->setCountry($value->country)
                    ->setLanguage($value->language);

                $sources[] = $source;
            }
        }
        return $sources;
    }

    /**
     * @return Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param Error $error
     * @return News
     */
    public function setError( Error $error)
    {
        $this->error = $error;
        return $this;
    }



}