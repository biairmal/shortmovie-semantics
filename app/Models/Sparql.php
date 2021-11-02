<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use stdClass;

require_once realpath(__DIR__ . '/..') . "../../vendor/autoload.php";
require_once realpath(__DIR__ . '/..') . "../Http/html_tag_helpers.php";


\EasyRdf\RdfNamespace::set('data', 'http://example.com/');
\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#/');
\EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
\EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/elements/1.1/');

class Sparql extends Model
{
    use HasFactory;

    function getMovies($type = 'all', $search = null)
    {
        $jena_fuseki_url = env('JENA_FUSEKI_URL') ?? 'https://biairmal-fuseki-service.herokuapp.com/short_movies/query';
        $sparql = new \EasyRdf\Sparql\Client($jena_fuseki_url);
        
        $id = '';
        $genre = '';
        $title = '';
        $firstBroadcast = '';
        $director = '';
        $actor = '';

        if ($type == 'id') {
            $id = $search;
        } else if ($type == 'genre') {
            $genre = $search;
        } else if ($type == 'title') {
            $title = $search;
        } else if ($type == 'firstBroadcast') {
            $firstBroadcast = $search;
        } else if ($type == 'director') {
            $director = $search;
        } else if ($type == 'actor') {
            $actor = $search;
        } else if ($type == 'all') {
            $search = '';
        } else if($type = 'advanced') {
            $genre = $search->genre;
            $title = $search->title;
            $firstBroadcast = $search->firstBroadcast;
            $director = $search->director;
            $actor = $search->actor;
        } else {
            return "Unknown type";
        }

        $result = $sparql->query(
            "PREFIX data:<http://example.com/>
            PREFIX rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#> 
            PREFIX dbo:<http://dbpedia.org/ontology/>
            PREFIX dc:<http://purl.org/dc/elements/1.1/>
            PREFIX da: <https://www.wowman.org/index.php?id=1&type=get#>
            PREFIX db: <http://dbpedia.org/>
            PREFIX dbp: <http://dbpedia.org/property/>

            SELECT ?id ?title ?genre ?firstBroadcast ?director ?actor ?youtubeLink ?urlFoto
                WHERE{
                    ?sub rdf:type dbo:Film
                    OPTIONAL {?sub data:id ?id.}
                    OPTIONAL {?sub dc:title ?title.}
                    OPTIONAL {?sub data:genre ?genre.}
                    OPTIONAL {?sub dbo:firstBroadcast ?firstBroadcast.}
                    OPTIONAL {?sub dbo:director ?director.}
                    OPTIONAL {?sub data:actor ?actor.}
                    OPTIONAL {?sub data:youtubeLink ?youtubeLink.}
                    OPTIONAL {?sub data:urlFoto ?urlFoto.}
                    FILTER regex (?id, \"{$id}\", \"i\")
                    FILTER regex (?title, \"{$title}\", \"i\")
                    FILTER regex (?genre, \"{$genre}\", \"i\")
                    FILTER regex (?firstBroadcast, \"{$firstBroadcast}\", \"i\")
                    FILTER regex (?director, \"{$director}\", \"i\")
                    FILTER regex (?actor, \"{$actor}\", \"i\")
                }"
        );

        return $result;
    }
}
