<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//       $this->validate($request, [
//           'text' => 'required',
//           'body' => 'required'
//       ]);

       $validator = Validator::make($request->all(), [
           'text' => 'required',
           'body' => 'required'
       ]);

       if($validator->fails()){
           $response = array('response' => $validator->messages() , 'success' => false);
           return $response;
       }else{
           //Create item
           $item = new Item;
           $item->text = $request->input('text');
           $item->body = $request->input('body');
           $item->save();

           return response()->json($item);

       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required',
            'body' => 'required'
        ]);

        if($validator->fails()){
            $response = array('response' => $validator->messages() , 'success' => false);
            return $response;
        }else{
            //Find item
            $item = Item::find($id);
            $item->text = $request->input('text');
            $item->body = $request->input('body');
            $item->save();

            return response()->json($item);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //FIND ITEM
        $item = Item::find($id);
        if(!$item){
            $response = array('response' => "No Data In The Database");
        }else{
            $item->delete();
            $response = array('response' => "Delete Successed" , 'success' => true);
        }
        return $response;
    }
}