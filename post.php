<?php
#This page will get the post filename from the article index and use it to show article.
#Moreover there are some navigation tools

#set the html working root
$root = "/membri/sandboxcorner/";

#get the name of the post and load with simplexml_load_file
$post_link=$_GET['post'];
$post = simplexml_load_file($root."files/posts/".$post_link);

#now you can print sections of the xml file
echo $post->title;
echo $post->date;
echo $post->content;

#if there is an image associated to the post, it will be showed
if(($post->image)!=''){
	echo $post->image;
} 

#show tags and keywords relative to the article
foreach ($post->tag as $tag) {
	echo $tag;
}

#now there is the part with the navigation between previous and following article
#this count what number correspond to the post
$n=0;
foreach (simplexml_load_file($root."files/index.xml")->post as $pos)
{
	$n++;
	if($pos->link==$_GET['post'])
		break;
}
$n=$n-1;
#and show the previous (n-1)
if(simplexml_load_file($root."files/index.xml")->post[$n-1]->link!='') {
	echo simplexml_load_file($root."files/index.xml")->post[$n-1]->link;
}
#and following (n+1)
if(simplexml_load_file($root."files/index.xml")->post[$n+1]->link!=''){
	echo simplexml_load_file($root."files/index.xml")->post[$n+1]->link; 
}
?>
