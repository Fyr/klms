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
      'vendor/jquery.1.11.0.min',
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
        <a href="/"><img src="/img/logo.png" alt="<?=Configure::read('domain.title')?>" /></a>
        <div class="phone"><?=Configure::read('Settings.phone')?></div>
        <ul class="menu">
<?
    foreach($aNavBar as $menu => $item) {
        $class = ($menu === $currMenu) ? 'active' : '';
?>
            <li class="<?=$class?>"><a href="<?=$this->Html->url($item['url'])?>"><?=__($item['title'])?></a></li>

<?
    }
?>
        <!--li>
          <a href="javascript: void(0)"><?=__('Products')?></a>
          <ul style="display: none;">
            <li><a href="#">Landbouw</a></li>
            <li><a href="#">Liften</a></li>
            <li><a href="#">tuin & park</a></li>
            <li><a href="#">Reiniging</a></li>
            <li><a href="#">Hoogwerkers</a></li>
            <li><a href="#">Kranen</a></li>
          </ul>
        </li>
        <li><a href="#"><span><?=__('Contacts')?></span></a></li-->
        </ul>

    <div class="search">
        <div class="searchText">zoeken</div>
            <div class="searchBoxOuter">
                <div class="searchBox">
                    <div class="inputBox withSearch">
                      <input type="text" class="styler" />
                    </div>
                    <input type="submit" value="search" class="btn1" />
                    <div class="icon close"></div>
                </div>
            </div>
        </div>
    </div>
<?
    if ($currMenu === 'Home' && $slider) {
?>

    <div id="owl-carousel" class="owl-carousel bigSlider">
<?
        foreach($slider['Slides'] as $i => $media) {
            $src = $this->Media->imageUrl($media);
            if ($i === 0) {
?>
        <div class="item" style="background-image: url('<?=$src?>')">
            <div class="wrapper">
                <div class="back">
                    <div class="title"><?=$slider['Page']['title']?></div>
                    <div class="description"><?=$this->ArticleVars->body($slider)?></div>
                    <a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'view', 'about-us'))?>" class="btn btn-blue"><?=__('Read more...')?></a>
                </div>
            </div>
        </div>
<?
            } else {
?>
        <div class="item" style="background-image: url('<?=$src?>')"></div>
<?
            }
        }
?>
    </div>

<?
    }
?>

    <?=$this->fetch('content')?>
    <div class="partnersSection">
        <h2><?=__('Our Partners')?></h2>
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
                    <img src="/img/logo-footer.png" alt="" />
                    <div class="address"><?=Configure::read('Settings.address')?></div>
                    <div class="phone"><?=Configure::read('Settings.phone')?></div>
                </div>
                <div>
                    <ul class="bottomMenu">
<?
    foreach($aNavBar as $menu => $item) {
        $class = ($menu === $currMenu) ? 'active' : '';
?>
                        <li class="<?=$class?>"><a href="<?=$this->Html->url($item['url'])?>"><?=__($item['title'])?></a></li>

<?
    }
?>
                    </ul>
                    <div class="copyright">2012 &copy; KLUYTMANS</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>