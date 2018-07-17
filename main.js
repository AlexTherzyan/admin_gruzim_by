/* Search */



var product = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        // url:  'http://giftube/typeahead?query=%QUERY'
        url: 'http://giftube/typeahead?query=%QUERY'
    }
});

product.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'product',
    display: 'title',
    limit: 5,
    source: product
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = 'http://giftube/?s=' + encodeURIComponent(suggestion.title);
});