<?php
/**
 * Created by [id].
 * User: JayKay
 * Date: 23/10/2014
 * Time: 10:08 AM
 * FileName : Blogsettings.php
 */

class Blogsettings extends \Eloquent 
{
   	protected $fillable = array('name',
		                            'description',
		                            'status');
		protected $table    = 'blogsettings';
   
} 