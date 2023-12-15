<?
    $level = (!isset($level)) ? 1 : $level;
    echo $this->Html->tag('h'.$level, $title);
?>