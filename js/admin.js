/**
 * Scripts to run for the admin area.
 *
 * @package Guillotheme
 * @subpackage Guillotheme/js
 */

document.addEventListener('DOMContentLoaded', function() {
    
    /**
     * Alter opacity of url field based on radio button selection.
     */
    let redirect1 = document.getElementById('redirect-1');
    let redirect2 = document.getElementById('redirect-2');
    let url_field = document.getElementById('custom-url');

    if (redirect1.checked) {
        url_field.style.opacity = 0.5;
    } else {
        url_field.style.opacity = 1;
    }
    
    redirect1.addEventListener('click', function(){
        if (redirect1.checked) {
            url_field.style.opacity = 0.5;
        }
    });

    redirect2.addEventListener('click', function(){
        if (redirect2.checked) {
            url_field.style.opacity = 1;
        }
    });
});
