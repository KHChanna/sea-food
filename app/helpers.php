<?php
 
 use Illuminate\Support\Facades\DB;

 function category($id = null)
 {
     return DB::table('categories')->pluck('name', 'id');
 }

 function units($id = null)
 {
    return DB::table('units')->whereNull('parent_id')->where('id', '!=', $id)->pluck('name', 'id');
 }

 function childUnits()
 {
   return DB::table('units')->whereNotNull('parent_id')->pluck('name', 'id');
 }

 function unitName($id)
 {
    return DB::table('units')->where('id', $id)->first();
 }

 function getCategoryName($id) 
 {
   $data = DB::table('categories')->find($id)->first();
   return $data->name;
 }