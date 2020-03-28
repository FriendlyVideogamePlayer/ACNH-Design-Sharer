<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>
<div class="form">
    <form id="uploadInput" class="formStyle" action="" method="">
        <div class="row"> 
            <div class="col">
                    <label for="nameInput">Name</label>
                    <input type="text" class="form-control" id="nameInput" placeholder="The name you want displayed on your submission">
            </div>
            <div class="col">
                    <label for="categorySelect">Clothing type select</label>
                    <select class="form-control" id="categorySelect">
                    <option>Top</option>
                    <option>Dress</option>
                    <option>Legs</option>
                    </select>
            </div>
        </div>
        <div class="row"> 
            <div class="col">
                    <label for="descriptionInput">Description</label>
                    <input type="textarea" class="form-control" id="descriptionInput" placeholder="The description you want displayed under your submission">
            </div>
        </div>
    </form>
</div>


@include('layout.footer')
</body>