/**
 * Created by Joao on 22/12/2016.
 */
window.onload = function () {

    new Ajax.Autocompleter("search", "autocomplete_choises", base_url + "Search/ajaxsearch");
}
