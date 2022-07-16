<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/src/SearchCourse.php';

use Alura\CourseSearch\SearchCourse;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false]);
$crawler = new Crawler();

$search = new SearchCourse($client, $crawler);
$courses = $search->search('https://www.alura.com.br/cursos-online-programacao/php');

foreach ($courses as $course){
    echo $course->textContent.PHP_EOL;
}