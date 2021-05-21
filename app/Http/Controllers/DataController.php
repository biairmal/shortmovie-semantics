<?php


namespace App\Http\Controllers;

require_once realpath(__DIR__ . '/..') . "../../../vendor/autoload.php";
require_once realpath(__DIR__ . '/..') . "../html_tag_helpers.php";

use Illuminate\http\Request;

\EasyRdf\RdfNamespace::set('data', 'http://example.com/');
\EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#/');
\EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
\EasyRdf\RdfNamespace::set('dc', 'http://purl.org/dc/elements/1.1/');

class DataController extends Controller
{

    // get all movies
    function getAllMovies(Request $request)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/short_movies/query');

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
                }"
        );

        return $result;
    }

    // get one movie
    function getMovie($id)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/short_movies/query');

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
                }"
        );

        return $result;
    }

    // find movies by filter
    function findMovies($title, $genre, $director)
    {
        $sparql = new \EasyRdf\Sparql\Client('http://localhost:3030/short_movies/query');

        $title = ($title) ? $title : '';
        $genre = ($genre) ? $genre : '';
        $director = ($director) ? $director : '';

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
                    FILTER regex(?title, \"{$title}\", \"i\")
                    FILTER regex(?genre, \"{$genre}\", \"i\")
                    FILTER regex(?director, \"{$director}\", \"i\")
                }"
        );

        return $result;
    }
}
