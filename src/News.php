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
    /*
     * constants for all news api sources
     * use these constants to get the headlines for a particular source
     *
     */
    const ABC_NEWS                    = "abc-news";
    const ABC_NEWS_AU                 = "abc-news-au";
    const AFTENPOSTEN                 = "aftenposten";
    const AL_JAZEERA_ENGLISH          = "al-jazeera-english";
    const ANSAIT                      = "ansa";
    const ARGAAM                      = "argaam";
    const ARS_TECHNICA                = "ars-technica";
    const ARY_NEWS                    = "ary-news";
    const ASSOCIATED_PRESS            = "associated-press";
    const AUSTRALIAN_FINANCIAL_REVIEW = "australian-financial-review";
    const AXIOS                       = "axios";
    const BBC_NEWS                    = "bbc-news";
    const BBC_SPORT                   = "bbc-sport";
    const BILD                        = "bild";
    const BLASTING_NEWS_BR            = "blasting-news-br";
    const BLEACHER_REPORT             = "bleacher-report";
    const BLOOMBERG                   = "bloomberg";
    const BREITBART_NEWS              = "breitbart-news";
    const BUSINESS_INSIDER            = "business-insider";
    const BUSINESS_INSIDER_UK         = "business-insider-uk";
    const BUZZFEED                    = "buzzfeed";
    const CBC_NEWS                    = "cbc-news";
    const CBS_NEWS                    = "cbs-news";
    const CNBC                        = "cnbc";
    const CNN                         = "cnn";
    const CNN_SPANISH                 = "cnn-es";
    const CRYPTO_COINS_NEWS           = "crypto-coins-news";
    const DAILY_MAIL                  = "daily-mail";
    const DER_TAGESSPIEGEL            = "der-tagesspiegel";
    const DIE_ZEIT                    = "die-zeit";
    const EL_MUNDO                    = "el-mundo";
    const ENGADGET                    = "engadget";
    const ENTERTAINMENT_WEEKLY        = "entertainment-weekly";
    const ESPN                        = "espn";
    const ESPN_CRIC_INFO              = "espn-cric-info";
    const FINANCIAL_POST              = "financial-post";
    const FINANCIAL_TIMES             = "financial-times";
    const FOCUS                       = "focus";
    const FOOTBALL_ITALIA             = "football-italia";
    const FORTUNE                     = "fortune";
    const FOURFOURTWO                 = "four-four-two";
    const FOX_NEWS                    = "fox-news";
    const FOX_SPORTS                  = "fox-sports";
    const GLOBO                       = "globo";
    const GOOGLE_NEWS                 = "google-news";
    const GOOGLE_NEWS_ARGENTINA       = "google-news-ar";
    const GOOGLE_NEWS_AUSTRALIA       = "google-news-au";
    const GOOGLE_NEWS_BRASIL          = "google-news-br";
    const GOOGLE_NEWS_CANADA          = "google-news-ca";
    const GOOGLE_NEWS_FRANCE          = "google-news-fr";
    const GOOGLE_NEWS_INDIA           = "google-news-in";
    const GOOGLE_NEWS_ISRAEL          = "google-news-is";
    const GOOGLE_NEWS_ITALY           = "google-news-it";
    const GOOGLE_NEWS_RUSSIA          = "google-news-ru";
    const GOOGLE_NEWS_SAUDI_ARABIA    = "google-news-sa";
    const GOOGLE_NEWS_UK              = "google-news-uk";
    const GöTEBORGS_POSTEN            = "goteborgs-posten";
    const GRUENDERSZENE               = "gruenderszene";
    const HACKER_NEWS                 = "hacker-news";
    const HANDELSBLATT                = "handelsblatt";
    const IGN                         = "ign";
    const IL_SOLE_24_ORE              = "il-sole-24-ore";
    const INDEPENDENT                 = "independent";
    const INFOBAE                     = "infobae";
    const INFOMONEY                   = "info-money";
    const LA_GACETA                   = "la-gaceta";
    const LA_NACION                   = "la-nacion";
    const LA_REPUBBLICA               = "la-repubblica";
    const LE_MONDE                    = "le-monde";
    const LENTA                       = "lenta";
    const L_EQUIPE                    = "lequipe";
    const LES_ECHOS                   = "les-echos";
    const LIBéRATION                  = "liberation";
    const MARCA                       = "marca";
    const MASHABLE                    = "mashable";
    const MEDICAL_NEWS_TODAY          = "medical-news-today";
    const METRO                       = "metro";
    const MIRROR                      = "mirror";
    const MSNBC                       = "msnbc";
    const MTV_NEWS                    = "mtv-news";
    const MTV_NEWS_UK                 = "mtv-news-uk";
    const NATIONAL_GEOGRAPHIC         = "national-geographic";
    const NATIONAL_REVIEW             = "national-review";
    const NBC_NEWS                    = "nbc-news";
    const NEWS24                      = "news24";
    const NEW_SCIENTIST               = "new-scientist";
    const NEWSCOMAU                   = "news-com-au";
    const NEWSWEEK                    = "newsweek";
    const NEW_YORK_MAGAZINE           = "new-york-magazine";
    const NEXT_BIG_FUTURE             = "next-big-future";
    const NFL_NEWS                    = "nfl-news";
    const NHL_NEWS                    = "nhl-news";
    const NRK                         = "nrk";
    const POLITICO                    = "politico";
    const POLYGON                     = "polygon";
    const RBC                         = "rbc";
    const RECODE                      = "recode";
    const REDDIT_RALL                 = "reddit-r-all";
    const REUTERS                     = "reuters";
    const RT                          = "rt";
    const RTE                         = "rte";
    const RTL_NIEUWS                  = "rtl-nieuws";
    const SABQ                        = "sabq";
    const SPIEGEL_ONLINE              = "spiegel-online";
    const SVENSKA_DAGBLADET           = "svenska-dagbladet";
    const T3N                         = "t3n";
    const TALKSPORT                   = "talksport";
    const TECHCRUNCH                  = "techcrunch";
    const TECHCRUNCH_CN               = "techcrunch-cn";
    const TECHRADAR                   = "techradar";
    const THE_AMERICAN_CONSERVATIVE   = "the-american-conservative";
    const THE_ECONOMIST               = "the-economist";
    const THE_GLOBE_AND_MAIL          = "the-globe-and-mail";
    const THE_GUARDIAN_AU             = "the-guardian-au";
    const THE_GUARDIAN_UK             = "the-guardian-uk";
    const THE_HILL                    = "the-hill";
    const THE_HINDU                   = "the-hindu";
    const THE_HUFFINGTON_POST         = "the-huffington-post";
    const THE_IRISH_TIMES             = "the-irish-times";
    const THE_JERUSALEM_POST          = "the-jerusalem-post";
    const THE_LAD_BIBLE               = "the-lad-bible";
    const THE_NEW_YORK_TIMES          = "the-new-york-times";
    const THE_NEXT_WEB                = "the-next-web";
    const THE_SPORT_BIBLE             = "the-sport-bible";
    const THE_TELEGRAPH               = "the-telegraph";
    const THE_TIMES_OF_INDIA          = "the-times-of-india";
    const THE_VERGE                   = "the-verge";
    const THE_WALL_STREET_JOURNAL     = "the-wall-street-journal";
    const THE_WASHINGTON_POST         = "the-washington-post";
    const THE_WASHINGTON_TIMES        = "the-washington-times";
    const TIME                        = "time";
    const URL                         = 'https://newsapi.org/v2/';
    const USA_TODAY                   = "usa-today";
    const VICE_NEWS                   = "vice-news";
    const WIRED                       = "wired";
    const WIREDDE                     = "wired-de";
    const WIRTSCHAFTS_WOCHE           = "wirtschafts-woche";
    const XINHUA_NET                  = "xinhua-net";
    const YNET                        = "ynet";

    protected $error;
    protected $key ;
    protected $status ;
    protected $totalResults ;

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
     * @return Headline[]|array|bool|mixed
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
        if( property_exists( $response , 'status' ) ) $this->setStatus( $response->status );
        if( property_exists( $response , 'totalResults' ) ) $this->setStatus( $response->totalResults );
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
     * @return Everything[]|array|bool|mixed
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
        if( property_exists( $response , 'status' ) ) $this->setStatus( $response->status );
        if( property_exists( $response , 'totalResults' ) ) $this->setStatus( $response->totalResults );
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
     * @return Source[]|array|bool|mixed
     */
    public function get_sources( array $data = [] )
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
        if( property_exists( $response , 'status' ) ) $this->setStatus( $response->status );
        if( property_exists( $response , 'totalResults' ) ) $this->setStatus( $response->totalResults );
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

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return News
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalResults()
    {
        return $this->totalResults;
    }

    /**
     * @param mixed $totalResults
     * @return News
     */
    public function setTotalResults($totalResults)
    {
        $this->totalResults = $totalResults;
        return $this;
    }



}