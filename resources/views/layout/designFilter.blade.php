<div class="filter-form form">
    <form id="uploadInput" class="formStyle" action="http://localhost/ACNH-DesignSharer/public/designs/search" method="post">
    @csrf
        <div class="row"> 
            <div class="col py-3">
                    <label for="filterInput">Search for a design</label>
                    <input type="text" class="form-control" id="filterInput" name="filterInput" placeholder="">
            </div>
            <div class="col py-3">
                    <label for="typeSelect">Item type</label>
                    <select name="filterSelect" class="form-control" id="typeSelect">
                        <option>Choose a type</option>
                        <option>Top</option>
                        <option>Dress</option>
                    </select>
            </div>
        </div>
        <div class="col py-3">
            <button type="submit" class="btn btn-primary">Search!</button>
        </div>
    </form>
</div>