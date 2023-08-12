<?php

namespace App\Http\Controllers\Customers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        return view('customers.contact');
    }
}
