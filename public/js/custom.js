// Toasts
let myToastEl = document.getElementById('toast')
if(myToastEl) {
    let myToast = bootstrap.Toast.getOrCreateInstance(myToastEl, {'delay': 5000}) // Returns a Bootstrap toast instance

    myToast.show();
}

// Send data from selects
function sendToTarget(select, destination) {
    $('#' + destination).val(select.value).change();

}
