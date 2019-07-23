@extends('layouts.print1')
@section('content')
    <h4>{{$ticket->subject}}</h4>
    <h5>{{trans('mb.ticketStatus').': '.\App\Ticket::STATUS_LIST($ticket->status)[0]}}</h5>
    @foreach($chains as $t)
       <h6>{{trans('mb.from').' '.$t->sender->name .' '.trans('mb.date').' '.date_shamsi($t->created_at,"Y-m-d")}}</h6>
       <?=$t->text?>
    @endforeach
@endsection