<?php


namespace App\Replaced;

class replacedText{

  public static function text($plane_text)
    {
        //URL抽出の正規表現
        $pattern = '/https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+/';

        //該当する文字列に処理
        $contentText = preg_replace_callback($pattern,function ($matches) {

            return '<a href="'.$matches[0].'">'.$matches[0].'</a>';
        },htmlspecialchars($plane_text));

        return $contentText;
    }

}
