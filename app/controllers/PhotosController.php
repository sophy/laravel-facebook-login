<?php

class PhotosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('photos.index');
	}

	
	/**
	 * Get Upload a photo
	 *  
	 *  @return  void
	 */
	public function getUpload() {
		echo 'Hello';
	}

	/**
	 * Get Upload a photo
	 *  
	 *  @return  void
	 */
	public function postUpload() {
		
	}

}
