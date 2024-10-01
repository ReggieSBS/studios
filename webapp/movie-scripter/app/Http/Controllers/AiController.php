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
        $this->openAIEndpoint = 'https://api.openai.com/v1/completions';
    }

    public function write(Request $request)
    {
        $data = json_decode($request->getContent());
        $message = $data ->request;
        $ai_request = New Ai();
        $ai_request->message = $message;
        $ai_request->request = 1;
        $ai_request->user_id = Auth::user()->id;
        $ai_request->save();

        $client = new Client();
 
        $response = $client->post($this->openAIEndpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->openAIKey,
            ],
            'json' => [
                'model' => 'text-davinci-003',
                'prompt' => $message,
                'max_tokens' => 150,
                'temperature' => 0.7,
                'stop' => ['\n']
            ],
        ]);
 
        $ai_response = $response->getBody()->getContents();
        $ai_request = New Ai();
        $ai_request->message = $ai_response;
        $ai_request->response = 1;
        $ai_request->user_id = Auth::user()->id;
        $ai_request->save();
    }


    public function read()
    {
        $responses = Ai::query();
        $responses = $responses->where('user_id', Auth::user()->id)->latest()->get();

        return response()->json([
            'responses' => $responses
        ],200);
    }
}
