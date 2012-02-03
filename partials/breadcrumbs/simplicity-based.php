

<?
  if (isset($category) && $category instanceof Shop_Category): 
  $parent_categories = $category->get_parents(true);
?>
  <ul class="clearfix">
    <li><a href="<?= root_url('store') ?>">Home</a></li>
    <? foreach ($parent_categories as $parent_category): ?>
      <li class="<?= $parent_category->id == $category->id ? 'last' : null ?>">
        <? if ($parent_category->id != $category->id): ?><a href="<?= $parent_category->page_url('store/category') ?>"><? endif ?>
        <?= h(strlen($parent_category->title)?$parent_category->title:$parent_category->name) ?>
        <? if ($parent_category->id != $category->id): ?></a><? endif ?>
      </li>
    <? endforeach ?>
  </ul>
<? elseif (isset($category) && $category instanceof Blog_Category): ?>
  <ul class="clearfix">
    <li><a href="<?= root_url('News') ?>">News</a></li>
    <li class="last"><?= h($category->name) ?></li>
  </ul>
<? elseif (isset($product)):
  $parent_categories = $product->category_list[0]->get_parents(true);
?>
  <ul class="clearfix">
    <li><a href="<?= root_url('store') ?>">Home</a></li>
    <? foreach ($parent_categories as $parent_category): ?>
      <li>
        <a href="<?= $parent_category->page_url('store/category') ?>"><?= h($parent_category->name) ?></a>
      </li>
    <? endforeach ?>
    <li class="last"><?= $product->name ?></li>
  </ul>  
<? else:
  $parent_nodes = $this->page->navigation_parents(true);
  ?>
   <ul class="clearfix">
      <? foreach ($parent_nodes as $node): ?>
        <li class="<?= $node->id == $this->page->id ? 'last' : null ?>">
          <? if ($node->id != $this->page->id): ?><a href="<?= root_url($node->url) ?>"><? endif ?>
            
          <?= $node->title ?>
          
        <? if ($node->id != $this->page->id): ?></a><? endif ?>
        </li>
      <? endforeach ?>
    </ul>
<? endif ?>