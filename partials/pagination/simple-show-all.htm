<? // This partial is basic pagination, but includes the ability to have a 'View All' link ?>
<?
	$show_all = isset($show_all) ? $show_all : false;
	$suffix = isset($suffix) ? $suffix : null;
	if (!$show_all):
	$curPageIndex = $pagination->getCurrentPageIndex();
	$pageNumber = $pagination->getPageCount();
?>
	<div class="pages cf">
		<? if ($curPageIndex): ?><a href="<?= $base_url.'/'.$curPageIndex.$suffix ?>"><? endif ?>
		Prev
		<? if ($curPageIndex): ?></a><? endif ?>
		<div>
			<? $pages = array(); ?>
			<? for ($i = 1; $i <= $pageNumber; $i++): ?>
				<?
					$tag = ($i == $curPageIndex+1) ? 'span' : 'a';
					$attr_string = ($i != $curPageIndex+1) ? 'href="'.$base_url.'/'.$i.$suffix.'/"' : 'class="current"';
					$pages[] = "<{$tag} {$attr_string}>{$i}</{$tag}>";
				?>
			<? endfor ?>
			<?= join(' / ', $pages) ?>
		</div>
		<? if ($curPageIndex < $pageNumber-1): ?><a href="<?= $base_url.'/'.($curPageIndex+2).$suffix ?>"><? endif ?>
		Next
		<? if ($curPageIndex < $pageNumber-1): ?></a><? endif ?>
	</div>
	<div class="clear"></div>
	<a href="<?= $base_url ?>/all" class="all">View All</a>
<? else: ?>
	<a href="<?= $base_url ?>/" class="all">View Paginated</a>
<? endif ?>