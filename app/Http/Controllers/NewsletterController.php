<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\BlogEmail;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    /**
     * Ship the given order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Newsletter::findOrFail($request->order_id);
        Mail::to($request->user('peaceoariyo@gmail'))->send(new BlogEmail($order));
        return view('emails.news.newsletter');

    }

}
