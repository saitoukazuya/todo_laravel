<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    // protected $guarded = array('id') ;
    // public static $rules = array(
    //     'title' => 'required',
    //     'body' => 'required',
    //     );
        
    
    // 8月19日作成
    public function color_show() {
        // migrationファイルのカラムを書く
       switch($this->color){
           case 1:
               return "赤";
               break;
            case 2:
                return "黄色";
                break;
            case 3:
                return "緑";
                break;
            case 4:
                return "青";
                break;
       }
    }
    
    public function category_show() {
        switch($this->category) {
            case 1:
                return "重要";
                break;
            case 2:
                return "事務";
                break;
            case 1:
                return "作業";
                break;
            case 1:
                return "急務";
                break;
        }
    }
}
