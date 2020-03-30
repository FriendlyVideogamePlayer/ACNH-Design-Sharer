function showUnapprovedDesignsCatalogue() {
    var approveDiv = document.getElementById('unapprovedDesignsFilter');

    if(approveDiv.style.display === "none") {
        approveDiv.style.display = "block";
    } 
    else {
        approveDiv.style.display = "none";
    }
 }