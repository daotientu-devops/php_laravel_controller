<?php
/**
 * Created by PhpStorm.
 * User: daotientu
 * Date: 1/1/2017
 * Time: 1:57 PM
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Input;
use MongoId;

class AlertController extends Controller
{
    public function index()
    {
        return view('alert.index');
    }

}