<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class TweetController extends Controller
{

    /**
    *show all the tweets
    *@return json tweets in json format
    */
    public function showAllTweet()
    {
    return response()->json(Tweet::paginate(25));
    }

    /**
    *show tweets by id
    *@param id tweet id
    *@return json tweets in json format
    */
    public function showIdTweet($id) 
    {
        $tweet = Tweet::where('id', '=', $id)->get();
        
        return response()->json($tweet,201);
    }

    /**
    *show tweets by author
    *@param author tweet author
    *@return json tweets in json format
    */
    public function showAuthorTweet($author)
    {
        $tweet = Tweet::where('author','=',$author)->paginate(25);
  
        return response()->json($tweet,201);
    }
 
    /**
    *show tweets by hashtag
    *@param hashtag hashtag of the message
    *@return json tweets in json format
    */
    public function showHashtagTweet($hashtag)
    { 
       $tweet = Tweet::where('hashtag','like',"#%$hashtag%")->paginate(25);
    
       return response()->json($tweet,201);
    }

    /**
    *show tweets by message 
    *@param message tweet message
    *@return json tweets in json format
    */
    public function showMessageTweet($message) 
    {
        $tweet = Tweet::where('message','like', "%$message%")->paginate(25);
        
        return response()->json($tweet,201);
    }

    /**
    *show tweets by author and hashtag
    *@param author tweet author
    *@param hashtag hashtag of the message
    *@return json tweets in json format
    */
    public function showAuthorHashtag($author,$hashtag) 
    {
      $tweet = Tweet::where('author','=',$author)->where('hashtag', 'like', "#%$hashtag%")->paginate(25);
      
      return response()->json($tweet,201);        
    }

    /**
    *insert a tweet 
    *@param request tweet request
    *@return json tweet in json format
    */
    public function create(Request $request)
    {
        $this->validate(request(), [
            'author' => 'required|regex:/(^[a-z0-9-]{4,16}$)/i',
            'message' => 'required|max:1000',
            'hashtag' => 'regex:/(#\w+)/i'
        ]);
        
        $string = "";
        $s = $request->message;
        $array = str_split($s);
        for($j=0; $j<count($array);$j++) {
            if ($array[$j] == "#") {
                 $string .= $array[$j];
                 for($i=$j+1;$i<count($array);$i++) {
                if ($array[$i] != " ") {
                    $string.= $array[$i]; }
                    else { $string .= ' '; break; }          
            }
        }
    }   
    $request->hashtag =  $string; 
    $tweet = Tweet::create(['author' => $request->author,'message' => $request->message, 'hashtag' => $request->hashtag]);
    return response()->json($tweet, 201);
    }

    /**
    *Delete a tweet by id  
    *@param id tweet id
    *@return responses tweet deleted
    */
    public function delete($id)
    {
        Tweet::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}