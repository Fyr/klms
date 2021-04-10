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
            <a href="<?=$this->Html->url(array('controller' => 'pages', 'action' => 'view', 'about-us'))?>" class="btn"><?=__('Read more...')?></a>
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
        <h2>Categories with main photo of category (uploaded)</h2>
        <ul class="categories">
            <li style="background-image: url('/temporary/category1.jpg')">
                <div class="description">
                    <div class="title">Landbouw</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category2.jpg')">
                <div class="description">
                    <div class="title">Liften</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category3.jpg')">
                <div class="description">
                    <div class="title">Hoogwerkers</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category4.jpg')">
                <div class="description">
                    <div class="title">Tuin & Park</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category5.jpg')">
                <div class="description">
                    <div class="title">Reiniging</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category6.jpg')">
                <div class="description">
                    <div class="title">Kranen</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category7.jpg')">
                <div class="description">
                    <div class="title">Landbouw</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
            <li style="background-image: url('/temporary/category8.jpg')">
                <div class="description">
                    <div class="title">Kranen</div>
                    <div class="links">
                        <div><a href="#">Gebruikte hoogwerkers</a></div>
                        <div><a href="#">Traccess rupshoogwerkers</a></div>
                        <div><a href="#">ZED gearticuleerde hoogwerkers</a></div>
                        <div><a href="#">B-lift Telescoop hoogwerkers</a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="searchSection">
    <div class="wrapper">
        <h2>Zoek Producten</h2>
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
<div class="newsSection">
    <div class="wrapper">
        <?=$this->element('title', array('title' => __('Hot news')))?>
        <ul class="news">
<?
    foreach($aNews as $article) {
        $this->ArticleVars->init($article, $url, $title, $teaser, $src, '800x');
?>
            <li>
                <a href="<?=$url?>" class="picture" style="background-image: url(<?=$src?>);"></a>
                <div class="title"><?=$title?></div>
                <div class="description"><?=$teaser?></div>
                <a href="<?=$url?>" class="more"><?=__('Read more...')?></a>
            </li>

<?
    }
?>
        </ul>
    </div>
</div>
<div class="recentProductsSection">
    <div class="wrapper">
        <h2>Recent products</h2>
        <ul class="products">
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product1.jpg');"></a>
                <a href="#" class="title">Pianoplan 600 verticaal traplooplift</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product2.jpg');"></a>
                <a href="#" class="title">Traccess 230 Winch rupshoogwerker</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product3.jpg');"></a>
                <a href="#" class="title">ZED 32 JHV gearticuleerde hoogwerker</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product4.jpg');"></a>
                <a href="#" class="title">Pianoplan 600 horizontaal traplooplift</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product5.jpg');"></a>
                <a href="#" class="title">Pianoplan 600 standaard traplooplift</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product6.jpg');"></a>
                <a href="#" class="title">Traccess 170/170E rupshoogwerker</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product7.jpg');"></a>
                <a href="#" class="title">Traccess 230/230E rupshoogwerker</a>
            </li>
            <li>
                <a href="#" class="picture" style="background-image: url('/temporary/product8.jpg');"></a>
                <a href="#" class="title">ZED 29 J gearticuleerde hoogwerker</a>
            </li>
        </ul>
        <div class="allProducts">
            <a href="#" class="btn">Alle producten</a>
        </div>
    </div>
</div>