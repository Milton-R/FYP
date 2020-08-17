@extends('layouts.app')
@section('content')

    <script>
        $(document).ready(function () {
            $("#message").delay(5000)
                .fadeOut('slow');
        });</script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Session::has('message'))
                        <div class="alert alert-success"
                             id="message">{{ Session::get('message') }}</div>
                    @endif
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6"> <H1> Location information.</H1></div>
                                <div class="col-md-6">
                                    <a type="button" href="{{ url('/locations') }}" class="btn btn-light"> Cancel </a>
                                </div>
                            </div>

                        </div>
                    <div class="card-body">

                        <form action="/locations/{{$location->id}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <input type="hidden" name='user_id' value={{ Auth::user()->id }} >

                            <div class="form-group ">
                                <label for="picture">Picture of Location:</label>
                                <div class="col-md-12">

                                    <img id="blah" src="/storage/location/{{$location->picture}}" alt=""
                                         style="width:50%; height:100%; float:left; margin-bottom: 10px">
                                        <input type="file" class="form-control-file" value="{{old('picture',$location->picture)}}"
                                               id="LocationImagef"
                                               name="picture" onchange="readURL(this);">
                                        @error('picture') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">* Name of Location:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{old('name',$location->name)}}" name="name">
                                    @error('name') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="plantType">* What type of plants will you be keeping in this Location?</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="plantType">
                                        <option></option>
                                        <option {{old('plantType',$location->plantType)=="Flower"? 'selected':''}}>
                                            Flower
                                        </option>
                                        <option {{old('plantType',$location->plantType)=="Vegetable"? 'selected':''}}>
                                            Vegetable
                                        </option>
                                        <option {{old('plantType',$location->plantType)=="Tree"? 'selected':''}}>
                                            Tree
                                        </option>
                                        <option {{old('plantType',$location->plantType)=="Herb"? 'selected':''}}>
                                            Herb
                                        </option>
                                        <option {{old('plantType',$location->plantType)=="Shrubs"? 'selected':''}}>
                                            Shrubs
                                        </option>
                                    </select>
                                    @error('plantType') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="location_created_at">*When did you add this location section to your garden?</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" id="DatePlantedf"
                                           value="{{old('location_created_at',$location->location_created_at)}}"
                                           name="location_created_at">
                                    @error('location_created_at') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="LocationNotesF">Notes about this location:</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="notes" rows="5">{{old('notes',$location->notes)}}</textarea>
                                    @error('notes') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="locationType">*Is this an Indoor or Outdoor Location?</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="locationType">
                                        <options></options>
                                        <option
                                            value="1" {{old('locationType',$location->locationType)=="1"? 'selected':''}} >
                                            Indoors
                                        </option>
                                        <option
                                            value="2" {{old('locationType',$location->locationType)=="2"? 'selected':''}} >
                                            OutDoors
                                        </option>
                                    </select>
                                    @error('locationType') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <button class="btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)

                };

                reader.readAsDataURL(input.files[0]);
            }
        }</script>

@endsection
