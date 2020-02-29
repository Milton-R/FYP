@extends('layout')

<form action="/action_page.php" method="POST">
    <form>
        <form>
            <div class="form-group">
                <label for="plantImagef">Example file input</label>
                <input type="file" class="form-control-file" id="plantImagef">
            </div>
        </form>

        <div class="form-group">
            <label for="PlantNamef">Plant Name</label>
            <input type="text" class="form-control" id="PlantNamef">
        </div>

        <div class="form-group">
            <label for="DatePlantedf">Plant Name</label>
            <input type="date" class="form-control" id="DatePlantedf">
        </div>

        <div class="form-group">
            <label for="OtherPlantTypef">Plant Name</label>
            <input type="text" class="form-control" id="OtherPlantTypef">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Example select</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option>Flower</option>
                <option>Vegetable</option>
                <option>Tree</option>
                <option>Herb</option>
                <option>Shrubs</option>
            </select>
        </div>

        </div>
        <div class="form-group">
            <label for="notef">Notes</label>
            <textarea class="form-control" id="note" rows="5"></textarea>
        </div>
    </form>
</form>
