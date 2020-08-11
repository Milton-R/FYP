@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><H1>Edit Location information.</H1></div>
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
                                        <input type="file" class="form-control-file" value="{{$location->picture}}"
                                               id="LocationImagef"
                                               name="picture" onchange="readURL(this);">
                                        @error('picture') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">* Name of Location:</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="{{$location->name}}" name="name">
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
                                <label for="created_at">*When did you add this location section to your garden?</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" id="DatePlantedf"
                                           value="{{$location->created_at->toDateString()}}"
                                           name="created_at">
                                    @error('DatePlantedf') <p style="color:red;">{{$message}}</p>@enderror
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="LocationNotesF">Notes about this location:</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="notes" rows="5"></textarea>
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
