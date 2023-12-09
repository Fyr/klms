<ul class="<?=(isset($class)) ? $class : 'menu'?>">
<?
    foreach($aNavBar as $curr => $item) {
        $active = ($curr == $currMenu) ? 'class="active"' : '';
?>
    <li <?=$active?>>
        <!-- <?=$this->Html->link(__($item['title']), $item['url'])?> -->
        <?=$this->Html->link(__($item['title']), 'javascript:void(0)')?>
        <ul style="display: none;">
            <li>
                <a href="javascript: void(0)"><span class="dot"></span>Category 1</a>
                <ul style="display: none;">
                    <li>
                        <a href="javascript: void(0)"><span class="dot"></span>SubCategory 1</a>
                        <ul style="display: none;">
                            <li><a href="#">Item Name 1</a></li>
                            <li><a href="#">Item Name 2</a></li>
                            <li><a href="#">Item Name Long Long Long Name 3</a></li>
                            <li><a href="#">Item Name 4</a></li>
                            <li><a href="#">Item Name 5</a></li>
                            <li><a href="#">Item Name 6</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><span class="dot"></span>SubCategory 2</a>
                        <ul style="display: none;">
                            <li><a href="#">Item Name 1</a></li>
                            <li><a href="#">Item Name 2</a></li>
                            <li><a href="#">Item Name Long Long Long Name 3</a></li>
                            <li><a href="#">Item Name 4</a></li>
                            <li><a href="#">Item Name 5</a></li>
                            <li><a href="#">Item Name 6</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"></span>SubCategory 3</a>
                    </li>
                    <li>
                        <a href="#"></span>SubCategory 4</a>
                    </li>
                    <li>
                        <a href="#">SubCategory 5</a>
                    </li>
                    <li>
                        <a href="#">SubCategory 6</a>
                    </li>
                </ul>
              </li>
              <li><a href="#">Category 2</a></li>
              <li><a href="#">Category 3</a></li>
              <li><a href="#">Category 4</a></li>
              <li><a href="#">Category 5</a></li>
              <li><a href="#">Category 6</a></li>
        </ul>
    </li>
<?
    }
?>
</ul>