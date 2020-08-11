@extends('layouts.app')
@section('content')
<form action="/plant/{{$location->id}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <input type="hidden"  name='user_id'  value={{ Auth::user()->id }} >
    @error('user_id') <p style="color:red;">{{$message}}</p>@enderror

    <input type="hidden"  name='locations_id'  value={{ $plant->locations->id }}>
    @error('locations_id') <p style="color:red;">{{$message}}</p>@enderror

    <div class="form-group">
        <label for="picture">Photo of this plant *</label>
        <img src="/storage/location/{{$location->picture}}" alt="" style="width:150px; height:150px; float:left;">
        <input type="file" class="form-control-file" id="plant_picture" value="{{$plant->picture}}" name="picture">
        @error('picture') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="name">What is the name of this plant? *</label>
        <input type="text" class="form-control"  value="{{$plant->name}}" name="name">
        @error('name') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="amount">Wow many plants of this kind have you planted on this location? *</label>
        <input type="text" class="form-control" value="{{$plant->amount}}" name="amount">
        @error('amount') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="plantType">What type of plants will you be keeping in this Location? *</label>
        <select class="form-control" name="plantType">
            <option></option>
            <option {{old('plantType',$location->plantType)=="Flower"? 'selected':''}}>Flower</option>
            <option {{old('plantType',$location->plantType)=="Vegetable"? 'selected':''}}>Vegetable</option>
            <option {{old('plantType',$location->plantType)=="Tree"? 'selected':''}}>Tree</option>
            <option {{old('plantType',$location->plantType)=="Herb"? 'selected':''}}>Herb</option>
            <option {{old('plantType',$location->plantType)=="Shrubs"? 'selected':''}}>Shrubs</option>
        </select>
        @error('plant_type') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="planted_at">When did you plant this plant in this Location? *</label>
        <input type="date" class="form-control" id="DatePlantedf" value="{{$plant->plant_at}}" name="planted_at">
        @error('planted_at') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea class="form-control" name="notes" value="notes"  value="{{$plant->notes}}" rows="5"></textarea>
        @error('notes') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <button class="btn-primary" type="submit">Update</button>

</form>
@endsection
