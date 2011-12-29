<?php 
class Page extends Eloquent {


  public static $timestamps = TRUE;

  public function media() {
	return $this->has_and_belongs_to_many('Media','pages_media');
  }

}
