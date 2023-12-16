<ul <?=(isset($class)) ? "class=\"$class\"" : 'style="display: none;"'?>>
<?
    foreach($aNavBar as $curr => $item) {
        $active = ($curr == $currMenu) ? ' class="active"' : '';
        if (isset($item['submenu']) && $item['submenu']) {
?>
            <li<?=$active?>>
                <a href="javascript:void(0)"><span class="dot"></span><?=$item['title']?></a>
                <?=$this->element('menu', array('aNavBar' => $item['submenu']))?>
            </li>

<?
        } else {
?>
            <li<?=$active?>>
                <?=$this->Html->link($item['title'], $item['url']);?>
            </li>

<?
        }
    }
?>
</ul>