<?php

class MessagesController extends BaseController {

	/**
	 * Message Repository
	 *
	 * @var Message
	 */
	protected $message;

	public function __construct(Message $message)
	{
		$this->message = $message;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$message = $this->message->where('slug', '=', $slug)->first();
		if(!$message) App::abort(404);
		$message->text = preg_replace('/\v+|\\\[rn]/','<br/>',$message->text); //nl2br is not working, most likely due to real_mysql_escape_string somewhere in laravel
		$message->html = self::sanitizeHtml($message->html);
		return View::make('messages.show', compact('message'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->message->find($id)->delete();

		return Redirect::route('messages.index');
	}

	/**
	* sanitize html to avoid malicious sript tags
	*/
	protected static function sanitizeHtml($input) { 
		$search = array(
			'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);

		$output = preg_replace($search, '', $input);
		return $output;
	}

}