<?php

class BlockPattern
{
    private static function IndexBlock() // TODO: Написать по phpdoc, что это шаблон для блоков в index для различной информации
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

	// Секция Header
	private static function HeaderPattern($flag)
	{
		$blocks = []; // TODO: Ддостаются из БД или конфига

		$html = ' 
			<div class="px-3 py-2 text-bg-dark border-bottom">
			  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
				</a>
		
				<ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">';

		if ($flag === true)
		{
			$html .= self::HeaderBlockSections();
		}

		$html .= '
				</ul>
			  </div>
			</div>';

		$html .= self::HeaderBlockAuthorization($flag);
		return $html;
	}
    private static function HeaderBlockSections()
    {
	   $html = '';
	   $blocks = ['Главная', 'Мой профиль', 'Мои заметки']; // дефолтные значения

	   for($i = 0; $i < count($blocks); $i++)
	   {
		   if(isset($blocks[$i]) && $blocks[$i] !== '') // избавляемся от вариантов пустых заголовков внутри блока
		   {
			   $html .= '
					<li>
						<a href="#" class="text-decoration-none nav-link text-white">
						   <p class = "text-decoration-none m-0">' . $blocks[$i] . '</p>
						</a>
					</li>';
	   		}
	   }
	   return $html;

    }
	private static function HeaderBlockAuthorization($flag)
	{
		$blockAboutAuth = '
						<button type="button" class="btn btn-light text-dark me-2">Войти</button>
						<button type="button" class="btn btn-primary">Зарегистрироваться</button>';

		$blockBeforeAuth = '<button type="button" class="btn btn-light text-danger me-2">Выйти</button>';

		$html = ' 
			<div class="px-3 py-2 border-bottom mb-3">
				<div class="d-flex flex-wrap justify-content-end">
					<div class="text-end">';
		if($flag === false)
		{
			$html .= $blockAboutAuth; // TODO: Проверка на авторизацию через сессию, в дальнейшем через cookie для вывода нужного блока
		}
		else
		{
			$html .= $blockBeforeAuth;
		}

		$html .= '
					</div>
				</div>
			</div>';
		return $html;

	}

	// Конец секции Header


    public static function ReturnPattern($pattern)
    {
        $result = '';
		$iteration = 3; // Количество выводимых блоков. TODO: Затем можно сделать вывод через какой-нибудь интерфейс
        switch ($pattern)
        {
            case 'indexBlock':
                $result .= '<div class="row">';
                for ($i = 0; $i < $iteration; $i++)
                {
                    $result .= '<div class="col-md-4">';
                    $result .= self::IndexBlockPattern();
                    $result .= '</div>';
                }
                $result .= '</div>';
                break;

            case 'header':
				$result .= self::HeaderPattern(true); // true - прошли авторизацию, false - не прошли TODO: Написать логику после того, как сделаю регистрацию
				break;
        }
        return $result;
    }
}