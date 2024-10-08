<?php

namespace App\Http\Controllers;

use App\Models\Ai;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AiController extends Controller
{
    protected $openAIKey;
    protected $openAIEndpoint;
 
    public function __construct()
    {
        $this->openAIKey = env('OPENAI_API_KEY');
        $this->openAIEndpoint = 'https://api.openai.com/v1/chat/completions';
    }

    public function write(Request $request)
    {
        $data = json_decode($request->getContent());
        $message = $data->request;
        $ai_request = New Ai();
        $ai_request->message = $message;
        $ai_request->request = 1;
        $ai_request->user_id = Auth::user()->id;
        $ai_request->save();

        // AI RESPONSE GPT 4 

        // $client = new Client();
 
        // $message = ["role"=> "user", "content"=> "Say this is a test!"];

        // $response = $client->post($this->openAIEndpoint, [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //         'Authorization' => 'Bearer ' . $this->openAIKey,
        //     ],
        //     'json' => [
        //         'model' => 'gpt-4o-mini',
        //         'prompt' => $message,
        //         'max_tokens' => 150,
        //         'temperature' => 0.7,
        //         'stop' => ['\n']
        //     ],
        // ]);
 
        // $ai_response = $response->getBody()->getContents();


        // $ai_response = New Ai();
        // $ai_response->message = $ai_response;
        // $ai_response->response = 1;
        // $ai_response->user_id = Auth::user()->id;
        // $ai_response->save();
    }


    public function read()
    {
        $responses = Ai::query();
        $responses = $responses->where('user_id', Auth::user()->id)->latest()->get();

        return response()->json([
            'responses' => $responses
        ],200);
    }


    public function test(Request $request)
    {
        $client = new Client();

        $message = $request->msg;
        $message = ["role"=> "user", "content"=> $message];

        $response = $client->post($this->openAIEndpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ',
            ],
            'json' => [
                'model' => 'gpt-4o-mini',
                'prompt' => $message,
                'max_tokens' => 150,
                'temperature' => 0.7,
                'stop' => ['\n']
            ],
        ]);
 
        $ai_response = $response->getBody()->getContents();

        dd($ai_response);
    }
}
