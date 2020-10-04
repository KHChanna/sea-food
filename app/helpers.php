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

 function getUnitAPI($id)
 {
   $data = [];
    $product_unit = DB::table('product_units')->where('product_id', $id)->get();
    foreach ($product_unit as $key => $value) {
      $unit = DB::table('units')->find($id);
      $data[] = [
          'unit_name'  =>   $unit->name ?? '' ,
          'price'      =>   $value->price ?? '' ,
      ];
    }
    return $data;
 }

 function JsonResponse($data = null)
 {
   return response()->json([
        'status'  =>  200,
        'data'  =>  $data,
   ]);
 }

 function supplier()
 {
  return DB::table('suppliers')->pluck('name', 'id');
 }

 function PaymentType()
 {
   return [ 1 => 'Cash On hand', 2 => 'ABA', 3 => 'Wing', 4 => 'ACELEDA' ];
 }

 function Payment($id)
 {
    $payment = '';
    switch ($id) {
      case 2:
        $payment = 'ABA';
        break;
      case 3:
        $payment = 'Wing';
        break;
      case 4:
        $payment = 'ACELEDA';
      break;
      default:
      $payment = 'Cash On hand';
    }

    return $payment;
 }

 function product($id)
 {
   $product = \DB::table('products')->find($id);
   return $product->name;
 }

 function currency()
 {
   return \DB::table('currencies')->latest('id')->first();
 }