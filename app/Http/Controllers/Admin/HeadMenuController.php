<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Links;
use Exception;
use Illuminate\Http\Request;


class HeadMenuController extends Controller
{

    protected function getLinks(){
        return Links::all();
    }

    public function index(){

        $links = $this->getLinks();
        return view('Admin.pages.Menu.index', compact('links'));
    }

    public function create(){
        $links = $this->getLinks();
        return view('Admin.pages.Menu.create', compact('links'));
    }

    public function store(Request $request){
        $validation = [
            "title" => "string|required",
            "href" =>  "string|nullable",
            "parent" => "integer|nullable",
        ];
        $request->validate($validation);


        $link = new Links();
        $link->title = $request->title;
        $link->href = $request->href;
        $link->parent = $request->parent == 0 ? null : $request->parent;

        $links = $this->getLinks();
        try{
            $link->save();
            return redirect()->route('links_index')->with('notify', [
                'msg' => "Your new links successfully added.",
                'status' => 'success'
            ]);
        }catch(Exception $e){
            return view('Admin.pages.Menu.create', compact('links'))->with('notify', [
                'msg' => "There is an error during saving your record, please try again.",
                'status' => 'danger'
            ]);
        }

    }

    public function edit(Links $link, Request $request){
        $links = $this->getLinks();
        return view('Admin.pages.Menu.edit', compact('link', 'links'));
    }

    public function update(Links $link, Request $request){
        $validation = [
            'title' => 'string|required',
            'href' => 'string|nullable',
            'parent' => 'integer|nullable'
        ];

        $request->validate($validation);

        $data = [
            'title' =>  $request->title,
            'href' => $request->href,
            'parent' => $request->parent!== 0 ? $request->parent : null,
        ];

        $links = $this->getLinks();
        try{
            $link->update($data);
            return view('Admin.pages.Menu.edit', compact('link', 'links'))->with('notify',[
               'msg' => 'Your Menu updated successfully.',
               'status' => 'success',
            ]);
        }catch(Exception $e){
            dd($e);
            return view('Admin.pages.Menu.edit', compact('link', 'links'))->with('notify',[
                'msg' => 'There is an error during your update, please try again.',
                'status' => 'danger',
            ]);
        }

    }

    public function destroy(Links $link){
        $links = $this->getLinks();
        try{
            $link->delete();
            return redirect()->route('links_index')->with('notify', [
               'msg' => 'Your Menu deleted successfully.',
               'status' => 'success'
            ]);
        }catch(Exception $e){
            return redirect()->route('links_index')->with('notify', [
                'msg' => 'Your Menu deleted successfully.',
                'status' => 'success'
            ]);
        }
    }
}
