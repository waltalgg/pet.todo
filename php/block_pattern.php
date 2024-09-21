<?php

class BlockPattern
{

    private static $defoltPattern = ''; // TODO: Создать дефолтный шаблон (?)
    private static function IndexHeadBlockPattern($hidden = false)
    {
        $html = '';
        if($hidden === false)
        {
            return '
            <div class="card">
                    <div class="card-body">
                         <h5 class="card-title"> Заголовок </h5>
                            <div class = "border-bottom">
                            </div>
                         <p class="card-text mt-2"> Текст </p>
                         <a href="#" class="btn btn-primary">Подробнее</a>
                     </div>
                  </div>
            ';
        }
        else
        {
            return self::$defoltPattern;
        }

    }

    public static function ReturnPattern($pattern, $iteration = 1)
    {
        $result = '';
        switch ($pattern)
        {
            case 'IndexHeadBlock':
                $result .= '<div class="row">';
                for ($i = 0; $i < $iteration; $i++)
                {
                    $result .= '<div class="col-md-4">';
                    $result .= self::IndexHeadBlockPattern();
                    $result .= '</div>';
                }
                $result .= '</div>';
                break;
        }
        return $result;
    }
}