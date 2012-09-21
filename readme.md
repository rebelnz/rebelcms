NOTE: This was built with Laravel V2 - please see the [Laravel official website](http://laravel.com) for more recent version of the framework.

Built using the awesome Laravel Framework and Twitter Bootstrap.This CMS is very basic and is not recommended for production unless it underwent some major testing and modification. It requires MYSQL and imagick.

More Disclaimer
There is probably better ways to have coded this site - this was a couple of days effort learning Laravel. Imagick has a lot more options and you may notice I am storing the original image, as well as a 'medium' and 'thumbnail size' - which is not optimal. Make sure you apply the correct permissions to the folder you would like to store images. 

Watch Out
For missing CSRF checks and other security issues. Plus there could be a lot more validation stuff to deal with. No client side validation has been done... yet. Make sure you add your DB details to application/config. Roles dont do anything at this stage. 

Make it Better
Do whatever you would like with it. I would love to see someone take it and make it better. Thanks a bunch to Laravel developers - super nice framework to work with and extremely intuitive - looking foward to the next project to use Lavarel on! 

Install
.sql is in the 'data' folder - remember to edit 'application/config/database.php' settings   		
run the sql and you willcan login with: 
		
		email -- admin@example.com
		password -- password

make sure permissions are good for 'public/image' folder 
when uploading an image the original is not touched - medium and thumbnails are created but the original image uploaded has no optimization 
so a too big image will probably fail -- check out imagick docs for a zillion options.  

http://au2.php.net/manual/en/book.imagick.php


## Laravel - A PHP Framework For Web Artisans

Laravel is a clean and classy framework for PHP web development. Freeing you from spaghetti code, Laravel helps you create wonderful applications using simple, expressive syntax. Development should be a creative experience that you enjoy, not something that is painful. Enjoy the fresh air.

### [Official Website & Documentation](http://laravel.com)