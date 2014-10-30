<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 23/10/2014
 * Time: 10:06 AM
 * FileName : BlogssettingsController.php
 */

class BlogssettingsController  extends \BaseController
{
   
   function __construct()
   {
   }
   
   public function index()
   {
      $settings = Blogsettings::all();
      
      return View::make('blog::blogs.admin.settings')->with(["settings" => $settings]);

   }
   
   public function postEditSettings()
   {
      $value_present= array();
      $input_array = Input::all();
      unset($input_array['_token']);
      unset($input_array['form_name']);
                
       foreach($input_array as $key => $value)
       {
          $result = Blogsettings::where(['name'=>$key])->first();
            
          if($result){
             $set = Blogsettings::find($result->id);
             $set->status = $value;
             $set->save();
          }
       }
        return Redirect::back();
      
   }
} 