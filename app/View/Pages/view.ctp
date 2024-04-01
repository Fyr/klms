<?
    $this->ArticleVars->init($article, $url, $title, $teaser, $src, '1200x');
    $slug = Hash::get($article, 'Page.slug');
    if ($slug == 'dealers') {
?>
<div id="preload" style="display: none">
<?
        foreach($aRegions as $id => $region) {
            echo $this->Html->image('/img/regions/h'.$id.'.png');
        }
?>
<?
    }
?>
</div>
<div class="welcomeSection">
    <div class="wrapper">
        <?=$this->element('title', compact('title'))?>
        <?=$this->ArticleVars->body($article)?>
<?
    if ($slug == 'dealers') {
        echo $this->element('dealers_map');
    }
?>
    </div>
</div>
