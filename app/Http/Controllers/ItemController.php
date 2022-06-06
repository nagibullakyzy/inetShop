<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Producer;
use Illuminate\Http\Request;

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
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        $producers = Producer::all();
        
       return view('items.create', compact('producers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
              'description' => 'required',
                'price' => 'required',
               'pic_url' => 'required',
             'producer_id' => 'required',
            
        ]);
  
        Item::create($request->all());
   
        return redirect()->route('items.index')
                        ->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {   $producers = Producer::all();
       return view('items.edit', compact('producers'),compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
          $request->validate([
            'name' => 'required',
              'description' => 'required',
                'price' => 'required',
               'pic_url' => 'required',
             'producer_id' => 'required',
            
        ]);
  
        $item->update($request->all());
  
        return redirect()->route('items.index')
                        ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
       $item->delete();
  
        return redirect()->route('items.index')
                        ->with('success','Item deleted successfully');
    }
    
    
    
          public function assign_cat(Request $request)
    {
            $request->validate([
           'item_id' => 'required',
              'cat_id' => 'required',

        ]);
            
          if(isset($request['del'])){
               $item = Item::find($request['item_id']);  
          $item->categories()->detach($request['cat_id']);
              
          }
          else{
            
            
      $item = Item::find($request['item_id']);  
         $item->categories()->attach($request['cat_id']);
          
          }
          
        return redirect()->route('items.edit', $request['item_id']) ;
                      
    }
}
