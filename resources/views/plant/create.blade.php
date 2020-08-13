@extends('layouts.app')
@section('content')
<form action="/location/store_plant" method="post">
    @csrf

    <input type="hidden"  name='user_id'  value={{ Auth::user()->id }} >
    @error('user_id') <p style="color:red;">{{$message}}</p>@enderror
    <input type="hidden"  name='locations_id'  value={{ $location->id }} >
    @error('locations_id') <p style="color:red;">{{$message}}</p>@enderror
    <input type="hidden"  name='localType'  value={{ $location->locationType}} >
    @error('localType') <p style="color:red;">{{$message}}</p>@enderror
    <input type="hidden"  name='waterOrnot'  value="1" >
    @error('waterOrnot') <p style="color:red;">{{$message}}</p>@enderror
    <input type="hidden"  name='user_set'  value="1" >
    @error('confirmedDelay') <p style="color:red;">{{$message}}</p>@enderror


    <div class="form-group">
        <label for="picture">Example file input</label>
        <input type="file" class="form-control-file" id="LocationImagef" name="picture">
        @error('picture') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name">
        @error('name') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" class="form-control" name="amount">
        @error('amount') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="plant_type">Plant Type</label>
        <select class="form-control" name="plant_type">
            <option> </option>
            <option>Flower</option>
            <option>Vegetable</option>
            <option>Tree</option>
            <option>Herb</option>
            <option>Shrubs</option>
        </select>
        @error('plant_type') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="planted_at">date Planted</label>
        <input type="date" class="form-control" id="DatePlantedf" name="planted_at">
        @error('planted_at') <p style="color:red;">{{$message}}</p>@enderror
    </div>


    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea class="form-control" name="notes" rows="5"></textarea>
        @error('notes') <p style="color:red;">{{$message}}</p>@enderror
    </div>


    <div class="form-group">
        <label for="planted_at">how often does this need to be watered?</label>
        <input type="date" class="form-control" id="waterReminder" name="waterReminder">
        @error('waterReminder') <p style="color:#ff0000;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="repetions">how often does this plant need to be watered?</label>
        <select class="form-control" name="repetions">
            <option> </option>
            <option value="1" >Daily</option>
            <option value="3">Every 3 Days</option>
            <option value="7">Every 7 Days</option>
        </select>
        @error('repetions') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <button type="submit"></button>

</form>
@endsection
