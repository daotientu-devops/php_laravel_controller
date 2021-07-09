<?php
/**
 * Created by PhpStorm.
 * User: daotientu
 * Date: 1/1/2017
 * Time: 1:49 PM
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use MongoId;

class QueueController extends Controller
{
    public function index()
    {
        return view('queue.index');
    }

}