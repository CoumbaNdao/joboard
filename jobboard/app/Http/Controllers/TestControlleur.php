<?php

namespace App\Http\Controllers;

use App\Models\Disposer;
use App\Models\Entreprise;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestControlleur extends Controller
{
    public function test()
    {
        $to_name = 'paco test';
        $to_email = 'ppejobage@gmail.com';
        $data = array('name' => "paco", 'body' => 'body');
        Mail::send('test', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
        $message->from('djopaco973@gmail.com', 'Test Mail');
        });
    }
}
