<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notes;

class NotesController extends Controller
{
    protected $_resouce_path;
    
    public function __construct()
    {
        //Set global variables if required
        $this->_resource_path = 'frontend.notes';
    }

    /**
     * Index page for notes
     */
    public function index()
    {
        return view($this->_resource_path.'.index');
    }

    /**
     * add a new note
     * @param Request $request 
     */
    public function add(Request $request)
    {
        $notes= $request->data;
        $note = Notes::create(['description'=>$notes]);
        return $this->list();
    }

    /**
     * list  all notes
     */
    public function list()
    {
        $notes = Notes::all();
         return view($this->_resource_path.'.view',[ 'notes' => $notes, ]);
    }
}
