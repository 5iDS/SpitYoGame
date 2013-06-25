Description - 
====
Inserts custom tags/content after every x amount of words in wordpress loop. 
Replaces the_content() although re-applies the filters.

How it works - 
====

-use within wordpress post loop;
-instead of calling the_content(); use the_story(x) where x is an integer representing the number of words to skip before inserting the custom content.
-custom content will be inserted after every x amount of words.
