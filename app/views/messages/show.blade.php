@extends('layouts.scaffold')

@section('main')

<h1>Show Message</h1>

<p>{{ link_to_route('messages.index', 'Return to all messages') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Raw_msg</th>
				<th>Headers</th>
				<th>Html</th>
				<th>Text</th>
				<th>Subject</th>
				<th>To</th>
				<th>From_email</th>
				<th>From_name</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>{{{ $message->raw_msg }}}</td>
					<td>{{{ $message->headers }}}</td>
					<td>{{{ $message->html }}}</td>
					<td>{{{ $message->text }}}</td>
					<td>{{{ $message->subject }}}</td>
					<td>{{{ $message->to }}}</td>
					<td>{{{ $message->from_email }}}</td>
					<td>{{{ $message->from_name }}}</td>
                    <td>{{ link_to_route('messages.edit', 'Edit', array($message->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('messages.destroy', $message->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
        </tr>
    </tbody>
</table>

@stop