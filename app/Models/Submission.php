<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Submission extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];
	protected $table = 'submissions';

    protected $fillable = ['file_path', 'time', 'assessment_id'];


    public $userList; // stores list of userss related to this submission

    public function assessment(){
        return $this->belongsTo('App\Models\Assessment');

    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'user_submissions')->select(['id','user_type','name','email','image_file_path']);
    }

}
