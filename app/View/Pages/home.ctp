<div class="welcomeSection">
    <div class="wrapper">
        <?=$this->element('title', $aPages['home']['Page'])?>
        <?=$this->ArticleVars->body($aPages['home'])?>
        <br /><br />
        <div class="partition">
<?
    $src = $this->Media->imageUrl($aPages['home-text']);
?>
            <img src="<?=$src?>" class="left" alt="" />
            <h3><?=Hash::get($aPages, 'home-text.Page.title')?></h3>
            <?=$this->ArticleVars->body($aPages['home-text'])?>
            <a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'view', 'dealers'))?>" class="btn"><?=__('Read more...')?></a>
        </div>
<?
    $src = $this->Media->imageUrl($aPages['home-text2']);
?>
        <div class="partition">
            <img src="<?=$src?>" class="right" alt="" />
            <h3><?=Hash::get($aPages, 'home-text2.Page.title')?></h3>
            <?=$this->ArticleVars->body($aPages['home-text2'])?>
            <a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'view', 'contacts'))?>" class="btn"><?=__('Read more...')?></a>
        </div>
    </div>
</div>

<div class="productsSection">
    <h2>Productsoorten</h2>
    <ul>
        <li>
            <a href="#">
                <span class="icon landbouw"></span>
                <span class="name">Landbouw</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon liften"></span>
                <span class="name">Liften</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon tuin"></span>
                <span class="name">tuin & park</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon reiniging"></span>
                <span class="name">reiniging</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon hoogwerkers"></span>
                <span class="name">hoogwerkers</span>
            </a>
        </li>
        <li>
            <a href="#">
                <span class="icon kranen"></span>
                <span class="name">kranen</span>
            </a>
        </li>
    </ul>
</div>
<div class="categorySection">
    <div class="wrapper">
        <h2><?=__('Categories')?></h2>
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
<div class="searchSection">
    <div class="wrapper">
        <h2 class="mb">Zoek Producten</h2>
        <div class="formElements">
            <div>
                <span class="name first">Type: </span>
                <select class="type" >
                    <option>- All types -</option>
                    <option>Effer</option>
                    <option>CTE groep</option>
                    <option>Cappellotto</option>
                    <option>B-lift telescoop hoogwerkers</option>
                    <option>ZED gearticuleerde hoogwerker wer wer wer wer we</option>
                    <option>B-lift telescoop hoogwerkers</option>
                </select>
            </div>
            <div>
                <span class="name brand">Brand: </span>
                <select class="type" >
                    <option>- All types -</option>
                    <option>Effer</option>
                    <option>CTE groep</option>
                    <option>Cappellotto</option>
                    <option>B-lift telescoop hoogwerkers</option>
                    <option>ZED gearticuleerde hoogwerker wer wer wer wer we</option>
                    <option>B-lift telescoop hoogwerkers</option>
                </select>
            </div>
            <div>
                <span class="name brand">Category: </span>
                <label class="checkbox">
                    <input  type="checkbox" />
                    Gebruikt
                </label>
                <label class="checkbox">
                    <input  type="checkbox" />
                    Overige categorie?n
                </label>
                <label class="checkbox">
                    <input  type="checkbox" />
                    Nieuw
                </label>
                <button class="btn">Search</button>
            </div>
        </div>
    </div>
</div>
<div class="section newsSection">
    <div class="wrapper">
        <h2><?=__('Hot news')?></h2>
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
<div class="section newsSection grey">
    <div class="wrapper">
        <h2><?=__('Featured products')?></h2>
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
