<div class="filter-form form">
    <form id="uploadInput" class="formStyle" action="/search" method="post">
    @csrf
        <div class="row">
            <div class="col-xs-12 col-md-5 py-3">
                    <label for="filterInput">Search for a design</label>
                    <input type="text" class="form-control" id="filterInput" name="filterInput" placeholder="">
            </div>
            <div class="col-xs-12 col-md-5 py-3">
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

            <div class="col-xs-12 col-md-2 pb-2 pt-4 mt-4">
                <button type="submit" class="btn btn-primary">Search!</button>
            </div>
        </div>
        
    </form>
</div>

<div class="row">
            <div class="col-xs-12 col-md-12 py-3 unapprovedDesigns">
                <button type="button" class="btn btn-warning" onclick="showUnapprovedDesignsCatalogue()">Show unapproved designs</button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <div id="unapprovedDesignsFilter" style="display:none;">
                    <div class="alert alert-warning" role="alert" style="text-align:center;">
                        Warning! By viewing unapproved designs you may end up viewing designs that are inappropiate or NSFW. 
                        <br>
                        <button type="button" class="btn btn-danger my-3">Yes, show me unapproved designs!</button>
                    </div>
                </div>
            </div>
        </div>
