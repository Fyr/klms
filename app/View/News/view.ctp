<?
	$this->ArticleVars->init($article, $url, $title, $teaser, $src, '1200x');
?>
<div class="welcomeSection">
	<div class="wrapper">
		<?=$this->element('title', compact('title'))?>
		<b><?=date('d.m.Y', strtotime($article['News']['modified']))?></b>
		<br/><br/>
		<?=$this->ArticleVars->body($article)?>
	</div>
</div>
