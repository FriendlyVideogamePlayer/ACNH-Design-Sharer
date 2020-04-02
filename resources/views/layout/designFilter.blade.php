<div class="filter-form form">
    <form id="uploadInput" class="formStyle" action="/search" method="post">
    @csrf
        <div class="row pt-3">
            <div class="col-xs-12 col-md-5 ">
                    <label for="filterInput">Search for a design</label>
                    <input type="text" class="form-control" id="filterInput" name="filterInput" placeholder="e.g Purple Dress">
            </div>
            <div class="col-xs-12 col-md-5 ">
                    <label for="typeSelect">Design type</label>
                    <select name="filterSelect" class="form-control" id="typeSelect">
                        <option value="All">Choose a type</option>
                        <option value="Brimmed Hat">Brimmed Hat</option>
                        <option value="Brimmed Cap">Brimmed Cap</option>
                        <option value="Knit Cap">Knit Cap</option>
                        <option value="Top">Top</option>
                        <option value="Long Sleeve Dress Shirt">Long Sleeve Dress Shir</option>
                        <option value="Short Sleeve T-shirt">Short Sleeve T-shirt</option>
                        <option value="Coat">Coat</option>
                        <option value="Hoodie">Hoodie</option>
                        <option value="Sweater">Sweater</option>
                        <option value="Robe">Robe</option>
                        <option value="Round Dress">Round Dress</option>
                        <option value="Balloon Hem Dress">Balloon Hem Dress</option>
                        <option value="Long Sleeve Dress">Long Sleeve Dress</option>
                        <option value="Short Sleeve Dress">Short Sleeve Dress</option>
                        <option value="Sleeveless Dress">Sleeveless Dress</option>
                        <option value="Standard Design">Standard Design</option>
                        <option value="Nook Phone case">Nook Phone case</option>
                    </select>
            </div>

            <div class="col-xs-12 col-md-2 pb-2 pt-2 mt-4">
                <button type="submit" class="btn btn-primary">Search!</button>
            </div>
        </div>
        
    </form>
</div>
@if(isset($onUnapprovedDesigns))
    <div class="alert alert-danger" role="alert" style="text-align:center;">
        {{$onUnapprovedDesigns}}
    </div>
@else
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
                <a href="/unapproveddesigns" class="btn btn-danger my-3" onclick="">Yes, show me unapproved designs!</a>
            </div>
        </div>
    </div>
</div>
@endif