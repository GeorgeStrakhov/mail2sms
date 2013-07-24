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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $messages = $this->message->all();

        return View::make('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Message::$rules);

        if ($validation->passes())
        {
            $this->message->create($input);

            return Redirect::route('messages.index');
        }

        return Redirect::route('messages.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $message = $this->message->findOrFail($id);

        return View::make('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $message = $this->message->find($id);

        if (is_null($message))
        {
            return Redirect::route('messages.index');
        }

        return View::make('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Message::$rules);

        if ($validation->passes())
        {
            $message = $this->message->find($id);
            $message->update($input);

            return Redirect::route('messages.show', $id);
        }

        return Redirect::route('messages.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
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

}