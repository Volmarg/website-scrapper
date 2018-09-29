@extends('templates/layout')
@section('container')
    <h3>Fast raport</h3>
    <table id="fast_report_table" class="display" style="width:100%">
        <thead>
        <tr>
            <td>Page scanned</td>

            <td>Status for main</td>
            <td>Main content</td>
            <td>Status for other</td>
            <td>Other content</td>
        </tr>
        </thead>
        @foreach($content as $num => $one_page)
            <tr>
                <td><a href="{{$one_page['link']}}">{{str_limit($one_page['title'],70)}}</a></td>

                <td><b>{{$one_page['status']['status_for_main']}}</b></td>
                @if($one_page['main'])
                    <td>
                        <button id="{{$num}}"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                data-id="hiddenContent{{$num}}"
                                class=" btn btn-primary">Show content
                        </button>

                        <div class="hiddenContent"
                             style="display:none;"
                             id="hiddenContent{{$num}}"
                             data-info="move this to scss">{!! $one_page['main'] !!} </div>
                    </td>
                @endif
                @if($one_page['other'])
                    <td><b>{{$one_page['status']['status_for_other']}}</b></td>
                    <td>
                        <button id="other_{{$num}}"
                                data-toggle="modal"
                                data-target="#exampleModal"
                                data-id="hiddenContentother_{{$num}}"
                                class=" btn btn-primary">Show content
                        </button>

                        <div class="hiddenContent"
                             style="display:none;"
                             id="hiddenContentother_{{$num}}"
                             data-info="move this to scss">{!! $one_page['other']!!} </div>
                    </td>
                @endif
            </tr>
        @endforeach
    </table>


    @include('components/modal')
@endsection

@section('jsFooter')
    <footer>
        @include('templates/footerForOutput')
    </footer>
@endsection
