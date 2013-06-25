<?php
/*
Plugin Name: Spit Yo Game
Description: A more repectable approach to WP EMails.
Version: 0.5.0
Author: ...a few good HipHoppers...
Author URI: http://www.5ivedesign.co.za

#-----------------------------------------------------------------
# SPIT FUNCTION
#
# @param 	int $page_length
# @param	string $content_splitter
#
# @return	echo string
#
# @package	SYG
# @since	0.5.0
# @author	a.Work.of.Hip.Hop...www.5ivedesign.co.za
#
#-----------------------------------------------------------------
*/

function spit( $page_length = 120, $content_splitter = " <!--nextpage--> " ){

	ob_start(); //initiate buffer; all echoed content will be put into buffer instead of being echoed *PHP-FUNCTION*

		the_content(); //the article content (echoed) *WP-FUNCTION*

	$content = ob_get_clean(); //Retrieve Content of buffer, pull into variable and also clear the buffer :: String/Text variable type *PHP-FUNCTION*
	//$content = strip_tags($content); //uncomment to remove html tags

	$size_of_content = sizeof( explode(" ", $content) ); //Get number of words (which should equal the length of the array right?) *PHP-FUNCTION*
	
	$split_into_words = preg_split( "/ /", $content ); //Split content by spaces :: variable is an array *PHP-FUNCTION*
	
	$og_content_counter=0;
	$times = 0;
	$num = 1;
	
	while ( $og_content_counter < $size_of_content ) {
	
		$indexing_og_content[ $og_content_counter + $times ] = $split_into_words[ $og_content_counter ]; //indexing 0G content array
			
		if ( ($og_content_counter/$num) == $page_length ) { //We\re at the 120th word...insert content+splitting tag
				
				$num++;
				
				$size_of_indexed_content = count($indexing_og_content);//sizeof( explode(" ", $indexing_og_content) ); //length of indexed array
				
				$indexing_og_content[$size_of_indexed_content + 1 ] = $content_splitter ; //insert content splitting tag after last entry 
				
				$times++;
				
		}
		$og_content_counter++;	
	}
	
	$gob;
	
	foreach ($indexing_og_content as $baptist_content) { //Rebuilding the article
		
		$gob .= $baptist_content." ";
				
	}
	$gob = apply_filters( the_content, $gob ); //Let wordpress do its thing on the content with the new additions this time
	$gob = str_replace(']]>', ']]&gt;', $gob);
	
	echo $gob;
};
?>
