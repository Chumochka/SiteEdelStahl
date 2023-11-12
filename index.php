<?
include('db/dbcon.php');
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Эдельсталь</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/custom.css">
  </head>
  <body>
    <!--Header-->
    <header class="header">
      <div class="container py-3">
        <div class="row align-items-center">
          <div class="col-lg-2 col-md-3 col-6 justify-content-between">
            <img class="img-fluid" src="images/logo.png" alt="Логотип"/>
          </div>
          <div class="col-lg-3 col-2 d-md-block d-none">
            <a class="btn btn-header" href="#form-question" role="button">
              <span>Расчитать стоимость проекта</span>
            </a>
          </div>
          <div class="col-xxl-5 offset-xxl-2 col-xl-6 offset-xl-1 offset-0 col-md-7 col-6 d-flex justify-content-md-between justify-content-end align-items-center">
            <div class="span-question d-md-block d-none">
              <a href="https://api.whatsapp.com/send?phone=79139854512&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5.">Есть вопрос?<br>Задайте онлайн</a>
            </div>
            <div class="span-time d-md-block d-none">
              <div class="span-top">Режим работы:</div>
              <div class="span-bottom">Пн-Пт с 09-00 по 18-00</div>
            </div>
            <div class="span-contact d-md-block d-none">
              <div class="span-phone" ><a href="tel:+79139854512">+7 (913) 985-45-12</a></div>
              <div class="span-email"><a href="mailto:rush-a@mail.ru">rush-a@mail.ru</a></div>
            </div>
            <div class="span-contact-two d-block d-md-none">
              <a href="#">
                <img height="40px" width="40px" src="./images/telephone.png" alt="Связаться с нами">
              </a>
            </div>
            <div class="d-block d-md-none">
              <nav class="hamburger">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="btn-close">
                  <div class="offcanvas-header justify-content-end">
                    <button type="button" id="btn-close" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex justify-content-between align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <span>Услуги</span>
                          <img src="images/arrow-navlink.png">
                        </a>
                        <ul class="dropdown-menu">
                          <?$sql="SELECT * FROM `servicetype`";
                          $num = 1;
                          $result=$cms->query($sql);
                          if($result->num_rows > 0)
                          {
                            while ($row=$result->fetch_assoc())
                            {
                              echo "<li><a class='dropdown-item' href='#'>{$row['TITLE']}</a></li>";
                            }
                          }
                          ?>
                        </ul>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">О компании</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Выполненные проекты</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Контакты</a>
                      </li>
                    </ul>
                    <div class="hamburger-contacts">
                      <div class="span-phone" ><a href="tel:+79139854512">+7 (913) 985-45-12</a></div>
                      <div class="span-email"><a href="mailto:rush-a@mail.ru">rush-a@mail.ru</a></div>
                    </div>
                    <div class="span-question">
                      <a href="https://api.whatsapp.com/send?phone=79139854512&text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5.">Есть вопрос?<br>Задайте онлайн</a>
                    </div>
                    <div class="span-time">
                      <div class="span-top">Режим работы:</div>
                      <div class="span-bottom">Пн-Пт с 09-00 по 18-00</div>
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!--Navigation-->
      <nav class="nav d-md-block d-none">
        <div class="container">
          <div class="navbar">
            <ul class="d-flex nav-list align-items-center">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Услуги</a>
                <ul class="dropdown-menu">
                  <div class="row">
                    <?$sql="SELECT * FROM `servicetype`";
                      $result=$cms->query($sql);
                      if($result->num_rows > 0)
                      {
                        $num=1;
                        while ($row=$result->fetch_assoc())
                        {
                          if($num!=3)
                            echo "<div class='col-6'>
                            <div class='row row-cols-1'>
                            <div class='col'>
                              <a href='#' class='dropdown-title'>{$row['TITLE']}</a>
                            </div>";
                          else
                            echo "<div class='row row-cols-1 mt-4'>
                            <div class='col'>
                              <a href='#' class='dropdown-title'>{$row['TITLE']}</a>
                            </div>";
                          $service=$cms->query("SELECT * FROM `services` WHERE `ID_SERVICETYPE` = {$row['ID_SERVICETYPE']}");
                          if($service->num_rows > 0)
                          {
                            while($row_service=$service->fetch_assoc())
                            {
                              echo "<div class='col'>
                              <li class='nav-item'>
                                <a class='nav-link-text' href='#'>{$row_service['TITLE']}</a>
                              </li></div>";
                            }
                          }
                          if($num==2)
                            echo "</div>";
                          else
                            echo "</div>
                            </div>";
                          $num = $num+1;
                        }
                      }
                    ?>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link">О компании</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Выполненные проекты</a>
              </li>
              <li class="nav-item">
                <a class="nav-link">Контакты</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!--SliderContainer-->
    <div class="slider">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="slider-text-block">
              <div class="slider-text-block-top">Работаем по всей России</div>
              <div class="slider-text-block-center-top">
                <span class="span-top">Изготовление и монтаж</span>
                <span class="span-bottom">изделий из нержавеющей и комбинированной стали</span>
              </div>
              <div class="slider-text-block-center-bottom">для объектов жилой, коммерческой, муниципальной недвижимости</div>
              <div class="slider-advantages d-none d-lg-block">
                <div class="row">
                  <div class="col">
                    <span class="slider-plus">Высокое качество и сервис</span>
                  </div>
                  <div class="col">
                    <span class="slider-plus">Многолетний опыт</span>
                  </div>
                  <div class="col">
                    <span class="slider-plus">Нас рекомендуют</span>
                  </div>
                </div>
              </div>
              <button class="btn btn-feedback">Заказать звонок</button>
            </div>
          </div>
          <!--Slider-->
          <div class="slider-block">
            <div id="carouselExampleCaptions" class="carousel slide">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active pagination-bullet" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="pagination-bullet" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="pagination-bullet" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" class="pagination-bullet" aria-label="Slide 4"></button>
              </div>
              <div class="carousel-inner">
                <?$array_title=array("Гарантия качества", "Работа под ключ", "Аккуратность", "Все в срок");
                  $array_subtitle=array("используем в своей работе только качественные материалы от проверенных поставщиков", "от идеи на листке до доставки и монтажа готовых изделий",
                   "Наши монтажники бережно относятся к существующим конструкциям здания и к уже выполненным работам смежных подрядных организаций", "Обязуемся выполнять все этапы проектирования, изготовления и монтажа в установленные сроки");
                  $sql="SELECT `PATH` FROM `images` WHERE `ID_SITEELEMENT` = 1";
                  $result=$cms->query($sql);
                  if($result->num_rows > 0)
                  {
                    $num = 0;
                    while ($row=$result->fetch_assoc())
                    {
                      if($num==0){
                        echo "<div class='carousel-item active'>
                        <img src='{$row['PATH']}' alt='...'>
                        <div class='carousel-caption'>
                          <h5 class='slider-title'>{$array_title[$num]}</h5>
                          <div class='slider-line'></div>
                          <p class='slider-text'>{$array_subtitle[$num]}</p>
                        </div>
                      </div>";
                      }
                      else
                        echo "<div class='carousel-item'>
                          <img src='{$row['PATH']}' alt='...'>
                          <div class='carousel-caption'>
                            <h5 class='slider-title'>{$array_title[$num]}</h5>
                            <div class='slider-line'></div>
                            <p class='slider-text'>{$array_subtitle[$num]}</p>
                          </div>
                        </div>";
                      $num = $num + 1;
                    }
                  }
                ?>
              </div>
              <button class="carousel-control-prev d-none d-lg-block" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
              </button>
              <button class="carousel-control-next d-none d-lg-block" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <!--FormQuestion-->
      <div class="row align-items-center">
        <div class="col-lg-4 col-12">
          <div class="form-text-left">
            <p class="text-top">Ответим на любой Ваш вопрос</p>
            <p class="text-bottom">Специалисты ЭДЕЛЬСТАЛЬ помогут вам по любым вопросам или произведут предварительный расчет</p>
          </div>
        </div>
        <div class="col-lg-8 col-12">
          <form id="form-question" action="index.php" method="post">
            <div class="row gy-4 align-items-center">
              <div class="col-12 form-legend pt-xl-0 pt-3">Заполните форму ниже или позвоните нам и мы поможем подобрать оптимальный вариант по доступной цене</div>
              <div class="col-xl-4 col-md-6 col-12">
                <input class="form-control" placeholder="Имя или название организации" type="text" name="name">
              </div>
              <div class="col-xl-4 col-md-6 col-12">
                <input class="form-control" placeholder="Ваш номер телефона" type="text" name="phone">
              </div>
              <div class="col-xl-4 col-md-6 col-12">
                <input class="form-control" placeholder="Ваша электронная почта" type="text" name="email">
              </div>
              <div class="col-xl-8 col-md-6 col-12">
                <select class="form-select" name="service">
                  <?$sql="SELECT * FROM `servicetype`";
                        $result=$cms->query($sql);
                        if($result->num_rows > 0)
                        {
                          while ($row=$result->fetch_assoc())
                          {
                            echo "<optgroup label='{$row['TITLE']}'></option>";
                            $service=$cms->query("SELECT * FROM `services` WHERE `ID_SERVICETYPE` = {$row['ID_SERVICETYPE']}");
                            if($service->num_rows > 0)
                            {
                              while($row_service=$service->fetch_assoc())
                              {
                                echo "<option value='{$row_service['ID_SERVICE']}'>{$row_service['TITLE']}</option>";
                              }
                            }
                          }
                        }
                      ?>
                </select>
              </div>
              <div class="col-xl-4 col-12 order-xl-0 order-1">
                <input type="submit" name="send" class="btn btn-feedback" value="Отправить данные"></input>
              </div>
              <div class="col-12 order-xl-1 order-0">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="agreeCheck" name="check">
                  <label class="form-check-label" for="agreeCheck">Нажимая кнопку вы соглашаетесь с условиями <a href="#">Политики конфиденциальности</a></label>
                </div>
              </div>
            </div>
          </form>
<?if(isset($_POST['send'])){
  $name = str_replace('  ',' ',trim($_POST['name']));
  $phone = $_POST['phone'];
  $email = str_replace(' ','',$_POST['email']);
  $service = (int)$_POST['service'];
  $date = date("y-m-d");
  $check = $_POST['check'];
  $error = "";
  if(!preg_match('/^[\p{L&} -]+$/u', $name)){
    $error = $error . "<p>Некорректный имя или название организации</p>";
  }
  if(preg_match("/^(8|\+7)?(-| )?\(?[0-9]{3}\)?(-| )?[0-9]{3}(-| )?[0-9]{2}(-| )?[0-9]{2}$/", $phone)){
    if(preg_match('/^8/', $phone))
      $phone = substr_replace($phone, "+7",0,1);
    elseif(!preg_match('/^\+7/', $phone))
      $phone = "+7" . $phone;
    if($phone[2] == "-")
      $phone = substr_replace($phone, " ",2,1);
    elseif($phone[2] != " ")
      $phone = substr_replace($phone, " ",2,0);
    if($phone[3] != "(")
      $phone = substr_replace($phone, "(",3,0);
    if($phone[7] != ")")
      $phone = substr_replace($phone, ")",7,0);
    if($phone[8] == "-")
      $phone = substr_replace($phone, " ",8,1);
    elseif($phone[8] != " ")
      $phone = substr_replace($phone, " ",8,0);
    if($phone[12] == " ")
      $phone = substr_replace($phone, "-",12,1);
    elseif($phone[12] != "-")
      $phone = substr_replace($phone, "-",12,0);
    if($phone[15] == " ")
      $phone = substr_replace($phone, "-",15,1);
    elseif($phone[15] != "-")
      $phone = substr_replace($phone, "-",15,0);
  }
  else $error = $error . "<p>Некорректный номер</p>";
  if(!preg_match("/^\w+@(yandex.ru|mail.ru|inbox.ru|bk.ru)$/",$email))
    $error = $error . "<p>Некорректный email</p>";
  if(!$check){
    $error = $error . "<p>Необходимо потвердить, что вы согласны с условиями Политики конфидициальности</p>";
  }
  if(!empty($error)){
      echo $error;
      /*"<div class='modal fade show' tabindex='-1'>
      <div class='modal-dialog modal-dialog-centered'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title'>Ошибка</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Закрыть'></button>
          </div>
          <div class='modal-body'>
            <p>{$error}.</p>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Закрыть</button>
          </div>
        </div>";*/
  }else{
    $sql = "INSERT INTO `orders`(`NAME`, `PHONE`, `EMAIL`, `ID_SERVICE`, `ORDERDATE`, `ID_ORDERSTATUS`)
    VALUES ('$name','$phone','$email','$service', '$date', '1')";
    $cms->query($sql);
    echo "<p>Заказ добавлен</p>";
    /*"<div class='modal fade show d-block' id='#modal' tabindex='-1'>
    <div class='modal-dialog modal-dialog-centered'>
      <div class='modal-content'>
        <div class='modal-header'>
          <h5 class='modal-title'>Заказ добавлен</h5>
          <button type='button' id='#modalBtnClose' class='btn-close' data-bs-dismiss='modal' aria-label='Закрыть'></button>
        </div>
        <div class='modal-body'>
          <p>Ваш заказ успешно был добавлен.</p>
        </div>
        <div class='modal-footer'>
          <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Закрыть</button>
        </div>
      </div>";*/
  }
}
?>
        </div>
      </div>
      <!--Works-->
      <div class="works">
        <p class="works-title">1 000+ выполненных работ</p>
        <p class="works-subtitle mb-4">разной сложности и конфигурации</p>
        <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 g-4">
          <?$sql="SELECT * FROM `completedworks` LIMIT 0,6";
            $result=$cms->query($sql);
            if($result->num_rows > 0)
            {
              while ($row=$result->fetch_assoc())
              {
                $image=$cms->query("SELECT * FROM `images` WHERE `ID_WORK` = {$row['ID_WORK']}");
                if($image->num_rows > 0)
                {
                  $row_image=$image->fetch_assoc();
                  echo "<div class='col'>
                    <div class='work-block'>
                      <img class='img-fluid' src='{$row_image['PATH']}'/>
                      <div class='carousel-caption'>
                        <p class='work-name'>{$row['TITLE']}</p>
                        <p class='work-date'>{$row['DESCRIPTION']}</p>
                      </div>
                    </div>
                  </div>";
                }
              }
            }
          ?>
        </div>
      </div>
    </div>
    <!--TeamInfo-->
    <div class="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="team-left">
              <div class="row align-items-center">
                <div class="col-lg-4 d-flex justify-content-center">
                  <img class="img-fluid img-director" src="images/team_director.png">
                </div>
                <div class="col-lg-8">
                  <div class="team-left-title">Наша цель: идеальный продукт и сервис</div>
                  <div class="team-left-quote">Высокая квалификация персонала позволяют выпускать конструкции с ригелем, со стеклом и ограждения окон разной сложности.</div>
                  <div class="team-left-name d-flex justify-content-between align-items-center">
                    <span>Генеральный директор<br>Селеванов Артур Борисович</span>
                    <img class="img w-50" src="images/signature.png">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 p-sm-5 p-3 team-right">
            <div class="team-right-text-block">
              <p class="team-right-title">Наше производство</p>
              <p class="team-right-text-top">Наша компания изготавливает и производит монтаж изделий из нержавеющей и комбинированной стали с 2018 г.</p>
                <p class="team-right-text-bottom">Производственные цеха укомплектованы современными токарными станками с ЧПУ, фрезерным, гибочным оборудованием ведущих европейских производителей. Собственная покрасочная линия позволяет предложить поручни из нержавейки в большой цветовой гамме.</p>
            </div>
            <div class="team-slider d-flex align-self-center">
              <div id="carouselTeamCaptions" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselTeamCaptions" data-bs-slide-to="0" class="active pagination-bullet" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselTeamCaptions" data-bs-slide-to="1" class="pagination-bullet" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselTeamCaptions" data-bs-slide-to="2" class="pagination-bullet" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <?$sql="SELECT * FROM `images` WHERE `ID_SITEELEMENT` = 2";
                    $result=$cms->query($sql);
                    if($result->num_rows > 0)
                    {
                      $first = true;
                      while ($row=$result->fetch_assoc())
                      {
                        if($first){
                          echo "<div class='carousel-item active'>
                            <img src='{$row['PATH']}' alt='...'>
                          </div>";
                          $first=false;
                        }
                        else
                          echo "<div class='carousel-item'>
                            <img src='{$row['PATH']}' alt='...'>
                          </div>";
                      }
                    }
                  ?>
                </div>
                <button class="carousel-control-prev d-none d-lg-block" type="button" data-bs-target="#carouselTeamCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next d-none d-lg-block" type="button" data-bs-target="#carouselTeamCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Следующий</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--ConsultForm-->
    <div class="consult-form">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 col-12">
            <div class="form-text-left">
              <p class="text-top">Получите консультацию инженера</p>
              <p class="text-bottom">Заполните форму и наш менеджер свяжется с Вами в ближайшее время</p>
            </div>
          </div>
          <div class="col-lg-8 col-12">
            <form action="/index.php" method="post">
              <div class="row gy-4 align-items-center">
                <div class="col-xl-4 col-md-6 col-12 pt-xl-0 pt-3">
                  <input class="form-control" placeholder="Имя или название организации" type="text" name="name">
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                  <input class="form-control" placeholder="Ваш номер телефона" type="text" name="phone">
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                  <input class="form-control" placeholder="Ваша электронная почта" type="text" name="email">
                </div>
                <div class="col-xl-8 col-md-6 col-12">
                  <select class="form-select" name="service">
                    <?$sql="SELECT * FROM `servicetype`";
                        $result=$cms->query($sql);
                        if($result->num_rows > 0)
                        {
                          while ($row=$result->fetch_assoc())
                          {
                            echo "<optgroup label='{$row['TITLE']}'></option>";
                            $service=$cms->query("SELECT * FROM `services` WHERE `ID_SERVICETYPE` = {$row['ID_SERVICETYPE']}");
                            if($service->num_rows > 0)
                            {
                              while($row_service=$service->fetch_assoc())
                              {
                                echo "<option value='{$row_service['ID_SERVICE']}'>{$row_service['TITLE']}</option>";
                              }
                            }
                          }
                        }
                      ?>
                  </select>
                </div>
                <div class="col-xl-4 col-12 order-xl-0 order-1">
                  <button type="submit" name="send" class="btn btn-feedback">Вызвать инженера</button>
                </div>
                <div class="col-12 order-xl-1 order-0">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="agreeCheck" name="check">
                    <label class="form-check-label" for="agreeCheck">Нажимая кнопку вы соглашаетесь с условиями <a href="#">Политики конфиденциальности</a></label>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Footer-->
    <footer>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-12 footer-left mb-md-0 mb-4">
              <div class="row">
                <div class="col-12 mb-5">
                  <img class="img-fluid" src="images/logo-footer.png">
                </div>
                <div class="col-xl-6 col-lg-12 col-md-6 col-12">
                  <div class="footer-contacts-title">КОНТАКТЫ</div>
                  <div class="footer-contacts-phone"><a href="tel:+79139854512">+7 (913) 985-45-12</a></div>
                  <div class="footer-contacts-email"><a href="mailto:rush-a@mail.ru">rush-a@mail.ru</a></div>
                  <div class="footer-contacts-address"><span>НСО, г. Новосибирск, ул. Русская 39 оф 300/1</span></div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-6 col-12 mt-lg-4 mt-md-0 mt-4 footer-nav d-flex flex-column justify-content-between">
                  <div class="footer-nav-item"><a href="#">О КОМПАНИИ</a></div>
                  <div class="footer-nav-item mt-lg-3 mt-md-0 mt-3"><a href="#">О НАС</a></div>
                  <div class="footer-nav-item mt-lg-3 mt-md-0 mt-3"><a href="#">РЕКВИЗИТЫ</a></div>
                  <div class="footer-nav-item mt-lg-3 mt-md-0 mt-3"><a href="#">ПАРТНЕРЫ И КЛИЕНТЫ</a></div>
                  <div class="footer-nav-item mt-lg-3 mt-md-0 mt-3"><a href="#">ВАКАНСИИ</a></div>
                </div>
              </div>
            </div>
            <div class="col-lg-8 col-12 footer-right mt-lg-0 mt-4">
              <div class="d-none d-md-block">
                <div class="row">
                  <?$sql="SELECT * FROM `servicetype`";
                    $result=$cms->query($sql);
                    if($result->num_rows > 0)
                    {
                      $num=1;
                      while ($row=$result->fetch_assoc())
                      {
                        switch($num){
                          case 1: echo "<div class='col-8'>
                          <div class='row row-cols-2'>
                            <div class='col-12 footer-nav-title'><span class='footer-nav-type'>{$row['TITLE']}</span></div>"; break;
                          case 2: echo "<div class='col-4'>
                          <div class='row row-cols-1'>
                            <div class='col footer-nav-title'><span class='footer-nav-type'>{$row['TITLE']}</span></div>"; break;
                          case 3: echo "<div class='row row-cols-1 mt-4'>
                          <div class='col footer-nav-title'><span class='footer-nav-type'>{$row['TITLE']}</span></div>"; break;
                        }
                        $service=$cms->query("SELECT * FROM `services` WHERE `ID_SERVICETYPE` = {$row['ID_SERVICETYPE']}");
                        if($service->num_rows > 0)
                        {
                          while($row_service=$service->fetch_assoc())
                          {
                            echo "<div class='col footer-nav-item'><a class='footer-nav-service' href='#'>{$row_service['TITLE']}</a></div>";
                          }
                        }
                        if($num==2)
                          echo "</div>";
                        else
                          echo "</div>
                          </div>";
                        $num = $num+1;
                      }
                    }
                  ?>
                </div>
              </div>
              <div class="d-block d-md-none">
                <div class="accordion accordion-flush" id="accordionFlush">
                  <?$sql="SELECT * FROM `servicetype`";
                    $result=$cms->query($sql);
                    if($result->num_rows > 0)
                    {
                      $num = 1;
                      while ($row=$result->fetch_assoc())
                      {
                        echo "<div class='accordion-item'>
                        <h2 class='accordion-header'>
                          <button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse{$num}' aria-expanded='false' aria-controls='flush-collapse{$num}'>
                          <span class='footer-nav-type'>{$row['TITLE']}</span>
                          </button>
                        </h2>
                        <div id='flush-collapse{$num}' class='accordion-collapse collapse'>
                          <div class='accordion-body'>
                          <div class='row row-cols-1'>";
                        $service=$cms->query("SELECT * FROM `services` WHERE `ID_SERVICETYPE` = {$row['ID_SERVICETYPE']}");
                        if($service->num_rows > 0)
                        {
                          while($row_service=$service->fetch_assoc())
                          {
                            echo "<div class='col footer-nav-item'><a class='footer-nav-service' href='#'>{$row_service['TITLE']}</a></div>";
                          }
                        }
                        echo "</div>
                          </div>
                        </div>
                        </div>";
                        $num = $num + 1;
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container py-3">
          <div class="row">
            <div class="col-lg-4">
              <p>© 2018-2023. Edelstahl</p>
              <p class="mt-1">Политика обработки персональных данных</p>
            </div>
            <div class="col-lg-8 mt-md-0 mt-3">Данный интернет-сайт носит исключительно информационный характер и ни при каких условиях информационные материалы и цены, размещённые на сайте, не являются публичной офертой, определяемой положениями Статьи 437 ГК РФ.</div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>