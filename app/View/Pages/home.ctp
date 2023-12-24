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

<div class="welcomeSection">
    <div class="wrapper">
<?
    // Welcome text block
    echo $this->element('title', $aPages['home']['Page']);
    echo $this->ArticleVars->body($aPages['home']);
?>
        <br /><br />
        <div class="partition">
<?
    $src = $this->Media->imageUrl($aPages['home-text']);
?>
            <img src="<?=$src?>" class="left" alt="" />
<?
    // Homepage text block
    echo $this->element('assoc_text', array('page' => $aPages['home-text'], 'level' => 3));
?>

            <a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'view', 'dealers'))?>" class="btn"><?=__('Read more...')?></a>
        </div>
<?
    $src = $this->Media->imageUrl($aPages['home-text2']);
?>
        <div class="partition">
            <img src="<?=$src?>" class="right" alt="" />
<?
    // Homepage text block 2
    echo $this->element('assoc_text', array('page' => $aPages['home-text2'], 'level' => 3));
?>
            <a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'view', 'contacts'))?>" class="btn"><?=__('Read more...')?></a>
        </div>
    </div>
</div>

<div class="section recentProductsSection grey">
    <div class="wrapper">
<?
    // Homepage text for Brands
    echo $this->element('assoc_text', array('page' => $aPages['home-brands']));
?>
        <ul class="products">
<?
    foreach($aPartners as $article) {
        if (Hash::get($article, 'Brand.featured')) {
            $this->ArticleVars->init($article, $url, $title, $teaser, $src, '600x');
?>
            <li>
                <a href="<?=$url?>" class="picture" style="background-image: url('<?=$src?>');"></a>
                <a href="<?=$url?>" class="title"><?=$title?></a>
            </li>

<?
        }
    }
?>
        </ul>
        <div class="all">
            <a href="<?=$this->Html->url(array('controller' => 'brands', 'action' => 'index'))?>" class="btn"><?=__('Our partners')?></a>
        </div>
    </div>
</div>

<div class="section recentProductsSection">
    <div class="wrapper">
<?
    // Homepage text for Featured Subcategories
    echo $this->element('assoc_text', array('page' => $aPages['home-featured-subcategories']));
?>
        <ul class="products">
<?
    foreach($aFeaturedSubcategories as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, '600x');
?>
            <li>
                <a href="<?=$url?>" class="picture" style="background-image: url('<?=$src?>');"></a>
                <a href="<?=$url?>" class="title"><?=$title?></a>
            </li>

<?
    }
?>
        </ul>
        <div class="all">
            <a href="<?=$this->Html->url(array('controller' => 'products', 'action' => 'index'))?>" class="btn"><?=__('All products')?></a>
        </div>
    </div>
</div>

<div class="section recentProductsSection grey">
    <div class="wrapper">
<?
    // Homepage text for Product tags
    echo $this->element('assoc_text', array('page' => $aPages['home-product-tags']));
?>
        <ul class="products">
<?
    foreach($aTags as $tag) {
        $src = $this->Media->imageUrl($tag, '600x');
        $url = $this->Html->url(array('controller' => 'products', 'action' => 'index', '?' => array('tag' => $tag['Tag']['id'])));
?>
            <li>
                <a href="<?=$url?>" class="picture" style="background-image: url('<?=$src?>');"></a>
                <a href="<?=$url?>" class="title"><?=$tag['Tag']['title']?></a>
            </li>

<?
    }
?>
        </ul>
        <div class="all">
            <a href="<?=$this->Html->url(array('controller' => 'products', 'action' => 'index'))?>" class="btn"><?=__('All products')?></a>
        </div>
    </div>
</div>

<div class="section categorySection">
    <div class="wrapper">
<?
    // Homepage text for Categories
    echo $this->element('assoc_text', array('page' => $aPages['home-categories']));
?>
        <ul class="categories">
<?
    foreach($aCategories as $category) {
        $this->ArticleVars->init($category, $url, $title, $teaser, $src, '800x', $cat_id);

?>
            <li style="background-image: url('<?=$src?>')">
                <div class="description">
                    <div class="title"><?=$title?></div>
                    <div class="links">
<?
        foreach($aSubcategories[$cat_id] as $subcategory) {
?>
                        <div><a href="<?=SiteRouter::url($subcategory)?>"><?=$subcategory['Subcategory']['title']?></a></div>
<?
        }
?>
                    </div>
                </div>
            </li>

<?
    }
?>
        </ul>
    </div>
</div>

<div class="section newsSection grey">
    <div class="wrapper">
<?
    // Homepage text for Hot news
    
    echo $this->element('assoc_text', array('page' => $aPages['home-hot-news']));
?>
        <ul class="news">
<?
    foreach($aNews as $article) {
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
        <div class="all">
            <a href="<?=$this->Html->url(array('controller' => 'news', 'action' => 'index'))?>" class="btn"><?=__('All news')?></a>
        </div>
    </div>
</div>
<div class="section newsSection">
    <div class="wrapper">
<?
    // Homepage text for Featured products
    echo $this->element('assoc_text', array('page' => $aPages['home-featured-products']));
?>
        <ul class="news">
<?
    foreach($aProducts as $article) {
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
        <div class="all">
            <a href="<?=$this->Html->url(array('controller' => 'products', 'action' => 'index'))?>" class="btn"><?=__('All products')?></a>
        </div>
    </div>
</div>
