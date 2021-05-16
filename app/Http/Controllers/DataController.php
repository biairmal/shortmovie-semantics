<?php


namespace App\Http\Controllers;

require_once realpath(__DIR__ . '/..') . "../../../vendor/autoload.php";
require_once realpath(__DIR__ . '/..') . "../html_tag_helpers.php";


use Illuminate\Http\Request;

class DataController extends Controller
{
    function getMovies()
    {
        \EasyRdf\RdfNamespace::set('data', 'http://localhost:3030/');
        \EasyRdf\RdfNamespace::set('rdf', 'http://www.w3.org/1999/02/22-rdf-syntax-ns#/');

        $sparql = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');

        $result = $sparql->query(
            "SELECT ?id ?title ?platform ?genre ?publisher ?developer ?urlFoto
            WHERE{
                ?sub rdf:type data:game
                OPTIONAL {?sub data:id ?id.}
                OPTIONAL {?sub data:title ?title.}
                OPTIONAL {?sub data:platform ?platform.}
                OPTIONAL {?sub data:genre ?genre.}
                OPTIONAL {?sub data:publisher ?publisher.}
                OPTIONAL {?sub data:developer ?developer.}
                OPTIONAL {?sub data:urlFoto ?urlFoto.}
            }"
        );

        echo $result;
    }
}


// Contoh

// \EasyRdf\RdfNamespace::set('dbc', 'http://dbpedia.org/resource/Category:');
        // \EasyRdf\RdfNamespace::set('dbpedia', 'http://dbpedia.org/resource/');
        // \EasyRdf\RdfNamespace::set('dbo', 'http://dbpedia.org/ontology/');
        // \EasyRdf\RdfNamespace::set('dbp', 'http://dbpedia.org/property/');
        // \EasyRdf\RdfNamespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
        // \EasyRdf\RdfNamespace::set('', 'http://dbpedia.org/resource/');
        // \EasyRdf\RdfNamespace::set('rdfs', 'http://www.w3.org/2000/01/rdf-schema#');


        // $sparql = new \EasyRdf\Sparql\Client('http://dbpedia.org/sparql');

        // $result = $sparql->query(
        //     'SELECT * WHERE {
        //         ?country rdf:type dbo:Country .
        //         ?country rdfs:label ?label .
        //         ?country dct:subject dbc:Member_states_of_the_United_Nations .
        //         FILTER ( lang(?label) = "en" )
        //       } ORDER BY ?label'
        // );
        // echo $result;
