<html>
@extends('layout.head')
@include('layout.nav')
</html>

<body>
<div class="form">
    <div class="container">
        <div class="alert alert-info mt-4" role="alert" style="text-align:center;">
            If you aren't familiar with <a href="https://imgur.com/" target="_blank">Imgur</a> or how to upload, here is an easy to follow tutorial to get your designs uploaded there and subsequently here!
        </div>

        <div class="alert alert-warning mt-2" role="alert" style="text-align:center;">
            This guide was written for Google Chrome on Windows 10. Some of the instructions may be slightly different depending on your system configuration!
        </div>

        <div class="card mb-4 mt-4 cardHover" style="min-width: 20rem;">
            <a href="https://i.imgur.com/Qdyb5uA.png" target="_blank" class="cardLink">
                <img class="card-img-top" src="https://i.imgur.com/Qdyb5uA.png" alt="card image cap">
                <div class="card-body">
                    <h5 class="card-title">Accessing Imgur</h5>
                    <p class="card-text">Using the browser of your choice, navigate to <a href="https://imgur.com/upload?beta" target="_blank">https://imgur.com/upload?beta</a>.</p>
                </div>
            </a>
        </div>

        <div class="card mb-4 cardHover" style="min-width: 20rem;">
            <a href="https://i.imgur.com/eaOE63p.png" target="_blank" class="cardLink">
                <img class="card-img-top" src="https://i.imgur.com/eaOE63p.png" alt="card image cap">
                <div class="card-body">
                    <h5 class="card-title">Uploading your design</h5>
                    <p class="card-text">Click on <b>"Choose Photo/Video"</b> and the window displayed above will open. Navigate to where your design is, click on it and then either click the glowing blue <b>"Open"</b> button at the bottom of that window, or drag it to the <b>"Drop images here"</b> area on the Imgur web page.</p>
                </div>
            </a>
        </div>

        <div class="card mb-4 cardHover" style="min-width: 20rem;">
            <a href="https://i.imgur.com/UHx9Hv2.png" target="_blank" class="cardLink">
                <img class="card-img-top" src="https://i.imgur.com/UHx9Hv2.png" alt="card image cap">
                <div class="card-body">
                    <h5 class="card-title">Getting the link</h5>
                    <p class="card-text">You will now see your design displayed. Right click on the image and then select <b>"Copy image address"</b>. You are done! Paste the link into the appropriate box on the <a href="/upload">upload page</a>, fill in the rest of the required information and your design will be uploaded for all to see!</p>
                </div>
            </a>
        </div>
    </div>
</div>

@include('layout.footer')
</body>
