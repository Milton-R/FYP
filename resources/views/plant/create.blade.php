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
                    <div class="card-header row no-gutters">
                        <div class="col-md-6"> <H1>Add New Plant.</H1></div>
                        <div class="col-md-6">
                            <a class="btn btn-danger col-4" href="/locations/{{$location->id}}">Cancel</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success"
                                 id="message">{{ Session::get('message') }}</div>
                        @endif
                        <form action="/location/store_plant" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name='user_id' value="{{ Auth::user()->id }} ">
                            @error('user_id') <p style="color:red;">{{$message}}</p>@enderror
                            <input type="hidden" name='locations_id' value="{{$location->id}}" >
                            @error('locations_id') <p style="color:red;">{{$message}}</p>@enderror
                            <input type="hidden" name='localType' value="{{ $location->locationType}}" >
                            @error('localType') <p style="color:red;">{{$message}}</p>@enderror
                            <input type="hidden" name='waterOrnot' value="1">
                            @error('waterOrnot') <p style="color:red;">{{$message}}</p>@enderror
                            <input type="hidden" name='confirmedDelay' value="1">
                            @error('confirmedDelay') <p style="color:red;">{{$message}}</p>@enderror

                            <div class="form-group ">
                                <label for="picture" class=" col-form-label">Picture of Plant </label>
                                <div class="col-md-12">
                                    <img id="blah" src="/storage/location/{{'noimage.jpg'}}" alt=""
                                         style="width:50%; height:100%; float:left; margin-bottom: 10px">
                                    <input type="file" class="form-control-file" id="plantImagef"
                                           name="picture" value="{{ old('picture') }}" onchange="readURL(this);">
                                    @error('picture') <p style="color:red;">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">Name of the plant:</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                                @error('name') <p style="color:red;">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group">
                                <label for="amount">How many of this do you have planted?</label>
                                <input type="text" class="form-control" name="amount" value="{{ old('amount')}}">
                                @error('amount') <p style="color:red;">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group">
                                <label for="plant_type">What kind of plant is this</label>
                                <select class="form-control" name="plant_type">
                                    <option></option>
                                    <option value="Flower"   {{old('plantType')=="Flower"? 'selected':''}}>Flower</option>
                                    <option value="Vegetable" {{old('plantType')=="Vegetable"? 'selected':''}}>Vegetable</option>
                                    <option value="Tree" {{old('plantType')=="Tree"? 'selected':''}}>Tree</option>
                                    <option value="Herb" {{old('plantType')=="Herb"? 'selected':''}}>Herb</option>
                                    <option value="Shrubs" {{old('plantType')=="Shrubs"? 'selected':''}}>Shrubs</option>
                                </select>
                                @error('plant_type') <p style="color:red;">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group">
                                <label for="planted_at">What day did you plant this? </label>
                                <input type="date" class="form-control" id="DatePlantedf" name="planted_at" value="{{ old('planted_at')}}">
                                @error('planted_at') <p style="color:red;">{{$message}}</p>@enderror
                            </div>


                            <div class="form-group">
                                <label for="notes">what extra information would you like to give?</label>
                                <textarea class="form-control" name="notes" rows="5">{{ old('notes')}}</textarea>
                                @error('notes') <p style="color:red;">{{$message}}</p>@enderror
                            </div>


                            <div class="form-group">
                                <label for="planted_at">When would you like to water this plant?</label>
                                <input type="date" class="form-control" id="waterReminder" name="waterReminder" value="{{ old('waterReminder')}}">
                                @error('waterReminder') <p style="color:#ff0000;">{{$message}}</p>@enderror
                            </div>

                            <div class="form-group">
                                <label for="repetitions">how often does this plant need to be watered?</label>
                                <select class="form-control" name="repetitions">
                                    <option></option>
                                    <option value="1" {{old('repetitions')=="1"? 'selected':''}} >Daily</option>
                                    <option value="3" {{old('repetitions')=="3"? 'selected':''}} >Every 3 Days</option>
                                    <option value="7" {{old('repetitions')=="7"? 'selected':''}} >Every 7 Days</option>
                                </select>
                                @error('repetitions') <p style="color:red;">{{$message}}</p>@enderror
                            </div>

                            <button class="btn btn-primary" type="submit">Submit</button>

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

