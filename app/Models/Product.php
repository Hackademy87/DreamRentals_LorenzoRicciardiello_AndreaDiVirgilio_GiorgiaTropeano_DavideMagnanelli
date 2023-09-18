<?php

namespace App\Models;

use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['name','price','description','category','category_id', 'profile_id', 'user_id','img'];



    public function toSearchableArray(){

            $category = $this->category;
            $array =[
                'id'=> $this->id,
                'name'=> $this->name,
                'description'=>$this->description,
                "category"=> $category,
            ];
            return $array;
        }


    public function category(){

    return $this->belongsTo(Category::class);
    }

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

public function setAccepted($value){


    $this->is_accepted = $value;
    $this->save();
    return true;

}

public function setReverse()
{
    $this->setAccepted(null);
    return redirect()->route('revisor.index');
}

public static function toBeRevisionedCount(){

    return Product::where('is_accepted',null)->count();

}







}
