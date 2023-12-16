<?

?>
<div class="newsSection">
    <div class="wrapper">
        <?=$this->element('title', array('title' => __('Products')))?>
        <?=$this->element('paginate')?>
<?
    foreach($filterNames as $title => $val) {
?>
        <b><?=$title?></b>: <?=$val?><br />
<?
    }
?>
        <br/>
        <div class="clearfix">
            <div class="oneLeftSide">
                <!-- catalog menu -->
                <?=$this->element('menu', array('aNavBar' => $aNavBar['Products']['submenu'], 'class' => 'catalog'))?>
                <!-- /catalog menu -->
                
                <div class="block catalogBlock">
                    <div class="catalogHead">Категория 1</div>
                    <ul class="catalog">
                        <li>
                            <a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>МТЗ</a>
                            <ul style="display: none">
                                <li><a href="#">3522</a></li>
                                <li><a href="#">Long Long Long Item</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>МАЗ</a>
                            <ul style="display: none">
                                <li><a href="#">103</a></li>
                                <li><a href="#">256</a></li>
                                <li><a href="#"><span class="icon smallArrow"></span>4370</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>NDC</a>
                            <ul style="display: none">
                                <li><a href="#">111</a></li>
                                <li><a href="#">222</a></li>
                                <li><a href="#">333</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>tuin &amp; park</a></li>
                    </ul>
                    <div class="catalogHead">Категория 2</div>
                    <ul class="catalog">
                        <li>
                            <a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>МТЗ</a>
                            <ul style="display: none">
                                <li><a href="#">3522</a></li>
                                <li><a href="#">Long Long Long Item</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>МАЗ</a>
                            <ul style="display: none">
                                <li><a href="#">103</a></li>
                                <li><a href="#">256</a></li>
                                <li><a href="#"><span class="icon smallArrow"></span>4370</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>NDC</a>
                            <ul style="display: none">
                                <li><a href="#">111</a></li>
                                <li><a href="#">222</a></li>
                                <li><a href="#">333</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript: void(0)" class="firstLevel"><span class="icon arrow"></span>tuin &amp; park</a></li>
                    </ul>
                </div>
            </div>
            <ul class="news">
    <?
        foreach($aArticles as $article) {
            $this->ArticleVars->init($article, $url, $title, $teaser, $src, '800x');
    ?>
                <li>
                    <a href="<?=$url?>" class="picture" style="background-image: url(<?=$src?>);"></a>
                    <div class="title">
                        <a href="<?=$url?>"><?=$title?></a>
                    </div>
                    <div class="description"><?=$teaser?></div>
                    <a href="<?=$url?>" class="more"><?=__('Read more...')?></a>
                </li>
    <?
        }
    ?>
            </ul>
        <?=$this->element('paginate');?>
        </div>
    </div>
</div>