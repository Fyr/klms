    <?
    // $this->ArticleVars->init($article, $url, $title, $teaser, $src, '1200x');
    $title = $dealer['Dealer']['title'];
    $aItems = array();
    foreach(array('address', 'phone', 'email') as $key) {
        if ($dealer['Dealer'][$key]) {
            $aItems[ucfirst(__($key))] = nl2br($dealer['Dealer'][$key]);
        }
    }
    $regionID = $dealer['Dealer']['region_id'];
    $left = $dealer['Dealer']['marker_x'];
    $top = $dealer['Dealer']['marker_y'];
?>
<div class="welcomeSection">
    <div class="wrapper">
        <?=$this->element('title', compact('title'))?>
        <div class="partition">
            <img class="left" src="/img/regions/region<?=$regionID?>.png" alt="<?=$aRegions[$regionID]['title']?>"/>
            <div style="position: relative;">
                <img src="/img/pointer.png" alt="<?=$dealer['Dealer']['name']?>" style="position: absolute; top: <?=$top?>px; left: <?=$left?>px;"/>
            </div>
            
<?
    foreach($aItems as $name => $val) {
?>
    <p>
        <b><?=$name?>:</b>
        <br/><?=$val?>
    </p>
<?
    }
?>
        </div>
    </div>
</div>
