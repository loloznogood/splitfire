<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
  $router->get('tweets',  ['uses' => 'TweetController@showAllTweet']);$router->get('tweets/name/{name}', [ 'uses' => 'TweetController@showOneTweet']);
 
  $router->get('tweets/{id}', [ 'uses' => 'TweetController@showIdTweet']);
 
  $router->get('tweets/author/{author}', [ 'uses' => 'TweetController@showAuthorTweet']);
 
  $router->get('tweets/hashtag/{hashtag}', [ 'uses' => 'TweetController@showHashtagTweet']);
 
  $router->get('tweets/message/{message}', [ 'uses' => 'TweetController@showMessageTweet']);
 
  $router->get('tweets/author/{author}/hashtag/{hashtag}', [ 'uses' => 'TweetController@showAuthorHashtag']);
 
  $router->post('tweets', ['uses' => 'TweetController@create']);

  $router->delete('tweets/{id}', ['uses' => 'TweetController@delete']);

  });
