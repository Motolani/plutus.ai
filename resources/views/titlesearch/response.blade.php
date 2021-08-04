@extends('layouts.index')

@section('center')
<div class="response-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 offset-md-2 mt-5">
                <h1 class="text-center">Xeraphys TitleSearch</h1>
                <ul class="response_ul">
                    @foreach ($responses as $response)

                        @if(array_key_exists('Name', $response))
                            <li class="response_li">
                                <strong>Name:</strong> {{$response['Name']}}
                            </li>
                        @endif

                        @if(array_key_exists('DirectName', $response))
                            <li class="response_li">
                                <strong>DirectName:</strong> {{$response['DirectName']}}
                            </li> 
                        @endif
                        
                        @if (array_key_exists('IndirectName', $response))
                            <li class="response_li">
                                <strong>IndirectName:</strong> {{$response['IndirectName']}}
                            </li> 
                        @endif

                        @if (array_key_exists('Party', $response))
                            <li class="response_li">
                                <strong>Party:</strong> {{$response['Party']}}
                            </li>
                        @endif

                        @if (array_key_exists('CrossPartyName', $response))
                            <li class="response_li">
                                <strong>CrossPartyName:</strong> {{$response['CrossPartyName']}}
                            </li>
                        @endif

                        @if (array_key_exists('RecordDate', $response))
                            <li class="response_li">
                                <strong>RecordDate:</strong> {{$response['RecordDate']}}
                            </li>
                        @endif
                        
                        @if (array_key_exists('BookType', $response))
                            <li class="response_li">
                                <strong>BookType:</strong> {{$response['BookType']}}
                            </li>
                        @endif

                        @if (array_key_exists('BookPage', $response))
                            <li class="response_li">
                                <strong>BookPage:</strong> {{$response['BookPage']}}
                            </li>
                        @endif

                        @if (array_key_exists('InstrumentNumber', $response))
                            <li class="response_li">
                                <strong>InstrumentNumber:</strong> {{$response['InstrumentNumber']}}
                            </li>
                        @endif

                        @if (array_key_exists('Comments', $response))
                            <li class="response_li">
                                <strong>Comments:</strong> {{$response['Comments']}}
                            </li>
                        @endif
                        
                        @if (array_key_exists('CaseNumber', $response))
                            <li class="response_li">
                                <strong>CaseNumber:</strong> {{$response['CaseNumber']}}
                            </li>
                        @endif
                        
                        @if (array_key_exists('Consideration', $response))
                            <li class="response_li">
                                <strong>Consideration:</strong> {{$response['Consideration']}}
                            </li>
                        @endif
                        
                        @if (array_key_exists('DocLegalDescription', $response))
                            <li class="response_li">
                                <strong>DocLegalDescription:</strong> {{$response['DocLegalDescription']}}
                            </li>
                        @endif
                        
                        @if (array_key_exists('DocTypeDescription', $response))
                            <li class="response_li">
                                <strong>DocTypeDescription:</strong> {{$response['DocTypeDescription']}}
                            </li>
                        @endif
                        <hr><br>
                    @endforeach
                </ul>
                <div class="row mb-5">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="{{ route('title.pdfexport')}}" class="btn btn-outline-success" role="button">Download PDF</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection