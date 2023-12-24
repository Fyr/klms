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
        </div>
        <?=$this->element('paginate');?>
</div>