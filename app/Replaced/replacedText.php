<?php


namespace App\Replaced;

class replacedText{

  public static function text($plane_text)
    {
        //URL抽出の正規表現
        $pattern = '/https?:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+/';

        //該当する文字列に処理
        $contentText = preg_replace_callback($pattern,function ($matches) {
          //第１引数に$pattern　（文字列あるいは文字列の配列　今回の場合はURLリンク）
          //第２引数に関数を設置　URLがあった時に関数が発動

            return '<a href="'.$matches[0].'">'.$matches[0].'</a>';
            //$matches マッチした最初の
        },htmlspecialchars($plane_text));

        return $contentText;
    }

}
