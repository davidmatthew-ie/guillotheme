/**
 * Scripts to run for the admin area.
 *
 * @package Guillotheme
 * @subpackage Guillotheme/js
 */

/**
 * Run defined functions once document has loaded.
 */
document.addEventListener('DOMContentLoaded', function() {
    redirectField();
});

/**
 * Alter properties of url field based on radio button selection.
 */
function redirectField() {
    let redirect1 = document.getElementById('redirect-1');
    let redirect2 = document.getElementById('redirect-2');
    let url_field = document.getElementById('custom-url');

    if (redirect1.checked) {
        url_field.style.opacity = 0.5;
        url_field.required = false;
    } else {
        url_field.style.opacity = 1;
        url_field.required = true;
    }
    
    redirect1.addEventListener('click', function(){
        if (redirect1.checked) {
            url_field.style.opacity = 0.5;
            url_field.required = false;
        }
    });

    redirect2.addEventListener('click', function(){
        if (redirect2.checked) {
            url_field.style.opacity = 1;
            url_field.required = true;
        }
    });
}
