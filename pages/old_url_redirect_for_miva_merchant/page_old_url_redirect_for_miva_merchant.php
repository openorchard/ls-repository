<?

	if(Phpr::$request->getField('Screen') == 'PROD'
	&& $product = Shop_Product::create()->where(' shop_products.sku = ?',Phpr::$request->getField('Product_Code'))->find_all())
	{
		if(strlen($product->page_url('store/product')))
	 		PHPr::$response->redirect($product->page_url('store/product'),true);

	}elseif(Phpr::$request->getField('Screen') == 'CTGY'
	&& $category = Shop_Category::create()->find_by_code(Phpr::$request->getField('Category_Code')))
	{
		if(strlen($category->page_url('store/category')))
	 		PHPr::$response->redirect($category->page_url('store/category'),true);

	}elseif(Phpr::$request->getField('Screen') == 'SRCH'
	&& $search = Phpr::$request->getField('Super:search'))
	{
		
		PHPr::$response->redirect(root_url('/store/search/?query='. $search),true);


	}

	//More permanent solution which says the page no longer exists.
	header("HTTP/1.0 410 Gone");
	//header("HTTP/1.0 404 Not Found");
	?>
	
	<div class="grid_16">
	  <h4> Page has moved</h4>
	  This page has moved or no longer exists. You may be using an old link, or bookmark. Try heading back to the <a href="<?php echo root_url('/') ?>">homepage</a> to see if you can find what you are looking for from there.
	  
	  <p><a class="link_button" href="<?= root_url('/')?>">Return to the home page</a></p>  
	</div>
	<?
	