import { Products } from './actions/products.js';
import { AddOffer } from './actions/offer/addoffer.js';
import { GetOffers } from './actions/offer/getoffers.js';
import { DeleteOffer } from './actions/offer/deleteoffer.js';

import { Register } from './actions/register.js';
import { Login } from './actions/login.js';
import { ResetPassword } from './actions/resetpassword.js';

import { Upload } from './actions/upload.js';


window.onload = () => {
    let needsLogin = document.getElementById("needs-login")
    needsLogin.addEventListener("click", () => {
        let login = new Login
        login.logout().then(() => login.login())
        needsLogin.style.display = "none"
    });
}

// Register.register();
// console.log(localStorage.getItem('jwt_token'));
// let login = new Login;
// login.getJWTToken();
// login.logout();

new Products
let addOffer = document.getElementById("add-offer")
addOffer.addEventListener("click", () => {
    let url = document.getElementById("url")
    let price = document.getElementById("price")
    let currency = document.getElementById("currency")
    let product = document.getElementById("product")
    let product_id = product.options[product.selectedIndex].value;
    new AddOffer(url.value, parseFloat(price.value), currency.value, product_id);
});

new GetOffers()
let deleteOffer = document.getElementById("delete-offer-button")
deleteOffer.addEventListener("click", () => {
    let offer = document.getElementById("delete-offer")
    let offer_id = offer.options[offer.selectedIndex].value;
    new DeleteOffer(offer_id);
});


// password reset
let resetPasswordRequest = document.getElementById("reset-password-request")
resetPasswordRequest.addEventListener("click", () => {
    let resetP = new ResetPassword
    resetP.makeRequest().then((response) => {
        if (typeof response !== 'undefined') {
            localStorage.setItem('userIdChangesPassword', response)
            document.getElementById('reset-password-request').style.display = 'none'
            document.getElementById('reset-password').style.display = 'block'
        }
    })
});

let resetPassword = document.getElementById("reset-password")
resetPassword.addEventListener("click", () => {
    let resetP = new ResetPassword
        // ... get somehow the token to validate the request ...
    let token = ''
        // ... then:
    resetP.resetPassword(localStorage.getItem('userIdChangesPassword'), token)
    document.getElementById('reset-password').style.display = 'none'

});

if (localStorage.getItem('userIdChangesPassword') !== null) {
    document.getElementById('reset-password-request').style.display = 'none'
    document.getElementById('reset-password').style.display = 'block'
}


let upload = document.getElementById("upload-file")
upload.addEventListener("change", e => {

    let files = e.target.files || e.dataTransfer.files;
    if (!files.length) {
        console.log('no files');
    }
    let product = document.getElementById("product")
    let product_id = product.options[product.selectedIndex].value;

    if (product_id == "") return
        // console.log(files);
        // console.log(files[0].name)
    new Upload(files, product_id)

});