      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Rebel CMS!</h1>

        <p>Built using the awesome <?php echo HTML::link('http://laravel.com/', 'Laravel Framework'); ?> and 
		  <?php echo HTML::link('http://twitter.github.com/bootstrap/index.html#', 'Twitter Bootstrap'); ?>.This CMS is <em>very</em> basic 
		  and is not recommended for production unless it undergoes some major testing and modification first! It requires MYSQL and imagick. 
		</p>

        <p><a class="btn primary large">Learn more &raquo;</a></p>

      </div>

      <!-- Example row of columns -->
      <div class="row">
        <div class="span6">
          <h2>More Disclaimer</h2>
          <p>
			There is probably better ways to have coded this site - this was a couple of days effort learning Laravel. Imagick has a lot more options and 
			you may notice I am storing the original image, as well as a 'medium' and 'thumbnail size' - which is not optimal. Make sure
			you apply the correct permissions to the folder you would like to store images. 
		  </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>

        </div>
        <div class="span5">
          <h2>Watch Out</h2>
           <p>
			 For missing CSRF checks and other security issues. Plus there could be a lot more validation stuff to deal with. No client side validation
			 has been done... yet. Make sure you add your DB details to application/config. Roles dont do anything at this stage.
		   </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span5">

          <h2>Make it Better</h2>
          <p>
			Do whatever you would like with it. I would love to see someone take it and make it better. Thanks a bunch to Laravel
			developers - super nice framework to work with and extremely intuitive - looking foward to the next project to use Lavarel on!
		  </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>
