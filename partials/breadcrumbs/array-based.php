<?
	$nodes = array(
		root_url('/') => 'Home',
	);
	$parents = $this->page->navigation_parents(false);
	$params = array();
	foreach ($parents as $parent) {
		$page_obj = Cms_Page::findByUrl($parent->url, $params);
		$add_node = true;
		switch ($page_obj->action_reference) {
			case 'shop:category':
			case 'shop:product':
			$add_node = false;
		}
		if ($add_node) {
			$nodes[root_url($page_obj->url)] = $page_obj->navigation_label();
		}
	}

	switch ($this->page->action_reference) {
		case 'blog:post':
			if (isset($post))
				$nodes[root_url('/blog/category/'.$post->categories[0]->url_name)] = $post->categories[0]->name;
		case 'blog:category':
			if (isset($category))
				$nodes[$category->url_name] = $category->name;
			break;
		case 'shop:category':
			if (isset($category))
				$category_nodes = $category->get_parents(false);
		case 'shop:product':
			if (isset($product))
				$category_nodes = $product->category_list[count($product->category_list)-1]->get_parents(true);
			if (isset($category_nodes))
				foreach($category_nodes as $n)
					$nodes[$n->page_url('/shop/category')] = $n->name;
			break;
	}

	$navigation_nodes = array();
	foreach ($nodes as $url => $title) {
		$navigation_nodes[] = "<a href=\"{$url}\">{$title}</a>";
	}
	if (Phpr::$request->getCurrentUri() != '/')
		$navigation_nodes[] = '<a href="'.Phpr::$request->getCurrentUri().'" class="current">' . $this->page->title . '</a>';
?>

<?= join(' &raquo; ', $navigation_nodes) ?>

