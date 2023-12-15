<?
    $level = (isset($level)) ? $level : 2;
    $title = Hash::get($page, 'Page.title');
    echo $this->element('title', compact('level', 'title'));
    echo $this->ArticleVars->body($page);
?>