<?
  $curPageIndex = $pagination->getCurrentPageIndex();
  $pageNumber = $pagination->getPageCount();
  $suffix = isset($suffix) ? $suffix : null;
  $visiblePages = isset($visiblePages) ? $visiblePages : 15;
  $endCap = isset($endCap) ? $endCap : 3;
 
  $leftBound  = 0;
  $rightBound  = $pageNumber;

  if($pageNumber > $visiblePages)
  {
     $spread = ($visiblePages / 2) - $endCap;
     $leftBound = $curPageIndex - $spread;    
     $rightBound = $curPageIndex + $spread;
  
     if( $leftBound < 0)
     {
         $rightBound += abs($leftBound);
         $leftBound = 0;
     }
     if( $rightBound > $pageNumber)
         $rightBound = $pageNumber;
        
  }


?>
<div class="toggle float_center">
  <span>Page</span>
  <ul>
    <? if($pageNumber > 1): ?>
      <li class="prev">
      <? if($curPageIndex): ?><a href="<?= $base_url . '/' . $curPageIndex . $suffix ?>"><? endif ?>
        &laquo; 
      <? if($curPageIndex): ?></a><? endif ?>
      </li>
    <? endif ?>

    <? for ($i = 1; $i <= $pageNumber; $i++): ?>
     <? if($i < $leftBound): ?>
        <? for ($j = 1; $j <= $endCap; $j++): ?>
          <li>
            <a href="<?= $base_url.'/'.$j.$suffix ?>/">
            <?= $j ?>
            </a>
          </li>
        <? endfor ?>
        ...
        <? while($i < $leftBound) $i++ ?>
      <? endif ?>
      
      <? if($i <= $rightBound): ?>

        <li class="<?= ($i == $curPageIndex+1) ? 'current' : null ?>">
          <? if ($i != $curPageIndex+1): ?><a href="<?= $base_url.'/'.$i.$suffix ?>/"><? endif ?>
          <?= $i ?>
          <? if ($i != $curPageIndex+1): ?></a><? endif ?>
        </li>
      <? else: ?>   
        ...
        
        <? for ($j = $pageNumber - $endCap + 1; $j <= $pageNumber; $j++): ?>
          <li>
            <a href="<?= $base_url.'/'.$j.$suffix ?>/">
            <?= $j ?>
            </a>
          </li>
        <? endfor ?>
            
        <? break; ?>
      <? endif ?>
    <? endfor ?>

    <li class="next">
    <? if($curPageIndex < $pageNumber - 1): ?><a href="<?= $base_url . '/' . ($curPageIndex + 2) . $suffix ?>"><? endif ?>
     &raquo; 
    <? if($curPageIndex < $pageNumber - 1):  ?></a><? endif ?>
    </li>
    
  </ul>
</div>