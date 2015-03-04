<script>
    $( document ).ready(function() {

        var foods = new Bloodhound({
            datumTokenizer: function (datum) {
                return Bloodhound.tokenizers.whitespace(datum.name);
            },
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            minLength: 3,
            limit: 25,
            remote: {
                url: '{{ Config::get('app.url') }}foods/?q=%QUERY',
                    filter: function (foods) {
                        // Map the remote source JSON array to a JavaScript object array
                        return $.map(foods, function (food) {
                            return {
                                name: food.name,
                                value: food.id
                            };
                        });
                    }
            }
        });

        foods.initialize();

        $('#food').typeahead(null, {
            displayKey: function(food) {
                return food.name;
            },
            source: foods.ttAdapter()
        }).on('typeahead:selected', function(event, data){
            $('#food_id').val(data.value);
        });

    });
</script>