@extends('layouts.bmail')
@section('js')
    <script src="{{asset("vendor/unisharp/laravel-ckeditor/ckeditor.js")}}"></script>
    <script src="{{asset("vendor/unisharp/laravel-ckeditor/adapters/jquery.js")}}"></script>
    <script>
        $('textarea').ckeditor(
            {
                language: 'fa',
                // uiColor: '#9AB8F3'
                toolbarGroups: [
                    { name: 'document', groups: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },
                    { name: 'clipboard', groups: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                    { name: 'basicstyles', groups: [ 'Bold', 'Italic' ] },
                    { name: 'links', groups: [ 'Link', 'Unlink','Anchor'] },
                    { name: 'styles', groups: [ 'Styles', 'format'] },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'align', 'bidi' ] },
                    { name: 'styles' },
                ],
                removeButtons: 'Anchor,blocks',

            }
        );
    </script>
@endsection
@section('content')
 @include('forms.formTicket',['formTitle'=>trans('mb.compose'),'submitText'=>trans('mb.send')])
@endsection

