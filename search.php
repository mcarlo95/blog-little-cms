<?php
$root = "/membri/sandboxcorner/";
#look for tags in every article and print articles that correspond to the searched keywords.
foreach (simplexml_load_file($root."files/index.xml")->post as $value){
	$post_content = simplexml_load_file($root."files/posts/".$value->link);
	foreach ($post_content->tag as $tag) {
		if ($tag==$_GET['query']) {
			echo $post_content->title;
			echo $post_content->date;
			echo array_shift(explode('</p>', $post_content->content)),'';
			echo $value->link;
		}
	}
}
?>
