<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'events';

    protected $fillable =[
        'EventName', 'Date', 'Location', 'Attendees'
    ];

    protected $guarded = [];

    public function saveEvents($data){
        return $this->create($data);
    }

    protected $fillables = ['EventName', 'Date', 'Location', 'Attendees'];

    protected $table = 'events';

    public function getEvents(){
        return $this->all();
    }

    public function deleteEvents($id){
        $events = $this->find($id);
        $events->delete();
    }
    public function updateEvents($id){
        return $this->find($id);
    }
    public function updatedEvents($data, $id){
        $events = $this->find($id);
        $events->update($data);
    }
}
