<div class="filter-form form">
    <form id="uploadInput" class="formStyle" action="/search" method="post">
    @csrf
        <div class="row">
            <div class="col-xs-12 col-md-6 py-3">
                    <label for="filterInput">Search for a design</label>
                    <input type="text" class="form-control" id="filterInput" name="filterInput" placeholder="">
            </div>
            <div class="col-xs-12 col-md-6 py-3">
                    <label for="typeSelect">Item type</label>
                    <select name="filterSelect" class="form-control" id="typeSelect">
                        <option value="All">Choose a type</option>
                        <option value="Top">Top (Custom Design Pro editor needed)</option>
                        <option value="Dress">Dress (Custom Design Pro editor needed)</option>
                        <option value="Headwear">Headwear (Custom Design Pro editor needed)</option>
                        <option value="Standard Design">Standard Design</option>
                        <option value="Room Design">Room Design</option>
                    </select>
            </div>
        </div>
        <div class="col py-3">
            <button type="submit" class="btn btn-primary">Search!</button>
        </div>
    </form>
</div>
