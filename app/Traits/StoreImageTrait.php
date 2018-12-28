<?php
/**
 * Copyright  Faycal.(c) 2018.
 */

namespace App\Traits;

use Illuminate\Http\Request;

/**
 * Trait StoreImageTrait
 * @package App\Traits
 */
trait StoreImageTrait
{
    /**
     * return the image path
     * @param Request $request
     * @return false|string
     */
    public function saveImage(Request $request){
        preg_match_all('/^[a-zA-Z]+/',$request->path(), $result); // take the table name
        $path = implode('',$result[0]); // array to string
        if ($request->file('image') !== null){
            $path = $request->file('image')->store($path);
            //dump($path);
            return $path;
        }else {
            return (implode('',$result[0]).'/default.jpg');// save the default image with table name
        }
    }
}
