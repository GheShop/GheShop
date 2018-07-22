<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class CategoriesController extends Controller
{

    public function getCategories()
    {
        $navString = '';
        $categories = Categories::all();
        if(count($categories) > 0){
            $this->createCategories($categories,0,$navString);
        }
        return $navString;
    }

    public function createCategories($categories, $parent_id = 0, &$string)
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        foreach ($categories as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item->parentID == $parent_id)
            {
                $cate_child[] = $item;
                unset($categories[$key]);
            }
        }

        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child)
        {
            $string .= '<ul>';
            foreach ($cate_child as $item)
            {
                if($item->hasSub){
                    $href = "javascript:void(0)";
                }else{
                    $href = url("admin\menu\\".strtolower($item->path));
                }
                $path = str_replace("/","_",strtolower($item->path));
                // Hiển thị tiêu đề chuyên mục
                if($item->level === 1){
                    $string .= '<li><a href="'.$href.'" class = "'.$path.'"><span class="'.$item->class_bst_icon.'"></span><span>'.$item->name;
                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    $this->createCategories($categories, $item->id,$string);
                    $string .= '</span></a></li>';
                }else if($item->level === 2 ){
                    $string .= '<li><a href="'.$href.'" class = "'.$path.'">'.$item->name;
//                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    $this->createCategories($categories, $item->id,$string);
                    $string .= '</a></li>';
                }
            }
            $string .= '</ul>';
        }
    }

    public function  showPage($menu1="members",$menu2= '')
    {
        if($menu2 !== ''){
            return view("admin.".$menu1.".".$menu2,['menu1'=>$menu1,'menu2'=>$menu2]);
        }
        return view("admin.".$menu1,['menu1'=>$menu1,'menu2'=>$menu2]);
    }

}
