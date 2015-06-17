<?php
namespace App;
use App\Modx\ModxContentModel;

class Books extends ModxContentModel{
    use Modx\BooksTrait;

    public function scopePublished($query){
        return $query->where('published','!=',0);
    }

    public function scopeNotDeleted($query){
        return $query->where('deleted','!=',1);
    }

    public function scopeSortPublished($query){
        return $query->orderBy('publishedon','desc');
    }
}
