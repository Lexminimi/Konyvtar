<?php
/**
* Nagyon fontos: az .env-ben  ki kell kommentelni a password és unserialize
* paramétereket különben authentication failed hiba lép fel a Mongo serverrel
*
*/
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


/*
  Az Eloquent kb olyan mint a Doctrine. Konvenció szerint ha a modelünket Book nak hívjákeyval
  akkor az Eloquent books táblát (ez esetben collection-t -- mivel MONGODB használunk) fog keresni
  Megadhatunk más táblát is lásd a classban:
*/
class Book extends Eloquent
{
	protected $connection = 'mongodb';
	protected $collection = 'books';


    /**
     * The attributes that are mass assignable.
     * Azért  hogy lehessen használni a create-et a resource controllerből
     * lásd: You may also use the create method to save a new model in a
     * single line. The inserted model instance will be returned to you
     * from the method. However, before doing so, you will need to specify
     * either a fillable or guarded attribute on the model, as all Eloquent
     * models protect against mass-assignment by default.
     * @var array
     * a var array csak leirja , hogy milyen változó lesz
     */
    protected $fillable = [
        'name', 'detail'
    ];
/*
    Ha más táblát használnánk így adnánk meg:
    protected $table = 'my_flights';

    */
}
