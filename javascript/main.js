const urlParams = new URLSearchParams(window.location.search);
const search = urlParams.get('search');
const first_name = urlParams.get('first_name');
console.log(search, first_name);

if (search == 'notfound') {
    $(document).ready(function(){
        Materialize.toast('I am a toast!', 4000);
        console.log('Hello from Jquery');
    });
}
const url = new URL(document.currentScript.getAttribute('src'));
const scriptParams = Object.fromEntries(url.searchParams)
console.log(scriptParams);