<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "room";
    protected $fillable = [
        'name',
        'description',
        'address',
        'main_img',
        'sizem2',
        'id_room_type',
        'max_adults',
        'max_children',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'id_room_type');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'room_facility', 'room_id', 'facility_id');
    }
    public function images()
    {
        return $this->belongsToMany(Image::class, 'images_room', 'id_room', 'id_image');
    }
}
