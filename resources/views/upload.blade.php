<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>
<div class="form">
    <form id="uploadInput" class="formStyle" action="" method="">
        <div class="row"> 
            <div class="col pt-3">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control" id="nameInput" placeholder="The name you want displayed on your submission">
            </div>
            <div class="col pt-3">
                    <label for="categorySelect">Clothing type select</label>
                    <select class="form-control" id="categorySelect">
                    <option>Top</option>
                    <option>Dress</option>
                    <option>Legs</option>
                    </select>
            </div>
        </div>
        <div class="row"> 
            <div class="col pt-3">
                    <label for="descriptionInput">Description</label>
                    <input type="textarea" class="form-control" id="descriptionInput" placeholder="The description you want displayed under your submission">
            </div>
            <div class="col pt-3">
                    <label for="imageInput">Image link</label>
                    <input type="text" class="form-control" id="imageInput" placeholder="A link to the image of your design">
            </div>
        </div>
        <div class="row"> 
            <div class="col pt-3">
                <button type="submit" class="btn btn-primary submit-btn">Submit</button>
            </div>
        </div>
    </form>

</div>


@include('layout.footer')
</body>