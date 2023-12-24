<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=$this->Html->charset()?>
    <title><?=Configure::read('domain.title')?></title>
<?
    echo $this->Html->css(array(
        'fonts',
        'style',
        'owl-carousel/owl.carousel',
        'owl-carousel/owl.theme',
        'jquery.formstyler',
        'style',
        'extra'
    ));

    echo $this->Html->meta('icon');
    echo $this->fetch('meta');
    echo $this->fetch('css');

  echo $this->Html->script(array(
        'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
    //   'vendor/jquery.1.11.0.min',
      'vendor/owl.carousel.min',
      'vendor/jquery.formstyler.min',
      'custom',
    // '/Core/js/json_handler'
  ));
  echo $this->fetch('script');
?>
</head>
<body>
    <div class="header">

        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
                <div class="textMenu">menu</div>
            </label>

            <?=$this->element('menu', array('class' => 'menuMobile'))?>
        </div>

        <a href="/"><img src="/img/logo.png" class="logo" alt="<?=Configure::read('domain.title')?>" /></a>
        <div class="phone">
            <div class="phonewithIcon">
                <a href="tel:<?=Configure::read('Settings.phone')?>" class="icon phoneIcon"></a>
                <span><?=Configure::read('Settings.phone')?></span>
            </div>
            <div class="address"><?=Configure::read('Settings.address')?></div>
        </div>
        <?=$this->element('menu', array('class' => 'menu'))?>

        <a href="tel:<?=str_replace(' ', '', Configure::read('Settings.phone'))?>" class="icon phoneIcon"></a>
    </div>

    <div class="main-content">
        <?=$this->fetch('content')?>
    </div>

    <div class="partnersSection">
        <h2 class="mb"><?=__('Our Partners')?></h2>
        <div id="owl-carousel-partners" class="partners">
<?
    foreach($aPartners as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, '200x');
?>
            <a class="item" href="<?=$url?>" title="<?=$title?>" style="background-image: url('<?=$src?>');"></a>
<?
    }
?>
        </div>
    </div>

    <div class="footer">
        <div class="wrapper">
            <div class="inner">
                <div>
                    <?=$this->element('menu', array('aNavBar' => $aBottomLinks, 'class' => 'bottomMenu'))?>
                    <div class="copyright">2023 &copy; KLUYTMANS</div>
                </div>
                <div class="bottomContent">
                    <a href="/"><img class="bottomLogo" src="/img/logo.png" alt="<?=Configure::read('domain.title')?>" /></a>
                    <div class="address"><?=Configure::read('Settings.address')?></div>
                    <div class="phone"><?=Configure::read('Settings.phone')?></div>
                    <div class="copyright1">2014 &copy; KLUYTMANS</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobileCatalogeBtn" id="mobile-cataloge-btn">
      <div class="text">Products</div>
    </div>

    <div class="mobileCataloge" id="mobile-cataloge">
        <div class="mm__bg mm__close"></div>
        <div class="mm__wrapper" id="mm__wrapper">
            <div class="close-btn mm__close"></div>
            <div class="mobileCataloge__inner">
                <!-- catalog menu -->
                <?=$this->element('menu', array('aNavBar' => $aNavBar['Products']['submenu'], 'class' => 'catalog'))?>
                <!-- /catalog menu -->
            </div>
        </div>
    </div>

    <? //echo $this->element('sql_dump');?>
</body>
</html>