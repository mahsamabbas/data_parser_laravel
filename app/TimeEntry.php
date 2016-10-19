<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeEntry extends Model {

	protected $table = "time_entries";

	// An array of the fields we can fill in the time_entries table
	protected $fillable = ['name', 'created_at', 'updated_at', 'product_id', 'description'];


}
