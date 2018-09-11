<!-- my scripts calls !-->
<script>
    loadInputFormScripts();


</script>

<!-- external scripts calls !-->

<script>
    class texextHelpers{
        constructor(){

        }

        isMoreThanOne(element){
            return ($(element).next().children().length ?  false: true);
        }

    }
</script>

<script type="text/javascript">

    var helpers = new texextHelpers();

    $('#acceptKeywordsBody').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add one...',
    });

    $('#acceptKeywordsOther').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add one...',
    });

    $('#rejectKeywordsBody').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add one...',
    });

    $('#rejectKeywordsOther').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add one...',
    });

    $('#links').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add link...',
    });

    $('#pagination_links').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add link...',
    });


    //one elem limited inputs
    $('#querySelectorBody').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add link...',
    }).bind('isTagAllowed',helpers, function(e, data){
        data.result=helpers.isMoreThanOne(this);
    })

    $('#querySelectorOther').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add link...',
    }).bind('isTagAllowed',helpers, function(e, data){
        data.result=helpers.isMoreThanOne(this);
    })

    $('#Pagination').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add link...',
    }).bind('isTagAllowed',helpers, function(e, data){
        data.result=helpers.isMoreThanOne(this);
    })

    $('#contentLength').textext({
        plugins : 'tags prompt focus autocomplete',
        prompt : 'Add link...',
    }).bind('isTagAllowed',helpers, function(e, data){
        data.result=helpers.isMoreThanOne(this);
    })


</script>