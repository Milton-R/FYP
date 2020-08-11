@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <H1>Add new location.</H1></div>
                            <div class="col-md-6">
                                <a type="button" href="{{ url('/locations') }}" class="btn btn-light"> Cancel </a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="/locations" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name='user_id' value={{ Auth::user()->id }} >

                            <div class="form-group ">
                                <label for="picture" class=" col-form-label">Picture of Location </label>
                                <div class="col-md-12">
                                    <img id="blah" src="/storage/location/{{'noimage.jpg'}}" alt=""
                                         style="width:50%; height:100%; float:left; margin-bottom: 10px">
                                    <input type="file" class="form-control-file" id="LocationImagef"
                                           name="picture" value="{{ old('picture') }}" onchange="readURL(this);">
                                    @error('picture') <p style="color:red;">{{$message}}</p>@enderror

                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="col-md-12">
                                    <label for="name" class=" col-form-label">Name of Location *</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name">
                                    @error('name') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="plantType" class=" col-form-label">What type of plants will you be keeping
                                    in this Location? *</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="plantType">
                                        <option></option>
                                        <option {{old('plantType')=="Flower"? 'selected':''}}>Flower</option>
                                        <option {{old('plantType')=="Vegetable"? 'selected':''}}>Vegetable</option>
                                        <option {{old('plantType')=="Tree"? 'selected':''}}>Tree</option>
                                        <option {{old('plantType')=="Herb"? 'selected':''}}>Herb</option>
                                        <option {{old('plantType')=="Shrubs"? 'selected':''}}>Shrubs</option>
                                    </select>
                                    @error('plantType') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="created_at" class="col-form-label">When did you add this location section to
                                    your garden? *</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" id="DatePlantedf"
                                           value="{{ old('created_at') }}"
                                           name="created_at">
                                    @error('created_at') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>


                            <div class="form-group ">
                                <label for="notes">Notes about this location.</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="notes" value="{{ old('notes') }}"
                                              rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="locationType" class=" col-form-label">Is this an Indoor or Outdoor Location?
                                    *</label>
                                <div class="col-md-12">
                                    <select class="form-control" name="locationType">
                                        <options></options>
                                        <option value="1" {{old('locationType')=="1"? 'selected':''}} >Indoors</option>
                                        <option value="2" {{old('locationType')=="2"? 'selected':''}} >OutDoors</option>
                                    </select>
                                    @error('locationType') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>

                                <div class="col-xl-6  ">
                                    <button class="btn-primary" type="submit">ADD New Location</button>
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
