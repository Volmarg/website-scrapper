@extends('templates/layout')
@section('container')
    <h3>Fast raport</h3>
    <table>
        <thead>
        <tr>
            <td>Page scanned</td>
            <td>Status</td>
            <td>Main content</td>
        </tr>
        </thead>
        @foreach($content as $num => $one_page)
            <tr>
                <td><a href="{{$one_page['link']}}">{{str_limit($one_page['title'],70)}}</a></td>
                <td><b>{{$one_page['status']}}</b></td>

                @if($one_page['main'])
                    <td>
                        <button id="{{$num}}"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                data-id="hiddenContent{{$num}}"
                                class=" btn btn-primary">Show content</button>

                        <div class="hiddenContent"
                             style="display:none;"
                             id="hiddenContent{{$num}}"
                             data-info="move this to scss">{!! $one_page['main'] !!} </div>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>


    @include('components/modal')
@endsection
