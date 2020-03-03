@extends('layout')

<form action="/location/store_plant" method="post">
    @csrf

    <input type="hidden"  name='user_id'  value={{ Auth::user()->id }} >
    @error('user_id') <p style="color:red;">{{$message}}</p>@enderror

    <input type="hidden"  name='locations_id'  value={{ $plant->locations->id }}>
    @error('locations_id') <p style="color:red;">{{$message}}</p>@enderror

    <div class="form-group">
        <label for="picture">Example file input</label>
        <input type="file" class="form-control-file" id="plant_picture" value="{{$plant->picture}}" name="picture">
        @error('picture') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control"  value="{{$plant->name}}" name="name">
        @error('name') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" class="form-control" value="{{$plant->amount}}" name="amount">
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
        <input type="date" class="form-control" id="DatePlantedf" value="{{$plant->plant_at}}" name="planted_at">
        @error('planted_at') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <div class="form-group">
        <label for="notes">Notes</label>
        <textarea class="form-control" name="notes" value="notes"  value="{{$plant->notes}}" rows="5"></textarea>
        @error('notes') <p style="color:red;">{{$message}}</p>@enderror
    </div>

    <button type="submit"></button>

</form>
