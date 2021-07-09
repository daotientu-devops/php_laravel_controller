<?php
/**
 * Created by PhpStorm.
 * User: daotientu
 * Date: 4/16/2017
 * Time: 9:34 PM
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DatabaseController extends Controller
{
    public function evaluate()
    {
        $c = $this->connectOthers();
        $db = $c->admin;
        $collection = $db->system_db;
        if (isset($_GET['type'])) {
            $cursor = $collection->find(array('type' => $_GET['type']));
        } else {
            $cursor = $collection->find();
        }
        return view('database/evaluate', array('cursor' => $cursor));
    }

    public function noteEvaluate($id)
    {
        $note = Input::get('note');
        $c = $this->connectOthers();
        try {
            $db = $c->admin;
            $collection = $db->system_db;
            $document = array(
                'note'  =>  $note
            );
            $collection->update(
                array('_id' => new \MongoId($id)),
                array('$set' => array('note' => $note))
            );
            return redirect()->back();
        } catch (\MongoException $mongoException) {
            print $mongoException;
            exit;
        }
    }

    public function getCollection()
    {
        return view('database/collection');
    }

    public function postCollection()
    {
        $database = Input::get('database');
        $collection = Input::get('collection');
        $column = Input::get('column');
        $value = Input::get('default_value');
        $c = $this->connectOthers();
        try {
            $db = $c->$database;
            $collection = $db->$collection;
            $criteria = array();
            $newdata = array('$set' => array($column => $value));
            $options = array('multiple' => true);
            $collection->update(
                $criteria,
                $newdata,
                $options
            );
            return redirect()->back();
        } catch (\MongoException $mongoException) {
            print $mongoException;
            exit;
        }
    }

    public function statusCollection()
    {
        $db = $this->connect();
        $collection = $db->website;
        $list_websites = $collection->find();
        return view('collection/status', array('list_websites' => $list_websites));
    }

    public function indexCollection()
    {
        $db = $this->connect();
        $collection = $db->website;
        $database = $collection->find();
        return view('collection/index', array('database' => $database));
    }

    public function postIndex()
    {
        $database = Input::get('database');
        $collection = Input::get('collection');
        $m = $this->connectOthers();
        $db = $m->$database;
        $collection = $db->$collection;
        $result = $collection->ensureIndex(array('title' => -1), array('unique' => true));
        //print_r($result);die();
        \Session::put('note', isset($result['note']) ? $result['note'] : 'ok');
        \Session::put('last_activity', time());
        return redirect()->back();
    }

    public function indexAll()
    {
        $db = $this->connect();
        $collection = $db->website;
        $databases = $collection->find();
        foreach ($databases as $database) {
            $m = $this->connectOthers();
            $db = $m->$database['database'];
            try {
                $collection = $db->dienthoai;
                $collection->deleteIndex(array('title' => -1));
               //echo '<pre/>'; print_r($collection->getIndexInfo());die();
                $result = $collection->ensureIndex(array('title' => -1));
                unset($collection);
                $collection = $db->maytinh;
                $collection->deleteIndex(array('title' => -1));
                $result = $collection->ensureIndex(array('title' => -1));
                \Session::put('note', isset($result['note']) ? $result['note'] : 'ok');
            } catch (MongoWriteConcernException  $exception) {
                \Session::put('note', isset($exception) ? $exception->getMessage() : 'ok');
            }
        }
        \Session::put('last_activity', time());
        return redirect()->back();
    }
}