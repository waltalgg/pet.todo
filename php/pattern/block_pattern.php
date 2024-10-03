<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/php/pattern/helpmate_block_pattern.php');
class BlockPattern
{
	// Секция Header
	private static function HeaderPattern()
	{
		$html = ' 
			<div class="px-3 py-2 text-bg-dark border-bottom">
			  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<a href="index.php" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">Logo</a>
				<ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">';

		if (HelpmateBlockPattern::ReturnHelpmate('isAuthToken')) $html .= self::HeaderBlockSections(); // Если пользователь имеет токен авторизации

		$html .= '
				</ul>
			  </div>
			</div>';

		$html .= self::HeaderBlockAuthorization();
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
						<a href="';
			   $html .= HelpmateBlockPattern::ReturnHelpmate('ReturnLink', $blocks[$i]);
			   $html .= '" class="text-decoration-none nav-link text-white">
						   <p class = "text-decoration-none m-0">' . $blocks[$i] . '</p>
						</a>
					</li>';
	   		}
	   	}
	   return $html;

    }
	private static function HeaderBlockAuthorization()
	{
		$blockAboutAuth = '
						<a href = "page_login.php"class="btn btn-light text-dark me-2">Войти</a>
						<a href="page_registration.php" class="btn btn-primary">Зарегистрироваться</a>';

		$blockBeforeAuth = '<a href="index.php" type="button" class="btn btn-light text-danger me-2">Выйти</a>'; // TODO: Поставить destroy сессию

		$html = ' 
			<div class="px-3 py-2 border-bottom mb-3">
				<div class="d-flex flex-wrap justify-content-end">
					<div class="text-end">';

		// TODO: В будущем сделать через cookie
		if(HelpmateBlockPattern::ReturnHelpmate('isAuthToken'))  // Если токен авторизации существует
		{
			$html .= $blockBeforeAuth;
		}
		else
		{
			$html .= $blockAboutAuth;
		}

		$html .= '
					</div>
				</div>
			</div>';

		return $html;
	}
	// Конец секции Header

	private static function FaceIndex()
	{
		$html = '
			<div class="row mt-4 mb-5">
			<div class="col-md-12 text-center">
				 <h1><span class = "text-danger">To</span><i><span class = "text-info">Do</span></i><span class = "text-warning">List</span></h1>
				<p class="lead"> <span class = "text-muted">Заметки и календарь <i>ваших</i> дел</span></p>
			</div>
		</div>';
		return $html;
	}
	private static function IndexInformationBlock() // TODO: Написать по phpdoc, что это шаблон для блоков в index для различной информации
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

	private static function BuilderIndexBlocks()
	{
		$iteration = 3; // Количество выводимых блоков
		$result = '<div class="row">';
		for ($i = 0; $i < $iteration; $i++)
		{
			$result .= '<div class="col-md-4">';
			$result .= self::IndexInformationBlock();
			$result .= '</div>';
		}
		$result .= '</div>';
		return $result;
	}

	private static function BuilderPageRegistration() // Билдер страницы регистрации
	{
		 return '
	<div class="form-container">
		<h2 class="text-center text-danger mb-4">Регистрация</h2>
		<form method="POST" id="registrationForm" action="../auth/new_user_registration.php">
			<div class="mb-3">
				<label for="username" class="form-label">Имя пользователя</label>
				<input type="text" class="form-control" id="username" name="username" required>
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" id="email" name="email" required>
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Пароль</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<button type="submit" class="btn btn-custom w-100 text-warning border-top border-bottom mt-3"><h4>Зарегистрироваться</h4></button>
		</form>
		<div class="text-center mt-3">
			<a href="page_login.php" class="text-primary">Уже есть аккаунт? Войти</a>
		</div>
		<div class="text-center mt-3">
			<a href="index.php" class="text-info">Назад на главную</a>
		</div>
	</div>
		';
	}

	private static function DefaultMetaInfo()
	{
		return '
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<link href= "../css/style.css" rel="stylesheet">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">';
	}

    public static function ReturnPattern($pattern)
    {
        $result = '';
        switch (strtolower($pattern))
        {
			case 'meta':
				$result .= self::DefaultMetaInfo();
				break;

            case 'indexinformationblock':
				$result .= self::BuilderIndexBlocks();
				break;

            case 'header':
				$result .= self::HeaderPattern();
				break;

			case 'faceindex':
				$result .= self::FaceIndex();
				break;

			case 'pageregistration':
				$result .= self::BuilderPageRegistration();
				break;
        }
        return $result;
    }
}