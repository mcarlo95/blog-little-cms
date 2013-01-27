<?php
$root = "/membri/sandboxcorner/";

function get_Post($num){
	global $root;
	$index_post = simplexml_load_file($root."files/index.xml");
	$link_post = $index_post->post[$num]->link;
	$post_content = simplexml_load_file($root."files/posts/".$link_post);
	return $post_content;
}

function get_link($num){
	global $root;
	$index_post = simplexml_load_file($root."files/index.xml");
	$link_post = $index_post->post[$num]->link;
	return $link_post;
}
/*conta il numero dei post nel file index.xml*/
function number_posts(){
	$n=0;
	global $root;
	foreach (simplexml_load_file($root."files/index.xml")->post as $value)
		$n++;
	$n=$n-1;
	return $n;
}

for ($i = number_posts(); $i >=0 ; $i--) {
	$post=get_Post($i);
	echo $post->title;
	echo $post->date;
	echo get_link($i);
}
?>
