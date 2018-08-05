<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Authors extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];

    public function getAllAuthors() {
        return DB::table('authors')->get();
    }

    public function addAll($data) {
        return DB::table('authors')->insert($data);
    }

    public function isExistAuthor($request) {
        $author = DB::table('authors')->where('name', '=', $request->name)->first();
        if ($author != null) {
            return true;
        }
        return false;
    }

    public function getAuthorByName($author_name){
        return DB::table('authors')->where('name', $author_name)->first();
    }

    public function getAuthor($id_author){
        return DB::table('authors')->where('id', $id_author)->first();
    }

    public function isExistNameCaseUpdated($request, $name) {
        $author = DB::table('authors')
            ->where('name', '=', $name)
            ->where('id', '!=', $request->id)
            ->first();
        if ($author != null) {
            return true;
        }
        return false;
    }

    public function updateAuthor($data) {
        return DB::table('authors')
            ->where('id', $data[0]['id'])
            ->update([
                'name' => $data[0]['name']
            ]);
    }

    public function deleteAuthor($id_author) {
        return DB::table('authors')
            ->where('id', $id_author)
            ->delete();
    }
}