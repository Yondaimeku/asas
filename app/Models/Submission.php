<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model {

	protected $table = 'submissions';

    protected $fillable = ['filepath', 'time', 'assignment_id'];

}