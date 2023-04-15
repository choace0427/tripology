<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Category;
use App\Models\Affiliate;
use App\Models\Destination;
use App\Models\PackageMeta;
use App\Models\PackageImages;

class Package extends Model
{
    use CrudTrait;
    use HasFactory;
    use HasRoles;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'packages';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    //protected $fillable = ['packageMeta'];
    // protected $hidden = [];
    // protected $dates = [];

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
            $model->updated_by = NULL;
        });

        static::updating(function ($model) {
            $model->updated_by = is_object(Auth::guard(config('app.guards.web'))->user()) ? Auth::guard(config('app.guards.web'))->user()->id : 1;
        });  
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function setFeaturedImageAttribute($value)
    {
        $attribute_name = "featured_image";
        $disk = "public";
        $destination_path = "/uploads/packageImages";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function affiliate() {
        return $this->belongsTo(Affiliate::class);
    }

    public function destination() {
        return $this->belongsTo(Destination::class);
    }

    public function packageMeta() {
        return $this->belongsToMany(PackageMeta::class);
    }

    public function packageImages() {
        return $this->belongsToMany(PackageImages::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
