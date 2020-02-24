@extends('layout')

<form action="/action_page.php">

    <form>
        <div class="form-group">
            <label for="LocationImagef">Example file input</label>
            <input type="file" class="form-control-file" id="LocationImagef">
        </div>
    </form>

    <form>
        <div class="form-group">
            <label for="LocationNamef">Location</label>
            <input type="email" class="form-control" id="LocationNamef">
        </div>

        <div class="form-group">
            <label for="PlantTypeF">Plant Type</label>
            <select class="form-control" id="PlantTypeF">
                <option>Flower</option>
                <option>Vegetable</option>
                <option>Tree</option>
                <option>Herb</option>
                <option>Shrubs</option>
            </select>
        </div>

        <div class="form-group">
            <label for="OtherPlantTypef">Plant Name</label>
            <input type="text" class="form-control" id="OtherPlantTypef">
        </div>

        <div class="form-group">
            <label for="LocationNotesF">Notes</label>
            <textarea class="form-control" id="LocationNotesF" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="OtherPlantTypef">Plant Name</label>
            <input type="hidden" class="form-control" id="OtherPlantTypef">
        </div>


    </form>
</form>
