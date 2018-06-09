<?php

function profile_exists($image)
{
	return empty($image) || file_exists("/storage/images/avatars/".$image) ? 'default.jpg' : $image;
}

function shoten_paragraphs($content)
{
	return substr($content,0,rand(1,100));	
}

function me()
{
	return auth()->user();
}
