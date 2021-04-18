<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model as BaseModel;
use App\SoftDeletes;

class MyModel extends BaseModel
{
	use SoftDeletes;

	public function __construct()
	{
		parent::__construct();
	}

	public static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if ($model->from_mobile) {
				unset($model->from_mobile);
			} else {
        if (Auth::guard('api')->check()) {
          $model->created_by = Auth::guard('api')->user()->id;
        } else {
          $model->created_by = Auth::id();
        }
			}
		});

		static::updating(function ($model) {
			if ($model->from_mobile) {
				unset($model->from_mobile);
			} else {
        if (Auth::guard('api')->check()) {
          $model->created_by = Auth::guard('api')->user()->id;
        } else {
				  $model->updated_by = Auth::id();
        }
			}
		});
	}
	public static function getTableName(){
		return with(new static)->getTable();
	}
}
